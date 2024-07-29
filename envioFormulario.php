<?php
// Incluir archivo de conexión a la base de datos
require_once('db/conexion.php');

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopilar y limpiar los datos del formulario
    $nombre = htmlspecialchars($_POST['Nombre']);
    $telefono = htmlspecialchars($_POST['Telefono']);
    $email = htmlspecialchars($_POST['email']);
    $empresa = htmlspecialchars($_POST['Empresa']);
    $pais = htmlspecialchars($_POST['Pais']);
    $pagina = htmlspecialchars($_POST['Pagina']);
    
    // Convertir los arrays de checkboxes a cadenas
    $redes_sociales = implode(', ', array_keys(array_filter($_POST, function($key) {
        return in_array($key, ['Instagram', 'Facebook', 'Twitter', 'TikTok', 'Linkedin']);
    }, ARRAY_FILTER_USE_KEY)));
    
    $tamano_empresa = implode(', ', array_keys(array_filter($_POST, function($key) {
        return in_array($key, ['Freelancer', 'Empleados-0-9', 'Empleados-10-50', 'Empleados-100-1000', 'Empleados-2000']);
    }, ARRAY_FILTER_USE_KEY)));
    
    $porcentaje_ventas_online = implode(', ', array_keys(array_filter($_POST, function($key) {
        return in_array($key, ['Ventas-10%', 'Ventas-35%', 'Ventas-70%', 'Ventas-90%']);
    }, ARRAY_FILTER_USE_KEY)));
    
    $envios = implode(', ', array_keys(array_filter($_POST, function($key) {
        return in_array($key, ['Envios-no-envia', 'Envios-Localidad', 'Envios-Nacionales', 'Envios-Internacionales']);
    }, ARRAY_FILTER_USE_KEY)));
    
    $medios_pago = implode(', ', array_keys(array_filter($_POST, function($key) {
        return in_array($key, ['Pago-Efectivo', 'Pago-Transferencia', 'Pago-Crédito', 'Pago-Débito', 'Pago-Criptomonedas']);
    }, ARRAY_FILTER_USE_KEY)));
    
    $informacion = htmlspecialchars($_POST['Informacion']);
    $referido = htmlspecialchars($_POST['Referido']);

    // Preparar la consulta SQL
    $consulta = "INSERT INTO formularios (nombre, telefono, email, empresa, pais, pagina, redes_sociales, tamano_empresa, porcentaje_ventas_online, envios, medios_pago, informacion, referido)
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Preparar la declaración
    if ($declaracion = $conexion->prepare($consulta)) {
        // Vincular los parámetros
        $declaracion->bind_param("sssssssssssss", $nombre, $telefono, $email, $empresa, $pais, $pagina, $redes_sociales, $tamano_empresa, $porcentaje_ventas_online, $envios, $medios_pago, $informacion, $referido);
        
        // Ejecutar la consulta
        if ($declaracion->execute()) {
            echo "Datos enviados con éxito.";
        } else {
            echo "Error: " . $declaracion->error;
        }
        
        // Cerrar la declaración
        $declaracion->close();
    } else {
        echo "Error: " . $conexion->error;
    }

    // Cerrar la conexión
    $conexion->close();
}
?>
