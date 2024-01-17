<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// Login routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Registration routes
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Logout route
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard route with auth middleware
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'index'])->name('dashboard');
    Route::get('/users/edit/{user}', [AuthController::class, 'edit'])->name('users.edit');
    Route::put('/users/update/{user}', [AuthController::class, 'update'])->name('users.update');
    Route::delete('/users/delete/{user}', [AuthController::class, 'destroy'])->name('users.delete');

});

Route::get('/add-product', [ProductController::class, 'addProduct'])->name('addProduct');
Route::post('/add-product', [ProductController::class, 'submitProduct'])->name('submitProduct');
Route::get('/shop', [ProductController::class, 'index'])->name('shop.index');
Route::get('/forgot-password', [ResetPasswordController::class, 'forgetPassword'])->name('password.request');
Route::post('/forgot-password', [ResetPasswordController::class, 'forgetPasswordToken'])->name('password.updated');
Route::get('/reset/{token}', [ResetPasswordController::class, 'reset'])->name('reset');
Route::post('/reset/{token}', [ResetPasswordController::class, 'reset_password'])->name('reset.password');


