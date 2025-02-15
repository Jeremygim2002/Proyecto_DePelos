<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario']) || !isset($_SESSION['user_id'])) {
    echo '
    <script>
        alert("Inicia sesión por favor");
        window.location = "index.php";
    </script>
    ';

    // Destruir la sesión y detener el script
    session_destroy();
    exit();
}


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
  <title>DePelos | Home</title>


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



  <!-------------------------------- Seccion 1 (Anuncios) -------------------------------->
  <!-- ================================================================================ -->

  <section id="banner" style="background: #F9F3EC;">
    <div class="container">
        <div class="swiper main-swiper">
            <div class="swiper-wrapper">

                <!-- Adopta -->
                <div class="swiper-slide py-5">
                    <div class="row banner-content align-items-center">
                        <div class="img-wrapper col-md-5">
                            <img src="images/anuncio_1.png" class="img-fluid">
                        </div>
                        <div class="content-wrapper col-md-7 p-5 mb-5">
                            <div class="secondary-font text-primary text-uppercase mb-4">Adopta una mascota</div>
                            <h2 class="banner-title display-1 fw-normal">Encuentra tu <span class="text-primary">compañero
                                    ideal</span>
                            </h2>
                            <a href="adoptar.php" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                                Adopta ahora
                                <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                                    <use xlink:href="#arrow-right"></use>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Compra -->
                <div class="swiper-slide py-5">
                    <div class="row banner-content align-items-center">
                        <div class="img-wrapper col-md-5">
                            <img src="images/anuncio_2.png" class="img-fluid">
                        </div>
                        <div class="content-wrapper col-md-7 p-5 mb-5">
                            <div class="secondary-font text-primary text-uppercase mb-4">Descuentos del 10% - 20%</div>
                            <h2 class="banner-title display-1 fw-normal">La mejor tienda para <span class="text-primary">tus
                                    mascotas</span>
                            </h2>
                            <a href="comprar.php"
                                class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                                Compra ahora
                                <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                                    <use xlink:href="#arrow-right"></use>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Perdidos -->
                <div class="swiper-slide py-5">
                    <div class="row banner-content align-items-center">
                        <div class="img-wrapper col-md-5">
                            <img src="images/anuncio_3.png" class="img-fluid">
                        </div>
                        <div class="content-wrapper col-md-7 p-5 mb-5">
                            <div class="secondary-font text-primary text-uppercase mb-4">Ayuda a reunir familias</div>
                            <h2 class="banner-title display-1 fw-normal">Encuentra <span class="text-primary">mascotas
                                    perdidas</span>
                            </h2>
                            <a href="perdidos.php"
                                class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                                Ver publicaciones
                                <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                                    <use xlink:href="#arrow-right"></use>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="swiper-pagination mb-5"></div>
        </div>
    </div>
