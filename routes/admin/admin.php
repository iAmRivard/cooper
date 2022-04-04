<?php

use Illuminate\Support\Facades\Route;

// Controladores
use App\Http\Controllers\SociosController;

Route::resource('/socios', SociosController::class)->names('socios');
