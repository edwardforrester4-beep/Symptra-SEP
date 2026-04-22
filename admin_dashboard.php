<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php"); exit();
}

if($_SESSION['role'] !== "admin"){
    header("Location: dashboard.php"); exit();
}

$id=$_SESSION['user_id'];
$res=$conn->query("SELECT username FROM users WHERE id='$id'");
$user=$res->fetch_assoc();

$totalUsers = $conn->query("SELECT COUNT(*) as c FROM users")->fetch_assoc()['c'];
$totalAppointments = $conn->query("SELECT COUNT(*) as c FROM appointments")->fetch_assoc()['c'];

$careers = $conn->query("SELECT * FROM careers ORDER BY id DESC");
$contacts = $conn->query("SELECT * FROM contacts ORDER BY id DESC");
?>

<link rel="stylesheet" href="style.css">

<div class="navbar">
<h2>Admin Portal</h2>
<div>
<span>Welcome <?php echo $user['username']; ?>!</span>

<a href="admin_dashboard.php">Dashboard</a>
<a href="admin_appointments.php">Appointments</a>
<a href="messages.php">Messages</a>
<a href="admin_prescriptions.php">Prescriptions</a>
<a href="logout.php">Logout</a>
</div>
</div>

<div class="container">

<div class="card">
<h3>System Overview</h3>
<p>Total Users: <?php echo $totalUsers; ?></p>
<p>Total Appointments: <?php echo $totalAppointments; ?></p>
</div>

<div class="card"><a href="admin_records.php">📁 Records</a></div>
<div class="card"><a href="admin_billing.php">💳 Billing</a></div>
<div class="card"><a href="admin_notes.php">🩺 Clinical Notes</a></div>
<div class="card"><a href="admin_insurance.php">🛡️ Insurance</a></div>
<div class="card"><a href="admin_documents.php">📄 Documents</a></div>

<div class="card">
<h3>Career Applications</h3>

<?php while($row=$careers->fetch_assoc()){ ?>
<p>
<b><?php echo $row['name']; ?></b> (<?php echo $row['email']; ?>)
applied for <?php echo $row['position']; ?>
</p>
<?php } ?>

</div>

<div class="card">
<h3>Contact Messages</h3>

<?php while($row=$contacts->fetch_assoc()){ ?>
<p>
<b><?php echo $row['name']; ?></b> (<?php echo $row['email']; ?>):
<?php echo $row['message']; ?>
</p>
<?php } ?>

</div>

</div>
