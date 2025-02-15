
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
  <title>DePelos | Noticias</title>


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
        <h2 class="display-1 mt-3 mb-0">Noticias <span class="text-primary">Curiosas</span></h2>
        <nav class="breadcrumb">
          <a class="breadcrumb-item nav-link" href="bienvenida.php">Home</a>
          <span class="breadcrumb-item active" aria-current="page">Noticias</span>
        </nav>
      </div>
    </div>
  </section>




  <!-------------------------------- Seccion 2 (Noticias) -------------------------------->
  <!-- ================================================================================ -->
  <div class="my-5 py-5">
    <div class="container">
      <div class="row entry-container">

        <div class="entry-item col-md-4 my-4">
          <div class="z-1 position-absolute rounded-3 m-2 px-3 pt-1 bg-light">
            <h3 class="secondary-font text-primary m-0">21</h3>
            <p class="secondary-font fs-6 m-0">Mayo</p>
            <p class="secondary-font fs-6 m-0">2024</p>
          </div>
          <div class="card position-relative">
            <a href="noticias_1.html"><img src="images/noticia_1.jpg" class="img-fluid rounded-4" alt="image"></a>
            <div class="card-body p-0">
              <a href="noticias_1.html">
                <h3 class="card-title pt-4 pb-3 m-0">ADIESTRAMIENTO BÁSICO PARA PERROS: GUÍA INICIAL</h3>
              </a>
              <div class="card-text">
                <p class="blog-paragraph fs-6">El adiestramiento canino es una parte esencial de la vida de tu perro. No
                  solo mejora la convivencia diaria, sino...</p>
                <a href="noticias_1.html" class="blog-read">Leer más</a>
              </div>
            </div>
          </div>
        </div>

        <div class="entry-item col-md-4 my-4">
          <div class="z-1 position-absolute rounded-3 m-2 px-3 pt-1 bg-light">
            <h3 class="secondary-font text-primary m-0">22</h3>
            <p class="secondary-font fs-6 m-0">Junio</p>
            <p class="secondary-font fs-6 m-0">2024</p>
          </div>
          <div class="card position-relative">
            <a href="noticias_2.html"><img src="images/noticia_2.jpg" class="img-fluid rounded-4" alt="image"></a>
            <div class="card-body p-0">
              <a href="noticias_2.html">
                <h3 class="card-title pt-4 pb-3 m-0">CÓMO ESTIMULAR MENTALMENTE A TU GATO</h3>
              </a>
              <div class="card-text">
                <p class="blog-paragraph fs-6">En este artículo veremos la importancia de la estimulación mental para
                  los gatos, destacando cómo actividades creativas y juegos no...</p>
                <a href="noticias_2.html" class="blog-read">Leer más</a>
              </div>

            </div>
          </div>
        </div>

        <div class="entry-item col-md-4 my-4">
          <div class="z-1 position-absolute rounded-3 m-2 px-3 pt-1 bg-light">
            <h3 class="secondary-font text-primary m-0">23</h3>
            <p class="secondary-font fs-6 m-0">Junio</p>
            <p class="secondary-font fs-6 m-0">2024</p>
          </div>
          <div class="card position-relative">
            <a href="noticias_3.html"><img src="images/noticia_3.jpg" class="img-fluid rounded-4" alt="image"></a>
            <div class="card-body p-0">
              <a href="noticias_3.html">
                <h3 class="card-title pt-4 pb-3 m-0">¿CÓMO PUEDE AYUDARTE TU MASCOTA A SUPERAR UNA RUPTURA AMOROSA?</h3>
              </a>
              <div class="card-text">
                <p class="blog-paragraph fs-6">Las rupturas de pareja pueden llegar a ser muy traumáticas, pero tener
                  una mascota trae una serie de beneficios para...</p>
                <a href="noticias_3.html" class="blog-read">Leer más</a>
              </div>

            </div>
          </div>
        </div>

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