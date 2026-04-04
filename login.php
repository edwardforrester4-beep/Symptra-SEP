<?php
session_start();
include 'db.php';

$error="";

if($_POST){
$username=$_POST['username'];
$password=$_POST['password'];

$res=$conn->query("SELECT * FROM users WHERE username='$username'");
$user=$res->fetch_assoc();

if($user && password_verify($password,$user['password'])){
$_SESSION['user_id']=$user['id'];
$_SESSION['role']=$user['role'];

if($user['role']=="admin"){
header("Location: admin_dashboard.php");
}else{
header("Location: dashboard.php");
}
}else{
$error="Invalid Login";
}
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
<div class="card">

<h2>Login</h2>

<form method="POST">
<input name="username" placeholder="Username">
<input type="password" name="password" placeholder="Password">

<p style="color:red;"><?php echo $error; ?></p>

<button>Login</button>
</form>

<a class="link" href="register.php">New User?</a>

</div>
</div>
