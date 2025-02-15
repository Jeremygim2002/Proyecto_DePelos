<?php
// Incluir la conexión a la base de datos
include 'conexion_be.php';

// Verificar si el formulario ha sido enviado y si el botón de contacto ha sido presionado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['contact-submit'])) {
    // Obtener los datos del formulario usando el método POST y escaparlos para prevenir inyección de SQL
    $nombre = mysqli_real_escape_string($conexion_login_register, $_POST['nombre']);
    $email = mysqli_real_escape_string($conexion_login_register, $_POST['email']);
    $celular = mysqli_real_escape_string($conexion_login_register, $_POST['celular']);
    $asunto = mysqli_real_escape_string($conexion_login_register, $_POST['asunto']);
    $mensaje = mysqli_real_escape_string($conexion_login_register, $_POST['mensaje']);

    // Consulta para insertar el mensaje en la tabla contacto
    $sql = "INSERT INTO contacto (nombre, email, celular, asunto, mensaje) 
            VALUES ('$nombre', '$email', '$celular', '$asunto', '$mensaje')";

    // Ejecutar la consulta y manejar la respuesta
    if (mysqli_query($conexion_login_register, $sql)) {
        // Redirigir al usuario con mensaje de éxito
        header("Location: ../contacto.php?status=success");
        exit();
    } else {
        // Redirigir al usuario con mensaje de error
        $error_message = urlencode("Error: " . mysqli_error($conexion_login_register));
        header("Location: ../contacto.php?status=error&message=$error_message");
        exit();
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion_login_register);
}
?>
