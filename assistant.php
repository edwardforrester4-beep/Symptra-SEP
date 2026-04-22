<?php
session_start();
?>

<link rel="stylesheet" href="style.css">

<?php include 'navbar.php'; ?>

<div class="container">
<div class="card">

<h3>Symptra Assistant</h3>

<form method="POST">
<input name="msg" placeholder="Describe your symptoms..." required>
<button>Ask</button>
</form>

<?php
if(isset($_POST['msg'])){
    $msg = strtolower($_POST['msg']);

    echo "<p><b>You:</b> $msg</p>";

    $reply = "Monitor your health and consult a doctor if needed.";

    if(strpos($msg,"flu") !== false){
        $reply = "Possible flu. Rest, hydrate, and monitor fever.";
    }
    elseif(strpos($msg,"cold") !== false){
        $reply = "Likely a cold. Stay warm and drink fluids.";
    }
    elseif(strpos($msg,"pain") !== false){
        $reply = "Pain detected. Rest and consult a doctor if severe.";
    }
    elseif(strpos($msg,"headache") !== false){
        $reply = "Headache may be from stress or dehydration.";
    }

    echo "<p><b>Assistant:</b> $reply</p>";
}
?>

</div>
</div>
