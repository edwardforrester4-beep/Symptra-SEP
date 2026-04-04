<?php
$conn = new mysqli(
    "sql200.infinityfree.com",
    "if0_41566043",
    "Salemhs202126",
    "if0_41566043_symptra"
);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
