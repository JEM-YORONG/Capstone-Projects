<?php 
$hostname = "localhost";
$username = "u899862829_vepo";
$password = "Vepo2023";
$dbName = "u899862829_clinicdata";

$conn = mysqli_connect($hostname, $username, $password, $dbName);
if(!$conn){
    echo "Something went wrong.";
}
?>