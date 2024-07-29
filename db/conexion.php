<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ventas";
$dsn = 'mysql:host=localhost;dbname=ventas';
// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

try {
    $dbh = new PDO($dsn, $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}
?>
