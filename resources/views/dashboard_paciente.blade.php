@extends('layouts.app')

@section('title', 'Dashboard | Remember Me')

@section('content')
    <header>
        <h1>Bienvenido, Usuario 👋</h1>
        <p>Gestiona tus tratamientos de forma sencilla y segura.</p>
    </header>

    <!-- TARJETAS -->
    <section class="cards">
        <div class="card">
            <h3><i class="fa-solid fa-capsules" style="color: #0d9488;"></i> Medicamentos</h3>
            <p style="font-size: 1.8rem; font-weight: bold; margin-top: 10px;">5</p>
        </div>

        <div class="card">
            <h3><i class="fa-solid fa-clock" style="color: #d97706;"></i> Próxima Dosis</h3>
            <p style="font-size: 1.8rem; font-weight: bold; margin-top: 10px;">08:00 PM</p>
        </div>

        <div class="card">
            <h3><i class="fa-solid fa-calendar-days" style="color: #4f46e5;"></i> Tratamientos</h3>
            <p style="font-size: 1.8rem; font-weight: bold; margin-top: 10px;">3</p>
        </div>
    </section>

    <!-- TABLA -->
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
                <tr style="border-bottom: 1px solid #f1f5f9;">
                    <td style="padding: 12px;">Paracetamol</td>
                    <td style="padding: 12px;">08:00 PM</td>
                    <td style="padding: 12px;"><span class="pendiente">Pendiente</span></td>
                </tr>
                <tr style="border-bottom: 1px solid #f1f5f9;">
                    <td style="padding: 12px;">Ibuprofeno</td>
                    <td style="padding: 12px;">10:00 PM</td>
                    <td style="padding: 12px;"><span class="pendiente">Pendiente</span></td>
                </tr>
                <tr>
                    <td style="padding: 12px;">Vitamina C</td>
                    <td style="padding: 12px;">07:00 AM</td>
                    <td style="padding: 12px;"><span class="completado">Tomado</span></td>
                </tr>
            </tbody>
        </table>
    </section>
@endsection