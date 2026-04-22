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

<?php include 'navbar.php'; ?>

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
