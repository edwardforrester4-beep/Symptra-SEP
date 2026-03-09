<?php
session_start();

if(isset($_POST['login'])){

$username=$_POST['username'];
$password=$_POST['password'];

if($username=="patient1" && $password=="123"){

$_SESSION['role']="patient";
header("Location: dashboard.php");

}

elseif($username=="admin1" && $password=="123"){

$_SESSION['role']="admin";
header("Location: admin.php");

}

else{

echo "Invalid login";

}

}
?>

<link rel="stylesheet" href="style.css">

<h1>Login</h1>

<form method="POST">

<input name="username" placeholder="Username">

<input type="password" name="password" placeholder="Password">

<button name="login">Login</button>

</form>
