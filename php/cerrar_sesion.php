<?php

session_start();

// Incluir el archivo de conexión a la base de datos
include 'conexion_be.php';

// Consulta SQL para eliminar todos los registros de la tabla carrito
$query_carrito = "DELETE FROM carrito";
$result_carrito = mysqli_query($conexion_shopping_cart, $query_carrito);

// Verificar si la consulta para eliminar el carrito se ejecutó correctamente
if ($result_carrito) {
    echo "Se han eliminado todos los registros de la tabla carrito.";
} else {
    echo "Error al eliminar el carrito: " . mysqli_error($conexion_shopping_cart);
}

// Consulta SQL para eliminar todos los registros de la tabla deseos
$query_deseos = "DELETE FROM deseos";
$result_deseos = mysqli_query($conexion_shopping_cart, $query_deseos);

// Verificar si la consulta para eliminar los deseos se ejecutó correctamente
if ($result_deseos) {
    echo "Se han eliminado todos los registros de la tabla deseos.";
} else {
    echo "Error al eliminar los deseos: " . mysqli_error($conexion_shopping_cart);
}

// Cerrar la conexión
mysqli_close($conexion_shopping_cart);

// Destruir la sesión
session_destroy();

// Redirigir al usuario a la página de inicio
header("location: ../index.php");
exit();

?>
