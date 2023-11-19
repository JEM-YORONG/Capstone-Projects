<?php
require "database-conn.php";

if (isset($_POST["action"])) {
    if ($_POST["action"] == "checker") {
        checker();
    }
}

function checker()
{
    global $conn;

    $username = isset($_POST["username"]) ? htmlspecialchars($_POST["username"], ENT_QUOTES, 'UTF-8') : '';
    $password = isset($_POST["password"]) ? htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8') : '';

    // Validate the username and password
    if (empty($username)) {
        echo "Invalid username!";
        exit;
    }
    if (empty($password)) {
        echo "Invalid password!";
        exit;
    }

    // Prepare the SQL statement with placeholders for staff login
    $query = "SELECT * FROM staffs WHERE email = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if the query returned any rows for staff login
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        if ($row['role'] == 'Admin') {
            $_SESSION['user'] = "Admin";
            $user = "admin";
            $query = "UPDATE login SET user = '$user' WHERE id = '1'";
            mysqli_query($conn, $query);
            mysqli_close($conn);
        } elseif ($row['role'] == 'Secretary') {
            $user = "secretary";
            $query = "UPDATE login SET user = '$user' WHERE id = '1'";
            mysqli_query($conn, $query);
            mysqli_close($conn);
        } elseif ($row['role'] == 'Veterinarian') {
            $user = "veterinarian";
            $query = "UPDATE login SET user = '$user' WHERE id = '1'";
            mysqli_query($conn, $query);
            mysqli_close($conn);
        } else {
            // Login failed
            echo "Invalid username or password!";
            $user = "";
        }

        // Login successful
        echo $user;
    } else {
        // Login failed
        echo "Invalid username or password!";
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}
