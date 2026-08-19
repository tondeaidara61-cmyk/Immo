<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/login',[AuthController::class , 'index'])->name('login');
Route::post('/login',[AuthController::class , 'store'])->name('store');

Route::get('/article' ,[ArticleController::class , 'index'])->name('article');