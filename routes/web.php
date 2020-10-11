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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/login/admin', [App\Http\Controllers\Auth\LoginController::class, 'showAdminLoginForm'])->name('adminlogin');
Route::get('/login/hr', [App\Http\Controllers\Auth\LoginController::class, 'showHrLoginForm'])->name('hrlogin');
Route::get('/register/admin', [App\Http\Controllers\Auth\RegisterController::class, 'showAdminRegisterForm']);
Route::get('/register/hr', [App\Http\Controllers\Auth\RegisterController::class, 'showHrRegisterForm']);

Route::post('/login/admin', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin']);
Route::post('/login/hr', [App\Http\Controllers\Auth\LoginController::class, 'hrLogin']);
Route::post('/register/admin', [App\Http\Controllers\Auth\RegisterController::class, 'createAdmin']);
Route::post('/register/hr', [App\Http\Controllers\Auth\RegisterController::class, 'createHr']);

Route::view('/home', 'client.home')->middleware('auth');
Route::view('/admin', 'admin.admin')->middleware('auth:admin');
Route::view('/hr', 'hr.hr')->middleware('auth:hr');
