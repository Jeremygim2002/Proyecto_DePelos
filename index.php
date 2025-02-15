<?php

session_start();

if (isset($_SESSION['usuario'])) {
    header("location: bienvenida.php");
}

?>


<!DOCTYPE html>
<html lang="es">

<head>

    <!-- Metadatos -->
    <meta charset="UTF-8">
    <meta name="author" content="jremygim">
    <meta name="description" content="Proyecto para adopción de mascotas. Adémas, consejos y venta de productos para los mismos">
    <meta name="keywords" content="Adopción de mascotas, Venta de productos, Perros, Gatos, Consejos para cuidar mascotas, Salud de mascotas, Juguetes para mascotas, Alimentos para mascotas">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Título -->
    <title>DePelos | Login</title>

    <!-- Favicon -->
    <link rel="icon" href="images/icon/icon_2.png">

    <!-- Estilos de letra -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Hoja de estilo -->
    <link rel="stylesheet" href="style.css">


    <!-- SweetAlert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <!------ Crear cuenta ------->
    <div class="container-form register">
        <!-- Informacion -->
        <div class="information">
            <div class="info-childs">
                <h2>¡Bienvenido a bordo!</h2>
                <p>Descubre compañeros leales de 4 patas</p>
                <input type="button" value="Iniciar Sesión" id="sign-in">
            </div>
        </div>

        <!-- Interaccion -->
        <div class="form-information">
            <div class="form-information-childs">
                <h2>Crear una Cuenta</h2>
                <div class="icons">
                    <i class='bx bxs-dog'></i>
                    <i class='bx bxs-cat'></i>
                </div>
                <form action="php/registro_usuario_be.php" method="POST" class="form form-register">
                    <div>
                        <label>
                            <i class='bx bx-user'></i>
                            <input type="text" placeholder="Nombre Completo" name="nombre_completo">
                        </label>
                    </div>
                    <div>
                        <label>
                            <i class='bx bx-envelope'></i>
                            <input type="email" placeholder="Correo Electronico" name="correo">
                        </label>
                    </div>
                    <div>
                        <label>
                            <i class='bx bx-user-circle'></i>
                            <input type="text" placeholder="Usuario" name="usuario">
                        </label>
                    </div>
                    <div>
                        <label>
                            <i class='bx bx-lock-alt'></i>
                            <input type="password" placeholder="Contraseña" name="contrasena">
                        </label>
                    </div>

                    <input type="submit" value="Registrarse">
                </form>
            </div>
        </div>
    </div>

    <!-------------------------------------------------------------------------------------->
    <!----- Iniciar Sesion ------->
    <div class="container-form login hide">
        <!-- Informacion -->
        <div class="information">
            <div class="info-childs">
                <h2>¡Bienvenido nuevamente!</h2>
                <p>Regresa y sigue creando vínculos especiales</p>
                <input type="button" value="Registrarse" id="sign-up">
            </div>
        </div>

        <!-- Interaccion -->
        <div class="form-information">
            <div class="form-information-childs">
                <h2>Iniciar Sesión</h2>
                <div class="icons">
                    <i class='bx bxs-dog'></i>
                    <i class='bx bxs-cat'></i>
                </div>
                <form action="php/login_usuario_be.php" method="POST" class="form form-login">
                    <div>
                        <label>
                            <i class='bx bx-envelope'></i>
                            <input type="email" placeholder="Correo Electronico" name="correo">
                        </label>
                    </div>
                    <div>
                        <label>
                            <i class='bx bx-lock-alt'></i>
                            <input type="password" placeholder="Contraseña" name="contrasena">
                        </label>
                    </div>
                    <input type="submit" value="Iniciar Sesión">
                </form>
            </div>
        </div>

    </div>
    <script src="js/script.js"></script>
    <script src="js/keyboard.js"></script>
</body>

</html>