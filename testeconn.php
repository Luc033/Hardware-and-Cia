<?php
 
require_once 'ConectBD.php';


if (mysqli_connect_error()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

echo "Connected successfully!";
 
?>