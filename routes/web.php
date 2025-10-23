<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

// Redirect authenticated users to dashboard
Route::get('/', function () {
    return auth()->check() ? redirect()->route('dashboard') : redirect('/login');
});

// Dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// Group routes that require authentication
Route::middleware(['auth'])->group(function () {

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Stock upload and top performers
    Route::get('/upload', function() {
        return view('upload'); // upload.blade.php
    })->name('upload');

    Route::post('/upload', [StockController::class, 'upload'])->name('upload.submit');

    Route::get('/top-performers', [StockController::class, 'topPerformers'])->name('top.performers');
});

require __DIR__.'/auth.php';
 