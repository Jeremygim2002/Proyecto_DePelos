<?php
// Incluir la conexión
include 'conexion_be.php';

// Consulta a la tabla mascotas_perdidas
$sql = "SELECT titulo, descripcion, dia_perdido, mes_perdido, contacto, imagen_perdidos FROM mascotas_perdidas";
$result = mysqli_query($conexion_login_register, $sql);

// Verificar si hay resultados
$mascotas_perdidas = [];
if ($result && mysqli_num_rows($result) > 0) {
    // Almacenar los resultados en un array
    while ($fila = mysqli_fetch_assoc($result)) {
        $mascotas_perdidas[] = $fila;
    }
}

// Cerrar la conexión
mysqli_close($conexion_login_register);
?>
