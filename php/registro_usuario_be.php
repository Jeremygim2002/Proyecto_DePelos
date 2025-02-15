<?php
include 'conexion_be.php';

$nombre_completo = mysqli_real_escape_string($conexion_login_register, $_POST['nombre_completo']);
$correo = mysqli_real_escape_string($conexion_login_register, $_POST['correo']);
$usuario = mysqli_real_escape_string($conexion_login_register, $_POST['usuario']);
$contrasena = mysqli_real_escape_string($conexion_login_register, $_POST['contrasena']);

// Encriptar contraseña con hash sha512 (considera usar password_hash() para mayor seguridad)
$contrasena = hash('sha512', $contrasena);

// Verificar que el correo y el usuario no estén duplicados en la base de datos login_register_db
$verificar_correo = mysqli_query($conexion_login_register, "SELECT * FROM usuarios WHERE correo = '$correo'");
$verificar_usuario = mysqli_query($conexion_login_register, "SELECT * FROM usuarios WHERE usuario = '$usuario'");

if (mysqli_num_rows($verificar_correo) > 0) {
    mostrarAlerta("error", "Correo duplicado", "Este correo ya está registrado, intenta con otro diferente");
} elseif (mysqli_num_rows($verificar_usuario) > 0) {
    mostrarAlerta("error", "Usuario duplicado", "Este usuario ya está registrado, intenta con otro diferente");
} else {
    // Insertar usuario en la base de datos login_register_db
    $query = "INSERT INTO usuarios (nombre_completo, correo, usuario, contrasena) 
              VALUES('$nombre_completo', '$correo', '$usuario', '$contrasena')";
    
    $ejecutar = mysqli_query($conexion_login_register, $query);

    if ($ejecutar) {
        mostrarAlerta("success", "Registro exitoso", "Usuario almacenado correctamente");
    } else {
        mostrarAlerta("error", "Error", "Inténtalo de nuevo, usuario no almacenado");
    }
}

mysqli_close($conexion_login_register);

function mostrarAlerta($tipo, $titulo, $texto) {
    echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: '$tipo',
                    title: '$titulo',
                    text: '$texto'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = '../index.php';
                    }
                });
            });
        </script>
    ";
    exit();
}
?>

