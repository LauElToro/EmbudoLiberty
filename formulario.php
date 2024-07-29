<?php
// Inicializar la variable del referidor
$referidor = "";

// Verificar si el parámetro 'ref' está presente en la URL
if (isset($_GET['ref'])) {
  $ref = htmlspecialchars($_GET['ref']);
} else {
  $ref = '';
}

// Inicializar la variable del correo del referido
$correo_referido = "";

// Si el referidor no está vacío, realizar la consulta en la base de datos
if (!empty($referidor)) {
    // Preparar la consulta SQL
    $consulta = "SELECT Mail FROM referidos WHERE referido = ? LIMIT 1";
    
    // Preparar la declaración
    $declaracion = $conexion->prepare($consulta);
    
    // Vincular los parámetros
    $declaracion->bind_param("s", $referidor);
    
    // Ejecutar la consulta
    $declaracion->execute();
    
    // Vincular las variables de resultado
    $declaracion->bind_result($correo_referido);
    
    // Obtener el resultado
    $declaracion->fetch();
    
    // Cerrar la declaración
    $declaracion->close();
}

// Escapar el valor del referidor para evitar inyección de código HTML
$_referido = htmlspecialchars($referidor);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Formulario Liberty</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

  <!-- Favicons -->
  <link href="img/logo.png" rel="icon" />
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700"
    rel="stylesheet" />

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
  <link href="lib/animate/animate.min.css" rel="stylesheet" />
<!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet" />
  <link rel="stylesheet" href="formulario.css" />
</head>

