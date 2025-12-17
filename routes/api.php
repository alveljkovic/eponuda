<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiCategoryController;

Route::group(['prefix' => 'v1'], function () {
    Route::get('/categories', [ApiCategoryController::class, 'index']);
});
