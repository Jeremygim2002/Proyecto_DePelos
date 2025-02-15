<?php
header('Content-Type: application/json'); // Establecer el tipo de contenido como JSON
session_start(); // Iniciar la sesión para usar $_SESSION

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener las respuestas del formulario
    $tamano = $_POST['tamano'];
    $descansar = $_POST['descansar'];
    $comporte = $_POST['comporte'];
    $fisica = $_POST['fisica'];
    $experiencia = $_POST['experiencia'];
    $juguete = $_POST['juguete'];
    $mascota_id = $_POST['mascota_id']; // Identificador de la mascota

    // Verificar que el usuario esté autenticado
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(["success" => false, "message" => "Error: Usuario no autenticado."]);
        exit;
    }

    // Incluir el archivo de conexión
    include('conexion_be.php');

    // Usar la conexión a login_register_db
    if (isset($conexion_login_register)) {
        $conexion = $conexion_login_register;
    } else {
        echo json_encode(["success" => false, "message" => "Error: No se pudo establecer la conexión a login_register_db."]);
        exit;
    }

    // Consultar las mascotas en la tabla mascotas_adopcion_descripcion para verificar disponibilidad
    $sql_check = "SELECT disponibilidad FROM mascotas_adopcion_descripcion WHERE id_mascota ='$mascota_id'";
    $result_check = mysqli_query($conexion, $sql_check);

    if ($result_check === false) {
        echo json_encode(["success" => false, "message" => "Error en la consulta: " . mysqli_error($conexion)]);
        exit;
    }

    $row_check = mysqli_fetch_assoc($result_check);
    if (!$row_check['disponibilidad']) {
        echo json_encode(["success" => false, "message" => "La mascota con ID $mascota_id ya ha sido adoptada."]);
        exit;
    }

    // Consultar las mascotas en la tabla mascotas_comparar
    $sql = "SELECT * FROM mascotas_comparar WHERE 
            id_mascota ='$mascota_id' AND 
            tamano='$tamano' AND 
            descansar='$descansar' AND 
            comporte='$comporte' AND 
            fisica='$fisica' AND 
            experiencia='$experiencia' AND 
            juguete='$juguete'";

    $result = mysqli_query($conexion, $sql);

    if ($result === false) {
        echo json_encode(["success" => false, "message" => "Error en la consulta: " . mysqli_error($conexion)]);
        exit;
    }

    if (mysqli_num_rows($result) > 0) {
        // Registrar la adopción en la tabla `adopciones`
        $fecha_adopcion = date('Y-m-d');
        $adoptante_id = $_SESSION['user_id']; // ID del usuario actual, asumido que está en sesión

        $sql_insert = "INSERT INTO adopciones (id_usuario, id_mascota, fecha_adopcion) 
                       VALUES ('$adoptante_id', '$mascota_id', '$fecha_adopcion')";

        if (mysqli_query($conexion, $sql_insert)) {
            // Actualizar disponibilidad de la mascota
            $sql_update = "UPDATE mascotas_adopcion_descripcion SET disponibilidad = false WHERE id_mascota = '$mascota_id'";
            mysqli_query($conexion, $sql_update);

            echo json_encode(["success" => true, "message" => "¡La mascota con ID $mascota_id está lista para adopción!"]);
        } else {
            echo json_encode(["success" => false, "message" => "Error al registrar la adopción: " . mysqli_error($conexion)]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "No cumple con el perfil para la mascota con ID $mascota_id."]);
    }

    mysqli_close($conexion);
} else {
    // Si no es una petición POST, devolver un error
    echo json_encode(["success" => false, "message" => "Método de solicitud no válido."]);
}
?>
