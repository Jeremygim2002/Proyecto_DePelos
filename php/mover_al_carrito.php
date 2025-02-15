<?php
session_start();
include 'conexion_be.php'; // Conectar a la base de datos

$id_deseo = $_POST['id_deseo'];
$id_producto = $_POST['id_producto'];

// Verificar si el carrito_id está definido en la sesión, si no, crearlo
if (!isset($_SESSION['carrito_id'])) {
    $_SESSION['carrito_id'] = uniqid('cart_', true);
}

$carrito_id = $_SESSION['carrito_id'];

// Verificar si el producto ya está en el carrito
$sql_verificar_carrito = "SELECT * FROM carrito WHERE carrito_id = '$carrito_id' AND id_producto = '$id_producto'";
$result_verificar_carrito = mysqli_query($conexion_shopping_cart, $sql_verificar_carrito);

if (mysqli_num_rows($result_verificar_carrito) > 0) {
    // Producto ya existe en el carrito, mostrar mensaje de error
    echo "Error: Este producto ya se encuentra en el carrito.";
} else {
    // Obtener los detalles del producto desde la tabla `producto`
    $sql_producto = "SELECT * FROM producto WHERE id_producto = '$id_producto'";
    $result_producto = mysqli_query($conexion_shopping_cart, $sql_producto);
    $row = mysqli_fetch_assoc($result_producto);

    if ($row) {
        // Agregar el producto al carrito
        $imagen = 'images/' . $row['imagen'];

        $sql_insertar = "INSERT INTO carrito (carrito_id, id_producto, nombre, marca, precio, imagen, cantidad) 
                         VALUES ('$carrito_id', '$id_producto', '{$row['nombre']}', '{$row['marca']}', '{$row['precio']}', '$imagen', 1)";
        mysqli_query($conexion_shopping_cart, $sql_insertar);

        // Eliminar el producto de la lista de deseos
        $sql_eliminar = "DELETE FROM deseos WHERE id_deseo = '$id_deseo'";
        mysqli_query($conexion_shopping_cart, $sql_eliminar);

        echo "Producto movido al carrito correctamente.";
    } else {
        echo "Error: No se encontró el producto.";
    }
}

// Cerrar la conexión
mysqli_close($conexion_shopping_cart);
?>
