<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AppController;
use App\Http\Controllers\Api\AuthController;

Route::prefix('app')->group(function() {
    Route::get('index', [AppController::class,'index']);
    Route::get('product/categories/{id}', [AppController::class,'getProductByCategory']);
    Route::get('product', [AppController::class,'getProduct']);
    Route::get("product/detail/{id}",[AppController::class,"getProductDetail"]);
    Route::post("payment",[AppController::class,"payment"]);
    Route::get("payment",[AppController::class,"getpayment"]);

});
// middleware(['auth:sanctum'])->
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


