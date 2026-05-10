<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KelolaPackageController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TourController;

Route::get('/paket-wisata', [TourController::class, 'index'])->name('paket-wisata');
Route::get('/paket-wisata/{slug}', [TourController::class, 'show'])->name('paket-wisata.show');

Route::get('/', [TourController::class, 'home'])->name('home');

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/kelola-paket-wisata', KelolaPackageController::class)->parameters(['kelola-paket-wisata' => 'kelolaPackage']);
    Route::get('/kelola-pemesanan', [BookingController::class, 'index'])->name('kelola-pemesanan.index');
    Route::get('/kelola-pemesanan/{booking}', [BookingController::class, 'show'])->name('kelola-pemesanan.show');
    Route::delete('/kelola-pemesanan/{booking}', [BookingController::class, 'destroy'])->name('kelola-pemesanan.destroy');
    Route::get('/kelola-user', [UserController::class, 'index'])->name('user-profile.index');
    Route::get('/kelola-user/{user}', [UserController::class, 'show'])->name('user-profile.show');
    Route::get('/kelola-user/{user}/edit', [UserController::class, 'edit'])->name('user-profile.edit');
    Route::put('/kelola-user/{user}', [UserController::class, 'update'])->name('user-profile.update');
    Route::delete('/kelola-user/{user}', [UserController::class, 'destroy'])->name('user-profile.destroy');
});

// Language Switch Route
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'id'])) {
        Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('lang.switch');


