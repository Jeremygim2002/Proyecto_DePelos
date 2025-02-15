<?php
include 'php/conexion_be.php'; // Conectar a la base de datos

// Consulta para obtener todos los productos en la lista de deseos
$sql = "SELECT d.id_deseo, p.id_producto, p.nombre AS nombre_producto, p.marca, p.precio, p.imagen 
        FROM deseos d 
        INNER JOIN producto p ON d.id_producto = p.id_producto";

$result = mysqli_query($conexion_shopping_cart, $sql);
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
  <title>DePelos | Lista De Deseos</title>


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



  <!------------------------------ Seccion 1 (Titulo) -------------------------------->
  <!-- ============================================================================ -->
  <section id="banner" class="py-3" style="background: #F9F3EC;">
    <div class="container">
      <div class="hero-content py-5 my-3">
        <h2 class="display-1 mt-3 mb-0">Lista de <span class="text-primary">Deseos</span></h2>
        <nav class="breadcrumb">
          <a class="breadcrumb-item nav-link" href="bienvenida.php">Home</a>
          <span class="breadcrumb-item active" aria-current="page">Lista de Deseos</span>
        </nav>
      </div>
    </div>
  </section>




  <!------------------------------ Seccion 2 (Cuerpo) -------------------------------->
  <!-- ============================================================================ -->

  <section id="Wishlist" class="py-5 my-5">
  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col" class="card-title text-uppercase">Producto</th>
          <th scope="col" class="card-title text-uppercase">Precio Unitario</th>
          <th scope="col" class="card-title text-uppercase"></th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Verificar si hay productos en la lista de deseos
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr id='deseo-" . $row['id_deseo'] . "'>
                        <td class='py-4'>
                          <div class='cart-info d-flex flex-wrap align-items-center '>
                            <div class='col-lg-3'>
                              <div class='card-image'>
                                <img src='images/" . $row['imagen'] . "' alt='producto' class='img-fluid'>
                              </div>
                            </div>
                            <div class='col-lg-9'>
                              <div class='card-detail ps-3'>
                                <h5 class='card-title'>
                                  <a href='#' class='text-decoration-none'>" . $row['marca'] . "<br>" . $row['nombre_producto'] . "</a>
                                </h5>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class='py-4 align-middle'>
                          <div class='total-price'>
                            <span class='secondary-font fw-medium'>S/ " . $row['precio'] . "</span>
                          </div>
                        </td>
                        <td class='py-4 align-middle'>
                          <div class='d-flex align-items-center'>
                            <div class='me-4'>
                              <button class='btn btn-dark p-3 text-uppercase fs-6 btn-rounded-none w-100' 
                              onclick='moverAlCarrito(" . $row['id_deseo'] . ", " . $row['id_producto'] . ")'>Agregar al carrito</button>
                            </div>
                            <div class='cart-remove'>
                              <a href='#' onclick='confirmarEliminar(" . $row['id_deseo'] . ")'>
                                <svg width='24' height='24'>
                                  <use xlink:href='#trash'></use>
                                </svg>
                              </a>
                            </div>
                          </div>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No hay productos en la lista de deseos.</td></tr>";
        }

        mysqli_close($conexion_shopping_cart);
        ?>
      </tbody>
    </table>
  </div>
</section>




<?php include 'descuento.php'; ?>

<?php include 'beneficios.php'; ?>

<?php include 'footer_insta.php'; ?>


  <script>
// Confirmación de eliminación
function confirmarEliminar(idDeseo) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Este producto será eliminado de tu lista de deseos.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminarlo'
    }).then((result) => {
        if (result.isConfirmed) {
            eliminarDeseo(idDeseo);
        }
    });
}

// Función para mover productos al carrito
function moverAlCarrito(idDeseo, idProducto) {
    fetch('php/mover_al_carrito.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `id_deseo=${idDeseo}&id_producto=${idProducto}`
    })
    .then(response => response.text())
    .then(data => {
        if (data.includes('Error:')) {
            // Mostrar mensaje de error si el producto ya está en el carrito
            Swal.fire({
                title: 'Error',
                text: data,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        } else {
            // Producto movido al carrito correctamente
            Swal.fire({
                title: '¡Listo!',
                text: data,
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                document.getElementById(`deseo-${idDeseo}`).remove();
            });
        }
    })
    .catch(error => {
        Swal.fire({
            title: 'Error',
            text: 'No se pudo mover el producto al carrito.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    });
}
// Función para eliminar productos de la lista de deseos
function eliminarDeseo(idDeseo) {
    fetch('php/eliminar_deseo.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `id_deseo=${idDeseo}`
    })
    .then(response => response.text())
    .then(data => {
        Swal.fire({
            title: '¡Listo!',
            text: data,
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() => {
            document.getElementById(`deseo-${idDeseo}`).remove();
        });
    })
    .catch(error => {
        Swal.fire({
            title: 'Error',
            text: 'No se pudo eliminar el producto de la lista de deseos.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
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