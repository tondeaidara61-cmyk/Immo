<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SpecificationController;
use Illuminate\Support\Facades\Route;

// --- Authentification (accessible sans être connecté) ---
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('store');
Route::post('/déconnexion' , [AuthController::class , 'logout'])->name('logout');

// --- Routes protégées : accessibles uniquement si connecté ---
Route::middleware('auth')->group(function () {

    // Articles
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/articles/{article}/modifie', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{article}/modifie', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');

    // Specifications
    Route::get('/specifications', [SpecificationController::class, 'index'])->name('specifications.index');
    Route::get('/specification', [SpecificationController::class, 'create'])->name('specifications.create');
    Route::post('/specifications', [SpecificationController::class, 'store'])->name('specifications.store');
    Route::get('/specifications/{specification}/edit', [SpecificationController::class, 'edit'])->name('specifications.edit');
    Route::put('/specifications/{specification}', [SpecificationController::class, 'update'])->name('specifications.update');
    Route::delete('/specifications/{specification}', [SpecificationController::class, 'destroy'])->name('specifications.destroy');

});