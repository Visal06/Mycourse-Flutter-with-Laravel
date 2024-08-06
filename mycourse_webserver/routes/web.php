<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StaffController;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/staff/index', [App\Http\Controllers\StaffController::class, 'index'])->name('staff.index');
Route::get('/staff/create', [App\Http\Controllers\StaffController::class, 'create'])->name('staff.create');
Route::post('/staff/store', [App\Http\Controllers\StaffController::class, 'store'])->name('staff.store');
Route::get('/staff/edit/{id}', [App\Http\Controllers\StaffController::class, 'edit'])->name('staff.edit');
Route::put('/staff/update/{id}', [App\Http\Controllers\StaffController::class, 'update'])->name('staff.update');
Route::delete('/staff/delete/{id}', [App\Http\Controllers\StaffController::class, 'destroy'])->name('staff.destroy');
Route::get('/staff/show', [App\Http\Controllers\StaffController::class, 'show'])->name('staff.show');


// Route::get('/category/index', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
// Route::get('/category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
// Route::post('/category/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
// Route::get('/category/edit/{category}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
// Route::put('/category/update/{category}', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
// Route::delete('/category/delete/{category}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.destroy');
// Route::get('/category/show/{category}', [App\Http\Controllers\CategoryController::class, 'show'])->name('category.show');

Route::get('/post/index', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
Route::get('/post/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::post('/post/store', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::get('/post/edit/{post}', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
Route::put('/post/update/{post}', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
Route::delete('/post/delete/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');
Route::get('/post/show/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');

Route::get('/slice/index', [App\Http\Controllers\SliceController::class, 'index'])->name('slice.index');
Route::get('/slice/create', [App\Http\Controllers\SliceController::class, 'create'])->name('slice.create');
Route::post('/slice/store', [App\Http\Controllers\SliceController::class, 'store'])->name('slice.store');
Route::get('/slice/edit/{slice}', [App\Http\Controllers\SliceController::class, 'edit'])->name('slice.edit');
Route::put('/slice/update/{slice}', [App\Http\Controllers\SliceController::class, 'update'])->name('slice.update');
Route::delete('/slice/delete/{slice}', [App\Http\Controllers\SliceController::class, 'destroy'])->name('slice.destroy');
Route::get('/slice/show/{slice}', [App\Http\Controllers\SliceController::class, 'show'])->name('slice.show');

Route::controller(CategoryController::class)->prefix('category')->group(function ($category) {
    Route::get('/', 'index')->name('category.index');
    Route::get('/create', 'create')->name('category.create');
    Route::post('/store', 'store')->name('category.store');
    Route::get('/edit/{category}', 'edit')->name('category.edit');
    Route::put('/update/{category}', 'update')->name('category.update');
    Route::delete('/delete/{category}', 'destroy')->name('category.destroy');
    Route::get('/show/{category}', 'show')->name('category.show');
});