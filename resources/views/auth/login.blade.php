@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 75vh;">
    <div class="card shadow-lg border-0 w-100" style="max-width: 450px; border-radius: 20px;">
        <div class="card-body p-5">
            
            <div class="text-center mb-4">
                <h2 class="fw-bold text-success">¡Bienvenido de vuelta!</h2>
                <p class="text-muted">Inicia sesión en Refrito</p>
            </div>

            <form action="{{ route('acceso.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="form-label fw-semibold text-secondary small"><i class="fa-solid fa-envelope me-1"></i>Correo electrónico</label>
                    <input type="email" name="email" class="form-control form-control-lg bg-light" required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold text-secondary small"><i class="fa-solid fa-lock me-1"></i>Contraseña</label>
                    <input type="password" name="password" class="form-control form-control-lg bg-light" required>
                </div>

                <button type="submit" class="btn btn-success btn-lg w-100 fw-bold shadow-sm" style="border-radius: 10px;">
                    <i class="fa-solid fa-right-to-bracket me-1"></i> Entrar
                </button>
            </form>

            <hr class="mt-4 mb-4">

            {{-- El link para mandarlos a registrarse si no tienen cuenta --}}
            <div class="text-center">
                <p class="mb-0 text-secondary">¿Aún no tienes cuenta?</p>
                <a href="{{ route('registro') }}" class="text-success fw-bold text-decoration-none">
                    Regístrate aquí <i class="fa-solid fa-arrow-right ms-1"></i>
                </a>
            </div>

        </div>
    </div>
</div>
@endsection