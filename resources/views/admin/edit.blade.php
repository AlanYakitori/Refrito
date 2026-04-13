<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>
<body class="bg-light">

@extends('layouts.app')
@section('content')

    <h1 class="display-6 fw-bold text-dark mb-4 border-bottom pb-2">
        <i class="fa-solid fa-user-pen text-warning me-2"></i>Editar usuario: 
        <span class="text-secondary">{{ $usuario->name }}</span>
    </h1>

    {{-- Mostramos alertas de error de validación por si el correo ya existe o algo falla --}}
    @if ($errors->any())
        <div class="alert alert-danger shadow-sm">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li><i class="fa-solid fa-triangle-exclamation me-1"></i>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('usuarios.update', $usuario) }}" method="POST" class="shadow-sm p-4 bg-white rounded border">
        
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <label class="form-label fw-bold"><i class="fa-solid fa-user me-1"></i>Nombre completo</label>
                <input required type="text" name="name" placeholder="Ej. Alan" value="{{ old('name', $usuario->name) }}" class="form-control mb-3">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold"><i class="fa-solid fa-envelope me-1"></i>Correo electrónico</label>
                <input required type="email" name="email" placeholder="correo@ejemplo.com" value="{{ old('email', $usuario->email) }}" class="form-control mb-3">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label class="form-label fw-bold"><i class="fa-solid fa-phone me-1"></i>Teléfono</label>
                <input required type="text" name="phone" placeholder="10 dígitos" value="{{ old('phone', $usuario->phone) }}" class="form-control mb-4">
            </div>
            
            <div class="col-md-6 d-flex align-items-center">
                <div class="form-check form-switch fs-5 mt-2">
                    {{-- Lógica para marcar el switch si el usuario ya es admin --}}
                    <input class="form-check-input" type="checkbox" role="switch" id="isAdminSwitch" name="is_admin" value="1" {{ $usuario->is_admin ? 'checked' : '' }}>
                    <label class="form-check-label fw-bold text-primary" for="isAdminSwitch">
                        Otorgar permisos de Administrador
                    </label>
                </div>
            </div>
        </div>

        <hr class="mt-4 mb-4">

        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('admin-dashboard') }}" class="btn btn-outline-secondary px-4">
                <i class="fa-solid fa-arrow-left me-2"></i>Cancelar y Volver
            </a>
            
            <button type="submit" class="btn btn-primary btn-lg px-5 shadow">
                <i class="fa-solid fa-floppy-disk me-2"></i>Actualizar Usuario
            </button>
        </div>

    </form>

@endsection
</body>
</html>