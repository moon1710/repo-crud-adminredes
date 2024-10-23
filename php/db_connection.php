<?php
$servername = "localhost";
$username = "root";
$password = "mon123";
$dbname = "login_system";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
