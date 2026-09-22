@extends('layouts.app')

@section('title', 'Editar Medicamento - Remember Me')

@section('content')
    <div class="formulario">
        <h2>✏️ Editar Medicamento</h2>

        <form action="{{ route('medicamentos.update', $medicamento->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <label>Nombre medicamento</label>
            <input type="text" name="nombre" value="{{ $medicamento->nombre }}" required>

            <label>Dosis</label>
            <input type="text" name="dosis" value="{{ $medicamento->dosis }}" required>

            <label>Frecuencia</label>
            <select name="frecuencia">
                <option {{ $medicamento->frecuencia == 'Cada 8 horas' ? 'selected' : '' }}>Cada 8 horas</option>
                <option {{ $medicamento->frecuencia == 'Cada 12 horas' ? 'selected' : '' }}>Cada 12 horas</option>
                <option {{ $medicamento->frecuencia == 'Una vez al día' ? 'selected' : '' }}>Una vez al día</option>
            </select>

            <label>Cantidad</label>
            <input type="number" name="cantidad" value="{{ $medicamento->cantidad }}" required>

            <label>Observaciones</label>
            <textarea name="observaciones">{{ $medicamento->observaciones }}</textarea>

            <button type="submit" class="btn" style="margin-top: 15px;">Actualizar Medicamento</button>
            <a href="{{ route('medicamentos') }}" style="display: inline-block; margin-top: 10px; color: #64748b; text-decoration: none;">Cancelar</a>
        </form>
    </div>
@endsection