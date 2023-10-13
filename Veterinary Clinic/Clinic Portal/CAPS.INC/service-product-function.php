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
    $img = $_FILES['addImage'];
    $title = $_POST['title'];
    $categories = $_POST['categories'];
    $description = $_POST['description'];
    $currentDate = date('Y-m-d');

    if ($img["error"] === 4) {
        echo "Image Does Not Exist";
    } else {
        $fileName = $img["name"];
        $fileSize = $img["size"];
        $tmpName = $img["tmp_name"];
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if (!in_array($imageExtension, $validImageExtension)) {
            echo "Invalid Image Extension";
        } else if ($fileSize > 5000000) //5mb limit
        {
            echo "Image Size Is Too Large";
        } else {
            $newImageName = uniqid() . '.' . $imageExtension;
            move_uploaded_file($tmpName, 'tempImage/' . $newImageName); //move uploaded file to temp image folder

            $query = "INSERT INTO serviceandproduct (image, title, categories, description, date) VALUES ('$newImageName', '$title', '$categories', '$description', '$currentDate')";
            mysqli_query($conn, $query);
            mysqli_close($conn);
            echo "Added Successfully";
        }
    }
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
