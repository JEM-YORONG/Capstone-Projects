<?php
require 'database-conn.php';
require 'sms\index.php';

// SQL query to select rows with 'status' equal to 'no stock'
$query = "SELECT * FROM inventory WHERE status = 'No Stock'";

// Execute the query
$result = $conn->query($query);

if ($result) {
    if ($result->num_rows > 0) {
        // Rows with 'status' equal to 'no stock' were found
        while ($row = $result->fetch_assoc()) {
            // Process each row here
            $messageBody = "\nProduct ID: " . $row['productId'] . 
            "\nProduct Name: " . $row['name'] . 
            "\nStatus: " . $row['status'];

            sendinventory($messageBody);
        }
    } else {
        //no result
    }
} else {
    echo "Error executing the query: " . $conn->error;
}
