<?php

use App\Http\Controllers\Admin\MealController;
use App\Http\Controllers\Admin\TrainController;
use App\Http\Controllers\Client\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::redirect('/', '/dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(Admin::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('/', function () {
            return Inertia::render('Admin/Dashboard');
        })->name('dashboard');

        Route::resource('trains', TrainController::class);
        Route::resource('meals', MealController::class);
    });

    Route::prefix('client')->name('client.')->group(function () {
        // Route::get('/', function () {
        //     return Inertia::render('Admin/Dashboard');
        // })->name('dashboard');

        Route::get('/progress', [DashboardController::class, 'progress'])->name('progress');
        Route::get('/trains', [DashboardController::class, 'trains'])->name('trains');
        Route::get('/meals', [DashboardController::class, 'meals'])->name('meals');
        Route::post('/trains/{trainId}/save', [DashboardController::class, 'saveTrain'])->name('trains.save');
    });

});

require __DIR__.'/auth.php';
