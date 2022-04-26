<?php

use Illuminate\Support\Facades\Route;

// Controladores
use App\Http\Controllers\SociosController;

use App\Http\Livewire\Socios\Socios;
use App\Http\Livewire\Cuentas\Cuentas;
use App\Http\Livewire\VerCuenta;
// use App\Http\Livewire\Cuentas\Cuentas\VerCuenta;

// Route::resource('/socios', SociosController::class)->names('socios');

Route::get('/socios', Socios::class)->name('socios');

Route::get('/cuentas', Cuentas::class)->name('cuentas');

Route::get('/cuentas/ver-cuenta/{cuenta}', VerCuenta::class)->name('ver.cuenta');
