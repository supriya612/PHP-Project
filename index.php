<?php
include 'config.php';

$sql="select * from tasks order by created_at desc";
$result=$conn->query($sql);

echo '<h1>To-Do List</h1>';
echo '<a href="add.php">Add New Task</a>';
echo '<ul>';

while($row =$result->fetch_assoc())
{

echo "<li>";
echo $row['task_name'];
echo "<a href='edit.php?id=" .$row['id'] ." '>Edit</a>";
echo "<a href='delete.php?id=" .$row['id']." '>Delete</a>";
echo "</li>";
}
echo '</ul>';
$conn->close();
?>