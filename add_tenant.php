<?php

session_start();
require_once 'db.php';

$username='supriya';
$plain_password='Yadav@1990';
$full_name='Supriya Yadav';
$hashed_password=password_hash($plain_password,PASSWORD_DEFAULT);

$stmt=$db->prepare("INSERT INTO tenants(username,password,full_name)VALUES(?,?,?)");
$stmt->execute([$username,$hashed_password,$full_name]);

echo "Tenant added successfully with hashed password";
?>