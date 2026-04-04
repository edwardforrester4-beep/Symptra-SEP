<?php
session_start();
include 'db.php';

$user=$_SESSION['user_id'];

$resUser=$conn->query("SELECT username FROM users WHERE id='$user'");
$currentUser=$resUser->fetch_assoc();

if($_POST){
$conn->query("INSERT INTO appointments(user_id,doctor,date,time)
VALUES('$user','$_POST[doctor]','$_POST[date]','$_POST[time]')");
}

$result=$conn->query("SELECT * FROM appointments WHERE user_id='$user'");
?>

<link rel="stylesheet" href="style.css">

<div class="navbar">
<h2>Appointments</h2>
<div>
<span>Welcome <?php echo $currentUser['username']; ?>!</span>
<a href="dashboard.php">Dashboard</a>
<a href="logout.php">Logout</a>
</div>
</div>

<div class="container">
<div class="card">

<form method="POST">
<input name="doctor" placeholder="Doctor">
<input type="date" name="date">
<input type="time" name="time">
<button>Add</button>
</form>

<?php while($row=$result->fetch_assoc()){ ?>
<p><?php echo $row['doctor']." ".$row['date']; ?></p>
<?php } ?>

</div>
</div>
