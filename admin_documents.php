<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php"); exit();
}

if($_SESSION['role'] !== "admin"){
    header("Location: dashboard.php"); exit();
}

/* GET DOCUMENTS + USERNAME */
$result = $conn->query("
SELECT d.*, u.username 
FROM documents d
JOIN users u ON d.user_id = u.id
ORDER BY d.id DESC
");
?>

<link rel="stylesheet" href="style.css">

<?php include 'navbar.php'; ?>

<div class="container">

<div class="card">
<h3>Uploaded Documents</h3>

<?php while($row=$result->fetch_assoc()){ ?>
<div class="card">

<p><b>User:</b> <?php echo $row['username']; ?></p>

<p>
<b>File:</b> 
<a href="<?php echo $row['file_path']; ?>" target="_blank">
View Document
</a>
</p>

<p><b>Uploaded:</b> <?php echo $row['created_at']; ?></p>

</div>
<?php } ?>

</div>

</div>
