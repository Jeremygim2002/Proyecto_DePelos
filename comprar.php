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
  <title>DePelos | Comprar</title>


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

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">

</head>
<body>



<?php include 'header_includes.php'; ?>


  <!-------------------------------- Seccion 1 (Título) -------------------------------->
  <!-- ============================================================================== -->
  <section id="banner" class="py-3" style="background: #F9F3EC;">
    <div class="container">
      <div class="hero-content py-5 my-3">
        <h2 class="display-1 mt-3 mb-0">Compra <span class="text-primary">felicidad peluda</span></h2>
        <nav class="breadcrumb">
          <a class="breadcrumb-item nav-link" href="bienvenida.php">Home</a>
          <span class="breadcrumb-item active" aria-current="page">Comprar</span>
        </nav>
      </div>
    </div>
  </section>





  <!-------------------------------- Seccion 2 (Cuerpo)-------------------------------->
  <!-- ============================================================================= -->
  <div class="shopify-grid" id="comprar">
        <div class="container py-5 my-5">
            <div class="row flex-md-row-reverse g-md-5 mb-5">
                <main class="col-md-9">
                    <div class="filter-shop d-md-flex justify-content-between align-items-center">
                        <div class="showing-product">
                            <p class="m-0">Mostrando resultados</p>
                        </div>
                        <div class="sort-by">
                            <select id="sort-select" class="filter-categories border-0 m-0">
                                <option value="default">Por defecto</option>
                                <option value="price-asc">Precio (bajo-alto)</option>
                                <option value="price-desc">Precio (alto-bajo)</option>
                            </select>
                        </div>
                    </div>


                    <div class="product-grid row">
    <?php
    include 'php/insertar_todos.php';
    $ruta_imagenes = 'images/';
    foreach ($productos as $producto):
    ?>
    <div class="col-md-4 my-4 product-item" data-precio="<?php echo $producto['precio']; ?>">
        <div class="card position-relative">
            <a><img src="<?php echo $ruta_imagenes . $producto['imagen']; ?>" class="img-fluid rounded-4" alt="image"></a>
            <div class="card-body p-0"> 
                <a>
                    <h5 class="card-title pt-4 m-0">
                        <span class="text-uppercase"><?php echo $producto['marca']; ?></span><br><?php echo $producto['nombre_producto']; ?>
                    </h5>
                </a>
                <div class="card-text">
                    <h3 class="secondary-font text-primary">S/ <?php echo $producto['precio']; ?></h3>
                    <div class="d-flex flex-wrap mt-3">
                        <a href="#" class="btn-outline-dark-small btn-cart me-3 px-4 pt-3 pb-3" 
                           onclick="agregarAlCarrito(<?php echo $producto['id_producto']; ?>, '<?php echo $producto['nombre_producto']; ?>', '<?php echo $producto['marca']; ?>', <?php echo $producto['precio']; ?>, '<?php echo $ruta_imagenes . $producto['imagen']; ?>')">
                            <h5 class="text-uppercase m-0">Agregar</h5>
                        </a>
                        <a href="#" id="wishlist-<?php echo $producto['id_producto']; ?>" class="btn-wishlist px-4 pt-3" 
                           onclick="agregarADeseos(<?php echo $producto['id_producto']; ?>)">
                            <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>


                </main>

                <aside class="col-md-3 mt-5">
                    <div class="sidebar">
                        <div class="widget-menu">
                            <div class="widget-search-bar">
                                <div class="search-bar border rounded-2 border-dark-subtle pe-3">
                                    <form id="search-form" class="text-center d-flex align-items-center" action="" method="">
                                        <input type="text" class="form-control border-0 bg-transparent" placeholder="Buscar productos" />
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z"/>
                                        </svg>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="widget-product-categories pt-5">
                            <h4 class="widget-title">Categorias</h4>
                            <ul class="product-categories sidebar-list list-unstyled">
                                <li class="cat-item">
                                    <a href="comprar.php?categoria=todos">Todo</a>
                                </li>
                                <li class="cat-item">
                                    <a href="comprar.php?tipo=perros" class="nav-link">Perros</a>
                                </li>
                                <li class="cat-item">
                                    <a href="comprar.php?tipo=gatos" class="nav-link">Gatos</a>
                                </li>
                            </ul>
                        </div>
                        <div class="widget-product-tags pt-3">
                            <h4 class="widget-title">Tipo</h4>
                            <ul class="product-tags sidebar-list list-unstyled">
                                <li class="tags-item">
                                    <a href="comprar.php?categoria=comida" class="nav-link">Comida</a>
                                </li>
                                <li class="tags-item">
                                    <a href="comprar.php?categoria=ropa" class="nav-link">Ropa</a>
                                </li>
                                <li class="tags-item">
                                    <a href="comprar.php?categoria=accesorios" class="nav-link">Accesorios</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="widget-price-filter pt-3">
                        <h4 class="widget-titlewidget-title">Precio</h4>
                        <ul class="product-tags sidebar-list list-unstyled">
                            <li class="tags-item">
                                <a href="comprar.php?precio=10" class="nav-link">Menos que S/ 10</a>
                            </li>
                            <li class="tags-item">
                                <a href="comprar.php?precio=10-50" class="nav-link">S/ 10 - S/ 50</a>
                            </li>
                            <li class="tags-item">
                                <a href="comprar.php?precio=50-100" class="nav-link">S/ 50 - S/ 100</a>
                            </li>
                            <li class="tags-item">
                                <a href="comprar.php?precio=100-500" class="nav-link">S/ 100 - S/ 500</a>
                            </li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>




  <!------------------------------------ Barra lateral Izquierda end -------------------------------------->




