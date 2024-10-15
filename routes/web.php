<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Auth\LoginController;

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

Route::middleware(['auth', 'can:admin'])->group(function () {
    Route::get('/admin/settings', [SettingsController::class, 'index'])->name('admin.settings.index');
    Route::post('/admin/settings', [SettingsController::class, 'update'])->name('admin.settings.update');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
