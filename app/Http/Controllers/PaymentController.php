<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\StudentCourse;
use App\Models\User;
use App\Notifications\SuccessfulEnrollnment;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function enroll(Request $request, $slug)
    {

        $course = Course::where('slug', $slug)->first();
        $phone = $request->phone_no;
        $invoice = date('mdHis');
        $amount = $course->pricing;


        // Saving the Student data
        $stdCourse = new StudentCourse();
        $stdCourse->course_id = $course->id;
        $stdCourse->user_id = Auth::id(); // student name
        $stdCourse->last_access_date = Carbon::create(date('M d, Y'))->addMonths($course->duration); //today + course duration in days
        $stdCourse->amount_paid = $amount;
        $stdCourse->invoice = $invoice;
        $stdCourse->status = FALSE;
        $stdCourse->save();


        // echo"<pre>"; print_r($stdCourse); die;

        // Put the data in session
        Session::put('transaction_id', $stdCourse->id);



        #Callback url
        // define('CALLBACK_URL', 'https://example.co.ke/include/callback_url.php?orderid=');
        // define('CALLBACK_URL', route('student.accept-payment', $invoice));
        define('CALLBACK_URL', 'https://d48f-2c0f-fe38-240c-446f-5a19-1ff7-7c80-4a72.ngrok-free.app/api/accept-payment');


        # access token
        $consumerKey = 'w1SwsGVdzEawn8KG0ItmynM4gSejfAAm'; //Fill with your app Consumer Key
        $consumerSecret = 'UaEjT6IhEzyz4sZA'; // Fill with your app Secret

        # provide the following details, this part is found on your test credentials on the developer account
        $BusinessShortCode = '6048504'; //business short code
        $Passkey = '5840fe8c006720cc4180dbc841ae13c088f8e62822ea635deff2d0cba1c00694'; //live passkey
        $phone = preg_replace('/^0/', '254', str_replace("+", "", $phone));
        $PartyA = $phone; // This is your phone number,
        $PartyB = '8023376';


        $TransactionDesc = 'Pay Order'; //Insert your own description
        # Get the timestamp, format YYYYmmddhms -> 20181004151020
        $Timestamp = date('YmdHis');
        # Get the base64 encoded string -> $password. The passkey is the M-PESA Public Key
        $Password = base64_encode($BusinessShortCode.$Passkey.$Timestamp);
        # header for access token
        $headers = ['Content-Type:application/json; charset=utf8'];

        # M-PESA endpoint urls
        $access_token_url = 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        $initiate_url = 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

        $curl = curl_init($access_token_url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_HEADER, FALSE);
        curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);
        $result = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $result = json_decode($result);
        $access_token = $result->access_token;

        curl_close($curl);

        # header for stk push
        $stkheader = ['Content-Type:application/json','Authorization:Bearer '.$access_token];
        # initiating the transaction

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $initiate_url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $stkheader); //setting custom header

        $curl_post_data = array(

          //Fill in the request parameters with valid values
          'BusinessShortCode' => $BusinessShortCode,
          'Password' => $Password,
          'Timestamp' => $Timestamp,
          'TransactionType' => 'CustomerBuyGoodsOnline', // CustomerBuyGoodsOnline  // CustomerPayBillOnline
          'Amount' => $amount,
          'PartyA' => $PartyA,
          'PartyB' => $PartyB,
          'PhoneNumber' => $PartyA,
          'CallBackURL' => CALLBACK_URL,
          'AccountReference' => $invoice,
          'TransactionDesc' => $TransactionDesc
        );

        $data_string = json_encode($curl_post_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);

        $curl_response . $curl_post_data['CallBackURL'];

        $res = (array)(json_decode($curl_response));
        $ResponseCode = $res['ResponseCode'];
        $MerchantRequestID = $res['MerchantRequestID'];



        // return $ResponseCode;

        // Insert to db with status 0



        if($ResponseCode == 0)
        {

            $stdCourse = StudentCourse::find(Session::get('transaction_id'));
            $stdCourse->merchant_id = $MerchantRequestID;
            $stdCourse->save();

            $status = FALSE;
            $start_time = time();
            while ($status != TRUE)
            {
                if (time() - $start_time > 30) {
                    Toastr::error('Payment Incomplete', 'Failed');
                    return redirect()->back();
                }

                $stdCourse = StudentCourse::find(Session::get('transaction_id'));
                $status = $stdCourse->status;

                sleep(1); // wait for 1 second before checking the status again
            }

            // Send a notification email upon successful payments done
            $user = User::find(Auth::id())->get();
            $courseName = Course::where('id', $stdCourse->course_id)->first();
            Notification::route('mail', $user->email)->notify(new SuccessfulEnrollnment($user, $courseName));


            Toastr::success('Successful', 'Success');
            return redirect()->route('student.dashboard');
        }
        else {

            Toastr::error('Sorry an error occurred', 'Error');
            return redirect()->back();
        }

    }

    // Accept Payment
    public function acceptPayment()
    {

        $data = file_get_contents("php://input");
        $data =  json_decode($data, true);


        $stkItem = $data['Body']['stkCallback'];
        $recepient = $data['Body']['stkCallback']['CallbackMetadata']['Item'];
        $mpesaData = array_column($recepient, 'Value', 'Name');

        $metaData = array(
         'MerchantRequestID' => $data['Body']['stkCallback']['MerchantRequestID'],
         'CheckoutRequestID' => $data['Body']['stkCallback']['CheckoutRequestID'],
         'ResultCode' => $data['Body']['stkCallback']['ResultCode'],
         'ResultDesc' => $data['Body']['stkCallback']['ResultDesc'],
        );

        $callbackInfo = array_merge($metaData, $mpesaData);




        if($callbackInfo != null && $callbackInfo['MerchantRequestID'] != null)
        {
            $merchantRequestID      = $callbackInfo['MerchantRequestID'];
            $mpesaReceiptNumber     = $callbackInfo['PhoneNumber'];
            $mpesaCode              = $callbackInfo['MpesaReceiptNumber'];

            $transaction = StudentCourse::where('merchant_id', $merchantRequestID)->first();
            if($transaction->status == 0 ){
                $transaction->mpesa_receipt_no = $mpesaReceiptNumber;
                $transaction->mpesa_code = $mpesaCode;
                $transaction->status        = TRUE;
                $transaction->save();
            }

        }

        Log::info($callbackInfo);
    }
}
