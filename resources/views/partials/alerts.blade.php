@if(session('success'))

    <div id="alerta" class="alert alert-success alert-dismissible d-flex align-items-center fade show">

        <i class="fa-solid fa-circle-check"></i>
        <strong class="mx-2"> ¡Éxito! </strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

    </div>

    <script>
        setTimeout(() => {
            let alerta = document.getElementById('alerta');

            alerta.classList.remove('show');
            alerta.classList.add('fade')
            setTimeout(() => alerta.remove(), 500);

        }, 4000);
    </script>

@endif

@if(session('error'))
    <div id="alerta-error" class="alert alert-danger alert-dismissible d-flex align-items-center fade show" role="alert">
        {{-- Icono de error de FontAwesome --}}
        <i class="fa-solid fa-circle-xmark"></i>
        
        <strong class="mx-2"> ¡Denegado! </strong> {{ session('error') }}
        
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <script>
        setTimeout(() => {
            let alertaErr = document.getElementById('alerta-error');
            if (alertaErr) {
                alertaErr.classList.remove('show');
                // Un pequeño delay para que la animación de Bootstrap termine antes de borrarlo
                setTimeout(() => alertaErr.remove(), 500);
            }
        }, 5000); // Lo dejamos 5 segundos porque los errores suelen requerir más lectura
    </script>
@endif