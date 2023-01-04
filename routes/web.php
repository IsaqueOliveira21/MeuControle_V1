<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [UserController::class, 'login'])->name('user.login');
Route::post('/login', [UserController::class, 'formLogin'])->name('user.formLogin');
Route::get('/denied', [UserController::class, 'accessDenied'])->name('login');

Route::prefix('meucontrole')->middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
});

