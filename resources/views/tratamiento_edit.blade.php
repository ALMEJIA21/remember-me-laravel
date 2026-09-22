@extends('layouts.app')

@section('title', 'Editar Tratamiento - Remember Me')

@section('content')
    <div class="formulario">
        <h2>✏️ Editar Tratamiento</h2>

        <form action="{{ route('tratamiento.update', $tratamiento->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <label>Nombre del tratamiento</label>
            <input type="text" name="nombre" value="{{ $tratamiento->nombre }}" required>

            <label>Descripción</label>
            <textarea name="descripcion">{{ $tratamiento->descripcion }}</textarea>

            <label>Fecha inicio</label>
            <input type="date" name="fechaInicio" value="{{ $tratamiento->fechaInicio }}" required>

            <label>Fecha final</label>
            <input type="date" name="fechaFinal" value="{{ $tratamiento->fechaFinal }}" required>

            <label>Estado</label>
            <select name="estado">
                <option {{ $tratamiento->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                <option {{ $tratamiento->estado == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
                <option {{ $tratamiento->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
            </select>

            <button type="submit" class="btn" style="margin-top: 15px;">Actualizar Tratamiento</button>
            <a href="{{ route('tratamiento') }}" style="display: inline-block; margin-top: 10px; color: #64748b; text-decoration: none;">Cancelar</a>
        </form>
    </div>
@endsection