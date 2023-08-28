<?php
$servername = "localhost";
$username = "root";
$password = "";
$dba = "fuyu";

// Create connection
$conn = new mysqli($servername,$username, $password, $dba);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
 }
 
// else{
  //echo "connection made";
 //}
 
?>