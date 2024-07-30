<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\AttributeValueController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SlideController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("category",[CategoryController::class,"index"])->name("category.index");
Route::get("category/create",[CategoryController::class, "create"])->name("category.create");
Route::get("category/edit/{id}",[CategoryController::class,"edit"])->name("category.edit");
Route::post("category/store",[CategoryController::class,"store"])->name("category.store");
Route::put("category/update/{id}",[CategoryController::class,"update"])->name("category.update");
Route::get("category/delete/{id}",[CategoryController::class,"delete"])->name("category.delete");

Route::get("attribute",[AttributeController::class,"index"])->name("attribute.index");
Route::get("attribute/create",[AttributeController::class, "create"])->name("attribute.create");
Route::get("attribute/edit/{id}",[AttributeController::class,"edit"])->name("attribute.edit");
Route::post("attribute/store",[AttributeController::class,"store"])->name("attribute.store");
Route::put("attribute/update/{id}",[AttributeController::class,"update"])->name("attribute.update");
Route::get("attribute/delete/{id}",[AttributeController::class,"delete"])->name("attribute.delete");

Route::get("attributevalue",[AttributeValueController::class,"index"])->name("attributevalue.index");
Route::get("attributevalue/create",[AttributeValueController::class, "create"])->name("attributevalue.create");
Route::get("attributevalue/edit/{id}",[AttributeValueController::class,"edit"])->name("attributevalue.edit");
Route::post("attributevalue/store",[AttributeValueController::class,"store"])->name("attributevalue.store");
Route::put("attributevalue/update/{id}",[AttributeValueController::class,"update"])->name("attributevalue.update");
Route::get("attributevalue/delete/{id}",[AttributeValueController::class,"delete"])->name("attributevalue.delete");

Route::get("product",[ProductController::class,"index"])->name("product.index");
Route::get("product/create",[ProductController::class, "create"])->name("product.create");
Route::get("product/edit/{id}",[ProductController::class,"edit"])->name("product.edit");
Route::post("product/store",[ProductController::class,"store"])->name("product.store");
Route::put("product/update/{id}",[ProductController::class,"update"])->name("product.update");
Route::get("product/delete/{id}",[ProductController::class,"delete"])->name("product.delete");



Route::get("slide",[SlideController::class,"index"])->name("slide.index");
Route::get("slide/create",[SlideController::class, "create"])->name("slide.create");
Route::get("slide/edit/{id}",[SlideController::class,"edit"])->name("slide.edit");
Route::post("slide/store",[SlideController::class,"store"])->name("slide.store");
Route::put("slide/update/{id}",[SlideController::class,"update"])->name("slide.update");
Route::get("slide/delete/{id}",[SlideController::class,"delete"])->name("slide.delete");