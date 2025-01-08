<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\RegisterController;


Route::get('/', function () {
    return view('mainpage');
})->name('home');

Route::get('/reviews', function () {
    return view('reviews');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

Route::post('register', [RegisterController::class, 'register'])->name('register.submit');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');

Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');

Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
Route::post('/payment', [PaymentController::class, 'processPayment'])->name('payment.process');

Route::middleware(['auth'])->get('/profile', function () {
    return view('profile.show');
})->name('profile.show');
