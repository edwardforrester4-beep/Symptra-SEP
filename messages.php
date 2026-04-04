<?php
session_start();
include 'db.php';

$user=$_SESSION['user_id'];

$resUser=$conn->query("SELECT username FROM users WHERE id='$user'");
$currentUser=$resUser->fetch_assoc();

if($_POST){
$toUser=$_POST['to'];
$msg=$_POST['message'];

$res=$conn->query("SELECT id FROM users WHERE username='$toUser'");
$data=$res->fetch_assoc();

if($data){
$to=$data['id'];
$conn->query("INSERT INTO messages(sender_id,receiver_id,message,date)
VALUES('$user','$to','$msg',NOW())");
}
}

$result=$conn->query("
SELECT m.message,u.username AS sender
FROM messages m
JOIN users u ON m.sender_id=u.id
WHERE m.receiver_id='$user'
ORDER BY m.id DESC
");
?>

<link rel="stylesheet" href="style.css">

<div class="navbar">
<h2>Messages</h2>
<div>
<span>Welcome <?php echo $currentUser['username']; ?>!</span>
<a href="dashboard.php">Dashboard</a>
<a href="logout.php">Logout</a>
</div>
</div>

<div class="container">
<div class="card">

<form method="POST">
<input name="to" placeholder="Send To Username">
<input name="message" placeholder="Message">
<button>Send</button>
</form>

<h3>Inbox</h3>

<?php while($row=$result->fetch_assoc()){ ?>
<p><b><?php echo $row['sender']; ?>:</b> <?php echo $row['message']; ?></p>
<?php } ?>

</div>
</div>
