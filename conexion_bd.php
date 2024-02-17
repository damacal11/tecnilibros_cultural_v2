<?php
// Configuración de la conexión a la base de datos
$host = "localhost";
$user = "root";
$password = ""; // Cambia "tu_contraseña" por la contraseña real de tu base de datos
$database = "login";
$port = 3306;

// Crear conexión
$conexion = new mysqli($host, $user, $password, $database, $port);

// Verificar si hay errores en la conexión
if ($conexion->connect_error) {
    // Mostrar un mensaje de error descriptivo y detener la ejecución del script
    die("Error de conexión: " . $conexion->connect_error);
}

// Configurar el conjunto de caracteres a utf8
$conexion->set_charset("utf8");
?>
