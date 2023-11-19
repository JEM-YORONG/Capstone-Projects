<?php
require 'database-conn.php';

if (isset($_POST["action"])) {
    if ($_POST["action"] == "addInfo") {
        addInfo();
    }
    if ($_POST["action"] == "addContact") {
        addContact();
    }
    if ($_POST["action"] == "addSched") {
        addSched();
    }
}

function addInfo()
{
    global $conn;

    $title = $_POST['title'];
    $address = $_POST['address'];
    $intro = $_POST['intro'];
    $about = $_POST['about'];

    if (empty(trim($title)) || empty(trim($address)) || empty(trim($intro)) || empty(trim($about))) {
        // At least one of the values is empty or only contains whitespace
        echo "Please fill in all the fields.";
        return;
    }

    try {
        if (isset($_FILES['addImage']) && !empty($_FILES['addImage']['name'])) {
            // $_FILES['addImage'] is defined and not empty
            $img = $_FILES['addImage'];

            $imageExtension = strtolower(pathinfo($img['name'], PATHINFO_EXTENSION));
            $imageName = $title . '.' . $imageExtension;
            $imageData = file_get_contents($img['tmp_name']);
            $imageType = $img['type'];

            if ($img["error"] === 4) {
                echo "Image Does Not Exist";
            } else {
                $fileSize = $img["size"];
                $validImageExtensions = ['jpg', 'jpeg', 'png'];
                $allowedMimeType = ['image/jpeg', 'image/jpg', 'image/png'];

                if (!in_array($imageExtension, $validImageExtensions) || !in_array($imageType, $allowedMimeType)) {
                    echo "Invalid Image Extension or Type";
                } else if ($fileSize > 1000000) // 1MB limit
                {
                    echo "Image Size Is Too Large";
                } else {
                    $updateQuery = "UPDATE aboutus SET imagename = ?, imagedata = ?, imagetype = ?, title = ?, address = ?, intro = ?, about = ? WHERE id = ?";
                    $stmt = mysqli_prepare($conn, $updateQuery);

                    if (!$stmt) {
                        //echo "Database Error: " . mysqli_error($conn);
                    } else {
                        $id = 1;
                        mysqli_stmt_bind_param($stmt, "sssssssi", $imageName, $imageData, $imageType, $title, $address, $intro, $about, $id);

                        if (mysqli_stmt_execute($stmt)) {
                            echo "success";
                        } else {
                            //echo "Database Error: " . mysqli_error($conn);
                        }
                    }
                }
            }
        } else {
            $updateQuery = "UPDATE aboutus SET title = ?, address = ?, intro = ?, about = ? WHERE id = ?";
            $stmt = mysqli_prepare($conn, $updateQuery);

            if (!$stmt) {
                //echo "Database Error: " . mysqli_error($conn);
            } else {
                $id = 1;
                mysqli_stmt_bind_param($stmt, "ssssi", $title, $address, $intro, $about, $id);

                if (mysqli_stmt_execute($stmt)) {
                    echo "success";
                } else {
                    //echo "Database Error: " . mysqli_error($conn);
                }
            }
        }
    } catch (Exception $e) {
        // Log or handle the exception appropriately
    } finally {
        mysqli_close($conn);
    }
}


function addContact()
{
    global $conn;

    $c1 = $_POST['c1'];
    $c2 = $_POST['c2'];
    $e = $_POST['e'];
    $s1 = $_POST['s1'];
    $s2 = $_POST['s2'];
    $s3 = $_POST['s3'];

    if (empty(trim($c1)) || empty(trim($c2)) || empty(trim($e)) || empty(trim($s1)) || empty(trim($s2)) || empty(trim($s3))) {
        // At least one of the values is empty or only contains whitespace
        echo "Please fill in all the fields.";
        return;
    } 

    $queryUpdate = "UPDATE cliniccontact
    SET contact1 = '$c1', contact2 = '$c2', email = '$e', social1 = '$s1', social2 = '$s2', social3 = '$s3'
    WHERE id = '1';
    ";
    mysqli_query($conn, $queryUpdate);

    echo "success";
}

function addSched()
{
    global $conn;

    $mts = $_POST['mts'];
    $mte = $_POST['mte'];
    $mm = $_POST['mm'];

    $queryUpdate1 = "UPDATE clinicschedule
    SET start = '$mts', end = '$mte', status = '$mm'
    WHERE id = '1';
    ";
    mysqli_query($conn, $queryUpdate1);

    $tts = $_POST['tts'];
    $tte = $_POST['tte'];
    $tm = $_POST['tm'];

    $queryUpdate2 = "UPDATE clinicschedule
    SET start = '$tts', end = '$tte', status = '$tm'
    WHERE id = '2';
    ";
    mysqli_query($conn, $queryUpdate2);

    $wts = $_POST['wts'];
    $wte = $_POST['wte'];
    $wm = $_POST['wm'];

    $queryUpdate3 = "UPDATE clinicschedule
    SET start = '$wts', end = '$wte', status = '$wm'
    WHERE id = '3';
    ";
    mysqli_query($conn, $queryUpdate3);

    $thts = $_POST['thts'];
    $thte = $_POST['thte'];
    $thm = $_POST['thm'];

    $queryUpdate4 = "UPDATE clinicschedule
    SET start = '$thts', end = '$thte', status = '$thm'
    WHERE id = '4';
    ";
    mysqli_query($conn, $queryUpdate4);

    $fts = $_POST['fts'];
    $fte = $_POST['fte'];
    $fm = $_POST['fm'];

    $queryUpdate5 = "UPDATE clinicschedule
    SET start = '$fts', end = '$fte', status = '$fm'
    WHERE id = '5';
    ";
    mysqli_query($conn, $queryUpdate5);

    $sts = $_POST['sts'];
    $ste = $_POST['ste'];
    $sm = $_POST['sm'];

    $queryUpdate6 = "UPDATE clinicschedule
    SET start = '$sts', end = '$ste', status = '$sm'
    WHERE id = '6';
    ";
    mysqli_query($conn, $queryUpdate6);

    $suts = $_POST['suts'];
    $sute = $_POST['sute'];
    $sum = $_POST['sum'];

    $queryUpdate7 = "UPDATE clinicschedule
    SET start = '$suts', end = '$sute', status = '$sum'
    WHERE id = '7';
    ";
    mysqli_query($conn, $queryUpdate7);

    echo "success";
}
