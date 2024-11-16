<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $task = $_POST['task'];
    $stmt = $conn->prepare("UPDATE tasks SET task = ? WHERE id = ?");
    $stmt->bind_param('si', $task, $id);
    $stmt->execute();
    $stmt->close();
    header('Location: index.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM tasks WHERE id = $id");
    $task = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
</head>
<body>
    <form action="edit_task.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
        <input type="text" name="task" value="<?php echo $task['task']; ?>" required>
        <button type="submit">Update Task</button>
    </form>
</body>
</html>
