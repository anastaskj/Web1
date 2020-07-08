<?php 
$server = "studmysql01.fhict.local";
$user = "dbi387908";
$pw = "naseto";
$db_name = "dbi387908";
$conn = mysqli_connect("$server","$user","$pw","$db_name");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
