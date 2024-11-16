<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM tasks WHERE id = $id";
    $result = $conn->query($sql);
    $task = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $task_name = $_POST['task_name'];
        $sql = "UPDATE tasks SET task_name = '$task_name' WHERE id = $id";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
        } else {
            echo "Error: " . $conn->error;
        }
    }
} else {
    echo "Task not found!";
}

?>

<h1>Edit Task</h1>
<form method="POST" action="edit.php?id=<?php echo $task['id']; ?>">
    <label for="task_name">Task:</label>
    <input type="text" name="task_name" value="<?php echo $task['task_name']; ?>" required>
    <input type="submit" value="Update Task">
</form>
