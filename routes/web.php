<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IAController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\RecordatorioController;
use App\Http\Controllers\TratamientoController;
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('welcome');
})->name('inicio');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');

    Route::get('/registro', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/registro', [AuthController::class, 'register'])->name('register.store');
    
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/cuidador/pacientes', [DashboardController::class, 'index'])->name('cuidador.pacientes');
    Route::post('/cuidador/pacientes', [DashboardController::class, 'storePaciente'])->name('cuidador.pacientes.store');
    Route::delete('/cuidador/pacientes/{id}', [DashboardController::class, 'destroyPaciente'])->name('cuidador.pacientes.destroy');

    Route::get('/admin/usuarios', [DashboardController::class, 'index'])->name('admin.usuarios');

    Route::match(['get', 'post'], '/usuario', [UsuarioController::class, 'index'])->name('usuario');
    Route::match(['get', 'post'], '/tratamiento', [TratamientoController::class, 'index'])->name('tratamiento');
    
// --- MEDICAMENTOS ---
    Route::get('/medicamentos', [MedicamentoController::class, 'index'])->name('medicamentos');
    Route::post('/medicamentos/guardar', [MedicamentoController::class, 'store'])->name('medicamentos.store');
    // --- VERIFICADOR DE INTERACCIONES CON IA ---
    Route::post('/analizar-interaccion', [IAController::class, 'analizarInteraccion']);

    Route::match(['get', 'post'], '/recordatorios', [RecordatorioController::class, 'index'])->name('recordatorios');
    Route::match(['get', 'post'], '/seguimiento', [SeguimientoController::class, 'index'])->name('seguimiento');

    // --- MEDICAMENTOS (Edición y borrado) ---
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

    Route::get('/farmacias', function () {
        return view('farmacias');
    })->name('farmacias');
});