<?php
// Incluir el archivo de conexión
include 'conexion_be.php';

// Función para obtener los datos de la mascota
function obtenerDatosMascota($id_mascota) {
    global $conexion_login_register;

    // Consulta para obtener los datos de la mascota de las tablas relacionadas
    $query = "
        SELECT 
            mascotas_adopcion_descripcion.*, 
            tipo_animal.tipo,
            mascotas_adopcion.imagen 
        FROM 
            mascotas_adopcion_descripcion
        JOIN 
            mascotas_adopcion ON mascotas_adopcion_descripcion.id_mascota = mascotas_adopcion.id_mascota
        JOIN 
            tipo_animal ON mascotas_adopcion.id_tipo = tipo_animal.id_tipo
        WHERE 
            mascotas_adopcion_descripcion.id_mascota = $id_mascota";

    $resultado = mysqli_query($conexion_login_register, $query);

    // Verificar si la consulta se ejecutó correctamente
    if (!$resultado) {
        die("Error en la consulta a la base de datos: " . mysqli_error($conexion_login_register));
    }

    // Obtener los datos de la mascota
    $mascota = mysqli_fetch_assoc($resultado);

    // Verificar si se encontraron datos
    if (!$mascota) {
        die("No se encontraron datos para la mascota seleccionada.");
    }

    // Liberar el resultado
    mysqli_free_result($resultado);

    return $mascota;
}
?>
