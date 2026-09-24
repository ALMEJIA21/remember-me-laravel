@extends('layouts.landing')

@section('content')

<!-- HERO -->
<div class="container py-5 position-relative overflow-hidden">
    <div class="bg-blob" style="width:400px; height:400px; background:#0d9488; top:-100px; right:-100px;"></div>
    <div class="bg-blob" style="width:300px; height:300px; background:#2dd4bf; bottom:0; left:-80px;"></div>

    <div class="row align-items-center justify-content-center text-center my-4 position-relative">
        <div class="col-lg-8">
            <span class="badge rounded-pill px-3 py-2 mb-3" style="background-color: #ccfbf1; color: #0f766e; font-weight: 600;">
                <i class="fas fa-shield-heart me-1"></i> Sistema de Gestión y Salud SENA
            </span>
            <h1 class="display-4 fw-bold mb-4" style="color: #0f172a;">Tu tratamiento médico bajo control</h1>
            <p class="lead text-muted mb-5">
                Remember Me es una aplicación diseñada para ayudar a pacientes y cuidadores a gestionar medicamentos, recordatorios y tratamientos de forma sencilla, segura y organizada.
            </p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-lg px-5 py-3 text-white shadow-sm" style="background-color: #0d9488;">
                        <i class="fas fa-gauge me-2"></i> Ir a mi Dashboard
                    </a>
                @else
                    <a href="{{ route('register') }}" class="btn btn-lg px-5 py-3 text-white shadow-sm" style="background-color: #0d9488;">
                        <i class="fas fa-user-plus me-2"></i> Crear cuenta gratis
                    </a>
                    <a href="{{ route('login') }}" class="btn btn-lg px-5 py-3 shadow-sm" style="border: 2px solid #0d9488; color: #0d9488; background: white;">
                        <i class="fas fa-right-to-bracket me-2"></i> Ya tengo cuenta
                    </a>
                @endauth
            </div>
        </div>
    </div>

    <!-- BARRA DE CONFIANZA -->
    <div class="row justify-content-center mt-5 position-relative">
        <div class="col-lg-10">
            <div class="d-flex flex-wrap justify-content-around text-center gap-4 py-4 px-3 rounded-4 shadow-sm" style="background: white;">
                <div>
                    <div class="fw-bold fs-3" style="color: #0d9488;"><i class="fas fa-lock"></i></div>
                    <small class="text-muted">Acceso protegido por cuenta</small>
                </div>
                <div>
                    <div class="fw-bold fs-3" style="color: #0d9488;"><i class="fas fa-bell"></i></div>
                    <small class="text-muted">Notificaciones en tiempo real</small>
                </div>
                <div>
                    <div class="fw-bold fs-3" style="color: #0d9488;"><i class="fas fa-hand-holding-heart"></i></div>
                    <small class="text-muted">Panel especial para cuidadores</small>
                </div>
                <div>
                    <div class="fw-bold fs-3" style="color: #0d9488;"><i class="fas fa-robot"></i></div>
                    <small class="text-muted">Análisis de interacciones con IA</small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- VISTA PREVIA DEL DASHBOARD (mockup) -->
<div class="container py-5 reveal">
    <div class="text-center mb-5">
        <h3 class="fw-bold" style="color: #0f172a;">Un panel pensado para cada rol</h3>
        <p class="text-muted">Así se ve por dentro, sin vueltas ni complicaciones</p>
    </div>

    <div class="mx-auto shadow-lg rounded-4 overflow-hidden" style="max-width: 900px; border: 1px solid #e2e8f0;">
        <!-- Barra tipo navegador -->
        <div class="d-flex align-items-center gap-2 px-3 py-2" style="background:#e2e8f0;">
            <span style="width:10px; height:10px; border-radius:50%; background:#f87171; display:inline-block;"></span>
            <span style="width:10px; height:10px; border-radius:50%; background:#fbbf24; display:inline-block;"></span>
            <span style="width:10px; height:10px; border-radius:50%; background:#34d399; display:inline-block;"></span>
            <span class="ms-3 small text-muted">remember-me.app/dashboard</span>
        </div>
        <!-- Contenido simulado -->
        <div class="p-4" style="background:#f8fafc;">
            <div class="row g-3">
                <div class="col-6 col-md-3">
                    <div class="p-3 rounded-3 bg-white shadow-sm text-center">
                        <i class="fas fa-capsules mb-2" style="color:#0d9488;"></i>
                        <div class="fw-bold">6</div>
                        <small class="text-muted">Medicamentos</small>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="p-3 rounded-3 bg-white shadow-sm text-center">
                        <i class="fas fa-notes-medical mb-2" style="color:#4f46e5;"></i>
                        <div class="fw-bold">3</div>
                        <small class="text-muted">Tratamientos</small>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="p-3 rounded-3 bg-white shadow-sm text-center">
                        <i class="fas fa-bell mb-2" style="color:#d97706;"></i>
                        <div class="fw-bold">4</div>
                        <small class="text-muted">Recordatorios</small>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="p-3 rounded-3 bg-white shadow-sm text-center">
                        <i class="fas fa-chart-line mb-2" style="color:#dc2626;"></i>
                        <div class="fw-bold">92%</div>
                        <small class="text-muted">Cumplimiento</small>
                    </div>
                </div>
            </div>
            <div class="mt-3 p-3 rounded-3 bg-white shadow-sm">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="fw-semibold small">Próximo recordatorio</span>
                    <span class="badge" style="background:#ccfbf1; color:#0f766e;">Hoy 8:00 PM</span>
                </div>
                <div class="progress" style="height:6px;">
                    <div class="progress-bar" style="width:70%; background:#0d9488;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FUNCIONES PRINCIPALES -->
