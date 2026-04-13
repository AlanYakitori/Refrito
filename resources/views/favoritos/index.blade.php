<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Favoritos</title>
</head>
<body class="bg-light">

@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-5 fw-bold text-black">
            <i class="fa-solid fa-heart text-danger me-2"></i>Mis Recetas Favoritas
        </h1>
        <a href="{{ route('home') }}" class="btn btn-secondary shadow-sm">
            <i class="fa-solid fa-magnifying-glass me-1"></i> Explorar más recetas
        </a>
    </div>

    @if($favoritos->isEmpty())
        <div class="alert alert-info shadow-sm fs-5">
            <i class="fa-solid fa-circle-info me-2"></i>Aún no tienes recetas guardadas. ¡Ve a la sección de Inicio y guarda algunas!
        </div>
    @else
        <div class="row">
            @foreach($favoritos as $favorito)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100 border-0">
                        <img src="{{ $favorito->image }}" class="card-img-top rounded-top" alt="{{ $favorito->title }}">
                        <div class="card-body d-flex flex-column bg-white">
                            <h5 class="card-title fw-bold text-dark">{{ $favorito->title }}</h5>

                            <hr>

                            <form action="{{ route('favoritos.update', $favorito) }}" method="POST" class="mt-auto mb-3">
                                @csrf
                                @method('PUT')
                                <label class="form-label text-secondary small fw-semibold">
                                    <i class="fa-solid fa-pencil me-1"></i>Mis notas:
                                </label>
                                <textarea name="notes" class="form-control mb-2" rows="2" placeholder="Ej. Queda mejor con menos sal...">{{ $favorito->notes }}</textarea>
                                <button type="submit" class="btn btn-sm btn-outline-primary w-100">
                                    <i class="fa-solid fa-floppy-disk me-1"></i> Guardar Nota
                                </button>
                            </form>

                            <form action="{{ route('favoritos.destroy', $favorito) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger w-100 shadow-sm" onclick="return confirm('¿Quitar de mis favoritos?')">
                                    <i class="fa-solid fa-trash-can me-1"></i> Quitar de favoritos
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

@endsection
</body>
</html>