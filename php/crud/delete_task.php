<?php
session_start();
require 'db_connection.php';

if (isset($_GET['id'])) {
    $task_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    // Eliminar la tarea de la base de datos
    $delete_query = "DELETE FROM tasks WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("ii", $task_id, $user_id);

    if ($stmt->execute()) {
        header("Location: ../main.php");
    } else {
        echo "Error: Could not delete task. Please try again later.";
    }
}
?>