<div class="py-5" style="background-color: #f1f5f9;">
    <div class="container">
        <div class="text-center mb-5 reveal">
            <h3 class="fw-bold" style="color: #0f172a;">Todo lo que necesitas, en un solo lugar</h3>
            <p class="text-muted">Cada módulo está pensado para hacerte la vida más fácil</p>
        </div>

        <div class="row g-4">
            @php
                $funciones = [
                    ['icon' => 'fa-capsules', 'titulo' => 'Medicamentos', 'texto' => 'Administra dosis, frecuencia y cantidad de cada medicamento de manera eficiente.'],
                    ['icon' => 'fa-notes-medical', 'titulo' => 'Tratamientos', 'texto' => 'Registra el inicio, fin y estado de cada tratamiento médico que estés siguiendo.'],
                    ['icon' => 'fa-bell', 'titulo' => 'Recordatorios', 'texto' => 'Configura horarios y recibe una notificación real en tu computador o celular.'],
                    ['icon' => 'fa-hand-holding-heart', 'titulo' => 'Panel de Cuidador', 'texto' => 'Registra y supervisa a los pacientes que tienes a tu cargo desde un solo panel.'],
                    ['icon' => 'fa-robot', 'titulo' => 'Análisis con IA', 'texto' => 'Detecta posibles interacciones peligrosas entre los medicamentos que registras.'],
                    ['icon' => 'fa-user-shield', 'titulo' => 'Panel Administrador', 'texto' => 'Visión general de todos los usuarios y la actividad registrada en el sistema.'],
                ];
            @endphp

            @foreach ($funciones as $i => $f)
                <div class="col-md-4 reveal" style="transition-delay: {{ $i * 80 }}ms;">
                    <div class="card h-100 p-4 border-0 shadow-sm text-center" style="transition: transform .2s ease, box-shadow .2s ease;"
                         onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 12px 24px rgba(15,23,42,0.1)';"
                         onmouseout="this.style.transform='none'; this.style.boxShadow='';">
                        <div class="card-body">
                            <div class="mb-3" style="font-size: 2.5rem; color: #0d9488;"><i class="fas {{ $f['icon'] }}"></i></div>
                            <h5 class="fw-bold mb-3" style="color: #0f172a;">{{ $f['titulo'] }}</h5>
                            <p class="text-muted small">{{ $f['texto'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- CÓMO FUNCIONA -->
<div class="py-5">
    <div class="container">
        <div class="text-center mb-5 reveal">
            <h3 class="fw-bold" style="color: #0f172a;">¿Cómo funciona?</h3>
            <p class="text-muted">Empezar te toma menos de dos minutos</p>
        </div>

        <div class="row g-4 text-center">
            <div class="col-md-4 reveal">
                <div class="mx-auto mb-3 d-flex align-items-center justify-content-center rounded-circle text-white fw-bold fs-4"
                     style="width: 60px; height: 60px; background-color: #0d9488;">1</div>
                <h6 class="fw-bold">Crea tu cuenta</h6>
                <p class="text-muted small px-3">Regístrate y elige tu rol: paciente, cuidador o administrador.</p>
            </div>
            <div class="col-md-4 reveal" style="transition-delay: 100ms;">
                <div class="mx-auto mb-3 d-flex align-items-center justify-content-center rounded-circle text-white fw-bold fs-4"
                     style="width: 60px; height: 60px; background-color: #0d9488;">2</div>
                <h6 class="fw-bold">Configura tus datos</h6>
                <p class="text-muted small px-3">Agrega tratamientos, medicamentos y los recordatorios que necesites.</p>
            </div>
            <div class="col-md-4 reveal" style="transition-delay: 200ms;">
                <div class="mx-auto mb-3 d-flex align-items-center justify-content-center rounded-circle text-white fw-bold fs-4"
                     style="width: 60px; height: 60px; background-color: #0d9488;">3</div>
                <h6 class="fw-bold">Mantente al día</h6>
                <p class="text-muted small px-3">Recibe notificaciones reales y haz seguimiento desde tu dashboard.</p>
            </div>
        </div>
    </div>
</div>

<!-- TESTIMONIOS -->
<div class="py-5" style="background-color: #f1f5f9;">
    <div class="container">
        <div class="text-center mb-5 reveal">
            <h3 class="fw-bold" style="color: #0f172a;">Pensado para personas reales</h3>
            <p class="text-muted">Así se imaginan usándolo nuestros primeros usuarios de prueba</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4 reveal">
                <div class="card h-100 p-4 border-0 shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-quote-left mb-3" style="color:#2dd4bf; font-size:1.3rem;"></i>
                        <p class="text-muted small">"Cuido a mi papá y antes se me olvidaba revisar si tomó su pastilla. Ahora lo registro yo y me avisa el sistema."</p>
                        <div class="d-flex align-items-center gap-2 mt-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold" style="width:36px; height:36px; background:#0d9488;">M</div>
                            <div>
                                <div class="fw-semibold small">Marcela R.</div>
                                <small class="text-muted">Cuidadora</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 reveal" style="transition-delay: 100ms;">
                <div class="card h-100 p-4 border-0 shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-quote-left mb-3" style="color:#2dd4bf; font-size:1.3rem;"></i>
                        <p class="text-muted small">"Tener todos mis medicamentos y horarios en un solo lugar me quita mucho estrés. Los recordatorios sí llegan."</p>
                        <div class="d-flex align-items-center gap-2 mt-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold" style="width:36px; height:36px; background:#4f46e5;">J</div>
                            <div>
                                <div class="fw-semibold small">Julián T.</div>
                                <small class="text-muted">Paciente</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 reveal" style="transition-delay: 200ms;">
                <div class="card h-100 p-4 border-0 shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-quote-left mb-3" style="color:#2dd4bf; font-size:1.3rem;"></i>
                        <p class="text-muted small">"Como administrador puedo ver de un vistazo cuántas cuentas hay y de qué tipo, sin tener que revisar nada manualmente."</p>
                        <div class="d-flex align-items-center gap-2 mt-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold" style="width:36px; height:36px; background:#dc2626;">S</div>
                            <div>
                                <div class="fw-semibold small">Santiago P.</div>
                                <small class="text-muted">Administrador</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- PREGUNTAS FRECUENTES -->
<div class="py-5">
    <div class="container">
        <div class="text-center mb-5 reveal">
            <h3 class="fw-bold" style="color: #0f172a;">Preguntas frecuentes</h3>
        </div>

        <div class="accordion mx-auto reveal" id="faqAccordion" style="max-width: 800px;">
            <div class="accordion-item mb-3 border-0 shadow-sm rounded-3 overflow-hidden">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                        ¿Necesito instalar algo para recibir las notificaciones?
                    </button>
                </h2>
                <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted small">No. Las notificaciones llegan directo a tu navegador (computador o celular), solo tienes que aceptar el permiso la primera vez que entras.</div>
                </div>
            </div>
            <div class="accordion-item mb-3 border-0 shadow-sm rounded-3 overflow-hidden">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                        ¿Qué diferencia hay entre paciente, cuidador y administrador?
                    </button>
                </h2>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted small">El paciente gestiona sus propios tratamientos. El cuidador puede registrar y supervisar a las personas que tiene a su cargo. El administrador tiene una vista general de todas las cuentas del sistema.</div>
                </div>
            </div>
            <div class="accordion-item mb-3 border-0 shadow-sm rounded-3 overflow-hidden">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                        ¿Es gratis crear una cuenta?
                    </button>
                </h2>
                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted small">Sí, crear tu cuenta y usar la aplicación no tiene ningún costo.</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA FINAL -->
@guest
<div class="py-5" style="background: linear-gradient(135deg, #0d9488, #0f766e);">
    <div class="container text-center text-white reveal">
        <h3 class="fw-bold mb-3">Empieza a cuidar tu salud hoy mismo</h3>
        <p class="mb-4 opacity-75">Crear tu cuenta es gratis y solo toma un momento.</p>
        <a href="{{ route('register') }}" class="btn btn-lg px-5 py-3 fw-bold shadow-sm" style="background: white; color: #0d9488; border-radius: 8px;">
            <i class="fas fa-user-plus me-2"></i> Crear mi cuenta
        </a>
    </div>
</div>
@endguest

@endsection
