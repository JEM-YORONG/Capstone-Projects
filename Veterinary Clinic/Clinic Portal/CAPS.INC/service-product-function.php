<?php
require 'database-conn.php';

if (isset($_POST["action"])) {
    if ($_POST["action"] === "Add") {
        addData();
    }
    if ($_POST["action"] === "Edit") {
        editdata();
    }
    if ($_POST["action"] === "Delete") {
        deleteData();
    }
}

function addData()
{
    global $conn;

    $title = $_POST['title'];

    $img = $_FILES['addImage'];
    $imageExtension = strtolower(pathinfo($img['name'], PATHINFO_EXTENSION)); // Get the file extension
    $imageName = $title . '.' . $imageExtension; // Add the extension to the image name

    $imageData = file_get_contents($img['tmp_name']);
    $imageType = $img['type'];

    $categories = $_POST['categories'];
    $description = $_POST['description'];
    $currentDate = date('Y-m-d');

    if ($img["error"] === 4) {
        echo "Image Does Not Exist";
    } else {
        $fileSize = $img["size"];
        $validImageExtensions = ['jpg', 'jpeg', 'png'];

        if (!in_array($imageExtension, $validImageExtensions)) {
            echo "Invalid Image Extension";
        } else if ($fileSize > 1000000) // 1MB limit
        {
            echo "Image Size Is Too Large";
        } else {
            $checkerQuery = "SELECT * FROM serviceandproduct WHERE imagename = ?";

            // Check if the image name already exists in the database
            $stmt = mysqli_prepare($conn, $checkerQuery);

            if (!$stmt) {
                echo "Database Error: " . mysqli_error($conn);
            } else {
                mysqli_stmt_bind_param($stmt, "s", $imageName);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);

                // Check if any rows were returned
                if (mysqli_stmt_num_rows($stmt) > 0) {
                    echo "Image Name Already Exists";
                } else {
                    // Use prepared statements to prevent SQL injection.
                    $insertQuery = "INSERT INTO serviceandproduct (imagename, imagedata, imagetype, title, categories, description, date) VALUES (?, ?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_prepare($conn, $insertQuery);

                    if (!$stmt) {
                        echo "Database Error: " . mysqli_error($conn);
                    } else {
                        // Bind the parameters and execute the query.
                        mysqli_stmt_bind_param($stmt, "sssssss", $imageName, $imageData, $imageType, $title, $categories, $description, $currentDate);

                        if (mysqli_stmt_execute($stmt)) {
                            echo "Added Successfully";
                        } else {
                            echo "Database Error: " . mysqli_error($conn);
                        }
                    }
                }

                mysqli_stmt_close($stmt);
            }
        }
    }
    mysqli_close($conn);
}



function EditData()
{
    global $conn;
    $img = $_FILES['AddImage'];
    $title = $_POST['Title'];
    $imageExtension = strtolower(pathinfo($img['name'], PATHINFO_EXTENSION)); // Get the file extension
    $imageName = $title . '.' . $imageExtension; // Add the extension to the image name
    $imageData = file_get_contents($img['tmp_name']);
    $imageType = $img['type'];
    $categories = $_POST['Categories'];
    $description = $_POST['Description'];
    $id = $_POST["Id"];
    $currentDate = date('Y-m-d');

    if ($img["error"] === 4) {
        echo "Image does not exist";
    } else {
        $fileSize = $img["size"];
        $validImageExtensions = ['jpg', 'jpeg', 'png'];

        if (!in_array($imageExtension, $validImageExtensions)) {
            echo "Invalid image extension";
        } else if ($fileSize > 1000000) {
            echo "Image size is too large";
        } else {
            // Use prepared statements to prevent SQL injection.
            $query = "UPDATE serviceandproduct SET imagename = ?, imagedata = ?, imagetype = ?, title = ?, categories = ?, description = ?, date = ? WHERE id = ?";
            $stmt = mysqli_prepare($conn, $query);
            if (!$stmt) {
                echo "Database Error: " . mysqli_error($conn);
            } else {
                // Bind the parameters and execute the query.
                mysqli_stmt_bind_param($stmt, "sssssssi", $imageName, $imageData, $imageType, $title, $categories, $description, $currentDate, $id);
                if (mysqli_stmt_execute($stmt)) {
                    echo "Updated Successfully.";
                } else {
                    echo "Database Error: " . mysqli_error($conn);
                }
                mysqli_stmt_close($stmt);
            }
        }
    }
    mysqli_close($conn);
}


function deleteData()
{
    global $conn;
    $rowId = $_POST['Title'];
    $query = "DELETE FROM serviceandproduct WHERE id = '$rowId'";
    mysqli_query($conn, $query);
    echo "Id " . $rowId . " Deleted Successfully";
}
