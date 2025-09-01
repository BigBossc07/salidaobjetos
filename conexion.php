<?php
$servername = "localhost";
$username = "root";   // tu usuario de MySQL
$password = "";       // tu contraseña de MySQL
$database = "SalidaObjetos";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
