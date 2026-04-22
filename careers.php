<?php
session_start();
include 'db.php';

$id=$_SESSION['user_id'];
$res=$conn->query("SELECT username FROM users WHERE id='$id'");
$user=$res->fetch_assoc();

if($_POST){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $position=$_POST['position'];

    /* FILE UPLOAD */
    $fileName = $_FILES['resume']['name'];
    $tmpName = $_FILES['resume']['tmp_name'];

    $path = "uploads/" . time() . "_" . $fileName;
    move_uploaded_file($tmpName, $path);

    $conn->query("INSERT INTO careers(name,email,position,resume)
    VALUES('$name','$email','$position','$path')");
}
?>

<link rel="stylesheet" href="style.css">

<?php include 'navbar.php'; ?>

<div class="container">

<!-- JOB LIST (TIGHTER) -->
<div class="card">
<h3>Current Openings</h3>

<p>Software Engineer</p>
<p>Data Analyst</p>
<p>Pediatrician</p>
<p>Nurse Practitioner</p>
<p>Medical Assistant</p>
<p>Receptionist</p>
<p>Registered Nurse</p>
<p>Surgical Technician</p>
<p>Physical Therapist</p>

</div>

<!-- FORM -->
<div class="card">

<h3>Apply for a Position</h3>

<form method="POST" enctype="multipart/form-data">
<input name="name" placeholder="Full Name" required>
<input name="email" placeholder="Email" required>
<input name="position" placeholder="Position" required>

<input type="file" name="resume" required>

<button>Apply</button>
</form>

</div>

</div>
