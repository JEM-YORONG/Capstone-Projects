<?php
require 'database-conn.php';

// Set the timezone to 'Asia/Manila'
date_default_timezone_set('Asia/Manila');

function statusChecker()
{
    global $conn;

    // Get the current date in the format YYYY-MM-DD
    $currentDate = date('Y-m-d');

    // Select records where the date is in the past and the status is not "Done"
    $query = "SELECT * FROM schedule WHERE date < '$currentDate' AND status != 'Done'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error in the query: " . mysqli_error($conn));
    }

    // Loop through the selected records and update their status to "Missed"
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row["id"];
        $updateQuery = "UPDATE schedule SET status = 'Missed' WHERE id = $id";

        // Execute the update query
        $updateResult = mysqli_query($conn, $updateQuery);

        if (!$updateResult) {
            die("Error updating record with id $id: " . mysqli_error($conn));
        }
    }
}
