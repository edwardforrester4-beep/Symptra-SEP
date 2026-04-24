<?php
session_start();
include 'db.php';

$id=$_SESSION['user_id'];
$msg="";

if($_POST){
    $provider=$_POST['provider'];
    $policy=$_POST['policy'];
    $group=$_POST['group'];

    $conn->query("INSERT INTO insurance(user_id,provider,policy_number,group_number)
    VALUES('$id','$provider','$policy','$group')");

    $msg="Insurance saved!";
}

$res=$conn->query("SELECT * FROM insurance WHERE user_id='$id'");
?>

<link rel="stylesheet" href="style.css">

<?php include 'navbar.php'; ?>

<div class="container">
<div class="card">

<h3>Insurance Information</h3>

<form method="POST">
<input name="provider" placeholder="Provider">
<input name="policy" placeholder="Policy Number">
<input name="group" placeholder="Group Number">
<button>Save</button>
</form>

<p class="success"><?php echo $msg; ?></p>

<h3>Your Insurance</h3>

<?php while($row=$res->fetch_assoc()){ ?>
<p><?php echo $row['provider']; ?> - <?php echo $row['policy_number']; ?></p>
<?php } ?>

</div>
</div>
