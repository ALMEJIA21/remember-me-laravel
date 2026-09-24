@extends('layouts.landing')

@section('content')
<div class="container py-5">
    <div class="row align-items-center justify-content-center text-center my-5">
        <div class="col-lg-8">
            <span class="badge rounded-pill px-3 py-2 mb-3" style="background-color: #ccfbf1; color: #0f766e; font-weight: 600;">
                <i class="fas fa-shield-heart me-1"></i> Sistema de Gestión y Salud SENA
            </span>
            <h1 class="display-4 fw-bold mb-4" style="color: #0f172a;">Tu tratamiento médico bajo control</h1>
            <p class="lead text-muted mb-5">
                Remember Me es una aplicación diseñada para ayudar a pacientes y cuidadores a gestionar medicamentos, recordatorios y tratamientos de forma sencilla, segura y organizada.
            </p>
            
            <!-- Botones de Acceso y Registro -->
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-lg px-4 py-3 text-white shadow-sm" style="background-color: #0d9488;">
                            <i class="fas fa-home me-2"></i> Ir al Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-lg px-4 py-3 shadow-sm" style="background-color: #f1f5f9; color: #334155; border: 1px solid #cbd5e1;">
                            <i class="fas fa-right-to-bracket me-2"></i> Ya tengo cuenta
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-lg px-4 py-3 text-white shadow-sm" style="background-color: #0d9488;">
                                <i class="fas fa-user-plus me-2"></i> Crear cuenta gratis
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </div>

    <div class="row mt-5 pt-4">
        <div class="col-12 text-center mb-4">
            <h3 class="fw-bold" style="color: #0f172a;">Funciones Principales</h3>
            <p class="text-muted">Todo lo que necesitas para cuidar tu salud en un solo lugar</p>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100 p-4 border-0 shadow-sm text-center">
                <div class="card-body">
                    <div class="mb-3" style="font-size: 2.5rem; color: #0d9488;">
                        <i class="fas fa-capsules"></i>
                    </div>
                    <h5 class="fw-bold mb-3" style="color: #0f172a;">Medicamentos</h5>
                    <p class="text-muted small">Administra dosis, horarios y tipos de medicamentos de manera eficiente.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100 p-4 border-0 shadow-sm text-center">
                <div class="card-body">
                    <div class="mb-3" style="font-size: 2.5rem; color: #0d9488;">
                        <i class="fas fa-bell"></i>
                    </div>
                    <h5 class="fw-bold mb-3" style="color: #0f172a;">Recordatorios</h5>
                    <p class="text-muted small">Configura alarmas y notificaciones automáticas para nunca pasar por alto una dosis.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100 p-4 border-0 shadow-sm text-center">
                <div class="card-body">
                    <div class="mb-3" style="font-size: 2.5rem; color: #0d9488;">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h5 class="fw-bold mb-3" style="color: #0f172a;">Seguimiento</h5>
                    <p class="text-muted small">Consulta historiales y evalúa el cumplimiento de tus tratamientos médicos.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection