<?php

use App\Http\Controllers\ContaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MovimentacaoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [UserController::class, 'login'])->name('user.login');
Route::post('/login', [UserController::class, 'formLogin'])->name('user.formLogin');
Route::get('/register', [UserController::class, 'create'])->name('user.create');
Route::post('', [UserController::class, 'store'])->name('user.store');
Route::get('/denied', [UserController::class, 'accessDenied'])->name('login');

Route::prefix('meucontrole')->middleware('auth')->group(function () {
    Route::get('logout', [UserController::class, 'logout'])->name('user.logout');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('user.dashboard');

    Route::prefix('conta')->controller(ContaController::class)->group(function () {
        Route::get('', 'index')->name('conta.index');
        Route::get('create', 'create')->name('conta.create');
        Route::get('edit/{conta}', 'edit')->name('conta.edit');
        Route::get('delete', 'delete')->name('conta.delete');
        Route::post('store', 'store')->name('conta.store');
        Route::put('update/{conta}', 'update')->name('conta.update');
    });

    Route::prefix('movimentacoes')->controller(MovimentacaoController::class)->group(function () {
        Route::get('', 'index')->name('movimentacoes.index');
        Route::get('create', 'create')->name('movimentacoes.create');
        Route::get('edit/{movimentacao}', 'edit')->name('movimentacoes.edit');
        Route::get('detalhes/{movimentacao}', 'detalhes')->name('movimentacoes.detalhes');
        Route::get('recorrentes', 'pagamentosRecorrentes')->name('movimentacoes.recorrentes');
        Route::post('store', 'store')->name('movimentacoes.store');
        Route::put('update/{movimentacao}', 'update')->name('movimentacoes.update');
    });
});

