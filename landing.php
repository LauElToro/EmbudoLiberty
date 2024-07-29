<?php
$base_url = "http://localhost/marketplace/Embudo2/";

// Incluir archivo de conexión a la base de datos
require_once('db/conexion.php');

// 1. Extracción del Nombre del Referidor de la URL
$referidor = ""; // Inicializamos la variable
if (isset($_GET['ref'])) {
  $ref = htmlspecialchars($_GET['ref']);
} else {
  $ref = '';
}

try {
  $stmt = $dbh->prepare('SELECT * FROM referidos WHERE Referido = :ref');
  $stmt->bindParam(':ref', $ref);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($result) {
      // Referido encontrado
      $referidoValido = true;
      $referidor = $result['Nombre']; // Por ejemplo, si quieres el nombre del referidor
  } else {
      // Referido no encontrado
      $referidoValido = false;
      $ref = ''; // Reinicia el ref si no es válido
  }
} catch (PDOException $e) {
  echo 'Error: ' . $e->getMessage();
  $referidoValido = false;
}

// 2. Mostrar el Nombre del Referidor en el Formulario
$_referido = htmlspecialchars($referidor); // Escapamos el valor para evitar inyección de código HTML
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <title>LibertyClub</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="<?php echo $base_url; ?>img/logo.png" rel="icon">
  <link href="<?php echo $base_url; ?>img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?php echo $base_url; ?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?php echo $base_url; ?>lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo $base_url; ?>lib/animate/animate.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?php echo $base_url; ?>css/style.css" rel="stylesheet">
  <!-- Siper Dev Cards File -->
  <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>
<!-- Slider Stylesheet File -->
<link href="<?php echo $base_url; ?>css/slider.css" rel="stylesheet">
</head>

<body>

  <!--==========================
  Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <img src="<?php echo $base_url; ?>/img/logo.png" style="height: 40px; width: 35px;"/></img>
        <!-- Uncomment below if you prefer to use a text logo -->
        <!--<h1><a href="#hero">Regna</a></h1>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#">Sobre nos</a></li>
          <li><a href="#web">WEB 3.0</a></li>
          <li><a href="<?php echo $base_url; ?>/formulario.php">Contacto</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
  <br><br><br>
  <section><a href="https://libertyclub.io/landing">
      <video id="banner-video" autoplay muted loop class="d-block w-100">
          <source src="<?php echo $base_url; ?>/img/LIBERTY_BANNER.mp4" type="video/mp4">
          Tu navegador no soporta el elemento de video.
        </video></a>
  </section><!-- #call-to-action -->
  <section class="presentacion">
    <div class="video-container" onclick="playVideo()">
    <iframe width="1280" height="720" src="https://www.youtube.com/embed/PKzCEc1LgkI" title="Vende a todo el mundo sin intermediarios, Vende SIN COMISIONES, SIN IMPUESTOS Y CON CRIPTOMONEDAS!." frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>      
  
      <!--  <script>
