<?php
require 'database-conn.php';

if (isset($_POST["action"])) {
    if ($_POST["action"] == "addCustomer") {
        addCustomer();
    }
    if ($_POST["action"] == "deleteCustomer") {
        deleteCustomer();
    }
}

function addCustomer()
{
    global $conn;

    //customer info
    $custId = $_POST['addId'];
    $custLastName = $_POST['addLastName'];
    $custFirstName = $_POST['addFirstName'];
    $custContact = $_POST['addContact'];
    $custEmail = $_POST['addEmail'];
    $custAddress = $_POST['addAddress'];

    //sanitize input - customer and pet
    $custIdS = mysqli_real_escape_string($conn, $custId);
    $custLastNameS = mysqli_real_escape_string($conn, $custLastName);
    $custFirstNameS = mysqli_real_escape_string($conn, $custFirstName);
    $custContactS = mysqli_real_escape_string($conn, $custContact);
    $custEmailS = mysqli_real_escape_string($conn, $custEmail);
    $custAddressS = mysqli_real_escape_string($conn, $custAddress);

    //validate input - customer and pet
    if (
        empty($custIdS) || empty($custLastNameS) || empty($custFirstNameS) || empty($custContactS) || empty($custAddressS)
    ) {
        echo "Empty Fields Detected.";
    } else if (strlen($custContactS) !== 11 || !ctype_alnum($custContactS)) {
        echo "Contact must be 11 digit";
    } else {
        // Prepare the SQL statement for customer name
        $query = "SELECT * FROM customer WHERE lastname = ? AND firstname = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ss", $custLastNameS, $custFirstNameS);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Check if the query returned any rows for lastname and firstname
        if (mysqli_num_rows($result) == 1) {
            echo "Customer already exist.";
        } else {
            $query = "INSERT INTO customer VALUES ('', '$custIdS', '$custLastNameS', '$custFirstNameS', '$custContactS', '$custEmailS', '$custAddressS')";
            mysqli_query($conn, $query);
            mysqli_close($conn);
            echo "CustomerAddedSuccessfully";
        }
    }
}

function deleteCustomer()
{
    global $conn;

    $id = $_POST["addId"];

    $query = "DELETE FROM customer WHERE id = ?";
    $query2 = "DELETE FROM pet WHERE ownerid = ?";

    $stmt1 = mysqli_prepare($conn, $query);
    $stmt2 = mysqli_prepare($conn, $query2);

    if ($stmt1 && $stmt2) {
        mysqli_stmt_bind_param($stmt1, "i", $id);
        mysqli_stmt_bind_param($stmt2, "i", $id);

        $result1 = mysqli_stmt_execute($stmt1);
        $result2 = mysqli_stmt_execute($stmt2);

        if ($result1 && $result2) {
            echo "CustomerDeletedSuccessfully";
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt1);
        mysqli_stmt_close($stmt2);
    } else {
        echo "Error in preparing statements: " . mysqli_error($conn);
    }
}
