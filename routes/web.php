<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/students', function () {
        return Inertia::render('Student/Index');
    })->name('student');

    Route::get('/schedule', function () {
        return Inertia::render('Schedule/Index');
    })->name('schedule');

    Route::get('/assignments', function () {
        return Inertia::render('Assignments/Index');
    })->name('assignments');

    Route::get('/reports', function () {
        return Inertia::render('Reports/Index');
    })->name('reports');

    Route::get('/settings', function () {
        return Inertia::render('Setting/Index');
    })->name('setting');

});
