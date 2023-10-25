<?php
require 'database-conn.php';

if (isset($_POST["action"])) {
    if ($_POST["action"] === "addAppointment") {
        addAppointment();
    }
    if ($_POST["action"] === "deleteSchedule") {
        deleteSchedule();
    }
    if ($_POST["action"] === "sendSMS") {
        sendSMS();
    }
    if ($_POST["action"] === "updateAppointment") {
        updateAppointment();
    }
    if ($_POST["action"] === "statusDone") {
        statusDone();
    }
}

function addAppointment()
{
    global $conn;

    $date = $_POST["date"];
    $name = $_POST["name"];
    $petname = $_POST["petname1"];
    $petname2 = $_POST["petname2"];
    $petname3 = $_POST["petname3"];
    $petname4 = $_POST["petname4"];
    $petname5 = $_POST["petname5"];
    $service1 = $_POST["service1"];
    $service2 = $_POST["service2"];
    $service3 = $_POST["service3"];
    $number = $_POST["number"];
    $customerName = "";
    $status = "";

    // Validate input fields for empty values
    if (empty($date) || empty($name) || empty($number)) {
        echo "Empty Fields Detected.";
        return; // Stop execution if any field is empty
    }

    // Query the customer data based on the given name
    $query = "SELECT * FROM customer WHERE CONCAT(firstname, ' ', lastname) = '$name'";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result && $row = mysqli_fetch_assoc($result)) {
        $customerName = $name;
        $ownerId = $row["id"]; // Get the customer's ID

        // Convert the input date string to a DateTime object
        $inputDate = new DateTime($date);
        $currentDate = new DateTime();

        if ($inputDate < $currentDate) {
            $status = "Past";
        } elseif ($inputDate > $currentDate) {
            $status = "Upcoming";
        }

        // Create an array of services
        $services = [$service1, $service2, $service3];

        // Insert the appointment into the database with the determined status
        $query = "INSERT INTO schedule (ownername, petname, petname2, petname3, petname4, petname5, service, service2, service3, date, number, status) VALUES ('$customerName', '$petname', '$petname2', '$petname3', '$petname4', '$petname5', '$services[0]', '$services[1]', '$services[2]', '$date', '$number', '$status')";

        if (mysqli_query($conn, $query)) {
            echo "Schedule Added Successfully.";
        } else {
            echo "Error inserting schedule: " . mysqli_error($conn);
        }
    } else {
        echo "Customer $name didn't exist in customer list.";
    }
}

function updateAppointment()
{
    global $conn;

    $updateId = $_POST["updateId"];
    $updateDate = $_POST["updateDate"];
    $updateName = $_POST["updateName"];
    $updatePetname = $_POST["updatePetname"];
    $updateType = $_POST["updateType"];
    $updateService = $_POST["updateService"];
    $updateNumber = $_POST["updateNumber"];

    $query = "UPDATE schedule SET ownername = '$updateName', petname = '$updatePetname', type = '$updateType', service = '$updateService', 
    date = '$updateDate', number = '$updateNumber' WHERE id = '$updateId'";
    mysqli_query($conn, $query);
    mysqli_close($conn);
    echo "Schedule Updated Successfully.";
}

function statusDone()
{
    global $conn;

    $statusId = $_POST["statusId"];
    $status = "Done";

    $query = "UPDATE schedule SET status = '$status' WHERE id = '$statusId'";
    mysqli_query($conn, $query);
    mysqli_close($conn);

    echo "Done";
}


function deleteSchedule()
{
    global $conn;

    $id = $_POST["id"];

    $query = "DELETE FROM schedule WHERE id = '$id'";
    mysqli_query($conn, $query);
    echo "Schedule Deleted Successfully";
}

function sendSMS()
{
    //info
    $smsDate = $_POST["smsDate"];
    $smsNumber = "+639217214912"; //$_POST["smsNumber"]; //default muna
    $smsName = $_POST["smsName"];
    $smsPetname = $_POST["smsPetname"];
    $smsMessage = $_POST["smsMessage"];

    //$smsbody = "Hello " . $smsName . ", " . $smsMessage . " ";

    require 'sms\index.php';

    echo send($smsNumber, $smsMessage);
}
