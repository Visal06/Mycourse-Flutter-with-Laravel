<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
