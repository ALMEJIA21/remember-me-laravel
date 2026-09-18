@extends('layouts.app')

@section('content')
<div class="container-fluid py-4 px-4">
    <!-- Título de la Sección -->
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="fw-bold" style="color: #0f172a;">
                <i class="fas fa-map-marked-alt me-2" style="color: #0d9488;"></i> Farmacias Cercanas
            </h2>
            <p class="text-muted mb-0">Encuentra droguerías y puntos de dispensación de medicamentos cerca de tu ubicación en tiempo real.</p>
        </div>
    </div>

    <!-- Layout en Dos Columnas (Buscador y Mapa) -->
    <div class="row g-4">
        <!-- Columna Izquierda: Controles y Botón -->
        <div class="col-lg-4">
            <div class="card p-4 border-0 shadow-sm h-100">
                <h5 class="fw-bold mb-3" style="color: #0f172a;">
                    <i class="fas fa-location-crosshairs me-2" style="color: #0d9488;"></i> Buscar Cercanías
                </h5>
                <p class="text-muted small mb-4">Haz clic en el botón para buscar automáticamente farmacias, droguerías Cruz Verde, Farmatodo o Cafam en tu zona actual.</p>
                
                <button onclick="buscarFarmaciasCerca()" class="btn btn-primary w-100 py-3 text-white mb-4 shadow-sm">
                    <i class="fas fa-search-location me-2"></i> Buscar Farmacias en el Mapa
                </button>
                
                <div class="alert border-0 shadow-sm mt-auto" style="background-color: #f0fdf4; color: #166534; font-size: 0.9rem;">
                    <i class="fas fa-info-circle me-1"></i> <strong>Consejo para la presentación:</strong> Esta herramienta utiliza la geolocalización del navegador para guiar al paciente de forma inmediata.
                </div>
            </div>
        </div>

        <!-- Columna Derecha: Mapa Grande y Limpio -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm overflow-hidden" style="height: 500px;">
                <iframe 
                    id="mapaFarmacias"
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    src="https://maps.google.com/maps?q=farmacias+droguerias+Bogota&z=14&output=embed">
                </iframe>
            </div>
        </div>
    </div>
</div>

<script>
    function buscarFarmaciasCerca() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                let lat = position.coords.latitude;
                let lng = position.coords.longitude;
                let mapa = document.getElementById('mapaFarmacias');
                mapa.src = `https://maps.google.com/maps?q=farmacias&sll=${lat},${lng}&z=15&output=embed`;
                alert("¡Ubicación detectada con éxito! Mostrando farmacias cercanas en el mapa.");
            }, function (error) {
                alert("No pudimos acceder a tu ubicación exacta, pero te mostramos las farmacias principales de Bogotá.");
            });
        } else {
            alert("Tu navegador no soporta geolocalización.");
        }
    }
</script>
@endsection