@extends('layouts.admin.index')
@section('title', 'Enroll Course')


@section('content')


<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>All Courses list</h4>
            <h6>View/Search Courses</h6>
        </div>
        <div class="page-btn">


            <a href="{{ route('student.dashboard') }}" class="btn btn-added">
                <img src="{{ asset('frontend/assets/img/back.svg') }}" class="me-1" alt="img">Home
            </a>


        </div>
    </div>

    <div class="row">

        <div class="col-9 mx-auto">
               <div class="row">
                 {{-- First Column --}}
                 <div class="col-md-12 col-lg-4">
                    <div class="card">
                        <img src="{{ Storage::disk('public')->url('course/'.$course->featured_image) }}" class="card-img-top" alt="{{ $course->name }}">
                        <div class="card-body">
                          <h5 class="card-title">{{ $course->name }}</h5>
                          <p class="card-text">{{ $course->short_desc }}</p>
                        </div>
                       <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <h5 class="card-title">Units</h5>
                            @forelse ($course->units as $key=>$unit)
                                <li class="list-group-item">{{ $key + 1 }}. {{ $unit->name }}</li>
                            @empty
                                <li class="list-group-item">No Unit found</li>
                            @endforelse
                        </ul>
                       </div>
                      </div>
                </div>
                {{-- Second Column Pay Column--}}

                <div class="col-md-12 col-lg-5 offset-lg-3">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Pay this Course</h5>
                        </div>
                        <div class="card-body">
                            <div class="accordion" id="coursePayment">

                                <div class="accordion-item">
                                  <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mpesa" aria-expanded="false" aria-controls="mpesa">
                                      M-Pesa Payments
                                    </button>
                                  </h2>
                                  <div id="mpesa" class="accordion-collapse collapse" data-bs-parent="#coursePayment">
                                    <div class="accordion-body">
                                        <div class="card text-bg-light">
                                            To Pay your bill ({{ $course->pricing }}). Follow the Steps Below. Once you receive a successful reply from MPESA. Click the 'Complete' button.
                                        </div>
                                        <ol type="1">
                                            <li>Go to Mpesa Sim Tool Kit</li>
                                            <li>Select Mpesa</li>
                                            <li>Select Lipa na M-Pesa</li>
                                            <li>Select Buy Good and Services</li>
                                            <li>Enter Till Number as <code>247247</code></li>
                                            <li>Enter Amount as <code>{{ $course->pricing }}</code></li>
                                            <li>Enter your private M-Pesa Pin</li>
                                            <li>Click OK to pay</li>
                                            <li>Click 'Complete' Button below once you receive MPESA confirmation</li>
                                        </ol>

                                        {{-- <form action="{{ route('student.enroll', $course->slug) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-primary">Enroll</button>
                                        </form> --}}

                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#enrollToCourse">
                                            Enroll
                                          </button>

                                    </div>
                                  </div>
                                </div>

                                {{-- <div class="accordion-item">
                                  <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bankPayment" aria-expanded="false" aria-controls="bankPayment">
                                      Coming Soon
                                    </button>
                                  </h2>
                                  <div id="bankPayment" class="accordion-collapse collapse" data-bs-parent="#coursePayment">
                                    <div class="accordion-body">
                                      <ul>
                                        <li>Bank Payments</li>
                                        <li>Paypal</li>
                                        <li>Cheque Payents</li>
                                      </ul>
                                    </div>
                                  </div>
                                </div> --}}

                              </div>
                        </div>
                    </div>
                </div>
               </div>
        </div>


    </div>
</div>


<div class="modal fade" id="enrollToCourse" tabindex="-1" aria-labelledby="enrollToCourseLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="enrollToCourseLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <form action="{{ route('student.enroll', $course->slug) }}" method="post">
                @csrf
                
                    <label for="phone_no">Enter your phone number</label>
                    <input type="tel" name="phone_no" class="form-control">

                <button type="submit" class="btn btn-primary">Pay</button>
            </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

@endsection
