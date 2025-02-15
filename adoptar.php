
<?php
// Incluir el archivo de conexión
include 'php/conexion_be.php';

// Verificar si se ha seleccionado una categoría para filtrar
$categoriaSeleccionada = isset($_GET['categoria']) ? $_GET['categoria'] : '';

// Definir la consulta base con JOIN para obtener los datos de `mascotas_adopcion` y `tipo_animal`
$query = "SELECT mascotas_adopcion.id_mascota, mascotas_adopcion.imagen, tipo_animal.tipo 
          FROM mascotas_adopcion 
          JOIN tipo_animal ON mascotas_adopcion.id_tipo = tipo_animal.id_tipo";

// Modificar la consulta si se selecciona una categoría específica
if ($categoriaSeleccionada == 'Perros') {
    $query .= " WHERE tipo_animal.tipo = 'Perro'";
} elseif ($categoriaSeleccionada == 'Gatos') {
    $query .= " WHERE tipo_animal.tipo = 'Gato'";
}

$resultado = mysqli_query($conexion_login_register, $query);
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <!------------------ Metadatos ---------------------->
    <!-- ============================================= -->
    <meta charset="UTF-8">
    <meta name="author" content="jremygim">
    <meta name="description"
        content="Proyecto para adopción de mascotas. Adémas, consejos y venta de productos para los mismos">
    <meta name="keywords"
        content="Adopción de mascotas, Venta de productos, Perros, Gatos, Consejos para cuidar mascotas, Salud de mascotas, Juguetes para mascotas, Alimentos para mascotas">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Los numeros de teléfono no se conviertan en enlaces -->
    <meta name="format-detection" content="telephone=no">
    <!-- La web se pueda ejecutar en pantalla completa (IOS) -->
  <meta name="mobile-web-app-capable" content="yes">


    <!------------------ Titulo ---------------------->
    <!-- ============================================= -->
    <title>DePelos | Adoptar</title>


    <!------------------ Favicon ---------------------->
    <!-- ============================================= -->
    <link type="image/png" sizes="96x96" rel="icon" href="/images/icon/icon_2.png">


    <!------------------ Estilos de letra ---------------------->
    <!-- ==================================================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Chilanka&family=Lilita+One&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">


    <!------------------ Estilos CSS ---------------------->
    <!-- =============================================== -->
    <link rel="stylesheet" href="css/swiper.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/vendor.css">
    <link rel="stylesheet" type="text/css" href="style2.css">





    <!-- Deja utilizar los iconos -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">




    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->

</head>

<body>


<?php include 'header_includes.php'; ?>



    <!-------------------------------- Seccion 1 (Título) -------------------------------->
    <!-- ============================================================================== -->
    <section id="banner" class="py-3" style="background: #F9F3EC;">
        <div class="container">
            <div class="hero-content py-5 my-3">
                <h2 class="display-1 mt-3 mb-0">Adopta <span class="text-primary">tu amigo peludo</span> </h2>
                <nav class="breadcrumb">
                    <a class="breadcrumb-item nav-link" href="bienvenida.php">Home</a>
                    <span class="breadcrumb-item breadcrumb" aria-current="page">Adopcion</span>
                </nav>
            </div>
        </div>
    </section>



    <!-------------------------------- Seccion 2 (Cuerpo) -------------------------------->
    <!-- ============================================================================== -->
    <div class="container-xxl py-6 pt-5 py-5" id="project">
    <div class="container">
        <div class="row g-5 mb-5 align-items-center wow fadeInUp" data-wow-delay="0.1s">
            <div class="col-lg-6">
                <h1 class="display-5 mb-0">Mascotas en Adopción</h1>
            </div>
            <div class="col-lg-6 text-lg-end">
                <ul class="list-inline mx-n3 mb-0" id="portfolio-flters">
                    <li class="mx-3 active" data-filter="*" onclick="window.location.href='?categoria='">Todos</li>
                    <li class="mx-3" data-filter=".first" onclick="window.location.href='?categoria=Perros'">Perros</li>
                    <li class="mx-3" data-filter=".second" onclick="window.location.href='?categoria=Gatos'">Gatos</li>
                </ul>
            </div>
        </div>

        <div class="row g-4 portfolio-container wow fadeInUp" data-wow-delay="0.1s">
            <?php
            // Recorrer los resultados y generar el HTML dinámicamente
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $id_mascota = $fila['id_mascota'];
                $imagen = 'images/' . $fila['imagen']; // Concatenar la ruta base con el nombre del archivo
                $tipo = $fila['tipo'];

                // Mostrar cada mascota en adopción
                echo '
                <div class="col-lg-4 col-md-6 portfolio-item ' . strtolower($tipo) . '">
                    <div class="portfolio-img rounded overflow-hidden">
                        <img class="img-fluid" src="' . $imagen . '" alt="">
                        <div class="portfolio-btn">
                            <a class="btn btn-lg-square btn-outline-secondary border-2 mx-1" href="adoptar_individual.php?id=' . $id_mascota . '"><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
</div>

<?php include 'footer_insta.php'; ?>



    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/swiper.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/script2.js"></script>
    <script src="js/iconify.js"></script>

</body>

</html>