<?php
session_start();
include 'db.php';

if($_SESSION['role']!="admin"){
header("Location: dashboard.php");
}

$id=$_SESSION['user_id'];
$resUser=$conn->query("SELECT username FROM users WHERE id='$id'");
$user=$resUser->fetch_assoc();

$search="";

if($_POST){
$search=$_POST['search'];
$users=$conn->query("SELECT * FROM users WHERE role='user' AND username LIKE '%$search%'");
}else{
$users=$conn->query("SELECT * FROM users WHERE role='user'");
}
?>

<link rel="stylesheet" href="style.css">

<div class="navbar">
<h2>Admin Portal</h2>
<div>
<span>Welcome <?php echo $user['username']; ?>!</span>
<a href="messages.php">Messages</a>
<a href="logout.php">Logout</a>
</div>
</div>

<div class="container">

<div class="card">
<form method="POST">
<input name="search" placeholder="Search patients">
<button>Search</button>
</form>
</div>

<div class="card">
<?php while($row=$users->fetch_assoc()){ ?>
<p><?php echo $row['username']; ?></p>
<?php } ?>
</div>

</div>
