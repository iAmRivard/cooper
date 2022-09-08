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

Route::get('/config/edit-cuentas', App\Http\Livewire\Mantenimientos\TiposCuentas::class)
    ->name('mantenimiento.tipo-cuenta');

// Ruta para creditos
Route::get('/creditos', App\Http\Livewire\Creditos\Index::class)->name('creditos');

//Ruta para ver el credito
Route::get('/creditos/ver-credito/{credito}', App\Http\Livewire\VerCredito::class)->name('ver.credito');

// Mantenimiento general de creditos
Route::get('/config/edit-creditos', App\Http\Livewire\Mantenimientos\TiposCreditos::class)
    ->name('mantenimiento.tipo-credito');

Route::get('/config/edit-creditos-tipo-abono', App\Http\Livewire\Mantenimientos\TiposAbonoCreditos::class)
    ->name('mantenimiento.tipo-abono-credito');

Route::get('/config/edit-cuentas-tipos', App\Http\Livewire\Mantenimientos\TiposAbono::class)
    ->name('mantenimiento.tipo-abono-cuenta');

//PDF
Route::get('/cuentas/abono/{abono}', [PDFController::class, 'abono'])
    ->name('cuenta.abono');

Route::get('/cuentas/retiro/{retiro}', [PDFController::class, 'retiro'])
    ->name('cuenta.retiro');

Route::get('/cuentas/cuenta/{cuenta}', [PDFController::class, 'cuenta'])
    ->name('cuenta.cuenta');

Route::get('/cuentas/re-impresion/{id}', [PDFController::class, 'reImpresion'])
    ->name('cuenta.re.impresion');

Route::get('/cuentas/reporte-quincena/{socioId}', [PDFController::class, 'quincena'])
    ->name('reporte.quincenal');

