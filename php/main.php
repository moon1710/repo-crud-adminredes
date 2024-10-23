<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    // Si el usuario no está logueado, redirigir a la página de login
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
</head>
<body>
    <h1>Welcome to the main page!</h1>
    <p>You are logged in.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
