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
SELECT insurance.*, users.username 
FROM insurance
JOIN users ON insurance.user_id = users.id
ORDER BY insurance.id DESC
");
?>

<link rel="stylesheet" href="style.css">

<?php include 'navbar.php'; ?>

<div class="container">
<div class="card">

<h3>Patient Insurance Information</h3>

<table>
<tr>
<th>Patient</th>
<th>Provider</th>
<th>Policy #</th>
<th>Group #</th>
</tr>

<?php while($row=$result->fetch_assoc()){ ?>
<tr>
<td><?php echo $row['username']; ?></td>
<td><?php echo $row['provider']; ?></td>
<td><?php echo $row['policy_number']; ?></td>
<td><?php echo $row['group_number']; ?></td>
</tr>
<?php } ?>

</table>

</div>
</div>
