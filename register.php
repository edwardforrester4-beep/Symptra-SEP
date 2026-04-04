<?php
session_start();
include 'db.php';

if($_POST){

$username=$_POST['username'];
$password=password_hash($_POST['password'],PASSWORD_DEFAULT);
$role=$_POST['role'];

$conn->query("INSERT INTO users(username,password,role)
VALUES('$username','$password','$role')");

$id=$conn->insert_id;

$_SESSION['user_id']=$id;
$_SESSION['role']=$role;

header("Location: ".($role=="admin"?"admin_dashboard.php":"dashboard.php"));
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
<div class="card">

<h2>Register</h2>

<form method="POST">
<input name="username" placeholder="Username">
<input type="password" name="password" placeholder="Password">

<select name="role">
<option value="user">Patient</option>
<option value="admin">Admin</option>
</select>

<button>Register</button>
</form>

</div>
</div>
