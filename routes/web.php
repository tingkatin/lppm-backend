<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailVerificationController;

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
    return redirect()->route('dashboard');
});
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth.both')->name('dashboard');
Route::get('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'postlogin'])->name('login.store');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth.both')->name('logout');
Route::get('/registrasi', [AuthController::class, 'registration'])->middleware('guest')->name('registration');
Route::post('/registrasi', [AuthController::class, 'postregistration'])->middleware('guest')->name('registration.store');
Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->middleware('guest')->name('password.forgot');
Route::post('/forgot-password', [AuthController::class, 'passwordEmail'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'passwordReset'])->middleware('guest')->name('password.reset');
Route::post('/update-password', [AuthController::class, 'passwordUpdate'])->middleware('guest')->name('password.update');

Route::get('/email/verify', [EmailVerificationController::class, 'notice'])->middleware('auth.both')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->middleware(['auth.both', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', [EmailVerificationController::class, 'send'])->middleware(['auth.both', 'throttle:6,1'])->name('verification.send');

