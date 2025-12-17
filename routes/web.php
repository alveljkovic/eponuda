<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;

Route::get('/', [HomeController::class, 'show'])->name('home.show');
Route::get('/{category:slug}', [CategoryController::class, 'show'])->name('category.show');
