<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DriverApplicationController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('role:admin')->group(function () {
    Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index']);
});

Route::middleware('role:manager')->group(function () {
    Route::get('/manager', [\App\Http\Controllers\ManagerController::class, 'index']);
});

Route::middleware('role:driver')->group(function () {
    Route::get('/driver', [\App\Http\Controllers\DriverController::class, 'index']);
});

Route::middleware(['auth', 'can:admin'])->group(function () {
    Route::get('/admin/settings', [SettingsController::class, 'index'])->name('admin.settings.index');
    Route::post('/admin/settings', [SettingsController::class, 'update'])->name('admin.settings.update');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

Route::get('become-driver', [DriverApplicationController::class, 'showForm'])->name('become.driver');
Route::post('become-driver', [DriverApplicationController::class, 'submitForm'])->name('become.driver.submit');