<?php include 'descuento.php'; ?>

<?php include 'beneficios.php'; ?>

<?php include 'footer_insta.php'; ?>




<script>
// Función para añadir productos a la lista de deseos
function agregarADeseos(idProducto, nombre, marca, precio, imagen) {
    fetch('php/agregar_a_deseos.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `id_producto=${idProducto}`
    })
    .then(response => response.text())
    .then(data => {
        Swal.fire({
            title: data.includes('ya se encuentra') ? 'Error' : '¡Listo!',
            text: data,
            icon: data.includes('ya se encuentra') ? 'error' : 'success',
            confirmButtonText: 'OK'
        });
    })
    .catch(error => {
        Swal.fire({
            title: 'Error',
            text: 'No se pudo añadir el producto a la lista de deseos.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    });
}


// Ordenar los productos por precio o por defecto
document.getElementById('sort-select').addEventListener('change', function() {
    // Obtener la opción seleccionada
    const sortOrder = this.value;
    // Obtener contenedor de productos
    const productGrid = document.querySelector('.product-grid');
    // Convertir los productos en un array para poder ordenar
    const products = Array.from(productGrid.getElementsByClassName('product-item'));

    // Ordenar los productos basado en la opción seleccionada
    products.sort((a, b) => {
        const priceA = parseFloat(a.getAttribute('data-precio'));
        const priceB = parseFloat(b.getAttribute('data-precio'));

        if (sortOrder === 'price-asc') {
            // Ordenar de menor a mayor precio
            return priceA - priceB;
        } else if (sortOrder === 'price-desc') {
            // Ordenar de mayor a menor precio
            return priceB - priceA;
        } else if (sortOrder === 'default') {
            // Ordenar aleatoriamente (simulando "mejor recomendados" o "más populares")
            return Math.random() - 0.5; // Devuelve un valor aleatorio entre -0.5 y 0.5
        } else {
            // Mantener el orden original para cualquier otra opción que pueda agregarse
            return 0;
        }
    });

    // Vaciar el contenedor de productos y volver a añadirlos en el nuevo orden
    productGrid.innerHTML = '';
    products.forEach(product => productGrid.appendChild(product));
});




// Agregar productos al carrito
function agregarAlCarrito(id_producto, nombre, marca, precio, imagen) {
  $.ajax({
      url: 'php/agregar_carrito.php',
      type: 'POST',
      data: {
          id_producto: id_producto,
          nombre: nombre,
          marca: marca,
          precio: precio,
          imagen: imagen
      },
      success: function(response) {
          // Mostrar SweetAlert 2 en lugar de alerta estándar
          Swal.fire({
              icon: 'success',
              title: '¡Producto agregado!',
              text: 'El producto se ha agregado correctamente al carrito.',
              showConfirmButton: false,
              timer: 1500
          });

          // Opcional: Actualizar la interfaz de usuario para reflejar los cambios en el carrito
      },
      error: function(error) {
          // Mostrar SweetAlert 2 en caso de error
          Swal.fire({
              icon: 'error',
              title: '¡Error!',
              text: 'Hubo un problema al agregar el producto al carrito.',
          });
      }
  });
}
</script>

  <script src="js/jquery-1.11.0.min.js"></script>
  <script src="js/swiper.js"></script>
  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/script2.js"></script>
  <script src="js/iconify.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

</body>

</html>