<?php
require 'database-conn.php';

if (isset($_POST["action"])) {
    if ($_POST["action"] == "update") {
        update();
    }
    if ($_POST["action"] == "addPet") {
        addPet();
    }
    if ($_POST["action"] == "updatePet") {
        updatePet();
    }
    if ($_POST["action"] == "delete") {
        deletePet();
    }
}

function update()
{
    global $conn;
    // Customer info
    $custId = sanitizeInput($_POST['updateId']);
    $custLastName = sanitizeInput($_POST['updateLastName']);
    $custFirstName = sanitizeInput($_POST['updateFirstName']);
    $custContact = sanitizeInput($_POST['updateContact']);
    $custEmail = sanitizeInput($_POST['updateEmail']);
    $custAddress = sanitizeInput($_POST['updateAddress']);

    // Validate input - customer and pet
    if (
        empty($custId) || empty($custLastName) || empty($custFirstName) || empty($custContact) || empty($custEmail) || empty($custAddress)
    ) {
        echo "Empty Fields Detected.";
    } else {
        // Prepare the SQL statement for customer name
        $query = "SELECT * FROM customer WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $custId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // 
        if (mysqli_num_rows($result) == 1) {
            $query = "UPDATE customer SET lastname = ?, firstname = ?, contact = ?, email = ?, address = ? WHERE id = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "sssssi", $custLastName, $custFirstName, $custContact, $custEmail, $custAddress, $custId);
            mysqli_stmt_execute($stmt);

            // Update the pet owner information
            $query2 = "UPDATE pet SET ownerfirstname = ?, ownerlastname = ?, ownercontact = ?, owneremail = ?, owneraddress = ? WHERE ownerid = ?";
            $stmt2 = mysqli_prepare($conn, $query2);
            mysqli_stmt_bind_param($stmt2, "sssssi", $custFirstName, $custLastName, $custContact, $custEmail, $custAddress, $custId);
            mysqli_stmt_execute($stmt2);

            echo "Customer Information Updated Successfully.";
        }
    }
}

function sanitizeInput($input)
{
    // Remove leading/trailing white spaces
    $input = trim($input);
    // Remove backslashes
    $input = stripslashes($input);
    // Convert special characters to HTML entities
    $input = htmlspecialchars($input);
    return $input;
}

function addPet()
{
    global $conn;

    //pet info
    $petId = $_POST["petId"];
    $petName = $_POST["petName"];
    $gender = $_POST["gender"];
    $birthDate = $_POST["birthDate"];
    $type = $_POST["type"];
    $breed = $_POST["breedd"];
    $species = $_POST["speciess"];

    //owner info
    $ownerId = $_POST["ownerId"];
    $ownerLastname = $_POST["ownerLastname"];
    $ownerFirstname = $_POST["ownerFirstname"];
    $ownerContact = $_POST["ownerContact"];
    $ownerEmail = $_POST["ownerEmail"];
    $ownerAddress = $_POST["ownerAddress"];

    $query = "INSERT INTO pet VALUES (
        '',
        '$petId',
        '$ownerId',
        '$petName',
        '$ownerFirstname',
        '$ownerLastname',
        '$ownerContact',
        '$ownerEmail',
        '$ownerAddress',
        '$birthDate',
        '$type',
        '$breed',
        '$species',
        '$gender'
    )";
    mysqli_query($conn, $query);
    mysqli_close($conn);
    echo "Pet Added Successfully.";
    echo $_POST["breed"];
    echo $_POST["species"];
}

function updatePet()
{
    global $conn;

    //pet info
    $id = sanitizeInput($_POST['id']);
    $name = sanitizeInput($_POST['name']);
    $breed = sanitizeInput($_POST['breed']);
    $species = sanitizeInput($_POST['species']);
    $birthdate = sanitizeInput($_POST['birthdate']);

    // Validate input - customer and pet
    if (
        empty($id) || empty($name) || empty($breed) || empty($species) || empty($birthdate)
    ) {
        echo "Empty Fields Detected.";
    } else {
        // Prepare the SQL statement for customer name
        $query = "SELECT * FROM pet WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // 
        if (mysqli_num_rows($result) == 1) {
            $query = "UPDATE pet SET petname = ?, breed = ?, species = ?, birthdate = ? WHERE id = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "ssssi", $name, $breed, $species, $birthdate, $id);
            mysqli_stmt_execute($stmt);

            echo "Pet Information Updated Successfully.";
        }
    }
}

function deletePet()
{
    global $conn;

    $id = $_POST["id"];

    $query = "DELETE FROM pet WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Pet Deleted Successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
