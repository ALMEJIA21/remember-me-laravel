@extends('layouts.app')

@section('title', 'Dashboard | Remember Me')

@section('content')
    <header>
        <h1>Bienvenido, Usuario 👋</h1>
        <p>Gestiona tus tratamientos de forma sencilla y segura con datos en tiempo real.</p>
    </header>

    <!-- TARJETAS DINÁMICAS -->
    <section class="cards">
        <div class="card">
            <h3><i class="fa-solid fa-capsules" style="color: #0d9488;"></i> Medicamentos</h3>
            <p style="font-size: 1.8rem; font-weight: bold; margin-top: 10px;">{{ $medicamentosCount ?? 0 }}</p>
        </div>

        <div class="card">
            <h3><i class="fa-solid fa-clock" style="color: #d97706;"></i> Próxima Dosis</h3>
            <p style="font-size: 1.8rem; font-weight: bold; margin-top: 10px;">{{ $proximaDosis ?? '--:--' }}</p>
        </div>

        <div class="card">
            <h3><i class="fa-solid fa-calendar-days" style="color: #4f46e5;"></i> Tratamientos</h3>
            <p style="font-size: 1.8rem; font-weight: bold; margin-top: 10px;">{{ $tratamientosCount ?? 0 }}</p>
        </div>
    </section>

    <!-- TABLA DE RECORDATORIOS REALES -->
    <section class="table-section" style="margin-top: 30px; padding: 20px;">
        <h2>Próximos Recordatorios</h2>

        <table style="width: 100%; margin-top: 15px; border-collapse: collapse;">
            <thead>
                <tr style="text-align: left;">
                    <th style="padding: 12px;">Medicamento</th>
                    <th style="padding: 12px;">Hora</th>
                    <th style="padding: 12px;">Estado</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($recordatorios) && count($recordatorios) > 0)
                    @foreach($recordatorios as $rec)
                    <tr style="border-bottom: 1px solid #f1f5f9;">
                        <td style="padding: 12px;">{{ $rec->medicamento }}</td>
                        <td style="padding: 12px;">{{ $rec->hora }}</td>
                        <td style="padding: 12px;">
                            @if($rec->notificacion == 'Sí')
                                <span class="pendiente" style="background: #fef3c7; color: #d97706; padding: 4px 10px; border-radius: 12px; font-size: 0.85rem;">Activa</span>
                            @else
                                <span class="completado" style="background: #f1f5f9; color: #64748b; padding: 4px 10px; border-radius: 12px; font-size: 0.85rem;">Inactiva</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3" style="padding: 20px; text-align: center; color: #64748b;">No hay recordatorios registrados todavía en la base de datos.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </section>
@endsection