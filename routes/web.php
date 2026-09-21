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

// Rutas de Módulos (Crear y Listar)
Route::match(['get', 'post'], '/usuario', [UsuarioController::class, 'index'])->name('usuario');
Route::match(['get', 'post'], '/tratamiento', [TratamientoController::class, 'index'])->name('tratamiento');
Route::match(['get', 'post'], '/medicamentos', [MedicamentoController::class, 'index'])->name('medicamentos');
Route::match(['get', 'post'], '/recordatorios', [RecordatorioController::class, 'index'])->name('recordatorios');
Route::match(['get', 'post'], '/seguimiento', [SeguimientoController::class, 'index'])->name('seguimiento');

// ==========================================
// NUEVAS RUTAS: EDITAR Y ELIMINAR (CRUD)
// ==========================================

// --- MEDICAMENTOS ---
Route::get('/medicamentos/{id}/editar', [MedicamentoController::class, 'edit'])->name('medicamentos.edit');
Route::put('/medicamentos/{id}', [MedicamentoController::class, 'update'])->name('medicamentos.update');
Route::delete('/medicamentos/{id}', [MedicamentoController::class, 'destroy'])->name('medicamentos.destroy');

// --- TRATAMIENTOS ---
Route::get('/tratamiento/{id}/editar', [TratamientoController::class, 'edit'])->name('tratamiento.edit');
Route::put('/tratamiento/{id}', [TratamientoController::class, 'update'])->name('tratamiento.update');
Route::delete('/tratamiento/{id}', [TratamientoController::class, 'destroy'])->name('tratamiento.destroy');

// --- RECORDATORIOS ---
Route::get('/recordatorios/{id}/editar', [RecordatorioController::class, 'edit'])->name('recordatorios.edit');
Route::put('/recordatorios/{id}', [RecordatorioController::class, 'update'])->name('recordatorios.update');
Route::delete('/recordatorios/{id}', [RecordatorioController::class, 'destroy'])->name('recordatorios.destroy');

// Otras páginas generales
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/farmacias', function () {
    return view('farmacias');
})->name('farmacias');