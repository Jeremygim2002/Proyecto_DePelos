<?php

session_start();

//Conexion a la bd
include 'conexion_be.php';

//Crear variables
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$contrasena = hash('sha512', $contrasena);

//Tener acceso a la conexion y seleccionar correo y contrsena de ella
$validar_login = mysqli_query($conexion_login_register, "SELECT * FROM usuarios WHERE correo = '$correo' AND contrasena = '$contrasena'");

if (mysqli_num_rows($validar_login) > 0) {
    // Obtener los datos del usuario autenticado
    $fila = mysqli_fetch_assoc($validar_login);
    
    // Establecer variables de sesión
    $_SESSION['usuario'] = $correo;
    $_SESSION['user_id'] = $fila['id_usuario']; // Almacenar también el ID del usuario

    header("location: ../bienvenida.php");
    exit();
} else {
    echo '
    <script>
        alert("El usuario no existe, pon otro");
        window.location = "../index.php";
    </script>
    ';
    exit();
}
?>