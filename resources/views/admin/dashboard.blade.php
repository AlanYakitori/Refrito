<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrador</title>
</head>
<body class="bg-light">
    
    @extends('layouts.app')

    @section('content')

    <h1 class="display-5 fw-bold text-black mb-4">
        <i class="fa-solid fa-users-gear text-primary me-2"></i>Gestión de Usuarios
    </h1>

    {{-- Botones de acción superior --}}
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('registro') }}" class="btn btn-success me-3 shadow-sm">
            <i class="fa-solid fa-user-plus me-1"></i> Registrar Nuevo Usuario
        </a>
        <a href="{{ route('ingredientes.index') }}" class="btn btn-secondary me-3 shadow-sm">
            <i class="fa-solid fa-arrow-left me-1"></i> Volver a Ingredientes
        </a>
        <form action="{{ route('cerrar') }}" method="POST">
            @csrf
            <button class="btn btn-danger shadow-sm">
                <i class="fa-solid fa-right-from-bracket me-1"></i> Cerrar sesión
            </button>
        </form>
    </div>

    {{-- Tabla de Usuarios --}}
    <div class="table-responsive bg-white p-4 shadow-sm rounded border">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Rol</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td class="fw-bold text-secondary">{{ $usuario->id }}</td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->phone ?? 'Sin registro' }}</td>
                        <td>
                            @if($usuario->is_admin)
                                <span class="badge bg-primary">Administrador</span>
                            @else
                                <span class="badge bg-secondary">Cuenta normal</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-sm btn-warning me-1" title="Editar">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            
                            <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar a este usuario?')" title="Eliminar">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @endsection
</body>
</html>