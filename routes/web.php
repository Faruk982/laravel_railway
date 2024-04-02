<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ForgetController;
Route::get('/', function () {
    return view('layout.login');
});
Route::get('/registration',[RegistrationController::class,'index'])->name('Registration.index');
Route::get('/registration/create',[RegistrationController::class,'create'])->name('Registration.create');
Route::post('/registration',[RegistrationController::class,'store'])->name('Registration.store');
Route::get('/n',[RegistrationController::class,'update'])->name('Registration.index1');
Route::get('/Forget',[ForgetController::class,'index'])->name('Forget.index');
