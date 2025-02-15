

(function($) {

  
    "use strict";


    function validateForm() {
      var form = document.getElementById('form');
      var inputs = form.querySelectorAll('input[required], select[required], textarea[required]');
      for (var i = 0; i < inputs.length; i++) {
          if (!inputs[i].value) {
              alert("Por favor, complete todos los recuadros antes de enviar el formulario.");
              return false;
          }
      }
      return true;
  }




  


        var portfolioIsotope = $('.portfolio-container').isotope({
          itemSelector: '.portfolio-item',
          layoutMode: 'fitRows'
      });
      $('#portfolio-flters li').on('click', function () {
          $("#portfolio-flters li").removeClass('active');
          $(this).addClass('active');
  
          portfolioIsotope.isotope({filter: $(this).data('filter')});
      });

  




    var initPreloader = function() {
      $(document).ready(function($) {
      var Body = $('body');
          Body.addClass('preloader-site');
      });
      $(window).load(function() {
          $('.preloader-wrapper').fadeOut();
          $('body').removeClass('preloader-site');
      });
    }





      var initChocolat = function() {
          Chocolat(document.querySelectorAll('.image-link'), {
            imageSize: 'contain',
            loop: true,
          })
      }



    var initSwiper = function() {
  
      var swiper = new Swiper(".main-swiper", {
        speed: 500,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
      });
    }

     document.addEventListener("DOMContentLoaded", function() {
      // Esperar a que todas las imágenes se carguen antes de inicializar Swiper
      window.addEventListener('load', function() {
          const swiperProductos = new Swiper('.products-carousel', {
              slidesPerView: 1, // Mostrará tantos slides como quepan en el contenedor
              spaceBetween: 10,
              loop: true, // Habilita el bucle
              autoplay: {
                  delay: 2000, // Ajusta el delay a tu preferencia
                  disableOnInteraction: false,
              },
              breakpoints: {
                  576: {
                      slidesPerView: 1,
                      spaceBetween: 10,
                  },
                  768: {
                      slidesPerView: 2,
                      spaceBetween: 20,
                  },
                  992: {
                      slidesPerView: 3,
                      spaceBetween: 30,
                  }
              }
          });
      });
  });
  
  
  
  
  
  
  //================ Swiper para el banner (Home) =========================
  document.addEventListener("DOMContentLoaded", function() {
    const swiperBanner = new Swiper('.main-swiper', {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            renderBullet: function (index, className) {
                return '<span class="' + className + '"></span>';
            }
        },
    });

    swiperBanner.on('slideChange', function () {
        updatePagination(swiperBanner);
    });

    function updatePagination(swiper) {
        const bullets = document.querySelectorAll('.swiper-pagination-bullet');
        bullets.forEach((bullet, index) => {
            if (index === swiper.realIndex) {
                bullet.classList.add('swiper-pagination-bullet-active');
            } else {
                bullet.classList.remove('swiper-pagination-bullet-active');
            }
        });
    }

    // Initialize the pagination correctly on page load
    updatePagination(swiperBanner);
});



 //=============== Permite contar la cantidad de cart o elementos (comprar) =======================
 document.addEventListener("DOMContentLoaded", function() {
  var totalProducts = document.querySelectorAll('.product-grid .col-md-4').length;
  var showingProductElement = document.querySelector('.showing-product p');
  if (showingProductElement) {
    showingProductElement.textContent = "Mostrando " + totalProducts + " de " + totalProducts + " resultados";
  }
});


    // Esta función permite aumentar y disminuir la cantidad de productos en un carrito de compras
    var initProductQty = function(){
  
      $('.product-qty').each(function(){
  
        var $el_product = $(this);
        var quantity = 0;
  
        $el_product.find('.quantity-right-plus').click(function(e){
            e.preventDefault();
            var quantity = parseInt($el_product.find('#quantity').val());
            $el_product.find('#quantity').val(quantity + 1);
        });
  
        $el_product.find('.quantity-left-minus').click(function(e){
            e.preventDefault();
            var quantity = parseInt($el_product.find('#quantity').val());
            if(quantity>0){
              $el_product.find('#quantity').val(quantity - 1);
            }
        });
  
      });
  
    }
    // ========================================================================
  




    // init jarallax parallax (desplazamiento en velocidades diferentes)
    var initJarallax = function() {
      jarallax(document.querySelectorAll(".jarallax"));
  
      jarallax(document.querySelectorAll(".jarallax-keep-img"), {
        keepImg: true,
      });
    }
    // ========================================================================

  



    // document (el codigo js se ejecute recien cuando todo el documento se ha cargado completamente)
    $(document).ready(function() {
      
      // Se inicia las funciones creadas 
      initPreloader();
      initSwiper();
      initProductQty();
      initJarallax();
      initChocolat();
  
          // inicializa un carrusel Swiper para las miniaturas de productos:
          var thumb_slider = new Swiper(".product-thumbnail-slider", {
            spaceBetween: 8,
            slidesPerView: 3,
            freeMode: true,
            watchSlidesProgress: true,
          });
  

  
        // Caja donde se podra filtrar las imagenes (Home - Alimento), (Adoptar)
          window.addEventListener("load", (event) => {
        //isotope
        $('.isotope-container').isotope({
          // options
          itemSelector: '.item',
          layoutMode: 'masonry'
        });
  
  
        var $grid = $('.entry-container').isotope({
          itemSelector: '.entry-item',
          layoutMode: 'masonry'
        });
  

        // Inicializar isótopo
        var $container = $('.isotope-container').isotope({
          // opciones
          itemSelector: '.item',
          layoutMode: 'masonry'
        });
  

        // Configura los botones del filtro como por ejemplo (perros, gatos, todos) (Sol configura el boton)
        $(document).ready(function () {
          //activa botton
          $('.filter-button').click(function () {
            $('.filter-button').removeClass('active');
            $(this).addClass('active');
          });
        });
  

        
  
        // Filtrar elementos al hacer clic en el botón (Usa el boton configurado)
        $('.filter-button').click(function () {
          var filterValue = $(this).attr('data-filter');
          if (filterValue === '*') {
            // Mostrar todos los items
            $container.isotope({ filter: '*' });
          } else {
            // Mostrar items filtrados
            $container.isotope({ filter: filterValue });
          }
        });
  
      });
  
    });
  
  })(jQuery);
