<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;


Route::resource('reviews', ReviewController::class);
Route::resource('bookings', BookingController::class);

Route::get('/', function () {
    return view('mainpage');
})->name('mainpage');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/reviews', function () {
    return view('reviews');
});

Route::get('/rooms', function () {
    return view('rooms');
});
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/admin', function () {
    return view('admin');
})->name('admin');

Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
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
Route::post('/success', [PaymentController::class, 'processsuccess'])->name('success.shimi');
Route::get('/success', [PaymentController::class, 'shimi'])->name('success.shimi');

Route::middleware(['auth'])->get('/profile', function () {
    return view('profile.show');
})->name('profile.show');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

// admin details
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::post('/admin', [AdminController::class, 'admindetail']);


//admin page get data part
Route::get('/admin', [BookingController::class, 'index'])->name('admin.index');
Route::get('/admin/bookings', [BookingController::class, 'index'])->name('bookings.index');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/bookings/{booking_id}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
Route::put('/bookings/{booking_id}', [BookingController::class, 'update'])->name('bookings.update');
Route::delete('/bookings/{booking_id}', [BookingController::class, 'destroy'])->name('bookings.destroy');

//get room data from dataabase for rooms page
Route::get('/rooms', [BookingController::class, 'rooms'])->name('rooms');


Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
