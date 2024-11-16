<?php

include 'config.php';

if($_SERVER['REQUEST_METHOD']=='POST')
{
$task_name=$_POST['task_name'];
$sql="INSERT INTO tasks(task_name)values('$task_name')";

if($conn->query($sql)===TRUE)
{
header("Location:index.php");
}
else
{
echo "Error:".$conn->error;
}
}
?>


<h1>Add a New Task</h1>
<form method="POST" action="add.php">
<label for="task_name">Task:</label>
<input type="text" name="task_name" id="task_name" required>
<input type="submit" value="Add Task">

</form>