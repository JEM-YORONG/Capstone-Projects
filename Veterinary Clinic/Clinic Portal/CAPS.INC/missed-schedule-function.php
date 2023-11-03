<?php
require 'database-conn.php';

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
    $name = $_POST["name"];
    $status = "";

    // Convert the input date string to a DateTime object
    $inputDate = new DateTime($date);
    $currentDate = new DateTime();

    if ($inputDate < $currentDate) {
        $status = "Past";
    } elseif ($inputDate > $currentDate) {
        $status = "Upcoming";
    }

    //Update the date of the schedule
    $query = "Update schedule SET date = '$date', status = '$status' WHERE ownername = '$name'";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);

    echo "Rescheduled successfully.";

    // echo $date . " " . $name;
}

function delete()
{
    global $conn;

    $id = $_POST["rowId"];

    $query = "DELETE FROM schedule WHERE id = '$id'";
    mysqli_query($conn, $query);
    echo "Schedule Deleted Successfully";
}
