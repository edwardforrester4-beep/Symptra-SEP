<?php
session_start();
include 'db.php';

$user=$_SESSION['user_id'];

$resUser=$conn->query("SELECT username FROM users WHERE id='$user'");
$currentUser=$resUser->fetch_assoc();

if($_POST){
$conn->query("INSERT INTO records(user_id,diagnosis,doctor,date)
VALUES('$user','$_POST[diagnosis]','$_POST[doctor]',NOW())");
}

$result=$conn->query("SELECT * FROM records WHERE user_id='$user'");
?>

<link rel="stylesheet" href="style.css">

<div class="navbar">
<h2>Records</h2>
<div>
<span>Welcome <?php echo $currentUser['username']; ?>!</span>
<a href="dashboard.php">Dashboard</a>
<a href="logout.php">Logout</a>
</div>
</div>

<div class="container">
<div class="card">

<form method="POST">
<input name="diagnosis" placeholder="Diagnosis">
<input name="doctor" placeholder="Doctor">
<button>Add</button>
</form>

<?php while($row=$result->fetch_assoc()){ ?>
<p><?php echo $row['diagnosis']; ?></p>
<?php } ?>

</div>
</div>
