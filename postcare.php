<?php
session_start();
include 'db.php';

$id=$_SESSION['user_id'];

$userRes=$conn->query("SELECT username FROM users WHERE id='$id'");
$user=$userRes->fetch_assoc();

$res=$conn->query("SELECT diagnosis FROM records WHERE user_id='$id' ORDER BY id DESC LIMIT 1");
$data=$res->fetch_assoc();

$diagnosis=$data ? $data['diagnosis'] : "General Checkup";
?>

<link rel="stylesheet" href="style.css">

<?php include 'navbar.php'; ?>

<div class="container">
<div class="card">

<h3>Latest Diagnosis</h3>
<p><?php echo $diagnosis; ?></p>

<form method="POST">
<button name="gen">Generate Care</button>
</form>

<?php
if(isset($_POST['gen'])){
    echo "<p>Care: Rest, hydrate, monitor condition.</p>";
}
?>

</div>
</div>
