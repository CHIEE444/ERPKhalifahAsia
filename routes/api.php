<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::get('/getUsersReferralCodes', [UserController::class, 'getUsersReferralCodes'])->name('users.referralCodes');
Route::post('/booking', [ClientController::class, 'store'])->name('booking.store');