@extends('layouts.app')

@section('title', 'Tratamientos - Remember Me')

@section('content')
    <div class="formulario">
        <h2>💊 Registrar Tratamiento</h2>

        <form method="POST">
            @csrf
            <label>Nombre del tratamiento</label>
            <input type="text" name="nombre" placeholder="Ej: Tratamiento presión">

            <label>Descripción</label>
            <textarea name="descripcion" placeholder="Descripción del tratamiento"></textarea>

            <label>Fecha inicio</label>
            <input type="date" name="fechaInicio">

            <label>Fecha final</label>
            <input type="date" name="fechaFinal">

            <label>Estado</label>
            <select name="estado">
                <option>Activo</option>
                <option>Finalizado</option>
                <option>Pendiente</option>
            </select>

            <button type="submit" class="btn">Registrar</button>
        </form>

        @if(request()->isMethod('post'))
            <hr style="margin: 20px 0; border: 0; border-top: 1px solid #e2e8f0;">
            <h3 style="color: #0f766e; margin-bottom: 8px;">Tratamiento registrado</h3>
            <p><strong>Nombre:</strong> {{ request('nombre') }}</p>
            <p><strong>Descripción:</strong> {{ request('descripcion') }}</p>
            <p><strong>Fecha de inicio:</strong> {{ request('fechaInicio') }}</p>
            <p><strong>Fecha final:</strong> {{ request('fechaFinal') }}</p>
            <p><strong>Estado:</strong> {{ request('estado') }}</p>
        @endif
    </div>
@endsection