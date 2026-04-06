<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php"); exit();
}
if($_SESSION['role'] !== "admin"){
    header("Location: dashboard.php"); exit();
}

$result = $conn->query("
SELECT appointments.*, users.username 
FROM appointments 
JOIN users ON appointments.user_id = users.id
");
?>

<link rel="stylesheet" href="style.css">

<div class="navbar">
<h2>Admin Portal</h2>
<div>
<a href="admin_dashboard.php">Dashboard</a>
<a href="admin_appointments.php">Appointments</a>
<a href="admin_records.php">Records</a>
<a href="admin_billing.php">Billing</a>
<a href="messages.php">Messages</a>
<a href="logout.php">Logout</a>
</div>
</div>

<div class="container">
<div class="card">

<h3>All Appointments</h3>

<table>
<tr><th>Patient</th><th>Doctor</th><th>Date</th><th>Time</th></tr>

<?php while($row=$result->fetch_assoc()){ ?>
<tr>
<td><?php echo $row['username']; ?></td>
<td><?php echo $row['doctor']; ?></td>
<td><?php echo $row['date']; ?></td>
<td><?php echo $row['time']; ?></td>
</tr>
<?php } ?>

</table>

</div>
</div>
