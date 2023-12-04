<?php
require 'database-conn.php';

if (isset($_POST["action"])) {
    if ($_POST["action"] == "addStaff") {
        addStaff();
    }
    if ($_POST["action"] == "editStaff") {
        editStaff();
    }
    if ($_POST["action"] == "deleteStaff") {
        deleteStaff();
    }
}

function addStaff()
{
    global $conn;

    $id = $_POST["id"];
    $name = $_POST["name"];
    $role = $_POST["role"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Sanitize input
    $idClean = mysqli_real_escape_string($conn, $id);
    $nameClean = mysqli_real_escape_string($conn, $name);
    $roleClean = mysqli_real_escape_string($conn, $role);
    $contactClean = mysqli_real_escape_string($conn, $contact);
    $emailClean = mysqli_real_escape_string($conn, $email);
    $passwordClean = mysqli_real_escape_string($conn, $password);

    // Validate input
    if (empty($idClean) || empty($nameClean) || empty($roleClean) || empty($contactClean) || empty($emailClean) || empty($passwordClean)) {
        echo "Empty Fields Detected";
    } else if (strlen($contactClean) !== 11 || !ctype_alnum($contactClean)) {
        echo "Contact must be 11 digit";
    } else if (strlen($passwordClean) !== 8 || !ctype_alnum($passwordClean)) {
        echo "Password must be at least 8 characters";
    } else if (substr($email, -10) !== "@gmail.com") {
        echo "Invalid Email";
    } else {
        /*
        echo $idClean;
        echo $nameClean;
        echo $roleClean;
        echo $contactClean;
        echo $emailClean;
        echo $passwordClean;
        */


        $query = "SELECT email, contact FROM staffs";
        $result = mysqli_query($conn, $query);

        $emailArray = array();
        $contactArray = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $emailArray[] = $row['email'];
            $contactArray[] = $row['contact'];
        }

        if ($role == "Groomer" || $role == "Assistant") {

            if (in_array($contactClean, $contactArray)) {
                echo "Contact is already used.";
            } else {
                $query = "INSERT INTO staffs (cliniId, name, role, contact, email, password) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($conn, $query);

                $e = '--------';
                $p = '--------';

                mysqli_stmt_bind_param($stmt, "ssssss", $idClean, $nameClean, $roleClean, $contactClean, $e, $p);

                if (mysqli_stmt_execute($stmt)) {
                    echo "Staff added successfully";
                } else {
                    //echo "Error adding staff: " . mysqli_error($conn);
                }
                // Close the statement
                mysqli_stmt_close($stmt);
            }
        } else {
            // Check if contact or email already exists
            if (in_array($contactClean, $contactArray)) {
                echo "Contact is already used.";
                return;
            }
            if (in_array($emailClean, $emailArray)) {
                echo "Email is already used.";
                return;
            }

            $query = "INSERT INTO staffs (cliniId, name, role, contact, email, password) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $query);

            mysqli_stmt_bind_param($stmt, "ssssss", $idClean, $nameClean, $roleClean, $contactClean, $emailClean, $passwordClean);

            if (mysqli_stmt_execute($stmt)) {
                echo "Staff added successfully";
            } else {
                //echo "Error adding staff: " . mysqli_error($conn);
            }
            // Close the statement
            mysqli_stmt_close($stmt);

            mysqli_close($conn);
        }
    }
}

function editStaff()
{
    global $conn;

    $id = $_POST["editId"];
    $name = $_POST["editName"];
    $role = $_POST["editRole"];
    $contact = $_POST["editContact"];
    $email = $_POST["editEmail"];
    $password = $_POST["editPassword"];

    /*
    //testing purposes
    echo $id;
    echo $name;
    echo $role;
    echo $contact;
    echo $email;
    echo $password;
    */

    // Sanitize input
    $idClean = mysqli_real_escape_string($conn, $id);
    $nameClean = mysqli_real_escape_string($conn, $name);
    $roleClean = mysqli_real_escape_string($conn, $role);
    $contactClean = mysqli_real_escape_string($conn, $contact);
    $emailClean = mysqli_real_escape_string($conn, $email);
    $passwordClean = mysqli_real_escape_string($conn, $password);

    // Validate input
    if (empty($idClean) || empty($nameClean) || empty($roleClean) || empty($contactClean) || empty($emailClean) || empty($passwordClean)) {
        echo "Empty Fields Detected";
    } else if (strlen($contactClean) !== 11 || !ctype_alnum($contactClean)) {
        echo "Contact must be 11 digit";
    } else if (strlen($passwordClean) !== 8 || !ctype_alnum($passwordClean)) {
        echo "Password must be at least 8 characters";
    } else if (substr($email, -10) !== "@gmail.com") {
        echo "Invalid Email";
    } else {
        /*
            echo $idClean;
            echo $nameClean;
            echo $roleClean;
            echo $contactClean;
            echo $emailClean;
            echo $passwordClean;
            */

        // $query = "SELECT email, contact FROM staffs";
        // $result = mysqli_query($conn, $query);

        // $idArray = array();
        // $contactArray = array();

        // while ($row = mysqli_fetch_assoc($result)) {
        //     $idArray[] = $row['cliniId'];
        //     $contactArray[] = $row['contact'];
        // }

        // if (in_array($id, $idArray)) {
        //     echo "Contact is already used.";
        //     return;
        // }
        
        $query = "UPDATE staffs SET name = '$nameClean', role = '$roleClean', contact = '$contactClean', email = '$emailClean', password = '$passwordClean' WHERE cliniId = '$id'";
        mysqli_query($conn, $query);
        mysqli_close($conn);
        echo "Staff updated successfully";
    }
}

function deleteStaff()
{
    global $conn;

    $id = $_POST["editId"];

    $query = "DELETE FROM staffs WHERE cliniId = '$id'";
    mysqli_query($conn, $query);
    echo "Staff deleted successfully";
}
