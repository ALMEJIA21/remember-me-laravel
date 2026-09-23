@extends('layouts.app')

@section('title', 'Editar Recordatorio - Remember Me')

@section('content')
    <div class="formulario">
        <h2>✏️ Editar Recordatorio</h2>

        <form action="{{ route('recordatorios.update', $recordatorio->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <label>Medicamento</label>
            <input type="text" name="medicamento" value="{{ $recordatorio->medicamento }}" required>

            <label>Hora del recordatorio</label>
            <input type="time" name="hora" value="{{ $recordatorio->hora }}" required>

            <label>Días</label>
            <select name="dias">
                <option {{ $recordatorio->dias == 'Todos los días' ? 'selected' : '' }}>Todos los días</option>
                <option {{ $recordatorio->dias == 'Lunes a viernes' ? 'selected' : '' }}>Lunes a viernes</option>
                <option {{ $recordatorio->dias == 'Personalizado' ? 'selected' : '' }}>Personalizado</option>
            </select>

            <div class="notificacion" style="display: flex; align-items: center; gap: 10px; margin: 15px 0;">
                <input type="checkbox" id="activar" name="notificacion" {{ $recordatorio->notificacion == 'Sí' ? 'checked' : '' }} style="width: 18px; height: 18px;">
                <label for="activar" style="margin-bottom: 0; cursor: pointer;">Activar notificaciones</label>
            </div>

            <button type="submit" class="btn" style="margin-top: 15px;">Actualizar Recordatorio</button>
            <a href="{{ route('recordatorios') }}" style="display: inline-block; margin-top: 10px; color: #64748b; text-decoration: none;">Cancelar</a>
        </form>
    </div>
@endsection