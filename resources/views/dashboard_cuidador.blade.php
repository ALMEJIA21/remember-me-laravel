@extends('layouts.app')

@section('title', 'Mis Pacientes | Remember Me')

@section('content')
    <header>
        <h1>Panel de Cuidador 🤝</h1>
        <p>Registra y supervisa a los pacientes que tienes a tu cargo.</p>
    </header>

    @if(session('success'))
        <div style="background:#d1fae5; color:#059669; padding:12px 16px; border-radius:8px; margin:20px 0; font-weight:600;">
            {{ session('success') }}
        </div>
    @endif

    <!-- TARJETA RESUMEN -->
    <section class="cards">
        <div class="card">
            <h3><i class="fa-solid fa-people-group" style="color: #0d9488;"></i> Pacientes a mi cargo</h3>
            <p style="font-size: 1.8rem; font-weight: bold; margin-top: 10px;">{{ $pacientes->count() }}</p>
        </div>
    </section>

    <!-- FORMULARIO NUEVO PACIENTE -->
    <section class="table-section" style="margin-top: 30px; padding: 20px;">
        <h2>Agregar nuevo paciente</h2>

        <form action="{{ route('cuidador.pacientes.store') }}" method="POST" style="margin-top: 15px;">
            @csrf
            <div style="display:flex; gap:15px; flex-wrap:wrap;">
                <input type="text" name="nombre" placeholder="Nombre completo" required style="flex:1; min-width:200px; padding:10px; border-radius:8px; border:1px solid #e2e8f0;">
                <input type="email" name="correo" placeholder="Correo del paciente" required style="flex:1; min-width:200px; padding:10px; border-radius:8px; border:1px solid #e2e8f0;">
            </div>
            <div style="display:flex; gap:15px; flex-wrap:wrap; margin-top:12px;">
                <input type="text" name="telefono" placeholder="Teléfono" required style="flex:1; min-width:150px; padding:10px; border-radius:8px; border:1px solid #e2e8f0;">
                <input type="date" name="fechaNacimiento" required style="flex:1; min-width:150px; padding:10px; border-radius:8px; border:1px solid #e2e8f0;">
            </div>
            <button type="submit" style="margin-top:15px; background:#0d9488; color:white; border:none; padding:10px 24px; border-radius:8px; font-weight:600; cursor:pointer;">
                <i class="fa-solid fa-user-plus"></i> Agregar paciente
            </button>
        </form>
    </section>

    <!-- TABLA DE PACIENTES -->
    <section class="table-section" style="margin-top: 30px; padding: 20px;">
        <h2>Mis pacientes registrados</h2>

        <table style="width: 100%; margin-top: 15px; border-collapse: collapse;">
            <thead>
                <tr style="text-align: left;">
                    <th style="padding: 12px;">Nombre</th>
                    <th style="padding: 12px;">Correo</th>
                    <th style="padding: 12px;">Teléfono</th>
                    <th style="padding: 12px;">Fecha de nacimiento</th>
                    <th style="padding: 12px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pacientes as $paciente)
                    <tr style="border-bottom: 1px solid #f1f5f9;">
                        <td style="padding: 12px;">{{ $paciente->nombre }}</td>
                        <td style="padding: 12px;">{{ $paciente->correo }}</td>
                        <td style="padding: 12px;">{{ $paciente->telefono }}</td>
                        <td style="padding: 12px;">{{ \Carbon\Carbon::parse($paciente->fechaNacimiento)->format('d/m/Y') }}</td>
                        <td style="padding: 12px;">
                            <form action="{{ route('cuidador.pacientes.destroy', $paciente->id) }}" method="POST" onsubmit="return confirm('¿Eliminar este paciente?');" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background:none; border:none; color:#dc2626; cursor:pointer;">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="padding: 20px; text-align:center; color:#94a3b8;">Aún no tienes pacientes registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>
@endsection
