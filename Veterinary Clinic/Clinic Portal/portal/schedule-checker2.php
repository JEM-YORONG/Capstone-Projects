<?php
require 'database-conn.php';

// Set the timezone to 'Asia/Manila'
date_default_timezone_set('Asia/Manila');

function statusChecker()
{
    global $conn;

    // Get the current date in the format YYYY-MM-DD
    $currentDate = date('Y-m-d');

    // Select records where the date is in the past and the status is 'Upcoming'
    $query = "SELECT * FROM schedule WHERE status = 'Upcoming' AND date <= ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $currentDate);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        die("Error in the query: " . mysqli_error($conn));
    }

    // Loop through the selected records and update their status to "Past"
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row["id"];

        // Update the record's status to "Past"
        $updateQuery = "UPDATE schedule SET status = 'Past' WHERE id = ?";
        $updateStmt = mysqli_prepare($conn, $updateQuery);
        mysqli_stmt_bind_param($updateStmt, "i", $id);
        $updateResult = mysqli_stmt_execute($updateStmt);

        if (!$updateResult) {
            die("Error updating record with id $id: " . mysqli_error($conn));
        }
    }
}
