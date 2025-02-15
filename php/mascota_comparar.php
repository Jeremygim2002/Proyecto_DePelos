<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener las respuestas del formulario
    $tamano = $_POST['tamano'];
    $descansar = $_POST['descansar'];
    $comporte = $_POST['comporte'];
    $fisica = $_POST['fisica'];
    $experiencia = $_POST['experiencia'];
    $juguete = $_POST['juguete'];
    $mascota_id = $_POST['mascota_id']; // Identificador de la mascota

    // Incluir el archivo de conexión
    include('conexion_be.php');

    // Usar la conexión a login_register_db
    if (isset($conexion_login_register)) {
        $conexion = $conexion_login_register;
    } else {
        die("Error: No se pudo establecer la conexión a login_register_db.");
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
        die("Error en la consulta: " . mysqli_error($conexion));
    }

    if (mysqli_num_rows($result) > 0) {
        // Si hay coincidencias
        echo "¡La mascota con ID $mascota_id está lista para adopción, en breves minutos se le enviará un correo para culminar la adopción!";
    } else {
        echo "No cumple con el perfil para la mascota con ID $mascota_id.";
    }

    mysqli_close($conexion);
}
?>



