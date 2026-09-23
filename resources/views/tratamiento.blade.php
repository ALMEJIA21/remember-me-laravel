@extends('layouts.app')

@section('title', 'Tratamientos - Remember Me')

@section('content')
    <div class="formulario">
        <h2>💊 Registrar Tratamiento</h2>

        <form method="POST">
            @csrf
            <label>Nombre del tratamiento</label>
            <input type="text" name="nombre" placeholder="Ej: Tratamiento presión" required>

            <label>Descripción</label>
            <textarea name="descripcion" placeholder="Descripción del tratamiento"></textarea>

            <label>Fecha inicio</label>
            <input type="date" name="fechaInicio" required>

            <label>Fecha final</label>
            <input type="date" name="fechaFinal" required>

            <label>Estado</label>
            <select name="estado">
                <option>Activo</option>
                <option>Finalizado</option>
                <option>Pendiente</option>
            </select>

            <button type="submit" class="btn">Registrar</button>
        </form>

        @if(session('success'))
            <div style="margin-top: 15px; padding: 10px; background-color: #ecfdf5; color: #065f46; border-radius: 5px;">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <!-- Lista de Tratamientos Guardados -->
    <div class="formulario" style="margin-top: 30px;">
        <h2>📋 Lista de Tratamientos</h2>
        <table style="width: 100%; border-collapse: collapse; margin-top: 15px;">
            <thead>
                <tr style="background-color: #f1f5f9; text-align: left;">
                    <th style="padding: 10px;">Nombre</th>
                    <th style="padding: 10px;">Inicio</th>
                    <th style="padding: 10px;">Final</th>
                    <th style="padding: 10px;">Estado</th>
                    <th style="padding: 10px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($tratamientos) && count($tratamientos) > 0)
                    @foreach($tratamientos as $tratamiento)
                    <tr style="border-bottom: 1px solid #e2e8f0;">
                        <td style="padding: 10px;">{{ $tratamiento->nombre }}</td>
                        <td style="padding: 10px;">{{ $tratamiento->fechaInicio }}</td>
                        <td style="padding: 10px;">{{ $tratamiento->fechaFinal }}</td>
                        <td style="padding: 10px;">{{ $tratamiento->estado }}</td>
                        <td style="padding: 10px; display: flex; gap: 8px;">
                            <a href="{{ route('tratamiento.edit', $tratamiento->id) }}" style="background: #f59e0b; color: white; padding: 5px 10px; border-radius: 4px; text-decoration: none; font-size: 0.85rem;">Editar ✏️</a>
                            
                            <form action="{{ route('tratamiento.destroy', $tratamiento->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este tratamiento?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: #ef4444; color: white; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer; font-size: 0.85rem;">Eliminar 🗑️</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" style="padding: 15px; text-align: center; color: #64748b;">No hay tratamientos registrados todavía.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection