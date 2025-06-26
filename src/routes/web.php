<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\UserCarsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::resource("cars", CarController::class)
    ->only("index", "show");

Route::get("login", [AuthController::class, "create"])->name("login");
Route::post("login", [AuthController::class, "store"])->name("login.store");
Route::delete("logout", [AuthController::class, "destroy"])->name("logout");

Route::resource("user", UserController::class)->only(["create", "store"]);

Route::prefix("seller")->name("seller.")->middleware("auth")->group(function () {
    Route::resource("/cars", UserCarsController::class)->only("index", "create", "store", "edit", "update", "destroy");
    Route::resource("car.image", ImageUploadController::class)->only("create", "store", "destroy");
});
