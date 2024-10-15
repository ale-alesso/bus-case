<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('role:admin')->group(function () {
    // Роуты, доступные только админам
    Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index']);
});

Route::middleware('role:manager')->group(function () {
    // Роуты, доступные менеджерам
    Route::get('/manager', [\App\Http\Controllers\ManagerController::class, 'index']);
});

Route::middleware('role:driver')->group(function () {
    // Роуты, доступные водителям
    Route::get('/driver', [\App\Http\Controllers\DriverController::class, 'index']);
});
