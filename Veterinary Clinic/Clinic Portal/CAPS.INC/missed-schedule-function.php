<?php
require 'database-conn.php';
date_default_timezone_set('Asia/Manila');

if (isset($_POST["action"])) {
    if ($_POST["action"] == "addAppointment") {
        add();
    }
    if ($_POST["action"] == "deleteSchedule") {
        delete();
    }
}

function add()
{
    global $conn;

    $date = $_POST["date"];
    $id = $_POST["id"];
    $status = "";

    if (empty(trim($date))) {
        // At least one of the values is empty or only contains whitespace
        echo "Please fill in all the fields.";
        return;
    }

    // Convert the input date string to a DateTime object
    $inputDate = new DateTime($date);
    $currentDate = new DateTime();

    if ($inputDate < $currentDate) {
        $status = "Past";
    } else {
        $status = "Upcoming";
    }

    // Update the date and status of the schedule
    $query = "UPDATE schedule SET date = ?, status = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sss", $date, $status, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Rescheduledsuccessfully";
    } else {
        echo "Error updating the schedule.";
    }

    mysqli_close($conn);
}


function delete()
{
    global $conn;

    $id = $_POST["rowId"];

    $query = "DELETE FROM schedule WHERE id = '$id'";
    mysqli_query($conn, $query);
    echo "ScheduleDeletedSuccessfully";
}
