<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Customer\DashboardCustomerController;
use Illuminate\Support\Facades\Auth;

Route::get('/', fn () => view('welcome'))->name('home');

// Login & Register (untuk yang belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard route utama (akses setelah login)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();

        if ($user->role->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role->role === 'customer') {
            return redirect()->route('customer.dashboard');
        } else {
            abort(403);
        }
    })->name('dashboard');

    // Admin dashboard
    Route::get('/admin/dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');

    // Customer dashboard
    Route::get('/customer/dashboard', [DashboardCustomerController::class, 'index'])->name('customer.dashboard');
});
