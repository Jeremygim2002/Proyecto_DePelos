<?php
// Conexión a la base de datos login_register_db
$conexion_login_register = mysqli_connect("localhost", "root", "", "login_register_db");

// Verificar la conexión a login_register_db
if (!$conexion_login_register) {
    die("Conexión fallida con login_register_db: " . mysqli_connect_error());
}

// Conexión a la base de datos shopping_cart_db
$conexion_shopping_cart = mysqli_connect("localhost", "root", "", "shopping_cart_db");

// Verificar la conexión a shopping_cart_db
if (!$conexion_shopping_cart) {
    die("Conexión fallida con shopping_cart_db: " . mysqli_connect_error());
}
?>





 