<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Register</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<main>
    <header>
    <img src="logo.png" alt="Logo de la Institución" id="logo">
    </header>
    <div class="contenedor__todo">
        <div class="caja__trasera">
            <div class="caja__trasera-login">
                <h3>¿Ya tienes una cuenta?</h3>
                <p>Inicia sesión para entrar en la página</p>
                <button id="btn__iniciar-sesion">Iniciar Sesión</button>
            </div>
            <div class="caja__trasera-register">
                <h3>¿Aún no tienes una cuenta?</h3>
                <p>Regístrate para que puedas iniciar sesión</p>
                <button id="btn__registrarse">Regístrarse</button>
            </div>
        </div>

        <div class="contenedor__login-register">
            <form action="login_usuario_be.php" method="POST" class="formulario__login">
                <h2>Iniciar Sesión</h2>
                <input type="text" placeholder="Correo Electronico" name="correo">
                <input type="password" placeholder="Contraseña" name="contrasena">
                <button>Entrar</button>
            </form>
            <form action="registro_usuario_be.php" method="POST" class="formulario__register" id="registroForm">
                <h2>Regístrarse</h2>
                <input type="text" placeholder="Nombre completo" name="nombre_completo">
                <input type="text" placeholder="Correo Electronico" name="correo">
                <input type="text" placeholder="Cédula o Tarjeta de identidad" name="cedula">
                <input type="text" placeholder="Usuario" name="usuario">
                <input type="password" placeholder="Contraseña" name="contrasena" id="password">
                <input type="password" placeholder="Confirmar Contraseña" id="confirm_password">
                <button>Regístrarse</button>
            </form>
        </div>
    </div>

</main>
<script src="script.js"></script>
<script>
    document.getElementById("registroForm").addEventListener("submit", function(event) {
        event.preventDefault();
        
        var formulario = document.getElementById("registroForm");
        var datos = new FormData(formulario);
        fetch(formulario.action, {
            method: formulario.method,
            body: datos
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            window.location.href = "index.php"; // Redirige al usuario a ./index.php
        })
        .catch(error => console.error('Error:', error));
    });
</script>
</body>
</html>