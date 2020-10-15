<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* ------------ All PUBLIC views/routes START here ------------  */

//public views
Route::get('/', function () {return view('welcome');});
Route::view('/contactus', 'contactus');
Route::view('/aboutus', 'aboutus');
Route::view('/faq', 'contactus');
// client, admin, hr homepage views
Route::view('/home', 'client.home')->middleware('auth');
Route::view('/admin', 'admin.admin')->middleware('auth:admin');
Route::view('/hr', 'hr.hr')->middleware('auth:hr');
// admin and hr login get/post routes
Route::get('/login/admin', [App\Http\Controllers\Auth\LoginController::class, 'showAdminLoginForm'])->name('adminlogin');
Route::get('/login/hr', [App\Http\Controllers\Auth\LoginController::class, 'showHrLoginForm'])->name('hrlogin');
Route::post('/login/admin', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin']);
Route::post('/login/hr', [App\Http\Controllers\Auth\LoginController::class, 'hrLogin']);
// client login routes helper class
Auth::routes();

/* ------------ All PUBLIC views/routes END here ------------  */




/* ------------ All HUMAN RESOURCES views/routes START here ------------  */

// admin and hr get/post register routes
Route::get('/register/admin', [App\Http\Controllers\Auth\RegisterController::class, 'showAdminRegisterForm'])->middleware('auth:hr');
Route::get('/register/hr', [App\Http\Controllers\Auth\RegisterController::class, 'showHrRegisterForm'])->middleware('auth:hr');
Route::post('/register/admin', [App\Http\Controllers\Auth\RegisterController::class, 'createAdmin'])->middleware('auth:hr');
Route::post('/register/hr', [App\Http\Controllers\Auth\RegisterController::class, 'createHr'])->middleware('auth:hr');

/* ------------ All HUMAN RESOURCES views/routes END here ------------  */




/* ------------ All ADMIN views/routes START here ------------  */

// create driver get/post routes
Route::get('/admin/new-driver', [App\Http\Controllers\AdminDriverController::class, 'showNewDriverForm'])->middleware('auth:admin');
Route::post('/admin/new-driver', [App\Http\Controllers\AdminDriverController::class, 'createNewDriver'])->name('new.driver.post')->middleware('auth:admin');

/* ------------ All ADMIN views/routes END here ------------  */




/* ------------ All CLIENT views/routes START here ------------  */

// multi form booking get/post routes
Route::get('/booking/start-booking', [App\Http\Controllers\BookingController::class, 'startBooking'])->middleware('auth')->name('booking.start');
    // step-one
Route::get('/booking/step-one', [App\Http\Controllers\BookingController::class, 'createStepOne'])->middleware('auth')->name('booking.step.one.create');
Route::post('/booking/step-one', [App\Http\Controllers\BookingController::class, 'postStepOne'])->middleware('auth')->name('booking.step.one.post');
    // step-two
Route::get('/booking/step-two', [App\Http\Controllers\BookingController::class, 'createStepTwo'])->middleware('auth')->name('booking.step.two.create');
Route::post('/booking/step-two', [App\Http\Controllers\BookingController::class, 'postStepTwo'])->middleware('auth')->name('booking.step.two.post');
    // step-three
Route::get('/booking/step-three', [App\Http\Controllers\BookingController::class, 'createStepThree'])->middleware('auth')->name('booking.step.three.create');
Route::post('/booking/step-three', [App\Http\Controllers\BookingController::class, 'postStepThree'])->middleware('auth')->name('booking.step.three.post');
    // step-four
Route::get('/booking/step-four', [App\Http\Controllers\BookingController::class, 'createStepFour'])->middleware('auth')->name('booking.step.four.create');
Route::post('/booking/step-four', [App\Http\Controllers\BookingController::class, 'postStepFour'])->middleware('auth')->name('booking.step.four.post');
    // step-five
Route::get('/booking/step-five', [App\Http\Controllers\BookingController::class, 'createStepFive'])->middleware('auth')->name('booking.step.five.create');
Route::post('/booking/step-five', [App\Http\Controllers\BookingController::class, 'postStepFive'])->middleware('auth')->name('booking.step.five.create');
    // summarise and confirm booking
Route::get('/booking/step-five', [App\Http\Controllers\BookingController::class, 'createConfirmation'])->middleware('auth')->name('booking.step.five.create');
Route::post('/booking/step-five', [App\Http\Controllers\BookingController::class, 'postConfirmation'])->middleware('auth')->name('booking.step.five.create');

/* ------------ All CLIENT views/routes END here ------------  */