<?php
header('Content-Type: application/json'); // Establecer el tipo de contenido como JSON

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_mascota = $_POST['id_mascota'];

    // Incluir el archivo de conexión
    include('conexion_be.php');

    // Usar la conexión a login_register_db
    if (isset($conexion_login_register)) {
        $conexion = $conexion_login_register;
    } else {
        echo json_encode(["success" => false, "message" => "Error: No se pudo establecer la conexión a login_register_db."]);
        exit;
    }

    // Actualizar la disponibilidad de la mascota
    $sql = "UPDATE mascotas_adopcion_descripcion SET disponibilidad = false WHERE id_mascota = '$id_mascota'";

    if (mysqli_query($conexion, $sql)) {
        echo json_encode(["success" => true, "message" => "Disponibilidad actualizada correctamente."]);
    } else {
        echo json_encode(["success" => false, "message" => "Error al actualizar disponibilidad: " . mysqli_error($conexion)]);
    }

    mysqli_close($conexion);
}
?>
