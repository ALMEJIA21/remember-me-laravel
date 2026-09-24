<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cuenta | Remember Me</title>

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .role-options {
            display: flex;
            gap: 10px;
            margin: 12px 0 18px;
        }
        .role-option {
            flex: 1;
            text-align: center;
            border: 2px solid #d9e2e1;
            border-radius: 10px;
            padding: 12px 6px;
            cursor: pointer;
            transition: border-color .15s, background-color .15s;
            font-size: 0.85em;
            color: #334155;
        }
        .role-option i { display: block; font-size: 1.4em; margin-bottom: 4px; color: #2b7a78; }
        .role-option input { display: none; }
        .role-option:has(input:checked) {
            border-color: #2b7a78;
            background-color: #eafaf8;
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="login-box">
        <h2>💊 Remember Me</h2>
        <p>Crea tu cuenta para empezar</p>

        @if ($errors->any())
            <div class="login-error" style="color:#c0392b; margin-bottom:10px; text-align:left;">
                <ul style="margin:0; padding-left:18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.store') }}" method="POST">
            @csrf
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Nombre completo" required autofocus>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="ejemplo@correo.com" required>
            <input type="password" name="password" placeholder="Contraseña (mínimo 8 caracteres)" required>
            <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" required>

            <p style="text-align:left; font-size:0.85em; margin: 14px 0 4px; color:#555;">¿Cuál es tu rol?</p>
            <div class="role-options">
                <label class="role-option">
                    <input type="radio" name="role" value="paciente" {{ old('role', 'paciente') == 'paciente' ? 'checked' : '' }}>
                    <i class="fa-solid fa-user"></i>
                    Paciente
                </label>
                <label class="role-option">
                    <input type="radio" name="role" value="cuidador" {{ old('role') == 'cuidador' ? 'checked' : '' }}>
                    <i class="fa-solid fa-hand-holding-heart"></i>
                    Cuidador
                </label>
                <label class="role-option">
                    <input type="radio" name="role" value="administrador" {{ old('role') == 'administrador' ? 'checked' : '' }}>
                    <i class="fa-solid fa-user-shield"></i>
                    Administrador
                </label>
            </div>

            <button type="submit" class="btn-login">Crear cuenta</button>
        </form>

        <a href="{{ route('login') }}" class="back" style="display: block; margin-top: 15px; text-decoration: none; color: #2b7a78;">¿Ya tienes cuenta? Inicia sesión</a>
    </div>
</div>

</body>
</html>
