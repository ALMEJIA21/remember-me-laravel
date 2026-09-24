@extends('layouts.app')

@section('title', 'Panel Administrador | Remember Me')

@section('content')
    <header>
        <h1>Panel de Administrador 🛡️</h1>
        <p>Visión general de las cuentas y la actividad del sistema.</p>
    </header>

    <!-- TARJETAS -->
    <section class="cards">
        <div class="card">
            <h3><i class="fa-solid fa-users" style="color: #0d9488;"></i> Cuentas totales</h3>
            <p style="font-size: 1.8rem; font-weight: bold; margin-top: 10px;">{{ $stats['total_cuentas'] }}</p>
        </div>

        <div class="card">
            <h3><i class="fa-solid fa-user" style="color: #4f46e5;"></i> Pacientes</h3>
            <p style="font-size: 1.8rem; font-weight: bold; margin-top: 10px;">{{ $stats['pacientes'] }}</p>
        </div>

        <div class="card">
            <h3><i class="fa-solid fa-hand-holding-heart" style="color: #d97706;"></i> Cuidadores</h3>
            <p style="font-size: 1.8rem; font-weight: bold; margin-top: 10px;">{{ $stats['cuidadores'] }}</p>
        </div>

        <div class="card">
            <h3><i class="fa-solid fa-user-shield" style="color: #dc2626;"></i> Administradores</h3>
            <p style="font-size: 1.8rem; font-weight: bold; margin-top: 10px;">{{ $stats['administradores'] }}</p>
        </div>
    </section>

    <section class="cards" style="margin-top: 20px;">
        <div class="card">
            <h3><i class="fa-solid fa-capsules" style="color: #0d9488;"></i> Medicamentos</h3>
            <p style="font-size: 1.8rem; font-weight: bold; margin-top: 10px;">{{ $stats['medicamentos'] }}</p>
        </div>
        <div class="card">
            <h3><i class="fa-solid fa-notes-medical" style="color: #4f46e5;"></i> Tratamientos</h3>
            <p style="font-size: 1.8rem; font-weight: bold; margin-top: 10px;">{{ $stats['tratamientos'] }}</p>
        </div>
        <div class="card">
            <h3><i class="fa-solid fa-bell" style="color: #d97706;"></i> Recordatorios</h3>
            <p style="font-size: 1.8rem; font-weight: bold; margin-top: 10px;">{{ $stats['recordatorios'] }}</p>
        </div>
    </section>

    <!-- TABLA DE USUARIOS -->
    <section class="table-section" style="margin-top: 30px; padding: 20px;">
        <h2>Cuentas registradas</h2>

        <table style="width: 100%; margin-top: 15px; border-collapse: collapse;">
            <thead>
                <tr style="text-align: left;">
                    <th style="padding: 12px;">Nombre</th>
                    <th style="padding: 12px;">Correo</th>
                    <th style="padding: 12px;">Rol</th>
                    <th style="padding: 12px;">Registrado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr style="border-bottom: 1px solid #f1f5f9;">
                        <td style="padding: 12px;">{{ $usuario->name }}</td>
                        <td style="padding: 12px;">{{ $usuario->email }}</td>
                        <td style="padding: 12px;">
                            @php
                                $colores = [
                                    'administrador' => ['#fee2e2', '#dc2626'],
                                    'cuidador' => ['#fef3c7', '#d97706'],
                                    'paciente' => ['#e0e7ff', '#4f46e5'],
                                ];
                                [$bg, $text] = $colores[$usuario->role] ?? ['#f1f5f9', '#475569'];
                            @endphp
                            <span style="background:{{ $bg }}; color:{{ $text }}; padding:4px 10px; border-radius:20px; font-size:0.85rem; font-weight:600;">
                                {{ ucfirst($usuario->role) }}
                            </span>
                        </td>
                        <td style="padding: 12px;">{{ $usuario->created_at->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
