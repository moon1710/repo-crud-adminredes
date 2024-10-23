<?php
session_start();
require 'db_connection.php'; // Asegúrate de tener este archivo correctamente configurado

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $names = $_POST['names'];
    $surnames = $_POST['surnames'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar si el correo ya existe
    $check_email_query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($check_email_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // El correo ya está registrado
        echo "Email already exists. Please use a different email.";
    } else {
        // Insertar nuevo usuario
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Encriptar la contraseña
        $insert_query = "INSERT INTO users (names, surnames, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("ssss", $names, $surnames, $email, $hashed_password);

        if ($stmt->execute()) {
            // Registro exitoso, redirigir a main.php
            $_SESSION['user_id'] = $conn->insert_id;
            header("Location: main.php");
            exit();
        } else {
            echo "Error: Could not register. Please try again later.";
        }
    }
}
?>
