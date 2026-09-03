<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});;
Route::get('/register', function () {
    return view('register.index');
});
Route::get('/login', function () {
    return view('login.index');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/booking', [ClientController::class, 'index'])->name('booking.index');
    Route::get('/setting', [UserController::class, 'edit'])->name('setting.edit');
    Route::put('/users/update', [UserController::class, 'update'])->name('users.update');
    Route::resource('clients', ClientController::class);
    
    
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::put('/clients/{client}/status', [ClientController::class, 'updateStatus'])->name('clients.updateStatus');
    Route::get('/agent', [UserController::class, 'index'])->name('agent');
    Route::get('/create-admin', [UserController::class, 'create'])->name('create-admin');
});
