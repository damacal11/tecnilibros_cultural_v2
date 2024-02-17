<?php
// Incluir el archivo de conexión a la base de datos
include("conexion_bd_inicio.php");

// Consulta SQL para obtener las últimas notificaciones
$query = "SELECT * FROM notificaciones ORDER BY id DESC LIMIT 5";
$result = $conexion->query($query);

// Crear una lista HTML con las notificaciones
$notificaciones_html = "";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $mensaje = $row["mensaje"];
        $tipo = $row["tipo"];
        $notificaciones_html .= "<li class='$tipo'>$mensaje</li>";
    }
} else {
    $notificaciones_html = "<li>No hay notificaciones disponibles.</li>";
}

// Devolver las notificaciones como respuesta
echo $notificaciones_html;

// Cerrar la conexión a la base de datos
$conexion->close();
?>
