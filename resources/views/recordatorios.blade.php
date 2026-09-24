@extends('layouts.app')

@section('title', 'Recordatorios - Remember Me')

@section('content')
    <div class="formulario">
        <h2>⏰ Recordatorios</h2>

        <form method="POST" action="{{ route('recordatorios') }}">
            @csrf
            <label>Medicamento</label>
            <input type="text" name="medicamento" placeholder="Nombre medicamento" required>

            <label>Hora del recordatorio</label>
            <input type="time" name="hora" required>

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

        @if(session('success'))
            <div style="margin-top: 15px; padding: 10px; background-color: #ecfdf5; color: #065f46; border-radius: 5px;">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <!-- Script de verificación automática en tiempo real -->
    @if(isset($recordatorios) && count($recordatorios) > 0)
        <script>
            const listaRecordatorios = @json($recordatorios);

            function revisarReloj() {
                const ahora = new Date();
                const horas = String(ahora.getHours()).padStart(2, '0');
                const minutos = String(ahora.getMinutes()).padStart(2, '0');
                const horaActual = `${horas}:${minutos}`;

                listaRecordatorios.forEach(rec => {
                    if (!rec.hora || rec.notificacion !== 'Sí') return;
                    const horaRec = rec.hora.substring(0, 5);

                    if (horaRec === horaActual) {
                        const idUnico = `alerta_${rec.id}_${horaActual}`;
                        if (!sessionStorage.getItem(idUnico)) {
                            sessionStorage.setItem(idUnico, 'true');
                            Swal.fire({
                                icon: 'info',
                                title: '¡Es hora de tu medicamento!',
                                text: `Debes tomar: ${rec.medicamento} (Programado para las ${horaRec})`,
                                confirmButtonColor: '#0d9488',
                                allowOutsideClick: false,
                                footer: 'Remember Me - Alerta en Vivo'
                            });
                        }
                    }
                });
            }

            setInterval(revisarReloj, 5000);
        </script>
    @endif

    <!-- Lista de Recordatorios Guardados -->
    <div class="formulario" style="margin-top: 30px;">
        <h2>📋 Lista de Recordatorios</h2>
        <table style="width: 100%; border-collapse: collapse; margin-top: 15px;">
            <thead>
                <tr style="background-color: #f1f5f9; text-align: left;">
                    <th style="padding: 10px;">Medicamento</th>
                    <th style="padding: 10px;">Hora</th>
                    <th style="padding: 10px;">Días</th>
                    <th style="padding: 10px;">Notificación</th>
                    <th style="padding: 10px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($recordatorios) && count($recordatorios) > 0)
                    @foreach($recordatorios as $recordatorio)
                    <tr style="border-bottom: 1px solid #e2e8f0;">
                        <td style="padding: 10px;">{{ $recordatorio->medicamento }}</td>
                        <td style="padding: 10px;">{{ $recordatorio->hora }}</td>
                        <td style="padding: 10px;">{{ $recordatorio->dias }}</td>
                        <td style="padding: 10px;">{{ $recordatorio->notificacion }}</td>
                        <td style="padding: 10px; display: flex; gap: 8px;">
                            <a href="{{ route('recordatorios.edit', $recordatorio->id) }}" style="background: #f59e0b; color: white; padding: 5px 10px; border-radius: 4px; text-decoration: none; font-size: 0.85rem;">Editar ✏️</a>
                            
                            <form action="{{ route('recordatorios.destroy', $recordatorio->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este recordatorio?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: #ef4444; color: white; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer; font-size: 0.85rem;">Eliminar 🗑️</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" style="padding: 15px; text-align: center; color: #64748b;">No hay recordatorios registrados todavía.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection