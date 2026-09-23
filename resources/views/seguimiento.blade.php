@extends('layouts.app')

@section('title', 'Seguimiento - Remember Me')

@section('content')
    <div class="formulario">
        <h2>📊 Seguimiento del Tratamiento</h2>

        <form method="POST">
            @csrf
            <label>Medicamento</label>
            <input type="text" name="medicamento" placeholder="Medicamento">

            <label>Fecha</label>
            <input type="date" name="fecha">

            <label>Estado de dosis</label>
            <select name="estado">
                <option>Tomada</option>
                <option>Pendiente</option>
                <option>No tomada</option>
            </select>

            <label>Comentario</label>
            <textarea name="comentario" placeholder="Observaciones"></textarea>

            <button type="submit" class="btn">Registrar</button>
        </form>

        @if(request()->isMethod('post'))
            <hr style="margin: 20px 0; border: 0; border-top: 1px solid #e2e8f0;">
            <h3 style="color: #0f766e; margin-bottom: 8px;">Seguimiento registrado</h3>
            <p><strong>Medicamento:</strong> {{ request('medicamento') }}</p>
            <p><strong>Fecha:</strong> {{ request('fecha') }}</p>
            <p><strong>Estado:</strong> {{ request('estado') }}</p>
            <p><strong>Comentario:</strong> {{ request('comentario') }}</p>
        @endif
    </div>
@endsection