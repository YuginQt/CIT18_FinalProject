<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;

// Redirect to the login page if the user isn't authenticated
Route::get('/', function () {
    return view('welcome'); // You can create a custom welcome view
});

// Auth routes (Login, Register, Logout)
Auth::routes();

// Protected Routes for authenticated users
Route::middleware(['auth'])->group(function () {
    // Dashboard route for doctors (after login)
    Route::get('/dashboard', function () {
        return view('dashboard'); // Create a dashboard view where doctors can manage patients
    });

    // Patient Routes (CRUD Operations)
    Route::resource('patients', PatientController::class);
    
    // If you want a custom logout route, you can add:
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
