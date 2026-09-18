@extends('layouts.app')

@section('title', 'Recordatorios - Remember Me')

@section('content')
    <div class="formulario">
        <h2>⏰ Recordatorios</h2>

        <form method="POST">
            @csrf
            <label>Medicamento</label>
            <input type="text" name="medicamento" placeholder="Nombre medicamento">

            <label>Hora del recordatorio</label>
            <input type="time" name="hora">

            <label>Días</label>
            <select name="dias">
                <option>Todos los días</option>
                <option>Lunes a viernes</option>
                <option>Personalizado</option>
            </select>

            <div class="notificacion" style="display: flex; align-items: center; gap: 10px; margin: 15px 0;">
                <input type="checkbox" id="activar" name="notificacion" style="width: 18px; height: 18px;">
                <label for="activar" style="margin-bottom: 0; cursor: pointer;">Activar notificaciones</label>
            </div>

            <button type="submit" class="btn">Registrar</button>
        </form>

        @if(request()->isMethod('post'))
            <hr style="margin: 20px 0; border: 0; border-top: 1px solid #e2e8f0;">
            <h3 style="color: #0f766e; margin-bottom: 8px;">Recordatorio registrado</h3>
            <p><strong>Medicamento:</strong> {{ request('medicamento') }}</p>
            <p><strong>Hora:</strong> {{ request('hora') }}</p>
            <p><strong>Días:</strong> {{ request('dias') }}</p>
            <p><strong>Notificaciones:</strong> {{ request('notificacion') ? 'Sí' : 'No' }}</p>
        @endif
    </div>
@endsection