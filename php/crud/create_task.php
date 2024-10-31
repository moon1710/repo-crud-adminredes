<?php
session_start();
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_name = $_POST['task_name'];
    $subject = $_POST['subject'];
    $professor = $_POST['professor'];
    $description = $_POST['description'];
    $extra_notes = $_POST['extra_notes'];
    $user_id = $_SESSION['user_id'];

    // Insertar la tarea en la base de datos
    $insert_query = "INSERT INTO tasks (user_id, task_name, subject, professor, description, extra_notes) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("isssss", $user_id, $task_name, $subject, $professor, $description, $extra_notes);

    if ($stmt->execute()) {
        header("Location: ../main.php"); // Redirigir al listado de tareas
    } else {
        echo "Error: Could not add task. Please try again later.";
    }
}
?>
