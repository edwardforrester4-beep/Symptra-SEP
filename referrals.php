<?php
session_start();
include 'db.php';

$user=$_SESSION['user_id'];

$resUser=$conn->query("SELECT username FROM users WHERE id='$user'");
$currentUser=$resUser->fetch_assoc();

if($_POST){
$conn->query("INSERT INTO referrals(patient_id,referred_to,reason,date)
VALUES('$user','$_POST[to]','$_POST[reason]',NOW())");
}
?>

<link rel="stylesheet" href="style.css">

<div class="navbar">
<h2>Referrals</h2>
<div>
<span>Welcome <?php echo $currentUser['username']; ?>!</span>
<a href="dashboard.php">Dashboard</a>
<a href="logout.php">Logout</a>
</div>
</div>

<div class="container">
<div class="card">

<form method="POST">
<input name="to" placeholder="Referred To">
<input name="reason" placeholder="Reason">
<button>Submit</button>
</form>

</div>
</div>
