<?php
session_start();
include 'db.php';

if($_SESSION['role'] !== "admin"){
    header("Location: dashboard.php"); exit();
}

if(isset($_POST['approve'])){
    $id=$_POST['id'];

    $conn->query("UPDATE prescriptions 
    SET status='Approved' 
    WHERE id='$id'");

    header("Location: admin_prescriptions.php"); // 🔥 FIX
    exit();
}

$result=$conn->query("
SELECT p.*, u.username 
FROM prescriptions p
JOIN users u ON p.user_id=u.id
ORDER BY p.id DESC
");
?>

<link rel="stylesheet" href="style.css">

<?php include 'navbar.php'; ?>

<div class="container">

<?php while($row=$result->fetch_assoc()){ ?>
<div class="card">

<p><b>User:</b> <?php echo $row['username']; ?></p>
<p><b>Medication:</b> <?php echo $row['medication']; ?></p>
<p><b>Status:</b> <?php echo $row['status']; ?></p>

<form method="POST">
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<button name="approve">Approve</button>
</form>

</div>
<?php } ?>

</div>
