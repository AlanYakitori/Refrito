<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Ingredientes</title>
    </head>
<body class="bg-light">
    
    @extends('layouts.app')

    @section('content')

    <h1 class="display-5 fw-bold text-black mb-4">Consulta de Ingredientes</h1>

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('ingredientes.create') }}" class="text-decoration-none">
            <button class="btn btn-success me-3 shadow-sm"><i class="fa-solid fa-plus me-1"></i> Agregar Ingrediente</button>
        </a>

       
    </div>


    <table class="table table-striped table-hover table-bordered shadow-sm align-middle">
        <thead class="table-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Peso</th>
                <th scope="col">Categoría</th>
                <th scope="col" class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ingredientes as $ingrediente)
                <tr>
                    <td class="fw-bold text-secondary">{{ $ingrediente->id }}</td>
                    <td>{{ $ingrediente->nombre }}</td>
                    <td>{{ $ingrediente->peso }}</td>
                    <td>{{ $ingrediente->categoria }}</td>
                    <td class="text-center">
                        <a href="{{route('ingredientes.edit', $ingrediente)}}" class="btn btn-sm btn-warning me-1">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        
                        <form action="{{route('ingredientes.destroy', $ingrediente)}}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar el registro?')">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
</body>
</html>