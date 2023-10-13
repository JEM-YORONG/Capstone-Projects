<?php
if (isset($_POST["action"])) {
    if ($_POST["action"] == "setId") {
        $id = $_POST["addId"];
        echo $id;
    }
}
