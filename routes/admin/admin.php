<?php

use Illuminate\Support\Facades\Route;

//Controladores

use App\Http\Controllers\PDFController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\SociosController;
use App\Http\Controllers\CuentasController;
use App\Http\Controllers\FixCreditoController;
use App\Http\Controllers\ReporteInteresPlazosController;
use App\Http\Livewire\Cuentas\Cuentas;
use App\Http\Livewire\Socios\Socios;

Route::middleware(['auth', 'rol'])->group(function () {

    Route::prefix('socios')->group(function () {
        Route::get('/', Socios::class)->name('socios');
        Route::get('/{socio}', [SociosController::class, 'show'])->name('ver.socio');
    });

    Route::prefix('cuentas')->group(function () {
        Route::get('/', Cuentas::class)->name('cuentas');
        Route::get('/ver-cuenta/{cuenta}', [CuentasController::class, 'verCuenta'])->name('ver.cuenta');
        Route::post('/cange-state/{cuenta}', [CuentasController::class, 'changeState'])->name('cuenta.change-state');
        Route::post('/update-number/{cuenta}', [CuentasController::class, 'changeNumber'])->name('cuenta.update-number');
        Route::post('/update-discount/{cuenta}', [CuentasController::class, 'updateDiscount'])->name('cuenta.update-discount');
    });

    // Route::get('/cuentas/ver-cuenta/{cuenta}', VerCuenta::class)->name('ver.cuenta');

    // Ruta para creditos
    Route::get('/creditos', App\Http\Livewire\Creditos\Index::class)->name('creditos');

    Route::get('/fix-credito/{credito}', [FixCreditoController::class, 'fix'])->name('fix-credito');

    //Ruta para ver el credito
    Route::get('/creditos/ver-credito/{credito}', App\Http\Livewire\VerCredito::class)->name('ver.credito');

    Route::prefix('config')->group(function () {
        Route::get('/edit-cuentas', App\Http\Livewire\Mantenimientos\TiposCuentas::class)->name('mantenimiento.tipo-cuenta');
        // Mantenimiento general de creditos
        Route::get('/edit-creditos', App\Http\Livewire\Mantenimientos\TiposCreditos::class)->name('mantenimiento.tipo-credito');
        Route::get('/edit-creditos-tipo-abono', App\Http\Livewire\Mantenimientos\TiposAbonoCreditos::class)->name('mantenimiento.tipo-abono-credito');
        Route::get('/edit-cuentas-tipos', App\Http\Livewire\Mantenimientos\TiposAbono::class)->name('mantenimiento.tipo-abono-cuenta');
    });

    //Mantenimiento de empresas
    Route::get('/empresas', App\Http\Livewire\Mantenimientos\Empresas::class)->name('empresas');
    //PDF
    Route::get('/cuentas/abono/{abono}', [PDFController::class, 'abono'])
        ->name('cuenta.abono');

    Route::get('/cuentas/retiro/{retiro}', [PDFController::class, 'retiro'])
        ->name('cuenta.retiro');

    //Abono a credito
    Route::get('/credito/abono/{abonoCred}', [PDFController::class, 'abonoCredito'])
        ->name('credito.abono');

    Route::get('/cuentas/cuenta/{cuenta}', [PDFController::class, 'cuenta'])
        ->name('cuenta.cuenta');

    Route::get('/cuentas/re-impresion/{id}', [PDFController::class, 'reImpresion'])
        ->name('cuenta.re.impresion');

    Route::get('/cuentas/reporte-quincena/{socioId}', [PDFController::class, 'quincena'])
        ->name('reporte.quincenal');

    Route::get('/reportes', [ExportController::class, 'getExport'])->name('reportes');
    Route::get('/reportes/interes-plazo', [ReporteInteresPlazosController::class, 'index'])->name('rpt.interes.plazo');


    Route::prefix('reporte')->group(function () {
        Route::get('/cierre-cuentas', App\Http\Livewire\Reporte\CierreCuentas::class)->name('reporte.cierre-cuentas');
        Route::get('/cobro-cuotas-quincenames', [ExportController::class, 'cobroCuotasQuincenal'])->name('reporte.cobro-cuotas');
        Route::get('/cobro-cuotas-quincenames-consolidado', [ExportController::class, 'cobroCuotasQuincelanConsolidado'])->name('reporte.cobro-cuotas-consolidado');
        Route::get('/cobro-cuotas-quincenales-planilla', [ExportController::class, 'cobroCuotasQuincenalesPlanilla'])->name('reporte.cobro-cuotas-quincenales-planilla');
        Route::get('/cierre-cuentas-excel', [ExportController::class, 'cierreCuentas'])->name('reporte.cierre-cuentas-excel');

        Route::get('/movimientos-creditos', [PDFController::class, 'movimientosCreditos'])->name('reporte.movimientos-creditos-pdf');
        Route::get('/movimientos-cuentas', [PDFController::class, 'movimientosCuentas'])->name('reporte.movimientos-cuentas-pdf');
    });
});