function playVideo() {
  var video = document.getElementById("video");
  var imagen = document.getElementById("imagen");
  video.src += "?autoplay=1";
  imagen.style.display = "none";
}
  </script>-->
 <!-- <div class="presentacionDescripcion">  
    <h1><strong style="color: #d41212;">Potencia tu presencia online</strong></h1>
    <h2>Nuestra sesión estratégica</h2>
    <p>Conoce como logramos llegar a más de 10.000 usuarios y 5 millones de USD.</p>
    <div class="social">
                
      <a href="https://www.linkedin.com/in/avila-cristian/" target="_blank"><i class="fa fa-linkedin"></i></a>
    </div>
  </div>-->
  
  </section>
  <!-- #hero -->
    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">
        <h2 class="title ventajas" style="padding-bottom: 20px;">NUESTROS PLANES</h2>
        <div class="cardCont">
            <div class=" wow elementoParaAnimar FadeLeft card1">
              <div class="pricing__card__heading">
                <h5 class="cardH5">PLAN SATOSHI</h5>
              </div>
              <div class="pricing__card__price-container">
                <strong class="promoStrong">GRATUITO</strong> 
              </div>
              <div class="pricing__card__details">
                <ul>
                  <li>Fácil de usar</li>
                  <li>Procesador de pagos web 3</li>
                  <li>Todas las ventajas de aceptar pagos en criptomonedas</li>
                  <li>Sin intermediarios</li>
                  <li>Hasta 3 productos</li>
                </ul>
              </div>
            </div>
            <div class=" wow elementoParaAnimar FadeBottom card2">
              <div class="pricing__card__heading">
                <h5 class="cardH5">PLAN <strong class="promoStrong">LIBERTER</strong></h5>
              </div>
              <div class="pricing__card__price-container">
                <p class="pricing__card__price">
                15,00 USD <span class="pricing-period">/ mes</span>
                </p>
                <p class="pricing__card__price">
                <del>  180,00 USD</del><strong class="promoStrong"> 89,00 USD</strong> <span class="pricing-period">/ año</span>
                </p>
              </div>
              <div class="pricing__card__details">
                <ul>
                  <li>Plan Satoshi</li>
                  <li>Productos ilimitados</li>
                  <li>Productos destacados</li>  
                  <li>Confianza</li>
                  <li>Verificacion</li>
                  <li>Soporte por email-whatsapp y personalizado</li>
                </ul>
              </div>
              <div class="pricing__card__heading">
              </div>
            </div>
            <div class=" wow elementoParaAnimar FadeRight card3">
              <div class="pricing__card__heading">
                <h5 class="cardH5">PLAN <strong class="promoStrong">PRO LIBERTER</strong></h5>
              </div>
              <div class="pricing__card__price-container">
                <p class="pricing__card__price">
                45,00 USD <span class="pricing-period">/ mes</span>
                </p>
                <p class="pricing__card__price">
                <del>  540,00 USD</del><strong class="promoStrong"> 269,00 USD</strong> <span class="pricing-period">/ año</span>
                </p>
              </div>
              <div class="pricing__card__details">
                <ul>
                  <li>Todas las características del
                  plan Liberter</li>
                  <li>Landing page</li>
                  <li>Algoritmo para ventas</li>
                </ul>
              </div>
              <div class="pricing__card__heading">
              </div>
            </div>
          </div>
</section>
      <section id="hero2">
        <div class="hero-container">
            <a href="formulario.php?ref=<?php echo $ref; ?>" class="btn-get-started">¡Quiero hablar con ustedes!</a>
        </div>
      </section><!-- #hero -->
    <!-- #about -->

    

    <!--==========================
    Call To Action Section
    ============================-->
