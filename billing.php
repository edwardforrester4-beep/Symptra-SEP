<?php
session_start();
include 'db.php';

$user=$_SESSION['user_id'];

$resUser=$conn->query("SELECT username FROM users WHERE id='$user'");
$currentUser=$resUser->fetch_assoc();

if($_POST){
$conn->query("INSERT INTO billing(user_id,amount,status,date)
VALUES('$user','$_POST[amount]','Pending',NOW())");
}

$result=$conn->query("SELECT * FROM billing WHERE user_id='$user'");
?>

<link rel="stylesheet" href="style.css">

<div class="navbar">
<h2>Billing</h2>
<div>
<span>Welcome <?php echo $currentUser['username']; ?>!</span>
<a href="dashboard.php">Dashboard</a>
<a href="logout.php">Logout</a>
</div>
</div>

<div class="container">
<div class="card">

<form method="POST">
<input name="amount" placeholder="Amount">
<input type="password" maxlength="16" placeholder="Card Number">
<input type="text" maxlength="5" id="exp" placeholder="MM/YY">
<input type="password" maxlength="3" placeholder="CVV">
<button>Submit</button>
</form>

<?php while($row=$result->fetch_assoc()){ ?>
<p><?php echo $row['amount']." - ".$row['status']; ?></p>
<?php } ?>

</div>
</div>

<script>
document.getElementById("exp").addEventListener("input",function(e){
let v=e.target.value.replace(/\D/g,'');
if(v.length>=3){
e.target.value=v.slice(0,2)+'/'+v.slice(2,4);
}
});
</script>
