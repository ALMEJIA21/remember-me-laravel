@extends('layouts.app')

@section('title', 'Usuario - Remember Me')

@section('content')
    <div class="formulario">
        <h2>👤 Información del Usuario</h2>

        <form method="POST">
            @csrf
            <label>Nombre completo</label>
            <input type="text" name="nombre" placeholder="Ingrese nombre">

            <label>Correo electrónico</label>
            <input type="email" name="correo" placeholder="correo@gmail.com">

            <label>Teléfono</label>
            <input type="number" name="telefono" placeholder="Número">

            <label>Fecha nacimiento</label>
            <input type="date" name="fechaNacimiento">

            <label>Tipo de usuario</label>
            <select name="tipoUsuario">
                <option>Paciente</option>
                <option>Cuidador</option>
                <option>Familiar</option>
            </select>

            <button type="submit" class="btn">Registrar</button>
        </form>

        @if(request()->isMethod('post'))
            <hr style="margin: 20px 0; border: 0; border-top: 1px solid #e2e8f0;">
            <h3 style="color: #0f766e; margin-bottom: 8px;">Usuario registrado</h3>
            <p><strong>Nombre:</strong> {{ request('nombre') }}</p>
            <p><strong>Correo:</strong> {{ request('correo') }}</p>
            <p><strong>Teléfono:</strong> {{ request('telefono') }}</p>
            <p><strong>Fecha de nacimiento:</strong> {{ request('fechaNacimiento') }}</p>
            <p><strong>Tipo de usuario:</strong> {{ request('tipoUsuario') }}</p>
        @endif
    </div>
@endsection