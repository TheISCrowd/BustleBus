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

//public page views
Route::get('/', function () {return view('welcome');});
Route::view('/contactus', 'contactus');
Route::view('/aboutus', 'aboutus');
Route::view('/faq', 'contactus');
// client login routes helper class
Auth::routes();

Route::view('/hr', 'hr.hr')->middleware('auth:hr');
//created-driver view
Route::view('/admin/dirver', 'driver.created-driver')->middleware('auth:admin');
// admin and hr login get/post routes
Route::get('/login/admin', [App\Http\Controllers\Auth\LoginController::class, 'showAdminLoginForm'])->name('adminlogin');
Route::get('/login/hr', [App\Http\Controllers\Auth\LoginController::class, 'showHrLoginForm'])->name('hrlogin');
Route::post('/login/admin', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin']);
Route::post('/login/hr', [App\Http\Controllers\Auth\LoginController::class, 'hrLogin']);


/* ------------ All PUBLIC views/routes END here ------------  */




/* ------------ All HUMAN RESOURCES views/routes START here ------------  */

// hr homepage view
Route::view('/home', 'client.home')->middleware('auth');
// admin and hr get/post register routes
Route::get('/hr/register-admin', [App\Http\Controllers\Auth\RegisterController::class, 'showAdminRegisterForm'])->middleware('auth:hr');
Route::get('/hr/register-hr', [App\Http\Controllers\Auth\RegisterController::class, 'showHrRegisterForm'])->middleware('auth:hr');
Route::post('/hr/register-admin', [App\Http\Controllers\Auth\RegisterController::class, 'createAdmin'])->middleware('auth:hr');
Route::post('/hr/register-hr', [App\Http\Controllers\Auth\RegisterController::class, 'createHr'])->middleware('auth:hr');

/* ------------ All HUMAN RESOURCES views/routes END here ------------  */




/* ------------ All ADMIN views/routes START here ------------  */

// admin homepage
Route::view('/admin', 'admin.admin')->middleware('auth:admin');
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
Route::get('/booking/summary-booking', [App\Http\Controllers\BookingController::class, 'createConfirmation'])->middleware('auth')->name('booking.summary.create');

/* ------------ All CLIENT views/routes END here ------------  */