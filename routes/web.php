<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // Import Auth Facade
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\UserController; // Import the UserController

/*
|--------------------------------------------------------------------------|
| Web Routes                                                                |
|--------------------------------------------------------------------------|
*/

Route::get('/', function () {
    return view('welcome');
});

// In routes/web.php
// Use the default logout route
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Authentication routes (register, login, etc.)
Auth::routes();

// Route for the user's home dashboard (default)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin routes (with "admin" prefix)
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('index');  // Admin dashboard

    // Resource routes for managing rooms and bookings
    Route::resource('rooms', RoomController::class);
    Route::resource('bookings', BookingController::class);

    // User management routes (UserController for CRUD)
    Route::resource('users', UserController::class);
});

// Staff routes (with "staff" prefix)
Route::middleware(['auth', 'role:staff'])->prefix('staff')->name('staff.')->group(function () {
    Route::get('/', function () {
        return view('staff.index');
    })->name('index');  // Staff dashboard

    // Resource routes for managing bookings
    Route::resource('bookings', BookingController::class)->only(['index', 'show']);
});

// Student routes (with "student" prefix)
Route::middleware(['auth', 'role:student'])->prefix('student')->name('student.')->group(function () {
    Route::get('/', function () {
        return view('student.index');
    })->name('index');  // Student dashboard

    Route::get('/rooms', [App\Http\Controllers\User\UserController::class, 'rooms'])->name('rooms'); // Add name to rooms route
});
