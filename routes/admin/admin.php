<?php

use Illuminate\Support\Facades\Route;

//Controladores

use App\Http\Controllers\PDFController;
Use App\Http\Controllers\SociosController;

use App\Http\Livewire\Cuentas\Cuentas;
use App\Http\Livewire\Socios\Socios;
use App\Http\Livewire\VerCuenta;


Route::get('/socios', Socios::class)->name('socios');

Route::get('/socio/{socio}', [SociosController::class, 'show'])->name('ver.socio');

Route::get('/cuentas', Cuentas::class)->name('cuentas');

Route::get('/cuentas/ver-cuenta/{cuenta}', VerCuenta::class)->name('ver.cuenta');

Route::get('/', function () {
    return view('movimientos.movimientos');
})->name('movimientos');

//PDF
Route::get('/cuentas/abono/{abono}', [PDFController::class, 'abono'])->name('cuenta.abono');

Route::get('/cuentas/retiro/{retiro}', [PDFController::class, 'retiro'])->name('cuenta.retiro');

Route::get('/cuentas/cuenta/{cuenta}', [PDFController::class, 'cuenta'])->name('cuenta.cuenta');

Route::get('/cuentas/re-impresion/{id}', [PDFController::class, 'reImpresion'])->name('cuenta.re.impresion');


