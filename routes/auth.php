<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Guest routes - accessible only when not authenticated
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

// Auth routes - accessible only when authenticated
Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
    Route::put('password', [PasswordController::class, 'update'])
        ->name('password.update');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    // Protected routes
    Route::get('dashboard', [AuthController::class, 'index'])->name('dashboard');
    Route::resource('feedback', FeedbackController::class);
    Route::resource('jadwal', JadwalController::class);
    Route::resource('payment', PaymentController::class);
    Route::resource('profile', ProfileController::class);
    Route::resource('service', ServiceController::class);
});

// Rute untuk registrasi
Route::get('register', [AuthController::class, 'register'])
    ->middleware('redirect_if_authenticated')->name('register');
Route::post('register', [AuthController::class, 'registerSave'])
    ->middleware('redirect_if_authenticated')->name('register.save');

// Rute untuk login
Route::get('login', [AuthController::class, 'login'])
    ->middleware('redirect_if_authenticated')->name('login');
Route::post('login', [AuthController::class, 'loginAction'])
    ->middleware('redirect_if_authenticated')->name('login.action');


// Fallback route for guests
Route::fallback(function () {
    return redirect()->route('login');
});