<?php
include 'conexion_be.php';

// Verificar si se reciben los datos por POST
if (isset($_POST['id_carrito']) && isset($_POST['nuevaCantidad'])) {
    $id_carrito = $_POST['id_carrito'];
    $nuevaCantidad = $_POST['nuevaCantidad'];

    // Actualizar la cantidad en la tabla carrito
    $sql_update = "UPDATE carrito SET cantidad = $nuevaCantidad WHERE id_carrito = $id_carrito";
    $resultado = mysqli_query($conexion_shopping_cart, $sql_update);

    if ($resultado) {
        echo 'Cantidad actualizada correctamente';
    } else {
        echo 'Error al actualizar la cantidad en la base de datos';
    }
} else {
    echo 'Datos incompletos';
}

mysqli_close($conexion_shopping_cart);
?>

