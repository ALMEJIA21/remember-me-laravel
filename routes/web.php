<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\RecordatorioController;
use App\Http\Controllers\TratamientoController;
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\UsuarioController;

// Página de bienvenida / Inicio público
Route::get('/', function () {
    return view('welcome'); 
})->name('inicio');

// Panel principal (Dashboard)
Route::get('/dashboard', function () {
    return view('dashboard'); 
})->name('dashboard');

// Rutas permitiendo GET y POST para procesar los formularios de cada módulo
Route::match(['get', 'post'], '/usuario', [UsuarioController::class, 'index'])->name('usuario');
Route::match(['get', 'post'], '/tratamiento', [TratamientoController::class, 'index'])->name('tratamiento');
Route::match(['get', 'post'], '/medicamentos', [MedicamentoController::class, 'index'])->name('medicamentos');
Route::match(['get', 'post'], '/recordatorios', [RecordatorioController::class, 'index'])->name('recordatorios');
Route::match(['get', 'post'], '/seguimiento', [SeguimientoController::class, 'index'])->name('seguimiento');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/farmacias', function () {
    return view('farmacias');
})->name('farmacias');