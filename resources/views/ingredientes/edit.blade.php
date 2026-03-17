<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Ingrediente</title>
</head>
<body class="bg-light">

@extends('layouts.app')
@section('content')

    <h1 class="display-6 fw-bold text-dark mb-4 border-bottom pb-2">
        <i class="fa-solid fa-pen-to-square text-warning me-2"></i>Editar ingrediente: 
        <span class="text-secondary">{{ $ingrediente->nombre }}</span>
    </h1>

    <form action="{{ route('ingredientes.update', $ingrediente) }}" method="POST" class="shadow-sm p-4 bg-white rounded border">
        
        @csrf
        @method('PUT')

        <label class="form-label fw-bold">Nombre del Ingrediente</label>
        <input required type="text" name="nombre" placeholder="Ej. Harina de Trigo" value="{{ $ingrediente->nombre }}" class="form-control mb-3 form-control-lg">
        
        <label class="form-label fw-bold">Peso / Cantidad</label>
        <input required type="number" name="peso" placeholder="0" value="{{ $ingrediente->peso }}" class="form-control mb-3">
        
        <label class="form-label fw-bold">Categoría</label>
        <input required type="text" name="categoria" placeholder="Ej. Lácteos, Semillas..." value="{{ $ingrediente->categoria}}" class="form-control mb-4">

        <hr>

        <div class="d-flex justify-content-between align-items-center">
            <a href="{{route('ingredientes.index')}}" class="btn btn-outline-secondary px-4">
                <i class="fa-solid fa-arrow-left me-2"></i>Cancelar y Volver
            </a>
            
            <button type="submit" class="btn btn-primary btn-lg px-5 shadow">
                <i class="fa-solid fa-floppy-disk me-2"></i>Actualizar Registro
            </button>
        </div>

    </form>

@endsection
</body>
</html>