<!--    <section id="Web3">
      <div class="container wow elementoParaAnimar FadeBottom" id="web">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">PROYECTOS WEB 3.0</h3>
            <p class="cta-text"> Para conocer nuestra propuesta en detalle para llevar la tokenización a su marca, lo invitamos a ver nuestro archivo PDF. <br> <br><strong> Haga click en saber más</strong></p>
            
          </div>
          
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="<?php echo $base_url; ?>/Pdf/STRATEGY MASTERS.pdf" target="_blank">Saber más</a>
          </div>
        </div>

      </div>
    </section> #call-to-action -->

    
    
  

    <section id="team" >
    <div class="testimonials">
      <div class="container wow elementoParaAnimar FadeBottom" >
        <div class="section-header" >
          <h3 class="section-title" style="color: antiquewhite;">Testimonios</h3>
        </div>     
      <div class="container">
        <div class="testimonials-content">
          <div class="swiper testimonials-slider js-testimonials-slider">
            <div class="swiper-wrapper">
              <div class="swiper-slide testimonials-item">
                <div class="info">
                  <div class="col-lg-4 col-md-6">
                    <div class="member">
                    <iframe width="350px" height="250px" src="https://www.youtube.com/embed/dG8pU6cGrOs" title="Paula Rinaldi - Profesional en Marketing y creadora de contenido en finanzas descentralizadas." frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                      <p style="color: #28a745;">PAULA RINALDI</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide testimonials-item">
                <div class="info">
                  <div class="col-lg-4 col-md-6">
                    <div class="member">
                      <iframe width="350px" height="250px" src="https://www.youtube.com/embed/tz1a2CDATO8" title="Liberty Club: &quot;Nuestra plataforma no cobra comisiones, el total es para los usuarios&quot;" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                      </iframe>
                      <p style="color: #28a745;">LAUTARO FIGUEROA</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide testimonials-item">
                <div class="info">
                  <div class="col-lg-4 col-md-6">
                    <div class="member">
                    <iframe width="350px" height="250px" src="https://www.youtube.com/embed/HmPribEwHjM" title="Cristian Garcia: Contador Publico profesional en criptomonedas." frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>                      </iframe>
                      <p style="color: #28a745;">CRISTIAN GARCIA</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-pagination js-testimonials-pagination"></div>
        </div>
      </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
      const swiper = new Swiper('.js-testimonials-slider', {
        grabCursor: true,
        spaceBetween: 30,
        navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
        breakpoints:{
          480:{
            slidesPerView: 1
          },
          767:{
            slidesPerView: 1
          },
          991:{
            slidesPerView: 2
          },
          1199:{
            slidesPerView: 3
          },
        }
      });
      
    </script>
      </div>
    </section><!-- #team -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- #team -->

    <section id="hero2">
      <div class="hero-container">
          <a href="formulario.php?ref=<?php echo $ref; ?>" class="btn-get-started">Reserva tu llamada</a>
        
      </div>
    </section><!-- #hero -->
<!--==========================
    Footer
    <section id="contact">
      
      
      
      
      <div class="container wow elementoParaAnimar FadeBottom mt-5">
        <div class="row justify-content-center">

          

          <div class="col-lg-5 col-md-8">
            <div class="form DivForm">
               
                <div class="text-center"><button type="submit" style="border-radius: 25px;" onclick="enviarCorreo()">Enviar correo</button></div>
                <script>
                  function enviarCorreo() {
                    const destinatario = 'strategymastersit@gmail.com';
                    const asunto = 'Asunto del correo';
                    const cuerpo = 'Contenido del correo...';
              
                    // Codificar el cuerpo y el asunto del correo para que se incluyan correctamente en el enlace mailto
                    const cuerpoCodificado = encodeURIComponent(cuerpo);
                    const asuntoCodificado = encodeURIComponent(asunto);
              
                    const mailtoLink = `mailto:${destinatario}?subject=${asuntoCodificado}&body=${cuerpoCodificado}`;
              
                    // Abrir el cliente de correo predeterminado del usuario con los datos predefinidos
                    window.location.href = mailtoLink;
                  }
                </script>
            </div>
          </div>

        </div>

      </div>
    </section>
    ============================-->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container ventajas">
        <img src="<?php echo $base_url; ?>/img/logo.png" alt="" style="height: 25%; width: 25%;">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>LibertyClub</strong>.
      </div>
      <div class="credits">

      </div>
    </div>
  </footer><!-- #footer -->

 <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="<?php echo $base_url; ?>lib/jquery/jquery.min.js"></script>
  <script src="<?php echo $base_url; ?>lib/jquery/jquery-migrate.min.js"></script>
  <script src="<?php echo $base_url; ?>lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo $base_url; ?>lib/easing/easing.min.js"></script>
  <script src="<?php echo $base_url; ?>lib/wow/wow.min.js"></script>
  <script src="<?php echo $base_url; ?>lib/waypoints/waypoints.min.js"></script>
  <script src="<?php echo $base_url; ?>lib/counterup/counterup.min.js"></script>
  <script src="<?php echo $base_url; ?>lib/superfish/hoverIntent.js"></script>
  <script src="<?php echo $base_url; ?>lib/superfish/superfish.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="<?php echo $base_url; ?>/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="<?php echo $base_url; ?>/js/main.js"></script>

</body>
</html>