<?php
session_start();
include 'db.php';

$msg="";

if($_POST){
    $amount=$_POST['amount'];

    if($amount){
        $conn->query("INSERT INTO billing(user_id,amount,status,date)
        VALUES('{$_SESSION['user_id']}','$amount','Donation',NOW())");

        $msg="Thank you for your donation!";
    }
}
?>

<link rel="stylesheet" href="style.css">

<?php include 'navbar.php'; ?>

<div class="container">
<div class="card">

<h3>Support Symptra</h3>

<form method="POST">
<input name="amount" placeholder="Enter Amount">
<button>Donate</button>
</form>

<p class="success"><?php echo $msg; ?></p>

</div>
</div>
