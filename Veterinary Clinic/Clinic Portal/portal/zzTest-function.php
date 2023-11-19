<?php
if (isset($_POST["action"])) {
    if ($_POST["action"] == "display") {
        display();
    }
}

function display()
{
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];

    if (empty($fname) || empty($lname)) {
        echo "Empty fields detected.";
    } else {
        echo "success";
    }
}
