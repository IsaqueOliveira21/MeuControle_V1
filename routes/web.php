<?php

use App\Http\Controllers\ContaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [UserController::class, 'login'])->name('user.login');
Route::post('/login', [UserController::class, 'formLogin'])->name('user.formLogin');
Route::get('/register', [UserController::class, 'create'])->name('user.create');
Route::post('', [UserController::class, 'store'])->name('user.store');
Route::get('/denied', [UserController::class, 'accessDenied'])->name('login');

Route::prefix('meucontrole')->middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('user.dashboard');

    Route::prefix('conta')->controller(ContaController::class)->group(function () {
        Route::get('', 'index')->name('conta.index');
        Route::get('create', 'create')->name('conta.create');
        Route::post('store', 'store')->name('conta.store');
    });
});

