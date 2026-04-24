<?php
session_start();
include 'db.php';

$user=$_SESSION['user_id'];

/* HANDLE REFILL */
if(isset($_POST['refill'])){
    $id=$_POST['id'];

    $conn->query("UPDATE prescriptions 
    SET status='Refill Requested' 
    WHERE id='$id' AND user_id='$user'");

    header("Location: prescriptions.php");
    exit();
}

$result=$conn->query("SELECT * FROM prescriptions WHERE user_id='$user'");
?>

<link rel="stylesheet" href="style.css">

<?php include 'navbar.php'; ?>

<div class="container">

<?php while($row=$result->fetch_assoc()){ ?>
<div class="card">

<p><b>Medication:</b> <?php echo $row['medication']; ?></p>
<p><b>Status:</b> <?php echo $row['status']; ?></p>

<form method="POST">
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<button name="refill">Request Refill</button>
</form>

</div>
<?php } ?>

</div>
