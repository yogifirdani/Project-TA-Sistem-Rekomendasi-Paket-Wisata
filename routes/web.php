<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KelolaPackageController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/article', function () {
    return view('article');
})->name('article');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/recommendation', function () {
    return view('recommendation');
})->name('recommendation');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});



Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/kelola-paket-wisata', KelolaPackageController::class)->parameters(['kelola-paket-wisata' => 'kelolaPackage']);
    Route::get('/kelola-pemesanan', [BookingController::class, 'index'])->name('kelola-pemesanan.index');
    Route::get('/kelola-pemesanan/{booking}', [BookingController::class, 'show'])->name('kelola-pemesanan.show');
    Route::delete('/kelola-pemesanan/{booking}', [BookingController::class, 'destroy'])->name('kelola-pemesanan.destroy');
    Route::get('/user-profile', [UserController::class, 'index'])->name('user-profile.index');
    Route::get('/user-profile/{user}', [UserController::class, 'show'])->name('user-profile.show');
    Route::get('/user-profile/{user}/edit', [UserController::class, 'edit'])->name('user-profile.edit');
    Route::put('/user-profile/{user}', [UserController::class, 'update'])->name('user-profile.update');
    Route::delete('/user-profile/{user}', [UserController::class, 'destroy'])->name('user-profile.destroy');
});


