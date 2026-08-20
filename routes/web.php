<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SpecificationController;

Route::get('/login',[AuthController::class , 'index'])->name('login');
Route::post('/login',[AuthController::class , 'store'])->name('store');

Route::get('/article' ,[ArticleController::class , 'create'])->name('create');

Route::get('/specification', [SpecificationController::class , 'index'])->name('specifacition');
Route::post('/specification',[SpecificationController::class , 'store'])->name('spe_store');
Route::post('/article', [ArticleController::class , 'store'])->name('article.store');