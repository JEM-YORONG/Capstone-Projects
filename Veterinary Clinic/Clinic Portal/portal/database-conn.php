<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$dbName = "clinicdata";

$conn = mysqli_connect($hostname, $username, $password, $dbName);
if(!$conn){
    echo "Something went wrong.";
}
?>