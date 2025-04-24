<?php

use App\Http\Controllers\Page_Sections;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [Page_Sections::class, 'showHomepage']);
Route::get('/dashboard', function(){
    return view('admin.admin-dashboard');
});
Route::get('/dashboard/homepage', [Page_Sections::class, 'showHomepageData'])->name('admin.homepage');
Route::get('/dashboard/Research&Extension', [Page_Sections::class, 'showResearchExtensionData'])->name('admin.res&ext');

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/register', function () {
    return view('auth/sign-in');
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/addSection', [Page_Sections::class, 'AddSection']);
Route::post('/addNewsSection', [Page_Sections::class, 'addNewsSection']);
Route::get('/sections/{id}/edit', [Page_Sections::class, 'edit'])->name('sections.edit');
Route::post('/sections/{id}/update', [Page_Sections::class, 'update'])->name('sections.update');