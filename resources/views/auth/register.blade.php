<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 75vh;">
        <div class="card shadow-lg border-0 w-100" style="max-width: 500px; border-radius: 20px;">
            <div class="card-body p-5">
                
                <div class="text-center mb-4">
                    <h2 class="fw-bold text-success">Crear Cuenta</h2>
                    <p class="text-muted">Únete a Refrito y guarda tus recetas favoritas</p>
                </div>

                <form action="{{ route('registro.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary small"><i class="fa-solid fa-user me-1"></i>Nombre completo</label>
                        <input type="text" name="name" class="form-control form-control-lg bg-light" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary small"><i class="fa-solid fa-envelope me-1"></i>Correo electrónico</label>
                        <input type="email" name="email" class="form-control form-control-lg bg-light" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary small"><i class="fa-solid fa-phone me-1"></i>Teléfono</label>
                        <input type="text" name="phone" class="form-control form-control-lg bg-light" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary small"><i class="fa-solid fa-lock me-1"></i>Contraseña</label>
                        <input type="password" name="password" placeholder="Crea una contraseña segura" class="form-control form-control-lg bg-light" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-secondary small"><i class="fa-solid fa-lock me-1"></i>Confirmar contraseña</label>
                        <input type="password" name="password_confirmation" placeholder="Vuelve a escribirla" class="form-control form-control-lg bg-light" required>
                    </div>

                    <button type="submit" class="btn btn-success btn-lg w-100 fw-bold shadow-sm" style="border-radius: 10px;">
                        Registrarme
                    </button>
                </form>

                <hr class="mt-4 mb-4">

                <div class="text-center">
                    <p class="mb-0 text-secondary">¿Ya tienes una cuenta?</p>
                    <a href="{{ route('acceso') }}" class="text-success fw-bold text-decoration-none">
                        Inicia sesión aquí <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
    @endsection
</body>
</html>