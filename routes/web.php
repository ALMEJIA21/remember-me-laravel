<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\RecordatorioController;
use App\Http\Controllers\TratamientoController;
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\UsuarioController;

// Página de bienvenida / Inicio público
Route::get('/', function () {
    return view('welcome');
})->name('inicio');

// ==========================================
// AUTENTICACIÓN
// ==========================================

// Solo visitantes no autenticados pueden ver/enviar el login y el registro
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');

    Route::get('/registro', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/registro', [AuthController::class, 'register'])->name('register.store');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// ==========================================
// RUTAS PROTEGIDAS (requieren sesión iniciada)
// ==========================================
Route::middleware('auth')->group(function () {
    // Panel principal (Dashboard) — varía según el rol del usuario
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // --- CUIDADOR: gestión de sus pacientes ---
    Route::get('/cuidador/pacientes', [DashboardController::class, 'index'])->name('cuidador.pacientes');
    Route::post('/cuidador/pacientes', [DashboardController::class, 'storePaciente'])->name('cuidador.pacientes.store');
    Route::delete('/cuidador/pacientes/{id}', [DashboardController::class, 'destroyPaciente'])->name('cuidador.pacientes.destroy');

    // --- ADMINISTRADOR: panel general ---
    Route::get('/admin/usuarios', [DashboardController::class, 'index'])->name('admin.usuarios');

    // Rutas de Módulos (Crear y Listar)
    Route::match(['get', 'post'], '/usuario', [UsuarioController::class, 'index'])->name('usuario');
    Route::match(['get', 'post'], '/tratamiento', [TratamientoController::class, 'index'])->name('tratamiento');
    Route::match(['get', 'post'], '/medicamentos', [MedicamentoController::class, 'index'])->name('medicamentos');
    Route::match(['get', 'post'], '/recordatorios', [RecordatorioController::class, 'index'])->name('recordatorios');
    Route::match(['get', 'post'], '/seguimiento', [SeguimientoController::class, 'index'])->name('seguimiento');

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
    Route::get('/farmacias', function () {
        return view('farmacias');
    })->name('farmacias');
});
