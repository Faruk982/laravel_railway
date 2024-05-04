<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ForgetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HistoryController;
Route::get('/', function () {
    return view('layout.login');
});
Route::get('/registration',[RegistrationController::class,'index'])->name('Registration.index');
Route::get('/registration/create',[RegistrationController::class,'create'])->name('Registration.create');
Route::post('/registration',[RegistrationController::class,'store'])->name('Registration.store');
Route::get('/n',[RegistrationController::class,'update'])->name('Registration.index1');
Route::get('/Forget',[ForgetController::class,'index'])->name('Forget.index');
Route::post('/login', [AuthController::class, 'login'])->name('login.check');
Route::get('/Home', [AuthController::class, 'index'])->name('Home.index');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.index');
Route::get('/home', function () {
    return view('layout.home');
})->middleware('auth')->name('home.index');
Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.index');
// routes/web.php
Route::get('/search', [SearchController::class, 'index'])->name('search.index');
Route::post('/search', [SearchController::class, 'searchTrains'])->name('search.process');
Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
Route::post('/booking', [BookingController::class, 'process'])->name('booking.process');
Route::post('/booking1', [BookingController::class, 'sec_process'])->name('booking.second');
Route::post('/booking2', [BookingController::class, 'third_process'])->name('booking.third');
Route::get('/history',[HistoryController::class, 'index'])->name('history.index');
