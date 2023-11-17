<?php
require 'database-conn.php';

if (isset($_POST["action"])) {
    if ($_POST["action"] == "sendID") {
        display();
    }
}

function display()
{
    global $conn;

    $ownerid = $_POST["getID"];

    echo $ownerid;
}
?>