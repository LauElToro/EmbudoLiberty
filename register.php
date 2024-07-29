<?php
$base_url = "http://localhost/Embudo2/";

// Inicializar las variables de mensaje
$success_message = "";
$error_message = "";

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión a la base de datos
    require_once "db/conexion.php";

    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $mail = $_POST["mail"];
    $password = $_POST["password"];
    $referido = $_POST["referido"];

    // Insertar los datos en la tabla de referidos
    $query = "INSERT INTO Referidos (Nombre, Mail, Password, Referido) VALUES (?, ?, ?, ?)";
    
    // Preparar la consulta
    $statement = $conn->prepare($query);

    // Vincular los parámetros
    $statement->bind_param("ssss", $nombre, $mail, $password, $referido);

    // Ejecutar la consulta
    if ($statement->execute()) {
        // Registro exitoso
        $success_message = '<div class="success-message">Tu link de referido es:<br>https://libertyclub.io/landing/' . htmlspecialchars($referido) . '</div>';
    } else {
        // Error en el registro
        $error_message = '<div class="error-message">Error al registrar el usuario: ' . $conn->error . '</div>';
    }

    // Cerrar la conexión
    $statement->close();
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/formreg.css" rel="stylesheet">
    <title>Registro de Usuario</title>
    <link href="<?php echo $base_url; ?>lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>lib/animate/animate.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="Cent">
                <h1>Creacion de referido</h1>
                <img src="./logo--mobile.png" alt="">
            </div>
            <div class="input-box">
                <div class="input-field">
                    <input type="text" id="nombre" name="nombre" placeholder="Usuario" required>
                    <i class="bx bxs-user"></i>
                </div>
                <div class="input-field">
                    <input type="text" id="referido" name="referido" placeholder="Referido" required>
                    <i class="bx bxs-user"></i>
                </div>
                <div class="input-field">
                    <input type="email" id="mail" name="mail" placeholder="Mail" required>
                    <i class="bx bxs-envelope"></i>
                </div>
                <div class="input-field">
                    <input type="password" id="password" name="password" placeholder="Contraseña" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
            </div>
            <input type="submit" value="Registrarse" class="btn">
        </form>
        <div class="registerTxt">
            <?php
            if (!empty($success_message)) {
                echo $success_message;
            } elseif (!empty($error_message)) {
                echo $error_message;
            }
            ?>
            <a href="https://libertyclub.io/landing/($referido)"></a>
        </div>
    </div>
</body>
</html>
