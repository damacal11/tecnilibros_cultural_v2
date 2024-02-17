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
        echo "<script>alert('Acceso denegado. Por favor, verifique sus credenciales.'); window.location.href = 'index.php';</script>";
    }
} else {
    // Los campos están vacíos
    echo "<script>alert('Por favor, complete todos los campos.'); window.location.href = 'index.php';</script>";
}
?>
