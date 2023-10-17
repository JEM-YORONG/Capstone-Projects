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
    $imageName = $title;
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
        $imageExtension = strtolower(pathinfo($img['name'], PATHINFO_EXTENSION));

        if (!in_array($imageExtension, $validImageExtensions)) {
            echo "Invalid Image Extension";
        } else if ($fileSize > 1000000) // 1MB limit
        {
            echo "Image Size Is Too Large";
        } else {
            // Use prepared statements to prevent SQL injection.
            $query = "INSERT INTO serviceandproduct (imagename, imagedata, imagetype, title, categories, description, date) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $query);
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
    $categories = $_POST['Categories'];
    $description = $_POST['Description'];
    $id = $_POST["Id"];
    $currentDate = date('Y-m-d');

    if ($img["error"] === 4) {
        echo "Image does not exist";
    } else {
        $fileName = $img["name"];
        $fileSize = $img["size"];
        $tmpName = $img["tmp_name"];
        $validImageExtensions = ['jpg', 'jpeg', 'png'];
        $imageExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (!in_array($imageExtension, $validImageExtensions)) {
            echo "Invalid image extension";
        } else if ($fileSize > 5000000) {
            echo "Image size is too large";
        } else {
            $checkQuery = "SELECT * FROM serviceandproduct WHERE image = '$fileName'";
            $result = mysqli_query($conn, $checkQuery);

            if (mysqli_num_rows($result) > 0) {
                //echo "Image already exists in the database";
                //$newImageName = uniqid() . '.' . $imageExtension;
                //move_uploaded_file($tmpName, 'tempImage/' . $newImageName); //move uploaded file to temp image folder 
                $query = "UPDATE serviceandproduct SET title = '$title', categories = '$categories', description = '$description', date = '$currentDate' WHERE id = '$id'";
                mysqli_query($conn, $query);
                mysqli_close($conn);
                echo "Updated Successfully.";
            } else {
                //echo "Image does not exist in the database";
                $newImageName = uniqid() . '.' . $imageExtension;
                move_uploaded_file($tmpName, 'tempImage/' . $newImageName); //move uploaded file to temp image folder 
                $query = "UPDATE serviceandproduct SET image = '$newImageName', title = '$title', categories = '$categories', description = '$description', date = '$currentDate' WHERE id = '$id'";
                mysqli_query($conn, $query);
                mysqli_close($conn);
                echo "Updated Successfully.";
            }
        }
    }
}

function deleteData()
{
    global $conn;
    $rowId = $_POST['Title'];
    $query = "DELETE FROM serviceandproduct WHERE id = '$rowId'";
    mysqli_query($conn, $query);
    echo "Id " . $rowId . " Deleted Successfully";
}
