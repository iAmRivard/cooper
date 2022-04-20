<?php

use Illuminate\Support\Facades\Route;

// Controladores
use App\Http\Controllers\SociosController;
use App\Http\Livewire\Socios\Socios;

// Route::resource('/socios', SociosController::class)->names('socios');

Route::get('/socios', Socios::class)->name('socios');
