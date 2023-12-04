<?php
require 'database-conn.php';

if (isset($_POST['nameOwner'])) {
    $customerName = $_POST['nameOwner'];

    $query = "SELECT petname FROM pet WHERE CONCAT(ownerfirstname, ' ', ownerlastname) = '$customerName'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<option value=''>Select a pet</option>";
        while ($row = mysqli_fetch_assoc($result)) {
            $petname = $row["petname"];
            echo "<option value='$petname'>$petname</option>";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Customer name not provided.";
}

mysqli_close($conn);