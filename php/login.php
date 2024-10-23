<?php
session_start();
require 'db_connection.php'; // Asegúrate de crear este archivo para la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consulta a la base de datos para verificar las credenciales
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verificar la contraseña
        if (password_verify($password, $user['password'])) {
            // Credenciales correctas, redirigir a main.php
            $_SESSION['user_id'] = $user['id'];
            header("Location: main.php");
            exit();
        } else {
            // Contraseña incorrecta
            echo "Invalid password.";
        }
    } else {
        // Usuario no encontrado
        echo "No user found with this email.";
    }
}
?>
