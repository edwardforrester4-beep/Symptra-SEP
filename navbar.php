<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}

include 'db.php';

$id = $_SESSION['user_id'];
$res = $conn->query("SELECT username FROM users WHERE id='$id'");
$user = $res->fetch_assoc();
?>

<div class="navbar">
<h2><?php echo ($_SESSION['role'] === "admin") ? "Admin Portal" : "Patient Portal"; ?></h2>

<div>

<?php if($_SESSION['role'] === "admin"){ ?>

<span>Welcome <?php echo $user['username']; ?>!</span>

<a href="admin_dashboard.php">Dashboard</a>
<a href="admin_appointments.php">Appointments</a>
<a href="messages.php">Messages</a>
<a href="logout.php">Logout</a>

<?php } else { ?>

<a href="dashboard.php">Dashboard</a>
<a href="appointments.php">Appointments</a>
<a href="messages.php">Messages</a>
<a href="prescriptions.php">Prescriptions</a>
<a href="assistant.php">AI</a>
<a href="logout.php">Logout</a>

<?php } ?>

</div>
</div>
