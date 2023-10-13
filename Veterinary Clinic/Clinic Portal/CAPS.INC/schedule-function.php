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
    $petname = $_POST["petname"];
    $type = $_POST["type"];
    $service = $_POST["service"];
    $number = $_POST["number"];
    $customerName = "";
    $customerPet = "";
    $status = "";

    // Validate input fields for empty values
    if (empty($date) || empty($name) || empty($petname) || empty($type) || empty($service) || empty($number)) {
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

        // Query the pet data based on the customer's ID and pet name
        $query2 = "SELECT * FROM pet WHERE ownerid = '$ownerId' AND petname = '$petname'";
        $result2 = mysqli_query($conn, $query2);

        // Check if the query was successful
        if ($result2 && $row2 = mysqli_fetch_assoc($result2)) {
            $customerPet = $petname;

            // Convert the input date string to a DateTime object
            $inputDate = new DateTime($date);
            $currentDate = new DateTime();

            if ($inputDate < $currentDate) {
                $status = "Past";
            } elseif ($inputDate > $currentDate) {
                $status = "Upcoming";
            }

            // Insert the appointment into the database with the determined status
            $query3 = "INSERT INTO schedule (ownername, petname, type, service, date, number, status) VALUES ('$customerName', '$customerPet', '$type', '$service', '$date', '$number', '$status')";
            if (mysqli_query($conn, $query3)) {
                echo "Schedule Added Successfully.";
            } else {
                echo "Error inserting schedule: " . mysqli_error($conn);
            }
        } else {
            echo "Pet name " . $petname . " didn't exist in customer pet list.";
        }
    } else {
        echo "Customer " . $name . " didn't exist in customer list.";
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
