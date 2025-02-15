<?php
include 'conexion_be.php'; // Conectar a la base de datos

$id_producto = $_POST['id_producto'];

// Verificar si el producto ya está en la lista de deseos
$sql_verificar = "SELECT * FROM deseos WHERE id_producto = '$id_producto'";
$result_verificar = mysqli_query($conexion_shopping_cart, $sql_verificar);

if (mysqli_num_rows($result_verificar) > 0) {
    // Producto ya existe en la lista de deseos
    echo "Error: Este producto ya se encuentra en la lista de deseos.";
} else {
    // Obtener detalles del producto
    $sql_producto = "SELECT * FROM producto WHERE id_producto = '$id_producto'";
    $result_producto = mysqli_query($conexion_shopping_cart, $sql_producto);
    $row = mysqli_fetch_assoc($result_producto);

    if ($row) {
        // Insertar el producto en la lista de deseos
        $sql = "INSERT INTO deseos (id_producto) VALUES ('$id_producto')";
        if (mysqli_query($conexion_shopping_cart, $sql)) {
            echo "Producto añadido a la lista de deseos.";
        } else {
            echo "Error al añadir el producto: " . mysqli_error($conexion_shopping_cart);
        }
    } else {
        echo "Error: Producto no encontrado.";
    }
}

// Cerrar la conexión
mysqli_close($conexion_shopping_cart);
?>
