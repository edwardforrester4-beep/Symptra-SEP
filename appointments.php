<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php"); exit();
}

$user = $_SESSION['user_id'];

/* GET APPOINTMENTS */
$res = $conn->query("
SELECT * FROM appointments 
WHERE user_id='$user' 
ORDER BY date DESC
");
?>

<link rel="stylesheet" href="style.css">

<?php include 'navbar.php'; ?>

<div class="container">

<div class="card">

<h3>Your Appointments</h3>

<?php while($row=$res->fetch_assoc()){ ?>
<p>
<b><?php echo $row['date']; ?></b> at <?php echo $row['time']; ?>  
with Dr. <?php echo $row['doctor']; ?>
</p>
<?php } ?>

</div>

<div class="card">

<h3>Need a Refill?</h3>

<p>
Go to <a href="prescriptions.php">Prescriptions</a> to request a refill.
</p>

</div>

</div>
