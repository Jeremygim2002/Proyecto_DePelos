<?php
// Incluir el archivo de consulta de mascotas perdidas
include 'php/insertar_perdidos.php';
?>

<!DOCTYPE html>
<html lang="en">

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
  <title>DePelos | Perdidos</title>


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



  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->


</head>

<body>


<?php include 'header_includes.php'; ?>



  <!-------------------------------- Seccion 1 (Título) -------------------------------->
  <!-- ============================================================================== -->

  <section id="banner" class="py-3" style="background: #F9F3EC;">
    <div class="container">
      <div class="hero-content py-5 my-3">
        <h2 class="display-1 mt-3 mb-0">Mascotas <span class="text-primary">Perdidas</span></h2>
        <nav class="breadcrumb">
          <a class="breadcrumb-item nav-link" href="bienvenida.php">Home</a>
          <span class="breadcrumb-item active" aria-current="page">Perdidos</span>
        </nav>
      </div>
    </div>
  </section>





  <!-------------------------------- Seccion 2 (Perdidos) -------------------------------->
  <!-- ================================================================================ -->

<div class="my-5 py-5" style="overflow-y: auto;">
    <div class="container">
        <div class="row entry-container">

            <?php if (!empty($mascotas_perdidas)) : ?>
                <?php foreach ($mascotas_perdidas as $mascota) : ?>
                    <div class="entry-item col-md-4 my-4">
                        <div class="z-1 position-absolute rounded-3 m-2 px-3 pt-1 bg-light">
                            <h3 class="secondary-font text-primary m-0"><?= $mascota['dia_perdido'] ?></h3>
                            <p class="secondary-font fs-6 m-0"><?= $mascota['mes_perdido'] ?></p>
                        </div>
                        <div class="card position-relative">
                            <a><img src="images/<?= $mascota['imagen_perdidos'] ?>.jpg" class="img-fluid rounded-4" alt="image"></a>
                            <div class="card-body p-0">
                                <a>
                                    <h3 class="card-title pt-4 pb-3 m-0"><?= $mascota['titulo'] ?></h3>
                                </a>
                                <div class="card-text">
                                    <p class="blog-paragraph fs-6"><?= $mascota['descripcion'] ?></p>
                                    <a class="blog-read">CONTACTO: <?= $mascota['contacto'] ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No se encontraron mascotas perdidas.</p>
            <?php endif; ?>

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