<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')

    <h1>Registro de usuarios</h1>
    
    @include('partials.alerts')

    <form action="{{ route('registro.store') }}" method="POST">

        @csrf

        <input type="text" name="name" placeholder="Nombre" class="form-control" required>
        <br><input type="email" name="email" placeholder="Correo" class="form-control" required>
        <br><input type="text" name="phone" placeholder="Telefono" class="form-control" required>
        <br><input type="password" name="password" placeholder="Contraseña" class="form-control" required>
        <br><input type="password" name="password_confirmation" placeholder="Confirmar contraseña" class="form-control" required>
        
        <div>
            <input type="checkbox" name="is_admin" value="1">
            <label>Es administrador</label>
        </div>

        <br><button type="submit" class="btn btn-primary">Guardar</button>

    </form>

    @endsection
</body>
</html>