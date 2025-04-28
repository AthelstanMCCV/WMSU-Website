<?php

use App\Http\Controllers\Page_Sections;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [Page_Sections::class, 'showHomepage'])->name('homepage');
Route::get('/research-news', [Page_Sections::class, 'showResearchNews'])->name('research.news');
Route::get('/updates', [Page_Sections::class, 'showUpdates'])->name('updates');

Route::get('/ResExt-Home', [Page_Sections::class, 'showResExtHome']);
Route::get('/ResExt-Home/Activities', [Page_Sections::class, 'showResExtActivities']);
Route::get('/dashboard', fn() => view('admin.admin-dashboard'));
Route::get('/dashboard/homepage', [Page_Sections::class, 'showHomepageData'])->name('admin.homepage');
Route::get('/dashboard/Research&Extension', [Page_Sections::class, 'showResearchExtensionData'])->name('admin.res&ext');
Route::get('/dashboard/updates-page', [Page_Sections::class, 'showUpdatesData'])->name('admin.updates');

Route::get('/login', fn() => view('auth/login'));
Route::get('/register', fn() => view('auth/sign-in'));

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::post('/addNewsSection', [Page_Sections::class, 'addNewsSection']);
Route::post('/addArticlesSection', [Page_Sections::class, 'addArticlesSection'])->name('updates-articles.add');

// Existing section routes
Route::get('/sections/{id}/edit', [Page_Sections::class, 'edit'])->name('sections.edit');
Route::post('/sections/{id}/update', [Page_Sections::class, 'update'])->name('sections.update');

// New: News Group routes
Route::get('/news-group/{alt}/edit', [Page_Sections::class, 'editNewsGroup'])->name('editNewsGroup');
Route::delete('/news-group/{alt}', [Page_Sections::class, 'deleteNewsGroup'])->name('deleteNewsGroup');
Route::post('/news-group/{alt}/update', [Page_Sections::class, 'updateNewsGroup'])->name('updateNewsGroup');

// Updates Articles routes
Route::post('/admin/updates-articles/update/{alt}', [Page_Sections::class, 'updateUpdateArticle'])->name('updates-articles.update');
Route::delete('/admin/updates-articles/delete/{alt}', [Page_Sections::class, 'deleteUpdateArticleGroup'])->name('updates-articles.delete');
Route::delete('/admin/updates-articles/delete-image/{id}', [Page_Sections::class, 'deleteArticleImage'])->name('updates-articles.delete-image');

Route::post('/addSection', [Page_Sections::class, 'addAboutSection']);

Route::get('/search-json', [Page_Sections::class, 'searchJson'])->name('site.search.json');