</section> 





  <!-------------------------------- Seccion 2 (Iconos de que hay) -------------------------------->
  <!-- ========================================================================================= -->
  <section id="categories">
    <div class="container my-3 py-5">
      <div class="row my-5">
        <div class="col text-center">
          <a class="categories-item">
            <iconify-icon class="category-icon" icon="ph:bowl-food"></iconify-icon>
            <h5>Comida</h5>
          </a>
        </div>
        <div class="col text-center">
          <a class="categories-item">
            <iconify-icon class="category-icon" icon="ph:tennis-ball-duotone"></iconify-icon>
            <h5>Accesorios</h5>
          </a>
        </div>
        <div class="col text-center">
          <a class="categories-item">
            <iconify-icon class="category-icon" icon="mdi:clothes-hanger"></iconify-icon>
            <h5>Ropa</h5>
          </a>
        </div>
        <div class="col text-center">
          <a class="categories-item">
            <iconify-icon class="category-icon" icon="ph:dog"></iconify-icon>
            <h5>Perros</h5>
          </a>
        </div>
        <div class="col text-center">
          <a class="categories-item">
            <iconify-icon class="category-icon" icon="ph:cat"></iconify-icon>
            <h5>Gatos</h5>
          </a>
        </div>
      </div>
    </div>
  </section>





  <!-------------------------------- Seccion 3 (Ropa para mascotas) -------------------------------->
  <!-- ======================================================================================== -->
  <section id="clothing" class="my-5 overflow-hidden">
        <div class="container pb-5">
            <div class="section-header d-md-flex justify-content-between align-items-center mb-3">
                <h2 class="display-3 fw-normal">Ropa</h2>
                <div>
                    <a href="comprar.php" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                        Comprar ahora
                        <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                            <use xlink:href="#arrow-right"></use>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="products-carousel swiper">
                <div class="swiper-wrapper">
                    <?php
                    // Incluir la lógica PHP para obtener productos
                    include 'php/insertar_todos.php';

                    // Definir el prefijo para las imágenes
                    $ruta_imagenes = 'images/';

                    // Filtrar solo los productos de categoría "Ropa"
                    $productos_ropa = array_filter($productos, function($producto) {
                        return $producto['nombre_categoria'] === 'ROPA';
                    });

                    // Mostrar productos de ropa
                    if (!empty($productos_ropa)) {
                        foreach ($productos_ropa as $producto) {
                    ?>
                    <div class="swiper-slide d-flex justify-content-center">
                        <div class="card position-relative">
                            <a><img src="<?php echo $ruta_imagenes . $producto['imagen']; ?>" class="img-fluid rounded-4 swiper-lazy" alt="image"></a>
                            <div class="card-body p-0">
                                <a>
                                    <h3 class="card-title pt-4 m-0"><?php echo $producto['marca']; ?></h3>
                                    <p><?php echo $producto['nombre_producto']; ?></p>
                                </a>
                                <div class="card-text">
                                    <h3 class="secondary-font text-primary">S/ <?php echo $producto['precio']; ?></h3>
                                    <div class="d-flex justify-content-between mt-3 w-100">
                                        <a href="comprar.php" class="btn-cart me-3 flex-grow-1 text-center">
                                            <h5 class="text-uppercase m-0">COMPRAR</h5>
                                        </a>
                                        <a href="comprar.php" class="btn-wishlist flex-grow-1 d-flex align-items-center justify-content-center">
                                            <iconify-icon icon="fluent:heart-28-filled" class="wishlist-icon"></iconify-icon>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    } else {
                        echo "<p>No se encontraron productos de Ropa.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>






  
    <!---------------------------- Seccion 4 (Alimento para mascotas) ---------------------------->
  <!-- ======================================================================================== -->
  <section id="foodies" class="my-5">
        <div class="container my-5 py-5">
            <div class="section-header d-md-flex justify-content-between align-items-center">
                <h2 class="display-3 fw-normal">Alimento</h2>
                <div class="mb-4 mb-md-0">
                    <p class="m-0">
                        <button class="filter-button me-4 active" data-filter="*">Todo</button>
                        <button class="filter-button me-4" data-filter=".perro">Perro</button>
                        <button class="filter-button me-4" data-filter=".gato">Gato</button>
                    </p>
                </div>
                <div>
                    <a href="comprar.php" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                        Comprar ahora
                        <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                            <use xlink:href="#arrow-right"></use>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="isotope-container row">
                <?php 
                // Filtrar solo los productos de categoría "Comida"
                $productos_comida = array_filter($productos, function($producto) {
                    return $producto['nombre_categoria'] === 'COMIDA';
                });

                // Mostrar alimentos
                if (!empty($productos_comida)) { 
                    foreach ($productos_comida as $producto) { ?>
                        <div class="item <?php echo strtolower($producto['tipo_animal']); ?> col-md-4 col-lg-3 my-4">
                            <div class="card position-relative">
                                <a><img src="<?php echo $ruta_imagenes . $producto['imagen']; ?>" class="img-fluid rounded-4" alt="image"></a>
                                <div class="card-body p-0">
                                    <a>
                                        <h3 class="card-title pt-4 m-0"><?php echo $producto['marca']; ?></h3>
                                        <p><?php echo $producto['nombre_producto']; ?></p>
                                    </a>
                                    <div class="card-text">
                                        <h3 class="secondary-font text-primary">S/ <?php echo number_format($producto['precio'], 2); ?></h3>
                                        <div class="d-flex flex-wrap mt-3">
                                            <a href="comprar.php" class="btn-cart me-3 px-4 pt-3 pb-3">
                                                <h5 class="text-uppercase m-0">COMPRAR</h5>
                                            </a>
                                            <a href="comprar.php" class="btn-wishlist px-4 pt-3">
                                                <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php 
                    } 
                } else { 
                    echo "<p>No se encontraron productos de Alimento.</p>"; 
                } ?>
            </div>
        </div>
    </section>






  <!-------------------------------- Seccion 5 (Ultimas Noticias) ------------------------------------->
  <!-- ============================================================================================= -->
  <section id="banner-2" class="my-3" style="background: #F9F3EC;">
    <div class="container">
      <div class="row flex-row-reverse banner-content align-items-center">
        <div class="img-wrapper col-12 col-md-6">
          <img src="images/anuncio_4.png" class="img-fluid">
        </div>
        <div class="content-wrapper col-12 offset-md-1 col-md-5 p-5">
          <div class="secondary-font text-primary text-uppercase mb-3 fs-4">Actualizaciones recientes</div>
          <h2 class="banner-title display-1 fw-normal">Las útimas noticias</h2>
          <a href="noticias.php" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
            VER NOTICIAS
            <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
              <use xlink:href="#arrow-right"></use>
            </svg></a>
        </div>
      </div>
    </div>
  </section>





  <!------------------------------------ Seccion 6 (Accesorios) --------------------------------------->
  <!-- ============================================================================================= -->
  <section id="clothing" class="my-5 overflow-hidden">
        <div class="container pb-5">
            <div class="section-header d-md-flex justify-content-between align-items-center mb-3">
                <h2 class="display-3 fw-normal">Accesorios</h2>
                <div>
                    <a href="comprar.php" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                        Comprar ahora
                        <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                            <use xlink:href="#arrow-right"></use>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="products-carousel swiper">
                <div class="swiper-wrapper">
                    <?php
                    // Filtrar solo los productos de categoría "Accesorios"
                    $productos_accesorios = array_filter($productos, function($producto) {
                        return $producto['nombre_categoria'] === 'ACCESORIOS';
                    });

                    // Mostrar productos de accesorios
                    if (!empty($productos_accesorios)) {
                        foreach ($productos_accesorios as $producto) {
                    ?>
                    <div class="swiper-slide d-flex justify-content-center">
                        <div class="card position-relative">
                            <a><img src="<?php echo $ruta_imagenes . $producto['imagen']; ?>" class="img-fluid rounded-4 swiper-lazy" alt="image"></a>
                            <div class="card-body p-0">
                                <a>
                                    <h3 class="card-title pt-4 m-0"><?php echo $producto['marca']; ?></h3>
                                    <p><?php echo $producto['nombre_producto']; ?></p>
                                </a>
                                <div class="card-text">
                                    <h3 class="secondary-font text-primary">S/ <?php echo $producto['precio']; ?></h3>
                                    <div class="d-flex justify-content-between mt-3 w-100">
                                        <a href="comprar.php" class="btn-cart me-3 flex-grow-1 text-center">
                                            <h5 class="text-uppercase m-0">COMPRAR</h5>
                                        </a>
                                        <a href="comprar.php" class="btn-wishlist flex-grow-1 d-flex align-items-center justify-content-center">
                                            <iconify-icon icon="fluent:heart-28-filled" class="wishlist-icon"></iconify-icon>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    } else {
                        echo "<p>No se encontraron productos de Accesorios.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>






<?php include 'descuento.php'; ?>

<?php include 'beneficios.php'; ?>

<?php include 'footer_insta.php'; ?>




  <script src="js/jquery-1.11.0.min.js"></script>
  <script src="js/swiper.js"></script>
  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/script2.js"></script>
  <script src="js/iconify.js"></script>
</body>

</html>