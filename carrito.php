<?php
session_start();
include 'php/conexion_be.php';

$productos_carrito = [];
$total = 0;

// Verificar si carrito_id está definido en la sesión
if (isset($_SESSION['carrito_id'])) {
    $carrito_id = $_SESSION['carrito_id'];

    // Obtener los productos del carrito para el usuario
    $sql_carrito = "SELECT * FROM carrito WHERE carrito_id = '$carrito_id'";
    $result_carrito = mysqli_query($conexion_shopping_cart, $sql_carrito);

    if ($result_carrito !== false && mysqli_num_rows($result_carrito) > 0) {
        while ($row = mysqli_fetch_assoc($result_carrito)) {
            $productos_carrito[] = $row;
            $total += $row['precio'] * $row['cantidad'];
        }
    } else {
        echo "<tr><td colspan='4'>No hay productos en el carrito.</td></tr>";
    }

    mysqli_free_result($result_carrito);
}

mysqli_close($conexion_shopping_cart);
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
  <title>DePelos | Carrito</title>


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
        <h2 class="display-1 mt-3 mb-0">Carrito</h2>
        <nav class="breadcrumb">
          <a class="breadcrumb-item nav-link" href="bienvenida.php">Home</a>
          <span class="breadcrumb-item active" aria-current="page">Carrito</span>
        </nav>
      </div>
    </div>
  </section>





  <!------------------------------ Seccion 2 (Cuerpo) -------------------------------->
  <!-- ============================================================================ -->
  <section id="cart" class="my-5 py-5">
    <div class="container">
        <div class="row g-md-5">
            <div class="col-md-8 pe-md-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="card-title text-uppercase">Producto</th>
                            <th scope="col" class="card-title text-uppercase">Cantidad</th>
                            <th scope="col" class="card-title text-uppercase">Subtotal</th>
                            <th scope="col" class="card-title text-uppercase">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productos_carrito as $producto): ?>
                        <tr>
                            <td scope="row" class="py-4">
                                <div class="cart-info d-flex flex-wrap align-items-center">
                                    <div class="col-lg-3">
                                        <div class="card-image">
                                            <img src="<?php echo $producto['imagen']; ?>" alt="producto" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="card-detail ps-3">
                                            <h5 class="card-title">
                                                <a href="#" class="text-decoration-none">
                                                    <?php echo $producto['marca']; ?><br>
                                                    <?php echo $producto['nombre']; ?>
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 align-middle">
                                <div class="input-group product-qty align-items-center w-50">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus btn btn-light btn-number" data-type="minus" onclick="actualizarCantidad(<?php echo $producto['id_carrito']; ?>, -1)">
                                            <svg width="16" height="16">
                                                <use xlink:href="#minus"></use>
                                            </svg>
                                        </button>
                                    </span>
                                    <input type="text" id="quantity_<?php echo $producto['id_carrito']; ?>" name="quantity" class="form-control input-number text-center p-2 mx-1" value="<?php echo $producto['cantidad']; ?>">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus btn btn-light btn-number" data-type="plus" onclick="actualizarCantidad(<?php echo $producto['id_carrito']; ?>, 1)">
                                            <svg width="16" height="16">
                                                <use xlink:href="#plus"></use>
                                            </svg>
                                        </button>
                                    </span>
                                </div>
                            </td>
                            <td class="py-4 align-middle">
                                <div class="total-price">
                                    <span class="secondary-font fw-medium subtotal">
                                        S/ <?php echo $producto['precio'] * $producto['cantidad']; ?>
                                    </span>
                                </div>
                            </td>
                            <td class="py-4 align-middle">
                                <div class="cart-remove">
                                    <a href="#" onclick="eliminarDelCarrito(<?php echo $producto['id_carrito']; ?>)">
                                        <svg width="24" height="24">
                                            <use xlink:href="#trash"></use>
                                        </svg>
                                    </a> 
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <div class="cart-totals">
                    <h2 class="pb-4">Total</h2>
                    <div class="total-price pb-4">
                        <table cellspacing="0" class="table text-uppercase">
                            <tbody>
                                <tr class="subtotal pt-2 pb-2 border-top border-bottom">
                                    <th>Subtotal SIN IGV</th>
                                    <td data-title="Subtotal">
                                        <span id="subtotal" class="price-amount amount text-dark ps-5">
                                            <bdi><span class="price-currency-symbol">S/</span> <?php echo number_format($total * 0.82, 2); ?></bdi>
                                        </span>
                                    </td>
                                </tr>
                                <tr class="order-total pt-2 pb-2 border-bottom">
                                    <th>Total</th>
                                    <td data-title="Total">
                                        <span id="total" class="price-amount amount text-dark ps-5">
                                            <bdi><span class="price-currency-symbol">S/</span> <?php echo number_format($total, 2); ?></bdi>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="button-wrap row g-2">
                        <div class="col-md-6">
                            <button class="btn btn-dark btn-lg rounded-1 fs-6 p-3 w-100" onclick="actualizarCompra()">Actualizar compras</button>
                        </div>
                        <div class="col-md-6">
                            <a href="comprar.php">
                                <button class="btn btn-dark btn-lg rounded-1 fs-6 p-3 w-100">Continuar comprando</button>
                            </a>
                        </div>
                        <div class="col-md-12">
                            <a href="checkout.php" class="btn btn-primary p-3 text-uppercase rounded-1 w-100">Proceder al checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<?php include 'descuento.php'; ?>

