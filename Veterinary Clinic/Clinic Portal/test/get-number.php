<?php
require 'database-conn.php';

if (isset($_POST['nameOwner'])) {
    $customerName = $_POST['nameOwner'];

    $query = "SELECT contact FROM customer WHERE CONCAT(firstname, ' ', lastname) = '$customerName'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $number = $row["contact"];
            echo $number;
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    //echo "Customer name not provided.";
}

mysqli_close($conn);