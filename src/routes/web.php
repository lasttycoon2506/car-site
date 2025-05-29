<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, "index"]);
Route::get('/show', [IndexController::class, "show"]);

Route::resource("car", CarController::class)->only(["index", "show", "create"]);
