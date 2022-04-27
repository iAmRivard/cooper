<?php

use Illuminate\Support\Facades\Route;

//Controladores

use App\Http\Controllers\PDFController;

use App\Http\Livewire\Socios\Socios;
use App\Http\Livewire\Cuentas\Cuentas;
use App\Http\Livewire\VerCuenta;
use App\Http\Livewire\PDF\Abono;


Route::get('/socios', Socios::class)->name('socios');

Route::get('/cuentas', Cuentas::class)->name('cuentas');

Route::get('/cuentas/ver-cuenta/{cuenta}', VerCuenta::class)->name('ver.cuenta');

//PDF
Route::get('/cuentas/abono/{abono}', [PDFController::class, 'abono'])->name('cuenta.abono');


