<?php

require 'database-conn.php';

if (isset($_POST["action"])) {
    if ($_POST["action"] == "addProduct") {
        addProduct();
    }
    if ($_POST["action"] == "editProduct") {
        editProduct();
    }
    if ($_POST["action"] == "deleteProduct") {
        deleteProduct();
    }
}

function addProduct()
{
    global $conn;

    $id = $_POST["id"];
    $name = $_POST["name"];
    $maxquantity = $_POST["maxquantity"];
    $minquantity = $_POST["minquantity"];
    $type = $_POST["type"];

    // Sanitize input
    $idClean = mysqli_real_escape_string($conn, $id);
    $nameClean = mysqli_real_escape_string($conn, $name);
    $maxquantityClean = mysqli_real_escape_string($conn, $maxquantity);
    $minquantityClean = mysqli_real_escape_string($conn, $minquantity);
    $typeClean = mysqli_real_escape_string($conn, $type);

    // Validate input
    if (empty($idClean) || empty($nameClean) || empty($maxquantityClean) || empty($minquantityClean) || empty($typeClean)) {
        echo "Empty Fields Detected.";
    } else {
        $totalQuantity = intval($maxquantityClean);
        $maxquantity = intval($maxquantityClean);
        $minquantity = intval($minquantityClean);

        $status = "";

        if ($totalQuantity < $minquantity && $totalQuantity != 0) {
            $status = "Low Stock";
        } else if ($totalQuantity >= $minquantity) {
            $status = "High Stock";
        } else {
            $status = "No Stock";
        }

        // Prepare the SQL statement for checking email
        $query = "SELECT * FROM inventory WHERE name = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $nameClean);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Check if the query returned any rows for email
        if (mysqli_num_rows($result) == 1) {
            echo "Product name is already exists.";
        } else {
            $query = "INSERT INTO inventory VALUES ('', '$idClean', '$nameClean', '$maxquantityClean', '$typeClean', '$minquantityClean', '$status')";
            mysqli_query($conn, $query);
            mysqli_close($conn);
            echo "Product Added Successfully.";
        }
    }
}

function editProduct()
{
    global $conn;

    $id = $_POST["editId"];
    $name = $_POST["editName"];
    $maxquantity = $_POST["editMaxQuantity"];
    $minquantity = $_POST["editMinQuantity"];
    $type = $_POST["editType"];

    // Sanitize input
    $idClean = mysqli_real_escape_string($conn, $id);
    $nameClean = mysqli_real_escape_string($conn, $name);
    $maxQuantityClean = mysqli_real_escape_string($conn, $maxquantity);
    $minQuantityClean = mysqli_real_escape_string($conn, $minquantity);
    $typeClean = mysqli_real_escape_string($conn, $type);

    $totalQuantity = intval($maxQuantityClean);
    $maxquantity = intval($maxQuantityClean);
    $minquantity = intval($minQuantityClean);

    $status = "";

    if ($totalQuantity < $minquantity && $totalQuantity != 0) {
        $status = "Low Stock";
    } else if ($totalQuantity >= $minquantity) {
        $status = "High Stock";
    } else {
        $status = "No Stock";
    }

    // Validate input
    $query = "UPDATE inventory SET name = '$nameClean', maxquantity = '$maxQuantityClean', type = '$typeClean', minquantity = '$minQuantityClean', status = '$status' WHERE productId = '$idClean'";
    mysqli_query($conn, $query);
    mysqli_close($conn);
    echo "Product Updated Successfully.";
}

function deleteProduct()
{
    global $conn;

    $id = $_POST["editId"];

    $query = "DELETE FROM inventory WHERE productId = '$id'";
    mysqli_query($conn, $query);
    echo "Product Deleted Successfully";
}
