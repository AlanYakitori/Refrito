<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refrito</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b668f928a3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    
    <div class="main-container">

        @auth
            <aside class="sidebar">
                <a href="{{ route('home') }}" style="text-decoration: none;"><h2 class="logo">Refrito</h2></a>
                <nav>
                    <a href="{{ route('home') }}">Inicio</a>
                    <a href="{{ route('favoritos.index') }}">Favoritos</a>
                    <a href="{{ route('ingredientes.index') }}">Ingredientes</a>
                    <a href="{{ route('explorar') }}">Explorar</a>
                    
                    @if(auth()->user()->is_admin)
                        <a href="{{ route('admin-dashboard') }}" class="btn btn-secondary mt-2 mb-3 text-white">
                            <i class="fa-solid fa-users-gear me-1"></i> Panel Admin
                        </a>
                    @endif
                </nav>

                <form action="{{route('cerrar')}}" method="POST" class="mt-auto">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger w-100 logout shadow-sm">
                        <i class="fa-solid fa-right-from-bracket me-1"></i> Cerrar sesión
                    </button>
                </form>
            </aside>
        @endauth

        <main class="content">
            @include('partials.alerts')
            @yield('content')
        </main>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>