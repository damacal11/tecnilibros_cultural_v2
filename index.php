<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tecnilibros Cultural</title>
    <link rel="stylesheet" href="estilos/styles.css"> 
    <link rel="stylesheet" href="estilos/normalize.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="login-page">
        <div class="form">
            <div class="welcome-title">
                <h1>Bienvenido Tecnilibros Cultural</h1>
            </div>
            <?php
            // Aquí incluye el archivo de conexión a la base de datos
            include("conexion_bd.php");
            ?>

            <form class="login-form" action="controlador.php" method="post">
                <!-- Formulario de inicio de sesión -->
                <input type="text" name="username" placeholder="Usuario"/>
                <input type="password" name="password" placeholder="Contraseña"/>
                <button type="submit">Iniciar sesión</button>
                <p class="message">No estás registrado? <a href="#" id="show-register-form">Crea tu cuenta</a></p>
            </form>

            <form class="register-form" action="registro.php" method="post">
                <!-- Formulario de registro -->
                <input type="text" name="nombre_usuario" placeholder="Usuario"/>
                <input type="password" name="contrasena" placeholder="Contraseña"/>
                <input type="text" name="correo_electronico" placeholder="Email"/>
                <button type="submit" name="submit" value="Crear cuenta">Crear cuenta</button> <!-- Cambiado a input con tipo submit -->
                 <p class="message">Ya registrado? <a href="#" id="show-login-form">Inicia sesión</a></p>
            </form>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Ocultar el formulario de registro inicialmente
            $(".register-form").hide();

            // Alternar entre formularios al hacer clic en los enlaces
            $("#show-register-form").click(function() {
                $(".login-form").hide();
                $(".register-form").show();
                return false;
            });

            $("#show-login-form").click(function() {
                $(".register-form").hide();
                $(".login-form").show();
                return false;
            });
        });
    </script>
</body>
</html>

