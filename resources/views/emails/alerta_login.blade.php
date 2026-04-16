<head>
    <style>
        .container {
            font-family: Arial;
            background: #f4f4f4;
            padding: 20px; 
            text-align: center; 
        }
        .content { 
            background: #ffffff; 
            padding: 20px; 
            border-radius: 10px; 
        }
        .btn { 
            background: #2ecc71; 
            color: white; 
            padding: 10px 20px; 
            text-decoration: none; 
            border-radius: 7px; 
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <h2>Nuevo inicio de sesión :o</h2>
            <p>Se ha detectado nueva actividad en tu cuenta de Refrito.</p>
            <p style="margin-top: 20px;">
                <a href="{{ route('home') }}" class="btn" style="color:white;">Cuide su cuenta y credenciales</a>
            </p>
            <p style="margin-top: 20px; font-size: 12px; color: #777;">
                Si no fuiste tú, solicita un cambio de contraseña al administrador.
            </p>
        </div>
    </div>
</body>