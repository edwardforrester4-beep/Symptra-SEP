<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php"); exit();
}

$id=$_SESSION['user_id'];
$res=$conn->query("SELECT username FROM users WHERE id='$id'");
$user=$res->fetch_assoc();

if($_POST){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];

    $conn->query("INSERT INTO contacts(name,email,message)
    VALUES('$name','$email','$message')");
}
?>

<link rel="stylesheet" href="style.css">

<?php include 'navbar.php'; ?>

<div class="container">
<div class="card">

<h3>Send a Message</h3>

<form method="POST">
<input name="name" placeholder="Name" required>
<input name="email" placeholder="Email" required>
<input name="message" placeholder="Message" required>
<button>Send</button>
</form>

</div>
</div>
