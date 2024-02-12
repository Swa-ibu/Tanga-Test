<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\ExerciseController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\QuestionController as AdminQuestionController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\TopicController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\UnitExerciseController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PaymentColntroller;
use App\Http\Controllers\Student\QuestionController;
use App\Http\Controllers\Student\StudentDashboardController;
use App\Http\Controllers\Student\StudentNoteController;
use App\Http\Controllers\Teacher\TeacherDashboardController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Website Routes
Route::controller(WebsiteController::class)->group(function(){
    Route::get('/', 'index')->name('welcome');
    Route::get('about', 'about')->name('about');
    Route::get('course', 'course')->name('course');
    Route::get('course-list', 'courseList')->name('course-list');
    Route::get('course-detail/{slug}', 'courseDetails')->name('course-detail');
    Route::get('course-outline-pdf/{slug}', 'generateCourseOutlinePdf')->name('course-outline-pdf');
    Route::get('contact', 'contact')->name('contact');
    Route::get('faq', 'faq')->name('faq');
    Route::post('subscribe', 'subscribe')->name('subscribe');
    Route::post('review', 'review')->name('review');
    Route::post('post-contact-message', 'postContactMessages')->name('post-contact-message');
    Route::get('search', 'search')->name('search');
    Route::get('advance-search', 'advancedSearch')->name('advance-search');
    Route::get('course-category/{slug}/courses', 'courseCategory')->name('course-category');
});



Auth::routes(['verify'=> true]);


// Admin
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth', 'verified', 'admin']], function () {

    // Dashboard Controller
    Route::controller(AdminDashboardController::class)->group(function(){
        Route::get('dashboard', 'index')->name('dashboard');
        Route::get('notes', 'notes')->name('notes'); // for admin to see all notes.
        Route::get('subscriber', 'subscriber')->name('subscriber');
        Route::get('all-users', 'allUsers')->name('users.index');
        Route::get('user-profile', 'userProfile')->name('user-profile');
        Route::post('update-profile', 'updateProfile')->name('update-profile');
    });
    Route::resource('question', AdminQuestionController::class);


    // Category
    Route::resource('category', CategoryController::class);

    // Courses
    Route::resource('course', CourseController::class);
    Route::controller(CourseController::class)->group(function(){
        Route::patch('approve-course/{id}', 'approve')->name('approve');
        Route::get('course-payments/{slug}', 'coursePayments')->name('course.course-payments');
    });


    // Units
    Route::resource('unit', UnitController::class);
    Route::resource('unit-exercise', UnitExerciseController::class);

    // Topic
    Route::resource('topic', TopicController::class);

    // Lesson
    Route::resource('lesson', LessonController::class);
    Route::controller(ExerciseController::class)->group(function(){
        Route::get('exercise', 'index')->name('exercise');
        Route::get('create-exercise', 'create')->name('exercise.create');
        Route::post('store-exercise', 'store')->name('exercise.store');
        Route::get('edit-exercise/{id}', 'edit')->name('exercise.edit');
        Route::put('update-exercise/{id}', 'update')->name('exercise.update');
        Route::post('attach-exercise', 'attach')->name('exercise.attach');
    });

    // FAQs
    Route::controller(FaqController::class)->group(function(){
        Route::get('faq', 'index')->name('faq.index');
        Route::post('store', 'store')->name('faq.store');
        Route::put('update/{id}', 'update')->name('faq.update');
        Route::delete('destroy/{id}', 'destroy')->name('faq.destroy');
    });

    // Reviews
    Route::controller(ReviewController::class)->group(function(){
        Route::get('review', 'index')->name('review.index');
        Route::patch('update/{id}', 'update')->name('review.update');
    });


});


// Teacher
Route::group(['as' => 'teacher.', 'prefix' => 'teacher', 'namespace' => 'App\Http\Controllers\Teacher', 'middleware' => ['auth', 'verified', 'teacher']], function () {
    Route::controller(TeacherDashboardController::class)->group(function(){
        Route::get('dashboard', 'index')->name('dashboard');
        Route::get('user-profile', 'userProfile')->name('user-profile');
        Route::post('update-profile', 'updateProfile')->name('update-profile');
    });
});


// Student
Route::group(['as' => 'student.', 'prefix' => 'student', 'namespace' => 'App\Http\Controllers\Student', 'middleware' => ['auth', 'verified', 'student']], function () {
      Route::controller(StudentDashboardController::class)->group(function(){
        Route::get('dashboard', 'index')->name('dashboard');
        Route::get('course', 'course')->name('course');
        Route::get('student-course', 'studentCourse')->name('student-course');
        Route::get('pay/{slug}', 'payACourse')->name('pay');

        Route::get('resume-learning-unit/{slug}', 'resumeLearningUnit')->name('resume-learning-unit');
        Route::get('resume-learning-lesson/{slug}', 'resumeLearningLesson')->name('resume-learning-lesson');
        Route::get('user-profile', 'userProfile')->name('user-profile');
        Route::post('update-profile', 'updateProfile')->name('update-profile');

        // Unit Exercise
        Route::get('show-unit-exercise/{slug}', 'showUnitExercise')->name('show-unit-exercise');

        // Payment
        Route::get('payments', 'studentPayments')->name('payments');
    });

    // To Payment COntroller
    Route::post('enroll/{slug}', [PaymentColntroller::class, 'enroll'])->name('enroll');

    // Notes
    Route::resource('note', StudentNoteController::class);

    // Questions
    Route::controller(QuestionController::class)->group(function(){
        Route::get('question', 'index')->name('question.index');
        Route::post('store-question', 'store')->name('question.store');
        Route::put('update-question', 'update')->name('question.update');
    });
});
