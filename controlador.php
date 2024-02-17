<?php
include("conexion_bd.php");

if (!empty($_POST["username"]) && !empty($_POST["password"])) {
    $usuario = $_POST["username"];
    $contrasena = $_POST["password"];

    $consulta = "SELECT * FROM Usuarios WHERE nombre_usuario = ? AND contrasena = ?";
    $stmt = $conexion->prepare($consulta);
    $stmt->bind_param("ss", $usuario, $contrasena);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 1) {
        // Usuario autenticado correctamente
        header("Location: inicio.html");
        exit();
    } else {
        // Acceso denegado
        echo "Acceso denegado. Por favor, verifique sus credenciales.";
    }
} else {
    // Los campos están vacíos
    echo "Por favor, complete todos los campos.";
}
?>
