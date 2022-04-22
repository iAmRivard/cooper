<?php

use Illuminate\Support\Facades\Route;

// Controladores
use App\Http\Controllers\SociosController;

use App\Http\Livewire\Socios\Socios;
use App\Http\Livewire\Cuentas\Cuentas;

// Route::resource('/socios', SociosController::class)->names('socios');

Route::get('/socios', Socios::class)->name('socios');

Route::get('/cuentas', Cuentas::class)->name('cuentas');
