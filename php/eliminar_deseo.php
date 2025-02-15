<?php
include 'conexion_be.php'; // Conectar a la base de datos

$id_deseo = $_POST['id_deseo'];

// Eliminar el producto de la lista de deseos
$sql = "DELETE FROM deseos WHERE id_deseo = '$id_deseo'";

if (mysqli_query($conexion_shopping_cart, $sql)) {
    echo "Producto eliminado de la lista de deseos.";
} else {
    echo "Error al eliminar el producto de la lista de deseos: " . mysqli_error($conexion_shopping_cart);
}

mysqli_close($conexion_shopping_cart);
?>
