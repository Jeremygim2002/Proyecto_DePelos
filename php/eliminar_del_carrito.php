<?php
include 'conexion_be.php';

if (isset($_GET['id_carrito'])) {
    $id_carrito = $_GET['id_carrito'];

    // Consulta para eliminar el producto del carrito
    $sql_delete = "DELETE FROM carrito WHERE id_carrito = $id_carrito";
    $result_delete = mysqli_query($conexion_shopping_cart, $sql_delete);

    if ($result_delete) {
        header("Location: ../carrito.php");
        exit();
    } else {
        echo "Error al eliminar el producto del carrito: " . mysqli_error($conexion_shopping_cart);
    }
} else {
    echo "ID del producto del carrito no especificado.";
}

mysqli_close($conexion_shopping_cart);
?>
