<?php
require 'database-conn.php';

function generateId()
{
    global $conn;

    $id = mt_rand(100000, 999999); // Generate a random 6-digit number

    // Check if the generated ID already exists in the id row column of the staffs table
    $query = "SELECT * FROM inventory WHERE productId = '$id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // If the generated ID already exists, recursively call the function to generate a new ID
        return generateId();
    } else {
        // If the generated ID does not exist, return it
        return $id;
    }
}

$newId = generateId();
$getCurrentYear = date("Y");

echo "{$getCurrentYear}{$newId}";

mysqli_close($conn);
