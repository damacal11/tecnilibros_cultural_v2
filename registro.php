<?php
// Verificar si se ha enviado el formulario de registro
if(isset($_POST['submit']) && $_POST['submit'] == 'Crear cuenta') {
    // Verificar si los campos del formulario están vacíos
    if(empty($_POST['nombre_usuario']) || empty($_POST['correo_electronico']) || empty($_POST['contrasena'])) {
         // Mensaje de error para la alerta
         $mensaje = "Error: Uno de los campos está vacío.";

         // Generar el script JavaScript que mostrará la alerta y redirigirá a index.php
         echo "<script>alert('$mensaje'); window.location.href = 'index.php';</script>";
    } else {
        // Incluir el archivo de conexión a la base de datos
        include("conexion_bd.php");

        // Recibir los datos del formulario
        $nombre_usuario = $_POST['nombre_usuario'];
        $correo_electronico = $_POST['correo_electronico'];
        $contrasena = $_POST['contrasena'];

        // Consulta preparada para insertar datos en la base de datos
        $query = "INSERT INTO Usuarios (nombre_usuario, correo_electronico, contrasena) VALUES (?, ?, ?)";
        $statement = mysqli_prepare($conexion, $query);

        // Verificar si la preparación de la consulta tuvo éxito
        if ($statement === false) {
            // Mostrar un mensaje de error si la preparación de la consulta falló
            die("Error al preparar la consulta: " . mysqli_error($conexion));
        }

        // Vincular los parámetros
        mysqli_stmt_bind_param($statement, "sss", $nombre_usuario, $correo_electronico, $contrasena);

        // Ejecutar la consulta
        $result = mysqli_stmt_execute($statement);

        if($result) {
            // Éxito: mostrar un mensaje de éxito en un alert y redirigir a index.php
            echo "<script>alert('Registro exitoso!'); window.location.href = 'index.php';</script>";
        } else {
            // Error: mostrar un mensaje de error en un alert y redirigir a index.php
            echo "<script>alert('Error al registrar usuario: " . mysqli_error($conexion) . "'); window.location.href = 'index.php';</script>";
        }

        // Cerrar la declaración preparada
        mysqli_stmt_close($statement);

        // Cerrar la conexión a la base de datos
        mysqli_close($conexion);
    }
}
?>
