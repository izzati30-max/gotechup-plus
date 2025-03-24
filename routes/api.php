<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('api')->controller(AuthController::class)->group(function () {
    Route::post('login', 'login')->name('api.auth.login');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('dashboard', 'index')->name('api.dashboard.index');
    Route::get('admin', 'admin')->name('api.dashboard.admin');
    Route::get('account', 'account')->name('api.dashboard.account');
    Route::get('app', 'app')->name('api.dashboard.app');
});

