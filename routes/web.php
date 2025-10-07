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
use Illuminate\Support\Facades\Auth;
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

// Seller routes with closure middleware
Route::prefix('seller')->name('seller.')->group(function () {
    Route::get('/login', [SellerAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [SellerAuthController::class, 'login']);
    Route::get('/register', [SellerAuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [SellerAuthController::class, 'register']);
    Route::post('/logout', [SellerAuthController::class, 'logout'])->name('logout');

    // Protected routes with closure middleware
    Route::get('/dashboard', function () {
        if (!Auth::guard('seller')->check()) {
            return redirect('/seller/login');
        }
        return app(SellerDashboardController::class)->index();
    })->name('dashboard');
});

// Admin routes with closure middleware
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::get('/register', [AdminAuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AdminAuthController::class, 'register']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Protected routes with closure middleware
    Route::get('/dashboard', function () {
        if (!Auth::guard('admin')->check()) {
            return redirect('/admin/login');
        }
        return app(AdminDashboardController::class)->index();
    })->name('dashboard');
});

// Audit routes with closure middleware
Route::prefix('audit')->name('audit.')->group(function () {
    Route::get('/login', [AuditAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuditAuthController::class, 'login']);
    Route::get('/register', [AuditAuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuditAuthController::class, 'register']);
    Route::post('/logout', [AuditAuthController::class, 'logout'])->name('logout');

    // Protected routes with closure middleware
    Route::get('/dashboard', function () {
        if (!Auth::guard('audit')->check()) {
            return redirect('/audit/login');
        }
        return app(AuditDashboardController::class)->index();
    })->name('dashboard');
});

// Staff routes with closure middleware
Route::prefix('staff')->name('staff.')->group(function () {
    Route::get('/login', [StaffAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [StaffAuthController::class, 'login']);
    Route::get('/register', [StaffAuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [StaffAuthController::class, 'register']);
    Route::post('/logout', [StaffAuthController::class, 'logout'])->name('logout');

    // Protected routes with closure middleware
    Route::get('/dashboard', function () {
        if (!Auth::guard('staff')->check()) {
            return redirect('/staff/login');
        }
        return app(StaffDashboardController::class)->index();
    })->name('dashboard');
});

require __DIR__.'/auth.php';
