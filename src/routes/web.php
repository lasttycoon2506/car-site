<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;


Route::resource("car", CarController::class)
    ->only("create", "store", "edit", "update", "destroy")
    ->middleware("auth");
Route::resource("car", CarController::class)
    ->except("create", "store", "edit", "update", "destroy");

Route::get("login", [AuthController::class, "create"])->name("login");
Route::post("login", [AuthController::class, "store"])->name("login.store");
Route::delete("logout", [AuthController::class, "destroy"])->name("logout");
