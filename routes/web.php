<?php

use App\Http\Controllers\Page_Sections;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [Page_Sections::class, 'showHomepage']);

Route::get('/dashboard', function () {
    return view('admin-dashboard');
});

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/register', function () {
    return view('auth/sign-in');
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/addSection', [Page_Sections::class, 'AddSection']);