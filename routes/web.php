<?php

use Illuminate\Support\Facades\URL;

/* 
Route::get('/dashboard', function () { return view('dashboard'); })->middleware(['auth'])->name('dashboard');
require __DIR__ . '/auth.php';
*/

use Spatie\Sitemap\SitemapGenerator;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('generate-sitemap', function () {
    SitemapGenerator::create(URL::to('/'))
    ->writeToFile(public_path('sitemap.xml'));
});

Route::get('dashboard', function () { return redirect()->route('post.index'); })->name('dashboard');

// Login/Logout Routes
Route::get('login', function () { return view('website.layouts.login'); })->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout')->middleware(['auth']);

// Resource Routes
Route::resource('media', MediaController::class)->except(['show','create'])->middleware(['auth']);
Route::resource('post', PostController::class)->except(['show','destroy'])->middleware(['auth']);

// Dynamic Route
Route::get('{post:slug?}', [PostController::class, 'show'])->name('post.show');