<?php include 'beneficios.php'; ?>

<?php include 'footer_insta.php'; ?>


  <script>
    function eliminarDelCarrito(id_carrito) {
        Swal.fire({
            title: '¿Seguro que quieres eliminar este producto del carrito?',
            text: 'Esta acción no se puede deshacer.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'php/eliminar_del_carrito.php?id_carrito=' + id_carrito;
            } else {
                Swal.close();
            }
        });
    }

    function actualizarCantidad(id_carrito, cambio) {
    var cantidadElemento = document.getElementById('quantity_' + id_carrito);
    var cantidadActual = parseInt(cantidadElemento.value);
    var nuevaCantidad = cantidadActual + cambio;

    if (nuevaCantidad < 1) {
      Swal.fire({
            icon: 'warning',
            title: 'Advertencia',
            text: 'La cantidad mínima es 1',
            confirmButtonText: 'OK'
        });
        return;
    }

    $.ajax({
        url: 'php/actualizar_cantidad.php',
        type: 'POST',
        data: {
            id_carrito: id_carrito,
            nuevaCantidad: nuevaCantidad
        },
        success: function (response) {
            cantidadElemento.value = nuevaCantidad;
            marcarTotalesComoNoActualizados(); // Marcar totales como no actualizados
        },
        error: function (error) {
            console.error('Error al actualizar la cantidad:', error);
            alert('Error al actualizar la cantidad. Inténtelo de nuevo.');
        }
    });
}


function marcarTotalesComoNoActualizados() {
    var subtotalElemento = document.getElementById('subtotal');
    var totalElemento = document.getElementById('total');

    subtotalElemento.innerHTML = 'S/ NAN';
    totalElemento.innerHTML = 'S/ NAN';
}


    function actualizarTotales() {
        var subtotalElemento = document.getElementById('subtotal');
        var totalElemento = document.getElementById('total');

        var subtotalSinIGV = calcularSubtotalSinIGV();
        var totalConIGV = subtotalSinIGV / 0.82;

        subtotalElemento.innerHTML = 'S/ ' + subtotalSinIGV.toFixed(2);
        totalElemento.innerHTML = 'S/ ' + totalConIGV.toFixed(2);
    }

    function calcularSubtotalSinIGV() {
        var subtotales = document.getElementsByClassName('subtotal');
        var subtotalSinIGV = 0;

        for (var i = 0; i < subtotales.length; i++) {
            subtotalSinIGV += parseFloat(subtotales[i].innerText.replace('S/ ', ''));
        }

        return subtotalSinIGV * 0.82;
    }

    function actualizarCompra() {
        actualizarTotales();
        Swal.fire({
            icon: 'success',
            title: 'Compra actualizada',
            showConfirmButton: false,
            timer: 1500
        }).then(() => {
            window.location.reload();
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