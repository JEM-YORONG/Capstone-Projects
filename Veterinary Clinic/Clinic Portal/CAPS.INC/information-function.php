<?php
require 'database-conn.php';

if (isset($_POST["action"])) {
    if ($_POST["action"] == "editInformation") {
        changeInformation();
    }
}

function changeInformation(){
    global $conn;
    echo "Submited.";
}