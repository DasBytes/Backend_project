<?php include('db.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>To-Do List</h1>
        <form action="add_task.php" method="POST">
            <input type="text" name="task" placeholder="Enter a new task" required>
            <button type="submit">Add Task</button>
        </form>

        <ul>
            <?php
            $result = $conn->query("SELECT * FROM tasks ORDER BY created_at DESC");
            while ($row = $result->fetch_assoc()) {
                echo "<li>{$row['task']} 
                        <a href='edit_task.php?id={$row['id']}'>Edit</a> 
                        <a href='delete_task.php?id={$row['id']}'>Delete</a>
                      </li>";
            }
            ?>
        </ul>
    </div>
</body>
</html>
