<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/img/hedgehog.png" type="image/icon type">
    <title>Hedgie</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Task Manager</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Welcome to the Task Manager!</h1>
        <p>You are logged in.</p>

        <!-- Task Management Section (CRUD) -->
        <div class="card mt-5">
            <div class="card-header">
                <h2>Task List</h2>
            </div>
            <div class="card-body">
                <!-- Task Form -->
                <form action="php/create_task.php" method="POST" class="mb-4">
                    <div class="mb-3">
                        <label for="task_name" class="form-label">Task Name</label>
                        <input type="text" class="form-control" id="task_name" name="task_name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Task</button>
                </form>

                <!-- Display Task List -->
                <h3>Your Tasks</h3>
                <ul class="list-group">
                    <?php
                    require 'php/db_connection.php'; // Conexión a la base de datos

                    // Obtener las tareas del usuario
                    $user_id = $_SESSION['user_id'];
                    $query = "SELECT * FROM tasks WHERE user_id = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("i", $user_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    // Mostrar las tareas
                    if ($result->num_rows > 0) {
                        while ($task = $result->fetch_assoc()) {
                            echo "<li class='list-group-item d-flex justify-content-between align-items-center'>
                                    {$task['task_name']}
                                    <div>
                                        <a href='php/edit_task.php?id={$task['id']}' class='btn btn-warning btn-sm'>Edit</a>
                                        <a href='php/delete_task.php?id={$task['id']}' class='btn btn-danger btn-sm'>Delete</a>
                                    </div>
                                  </li>";
                        }
                    } else {
                        echo "<li class='list-group-item'>No tasks yet.</li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
