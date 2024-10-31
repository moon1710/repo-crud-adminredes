<?php
session_start();
require 'db_connection.php';

if (isset($_GET['id'])) {
    $task_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    // Obtener la tarea a editar
    $query = "SELECT * FROM tasks WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $task_id, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $task = $result->fetch_assoc();
    } else {
        echo "Error: Task not found.";
        exit();
    }
} else {
    echo "Error: Task ID is required.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_name = $_POST['task_name'];

    // Actualizar la tarea en la base de datos
    $update_query = "UPDATE tasks SET task_name = ? WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("sii", $task_name, $task_id, $user_id);

    if ($stmt->execute()) {
        header("Location: ../main.php");
    } else {
        echo "Error: Could not update task. Please try again later.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Edit Task</h1>

        <form action="" method="POST">
            <div class="mb-3">
                <label for="task_name" class="form-label">Task Name</label>
                <input type="text" class="form-control" id="task_name" name="task_name" value="<?php echo $task['task_name']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Task</button>
        </form>
    </div>
</body>
</html>
