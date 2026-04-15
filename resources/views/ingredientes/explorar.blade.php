@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-5 fw-bold text-black">
            <i class="fa-solid fa-compass text-primary me-2"></i>Descubre Nuevos Sabores
        </h1>
    </div>

    <div class="d-flex gap-3 mb-5 overflow-auto pb-2">
        <span class="badge bg-success bg-opacity-25 text-success fs-6 px-4 py-2 rounded-pill"><i class="fa-solid fa-leaf me-1"></i> Vegetariano</span>
        <span class="badge bg-danger bg-opacity-25 text-danger fs-6 px-4 py-2 rounded-pill"><i class="fa-solid fa-fire-flame-curved me-1"></i> Picante</span>
        <span class="badge bg-warning bg-opacity-25 text-warning fs-6 px-4 py-2 rounded-pill"><i class="fa-solid fa-cookie-bite me-1"></i> Postres</span>
        <span class="badge bg-primary bg-opacity-25 text-primary fs-6 px-4 py-2 rounded-pill"><i class="fa-solid fa-fish me-1"></i> Mariscos</span>
    </div>

    <h3 class="h4 fw-bold text-secondary border-bottom pb-2 mb-4">Sugerencias para hoy</h3>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        @foreach($recetasAleatorias as $receta)
            <div class="col">
                <div class="card h-100 shadow-sm border-0 receta-card">
                    <img src="{{ $receta['image'] ?? 'https://via.placeholder.com/312x231' }}" class="card-img-top rounded-top" alt="{{ $receta['title'] }}" style="height: 180px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title h6 fw-bold text-dark mb-3">{{ $receta['title'] ?? 'Sin título' }}</h5>
                        
                        <div class="mb-3 mt-auto">
                            <span class="badge bg-light text-secondary border me-1"><i class="fa-regular fa-clock"></i> {{ $receta['readyInMinutes'] ?? '--' }} min</span>
                            <span class="badge bg-light text-secondary border"><i class="fa-solid fa-user-group"></i> {{ $receta['servings'] ?? '--' }} porciones</span>
                        </div>

                        <form action="{{ route('favoritos.store') }}" method="POST" class="mt-auto">
                            @csrf
                            <input type="hidden" name="recipe_id" value="{{ $receta['id'] }}">
                            <input type="hidden" name="title" value="{{ $receta['title'] }}">
                            <input type="hidden" name="image" value="{{ $receta['image'] }}">
                            
                            <button type="submit" class="btn btn-outline-success w-100 fw-semibold">
                                <i class="fa-solid fa-heart me-1"></i> Guardar Receta
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
    .receta-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .receta-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
    }
</style>
@endsection