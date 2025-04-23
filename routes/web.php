<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
});

Route::get('/dashboard', function () {
    return view('admin-dashboard');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/MyWmsu', function () {
    return view('sign-in');
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);