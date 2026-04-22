<?php
session_start();
include 'db.php';

$id=$_SESSION['user_id'];
$msg="";

if(isset($_FILES['file'])){
    $fileName=$_FILES['file']['name'];
    $tmp=$_FILES['file']['tmp_name'];

    $path="documents/".$fileName;

    if(move_uploaded_file($tmp,$path)){
        $conn->query("INSERT INTO documents(user_id,file_name,file_path,date)
        VALUES('$id','$fileName','$path',NOW())");

        $msg="File uploaded!";
    } else {
        $msg="Upload failed";
    }
}

$res=$conn->query("SELECT * FROM documents WHERE user_id='$id'");
?>

<link rel="stylesheet" href="style.css">

<?php include 'navbar.php'; ?>

<div class="container">
<div class="card">

<h3>Upload Document</h3>

<form method="POST" enctype="multipart/form-data">
<input type="file" name="file">
<button>Upload</button>
</form>

<p class="success"><?php echo $msg; ?></p>

<h3>Your Documents</h3>

<?php while($row=$res->fetch_assoc()){ ?>
<p>
<a href="<?php echo $row['file_path']; ?>" target="_blank">
<?php echo $row['file_name']; ?>
</a>
</p>
<?php } ?>

</div>
</div>
