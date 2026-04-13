@extends('layouts.app')

@section('content')
<section class="hero">
    <div class="hero-text">
        <h1>Explora todos los<br>SABORES</h1>
        <p>
            Explora las recetas que te ayudaran
            con tus mañanas, tardes y noches
        </p>
        <a href="{{ route('explorar') }}" class="btn btn-success more-btn text-decoration-none">Ver más opciones</a>
    </div>

    <div class="recetas">
        @foreach($chicken as $receta)
            <div class="receta border rounded p-2 mb-3 shadow-sm bg-white">
                <img src="{{ $receta['image'] ?? 'https://via.placeholder.com/312x231' }}" alt="{{ $receta['title'] }}" class="img-fluid rounded mb-2">
                <h4 class="h6 text-dark">{{ $receta['title'] ?? 'Sin título' }}</h4>
                
                <form action="{{ route('favoritos.store') }}" method="POST" class="mt-2 text-center">
                    @csrf
                    <input type="hidden" name="recipe_id" value="{{ $receta['id'] }}">
                    <input type="hidden" name="title" value="{{ $receta['title'] }}">
                    <input type="hidden" name="image" value="{{ $receta['image'] }}">
                    
                    <button type="submit" class="btn btn-sm btn-outline-success w-100">
                        <i class="fa-solid fa-heart me-1"></i> Guardar
                    </button>
                </form>
            </div>
        @endforeach
    </div>
</section>
@endsection