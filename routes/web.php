<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

Route::get('/login',[CustomAuthController::class,'login']);
Route::get('/',[CustomAuthController::class,'registration']);
Route::post('/register-user',[CustomAuthController::class,'registerUser'])->name('register-user');
Route::post('/login-user',[CustomAuthController::class,'loginUser'])->name('login-user');
Route::get('/dashboard',[CustomAuthController::class,'dashboard']);
Route::get('/logout', [CustomAuthController::class, 'logout']);
Route::get('/edit', [CustomAuthController::class, 'edit']);
Route::put('/update-user',[CustomAuthController::class, 'updateUser'])->name('update-user');
Route::get('/signup', [CustomAuthController::class, 'signup']);

