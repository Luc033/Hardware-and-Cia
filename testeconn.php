<?php
 
require_once 'ConnectBD.php';

$con = new ConnectBD();
$conn = $con->connection();

if (mysqli_connect_error()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

echo "Connected successfully!";
 
?>