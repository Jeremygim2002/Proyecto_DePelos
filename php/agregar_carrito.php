<?php
session_start(); // Iniciar sesión si aún no se ha iniciado
include 'conexion_be.php';

// Verificar si los datos fueron enviados
if (isset($_POST['id_producto'], $_POST['nombre'], $_POST['marca'], $_POST['precio'], $_POST['imagen'])) {
    if (!isset($_SESSION['carrito_id'])) {
        // Asignar un carrito_id si no está definido en la sesión
        $_SESSION['carrito_id'] = uniqid(); // Generar un ID único para el carrito
    }
    
    $carrito_id = $_SESSION['carrito_id'];
    $id_producto = $_POST['id_producto'];
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];
    $cantidad = 1; // Puedes ajustar esto según la lógica de tu aplicación.

    // Verificar si el producto ya está en el carrito
    $sql_check = "SELECT * FROM carrito WHERE carrito_id = '$carrito_id' AND id_producto = $id_producto";
    $result_check = mysqli_query($conexion_shopping_cart, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {
        // Si el producto ya está en el carrito, actualizar la cantidad
        $sql_update = "UPDATE carrito SET cantidad = cantidad + 1 WHERE carrito_id = '$carrito_id' AND id_producto = $id_producto";
        mysqli_query($conexion_shopping_cart, $sql_update);
    } else {
        // Si el producto no está en el carrito, insertarlo
        $sql_insert = "INSERT INTO carrito (carrito_id, id_producto, nombre, marca, precio, imagen, cantidad) 
                       VALUES ('$carrito_id', $id_producto, '$nombre', '$marca', $precio, '$imagen', $cantidad)";
        mysqli_query($conexion_shopping_cart, $sql_insert);
    }

    echo 'Producto agregado al carrito';
} else {
    echo 'Datos incompletos';
}
?>