<body>
<header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="index.html"><img src="img/logo.png" style="height: 40px; width: 35px;" /></img></a>
        <!-- Uncomment below if you prefer to use a text logo -->
        <!--<h1><a href="#hero">Regna</a></h1>-->

      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="landing.html">Sobre nos</a></li>
          <li><a href="index.html">WEB 3.0</a></li>
          <li class="menu-active"><a href="formulario.php">Contacto</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  
  <br><br><br><br><br>



  <div class="container formulario">
    <h1><span><img src="img/logo.png" style="height: 100px; width: 280px "></span></h1>
    <form action="https://formsubmit.co/<?php echo $correo_referido; ?>" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <div class="form-row d-flex align-items-center justify-content-center">
          <div class="row  col-xl-6 col-md-12">
            <p class="pFila">INFORMACION PERSONAL:</p>
            <div class="col-12">
              <input type="text" name="Nombre" class="form-control fila" placeholder="Nombre completo" required />
            </div>
            <div class="col-12 mt-2">
              <input type="number" name="Telefono" class="form-control fila" placeholder="Telefono" required />
            </div>
            <div class="col-12 mt-2">
              <input type="email" name="email" class="form-control fila" placeholder="Tu E-mail" required />
            </div>
          </div>
          <div class="row  col-xl-6 col-md-12">
          <p class="pFila">DATOS DE LA EMPRESA:</p>
            <div class="col-12 mt-2">
              <input type="text" name="Empresa" class="form-control fila" placeholder="Nombre de tu Empresa"
              required />
            </div>
            <div class="col-12 mt-2">
              <input type="text" name="Pais" class="form-control fila"
              placeholder="Pais" required />
            </div>
            <div class="col-12 mt-2">
              <input type="text" name="Pagina" class="form-control fila"
              placeholder="Pagina Web" required />
            </div>
          </div>
        <div class="row  col-xl-6 col-md-12">
          <p class="pFila">REDES SOCIALES:</p>
          <div class="col-12">
          <p class="pInput"><input type="checkbox" name="Instagram"> Instagram</p>
          </div>
          <div class="col-12">
            <p class="pInput"><input type="checkbox" name="Facebook"> Facebook</p>
          </div>
          <div class="col-12">
          <p class="pInput"><input type="checkbox" name="Twitter"> Twitter</p>
          </div>
          <div class="col-12">
          <p class="pInput"><input type="checkbox" name="TikTok"> TikTok</p>
          </div>
          <div class="col-12">
          <p class="pInput"><input type="checkbox" name="Linkedin"> Linkedin</p>
          </div>
        </div>
        <div class="row  col-xl-6 col-md-12">
        <p class="pFila">TAMAÑO DE EMPRESA:</p>
          <div class="col-12">
          <p class="pInput"><input type="checkbox" name="Freelancer"> Freelancer</p>
          </div>
          <div class="col-12">
            <p class="pInput"><input type="checkbox" name="Empleados-0-9"> 0-9 Empleados</p>
          </div>
          <div class="col-12">
          <p class="pInput"><input type="checkbox" name="Empleados-10-50"> 10-50 Empleados</p>
          </div>
          <div class="col-12">
          <p class="pInput"><input type="checkbox" name="Empleados-100-1000"> 100-1000 Empleados</p>
          </div>
          <div class="col-12">
          <p class="pInput"><input type="checkbox" name="Empleados-2000"> Mas de 2000 Empleados</p>
          </div>
        </div>
        <div class="row  col-xl-6 col-lg-12">
          <p class="pFila">PORCENTAJE DE VENTAS ONLINE:</p>
          <div class="col-12">
          <p class="pInput"><input type="checkbox" name="Ventas-10%"> 10%</p>
          </div>
          <div class="col-12">
            <p class="pInput"><input type="checkbox" name="Ventas-35%"> 35%</p>
          </div>
          <div class="col-12">
          <p class="pInput"><input type="checkbox" name="Ventas-70%"> 70%</p>
          </div>
          <div class="col-12">
          <p class="pInput"><input type="checkbox" name="Ventas-90%"> 90% o más</p>
          </div>
        </div>
        <div class="row col-xl-6 col-lg-12">
        <p class="pFila">ENVIOS:</p>
          <div class="col-12">
          <p class="pInput"><input type="checkbox" name="Envios-no-envia"> No realizo envíos</p>
          </div>
          <div class="col-12">
            <p class="pInput"><input type="checkbox" name="Envios-Localidad"> En mi localidad</p>
          </div>
          <div class="col-12">
          <p class="pInput"><input type="checkbox" name="Envios-Nacionales"> Nacionales</p>
          </div>
          <div class="col-12">
          <p class="pInput"><input type="checkbox" name="Envios-Internacionales"> Internacionales</p>
          </div>
        </div>
        <div class="row col-12">
        <p class="pFila">MEDIOS DE PAGO QUE ACEPTA:</p>
          <div class="col-xl-2 col-lg-12 mt-2">
            <p class="pInput"><input type="checkbox" name="Pago-Efectivo"> Efectivo</p>
          </div>
          <div class="col-xl-2 col-lg-12 mt-2">
            <p class="pInput"><input type="checkbox" name="Pago-Transferencia"> Transferencia</p>
          </div>
          <div class="col-xl-2 col-lg-12 mt-2">
          <p class="pInput"><input type="checkbox" name="Pago-Crédito"> Crédito</p>
          </div>
          <div class="col-xl-2 col-lg-12 mt-2">
          <p class="pInput"><input type="checkbox" name="Pago-Débito"> Débito</p>
          </div>
          <div class="col-xl-2 col-lg-12 mt-2">
          <p class="pInput"><input type="checkbox" name="Pago-Criptomonedas"> Criptomonedas</p>
          </div>
        </div>

        </div>
      </div>
      <div class="form-group">
        <textarea
          placeholder="¿Cuáles son los desafíos o necesidades específicas que estás enfrentando y que podrían obstaculizar tu posicionamiento online?"
          class="form-control fila"
          name="Informacion"
          rows="10"
          required
        ></textarea>
      </div>
      <div class="col-6 d-none">
      <?php if (!empty($_referido)): ?>
            <input type="hidden" name="referidor" value="<?php echo $_referido; ?>">
            <p>Referido por: <?php echo $_referido; ?></p>
        <?php endif; ?>
      </div>
      <div class="col-12">
        <p class="pCheckbox"><input type="checkbox"> Acepto que SMT/Liberty Club utilice mi información para análisis y contacto.</p>
      </div>
      <button type="submit" class="btn btn-lg btn-dark boton" value="enviar">
        Enviar Consulta
      </button>
      <input type="hidden" name="_next" value="calendario.html" />
      <input type="hidden" name="_captcha" value="false" />
      <input type="hidden" name="_template" value="table" />
    </form>
  </div>
  <script>
document.addEventListener('DOMContentLoaded', function () {
  document.getElementById('mainForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevenir el envío predeterminado del formulario

    // Crear una instancia de FormData
    var formData = new FormData(this);

    // Enviar los datos a envioFormulario.php
    fetch('envioFormulario.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.text())
    .then(result => {
      console.log('Resultado de envioFormulario.php:', result);

      // Enviar los datos a formsubmit.co
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'https://formsubmit.co/contacto@libertyclub.io', true);
      xhr.onload = function () {
        if (xhr.status === 200) {
          window.location.href = 'calendario.html';
        } else {
          console.error('Error al enviar a formsubmit.co:', xhr.statusText);
        }
      };
      xhr.send(formData);
    })
    .catch(error => console.error('Error en envioFormulario.php:', error));
  });
});
</script>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <footer id="footer">
    <div class="footer-top">
      <div class="container">

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

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>


</body>


</html>
