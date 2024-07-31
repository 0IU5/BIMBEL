<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\FeedbackController;

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

// Rute awal mengarah ke halaman login
Route::get('/', function () {
    return redirect()->route('login');
});

// Rute untuk registrasi
Route::get('register', [AuthController::class, 'register'])
    ->middleware('guest')->name('register');
Route::post('register', [AuthController::class, 'registerSave'])
    ->middleware('guest')->name('register.save');

// Rute untuk login
Route::get('login', [AuthController::class, 'login'])
    ->middleware('guest')->name('login');
Route::post('login', [AuthController::class, 'loginAction'])
    ->middleware('guest')->name('login.action');

// Rute untuk logout
Route::get('logout', [AuthController::class, 'logout'])
    ->middleware('auth')->name('logout');

// Rute yang memerlukan autentikasi
Route::middleware('auth')->group(function () {
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    Route::get('profile', [AuthController::class, 'profile'])->name('profile');
    Route::put('profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');

    Route::resource('services', ServiceController::class);
    Route::resource('jadwals', JadwalController::class);
    Route::resource('feedbacks', FeedbackController::class);
    Route::resource('payments', PaymentController::class);
});