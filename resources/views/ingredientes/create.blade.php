<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Ingredientes</title>
</head>
<body class="bg-light">

    @extends('layouts.app')

    @section('content')

    <h1 class="display-6 fw-bold text-black mb-4">
        <i class="fa-solid fa-mortar-pestle me-2"></i>Registrar Nuevo Ingrediente
    </h1>

    <form action="{{ route('ingredientes.store') }}" method="POST" class="shadow p-4 bg-white rounded border">
        
        @csrf

        <label class="form-label fw-semibold text-secondary">Nombre del Producto</label>
        <div class="input-group mb-3">
            <span class="input-group-text bg-primary text-white" id="basic-addon1">
                <i class="fa-solid fa-drumstick-bite"></i>
            </span>
            <input type="text" name="nombre" placeholder="Ej. Pechuga de Pollo" class="form-control" required>
        </div>

        <label class="form-label fw-semibold text-secondary">Peso / Cantidad (gr/kg)</label>
        <div class="input-group mb-3">
            <span class="input-group-text bg-primary text-white" id="basic-addon1">
                <i class="fa-solid fa-weight-scale"></i>
            </span>
            <input type="number" name="peso" placeholder="0.00" class="form-control" step="0.01" required>
        </div>

        <label class="form-label fw-semibold text-secondary">Categoría del Ingrediente</label>
        <div class="input-group mb-4">
            <span class="input-group-text bg-primary text-white" id="basic-addon1">
                <i class="fa-solid fa-layer-group"></i>
            </span>
            <input type="text" name="categoria" placeholder="Ej. Carnes, Vegetales..." class="form-control" required>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end border-top pt-3">
            <a href="{{ route('ingredientes.index') }}" class="btn btn-outline-secondary px-4">
                Cancelar
            </a>
            <button type="submit" class="btn btn-primary px-5 shadow-sm">
                <i class="fa-solid fa-cloud-arrow-up me-2"></i>Registrar Ingrediente
            </button>
        </div>

    </form>
    @endsection
</body>
</html>