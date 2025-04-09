<?php

require_once 'db.php';
$message='';

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $username=$_POST['username'];
    $password=$_POST['password'];


    $stmt=$db->prepare("SELECT * FROM tenants where username= ?");
    $stmt->execute([$username]);
    $tenant=$stmt->fetch(PDO::FETCH_ASSOC);

    if($tenant && password_verify($password,$tenant['password']))
    {
        $_SESSION['tenant_id']=$tenant['id'];
        $_SESSION['full_name']=$tenant['full_name'];
        header('Location:dashboard.php');
        exit;
    }
    else
    {
        $message='Wrong username or password';
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Tenant Portal</h1>
    <form method="POST">
        <input type="text" name="username" placeholder="username" required><br>
        <input type="password" name="password" placeholder="password" required><br>
        <button type="submit">Login</button>
</form>
<p> <?php echo $message; ?> </p>

</body>
</html>
