<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require 'database-conn.php';

    function delete()
    {
        global $conn;
        $query = "DELETE FROM schedule WHERE status = 'Missed'";
        mysqli_query($conn, $query);
        echo "Missed Schedule Deleted Successfully";
    }
    delete();
    function deletePast()
    {
        global $conn;
        $query = "DELETE FROM schedule WHERE status = 'Past'";
        mysqli_query($conn, $query);
        echo "Past Schedule Deleted Successfully";
    }
    deletePast();
    ?>
</body>

</html>