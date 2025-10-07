<?php

use App\Http\Controllers\Auth\SellerAuthController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\AuditAuthController;
use App\Http\Controllers\Auth\StaffAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SellerDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuditDashboardController;
use App\Http\Controllers\StaffDashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

// User routes (default Breeze)
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Seller routes
Route::prefix('seller')->group(function () {
    Route::get('/login', [SellerAuthController::class, 'showLoginForm'])->name('seller.login');
    Route::post('/login', [SellerAuthController::class, 'login']);
    Route::get('/register', [SellerAuthController::class, 'showRegistrationForm'])->name('seller.register');
    Route::post('/register', [SellerAuthController::class, 'register']);
    Route::post('/logout', [SellerAuthController::class, 'logout'])->name('seller.logout');

    Route::middleware(['seller'])->group(function () {
        Route::get('/dashboard', [SellerDashboardController::class, 'index'])->name('seller.dashboard');
    });
});

// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::get('/register', [AdminAuthController::class, 'showRegistrationForm'])->name('admin.register');
    Route::post('/register', [AdminAuthController::class, 'register']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    });
});

// Audit routes
Route::prefix('audit')->group(function () {
    Route::get('/login', [AuditAuthController::class, 'showLoginForm'])->name('audit.login');
    Route::post('/login', [AuditAuthController::class, 'login']);
    Route::get('/register', [AuditAuthController::class, 'showRegistrationForm'])->name('audit.register');
    Route::post('/register', [AuditAuthController::class, 'register']);
    Route::post('/logout', [AuditAuthController::class, 'logout'])->name('audit.logout');

    Route::middleware(['audit'])->group(function () {
        Route::get('/dashboard', [AuditDashboardController::class, 'index'])->name('audit.dashboard');
    });
});

// Staff routes
Route::prefix('staff')->group(function () {
    Route::get('/login', [StaffAuthController::class, 'showLoginForm'])->name('staff.login');
    Route::post('/login', [StaffAuthController::class, 'login']);
    Route::get('/register', [StaffAuthController::class, 'showRegistrationForm'])->name('staff.register');
    Route::post('/register', [StaffAuthController::class, 'register']);
    Route::post('/logout', [StaffAuthController::class, 'logout'])->name('staff.logout');

    Route::middleware(['staff'])->group(function () {
        Route::get('/dashboard', [StaffDashboardController::class, 'index'])->name('staff.dashboard');
    });
});

require __DIR__.'/auth.php';
