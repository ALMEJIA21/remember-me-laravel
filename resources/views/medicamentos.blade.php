@extends('layouts.app')

@section('title', 'Medicamentos - Remember Me')

@section('content')
    <!-- Formulario de Registro de Medicamentos -->
    <div class="formulario">
        <h2>💊 Registrar Medicamento</h2>

        <form method="POST" action="{{ url('/medicamentos/guardar') }}">
            @csrf
            
            <label>Nombre medicamento</label>
            <input type="text" name="nombre" placeholder="Ej: Acetaminofén" required>

            <label>Dosis</label>
            <input type="text" name="dosis" placeholder="Ej: 500 mg" required>

            <label>Frecuencia</label>
            <select name="frecuencia">
                <option>Cada 8 horas</option>
                <option>Cada 12 horas</option>
                <option>Una vez al día</option>
            </select>

            <label>Cantidad</label>
            <input type="number" name="cantidad" placeholder="Cantidad" required>

            <label>Observaciones</label>
            <textarea name="observaciones" placeholder="Notas importantes"></textarea>

            <button type="submit" class="btn">Registrar</button>
        </form>

        @if(session('success'))
            <div style="margin-top: 15px; padding: 10px; background-color: #ecfdf5; color: #065f46; border-radius: 5px;">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <!-- Lista de Medicamentos Guardados -->
    <div class="formulario" style="margin-top: 30px;">
        <h2>📋 Lista de Medicamentos</h2>
        <table style="width: 100%; border-collapse: collapse; margin-top: 15px;">
            <thead>
                <tr style="background-color: #f1f5f9; text-align: left;">
                    <th style="padding: 10px;">Nombre</th>
                    <th style="padding: 10px;">Dosis</th>
                    <th style="padding: 10px;">Frecuencia</th>
                    <th style="padding: 10px;">Cantidad</th>
                    <th style="padding: 10px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($medicamentos) && count($medicamentos) > 0)
                    @foreach($medicamentos as $medicamento)
                        <tr style="border-bottom: 1px solid #e2e8f0;">
                            <td style="padding: 10px;">{{ $medicamento->nombre }}</td>
                            <td style="padding: 10px;">{{ $medicamento->dosis }}</td>
                            <td style="padding: 10px;">{{ $medicamento->frecuencia }}</td>
                            <td style="padding: 10px;">{{ $medicamento->cantidad }}</td>
                            <td style="padding: 10px; display: flex; gap: 8px;">
                                <a href="{{ route('medicamentos.edit', $medicamento->id) }}" style="background: #f59e0b; color: white; padding: 5px 10px; border-radius: 4px; text-decoration: none; font-size: 0.85rem;">Editar ✏️</a>
                                
                                <form action="{{ route('medicamentos.destroy', $medicamento->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este medicamento?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: #ef4444; color: white; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer; font-size: 0.85rem;">Eliminar 🗑️</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" style="padding: 15px; text-align: center; color: #64748b;">No hay medicamentos registrados todavía.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <!-- Módulo de Verificación de Interacciones con IA -->
    <div class="formulario" style="margin-top: 30px;">
        <h2><i class="fas fa-triangle-exclamation text-warning me-2"></i> Verificador de Interacciones con IA</h2>
        <p style="color: #64748b; font-size: 0.95rem; margin-bottom: 20px;">
            Escribe libremente los nombres de dos medicamentos para que la Inteligencia Artificial analice posibles contraindicaciones o riesgos.
        </p>

        <div style="display: flex; gap: 20px; flex-wrap: wrap;">
            <div style="flex: 1; min-width: 200px;">
                <label>Primer Medicamento</label>
                <input type="text" id="libMed1" placeholder="Ej: Acenocumarol...">
            </div>
            <div style="flex: 1; min-width: 200px;">
                <label>Segundo Medicamento</label>
                <input type="text" id="libMed2" placeholder="Ej: Ibuprofeno...">
            </div>
        </div>

        <button type="button" onclick="verificarInteraccionConIA()" id="btnValidarIA" class="btn" style="margin-top: 15px;">Validar con IA 🤖</button>
        <div id="resultadoAlertaLibre" style="display: none; margin-top: 20px; padding: 15px; border-radius: 8px; font-size: 0.95rem; line-height: 1.5;"></div>
    </div>

    <script>
        function verificarInteraccionConIA() {
            let m1 = document.getElementById('libMed1').value.trim();
            let m2 = document.getElementById('libMed2').value.trim();
            let contenedor = document.getElementById('resultadoAlertaLibre');
            let boton = document.getElementById('btnValidarIA');

            if (!m1 || !m2) {
                contenedor.style.display = 'block';
                contenedor.style.backgroundColor = '#fef3c7';
                contenedor.style.color = '#92400e';
                contenedor.style.border = '1px solid #fcd34d';
                contenedor.innerHTML = `<i class="fas fa-exclamation-triangle me-2"></i> Por favor escribe los nombres de ambos medicamentos.`;
                return;
            }

            contenedor.style.display = 'block';
            contenedor.style.backgroundColor = '#f1f5f9';
            contenedor.style.color = '#475569';
            contenedor.style.border = '1px solid #cbd5e1';
            contenedor.innerHTML = `<i class="fas fa-spinner fa-spin me-2"></i> Analizando interacción con Inteligencia Artificial...`;
            boton.disabled = true;

            // Petición al IAController que ya tienes creado en Laravel
            fetch('/analizar-interaccion', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    medicinas: [m1, m2]
                })
            })
            .then(response => response.json())
            .then(data => {
                boton.disabled = false;
                if (data.estado === 'peligro') {
                    contenedor.style.backgroundColor = '#fef2f2';
                    contenedor.style.color = '#991b1b';
                    contenedor.style.border = '1px solid #fca5a5';
                    contenedor.innerHTML = `<i class="fas fa-ban me-2"></i><strong>¡ALERTA DE RIESGO (IA)!</strong> ${data.mensaje}`;
                } else if (data.estado === 'seguro') {
                    contenedor.style.backgroundColor = '#ecfdf5';
                    contenedor.style.color = '#065f46';
                    contenedor.style.border = '1px solid #a7f3d0';
                    contenedor.innerHTML = `<i class="fas fa-check-circle me-2"></i><strong>Combinación Segura (IA):</strong> ${data.mensaje}`;
                } else {
                    contenedor.style.backgroundColor = '#fef3c7';
                    contenedor.style.color = '#92400e';
                    contenedor.style.border = '1px solid #fcd34d';
                    contenedor.innerHTML = `<i class="fas fa-exclamation-triangle me-2"></i> ${data.mensaje}`;
                }
            })
            .catch(error => {
                boton.disabled = false;
                contenedor.style.backgroundColor = '#fef2f2';
                contenedor.style.color = '#991b1b';
                contenedor.style.border = '1px solid #fca5a5';
                contenedor.innerHTML = `<i class="fas fa-exclamation-circle me-2"></i> Error al conectar con el servicio de IA.`;
                console.error('Error:', error);
            });
        }
    </script>
@endsection