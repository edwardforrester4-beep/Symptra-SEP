<?php
session_start();
include 'db.php';

$id=$_SESSION['user_id'];
$res=$conn->query("SELECT username FROM users WHERE id='$id'");
$user=$res->fetch_assoc();
?>

<link rel="stylesheet" href="style.css">

<div class="navbar">
<h2>Patient Portal</h2>
<div>
<span>Welcome <?php echo $user['username']; ?>!</span>
<a href="appointments.php">Appointments</a>
<a href="records.php">Records</a>
<a href="billing.php">Billing</a>
<a href="messages.php">Messages</a>
<a href="referrals.php">Refer</a>
<a href="logout.php">Logout</a>
</div>
</div>
