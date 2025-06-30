<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AcceptOfferController;
use Illuminate\Support\Facades\Route;


Route::resource("cars", CarController::class)
    ->only("index", "show");

Route::get("login", [AuthController::class, "create"])->name("login");
Route::post("login", [AuthController::class, "store"])->name("login.store");
Route::delete("logout", [AuthController::class, "destroy"])->name("logout");

Route::resource("user", UserController::class)->only(["create", "store"]);

Route::resource("car.offer", OfferController::class)->middleware("auth")->only(["store"]);

Route::prefix("seller")->name("seller.")->middleware("auth")->group(function () {
    Route::resource("/cars", SellerController::class);
    Route::name("offer.accept")->put("/offer/{offer}/accept", AcceptOfferController::class);
    Route::resource("car.image", ImageUploadController::class)->only("create", "store", "destroy");
});
