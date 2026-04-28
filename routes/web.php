<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // admin
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::get('/edituser', function () {
            return view('admin.edituser');
        })->name('admin.edituser');

        Route::get('/platforms', function () {
            return view('admin.platforms');
        })->name('admin.platforms');

        Route::get('/themes', function () {
            return view('admin.themes');
        })->name('admin.themes');




    });

    // admin + sales
    Route::middleware('role:admin,sales')->group(function () {
        Route::get('/sales', function () {
            return view('sales.index');
        })->name('sales.index');

        Route::get('/create', function () {
            return view('sales.create');
        })->name('sales.create');

        Route::get('/update', function () {
            return view('sales.update');
        })->name('sales.update');

        Route::get('/deleted', function () {
            return view('sales.deleted');
        })->name('sales.deleted');

        Route::get('/archived', function () {
            return view('sales.archived');
        })->name('sales.archived');
    });
});
require __DIR__.'/auth.php';
