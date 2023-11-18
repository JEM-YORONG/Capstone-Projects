<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css files\Capstone_ClinicSched.css">

    <link rel="stylesheet" href="css files\Capstone_Pets.css">
    <link rel="stylesheet" href="css files\Capstone_ClinicAboutUs copy.css">

    <!----===== Icons ===== -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <?php require 'alert-notif-function.php'; ?>

    <!-- drop down names -->
    <style>
        .select-dropdown {
            position: relative;
            display: inline-block;
        }

        .input {
            padding: 10px;
            border: 1px solid #ccc;
        }

        .dropdown-options {
            display: none;
            position: absolute;
            z-index: 1;
            border: 1px solid #ccc;
            max-height: 150px;
            overflow-y: auto;
            background-color: #ffffff;
        }

        .dropdown-options li {
            list-style: none;
            padding: 5px;
            cursor: pointer;
        }
    </style>
    <!-- pop up details -->
    <style>
        /*form pop-up details*/
        .form-popup-details {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9;
        }

        .form-container-details {
            width: 700px;
            background: #f5f2ff;
            margin: 20px auto;
            box-shadow: 3px 3px 6px #abbef7;
            padding: 12px;
            border-style: 2px solid;
            height: auto;
        }

        .form-container-details .title {
            font-size: 20px;
            font-weight: 700;
            color: #2c3d8f;
            text-transform: uppercase;

        }

        .inputfield-grid {
            display: grid;
            grid-template-columns: 55% 45%;
        }

        .form-container-details .form-details .inputfield {
            margin-bottom: 10px;
            margin-left: 5px;
            display: flex;
            align-items: center;
        }

        .form-container-details .form-details .inputfield label {
            width: 200px;
            color: #757575;
            margin-right: 10px;
            font-size: 15px;
        }

        .form-container-details .form-details .inputfield .input,
        .form-container-details .form-details .inputfield .textarea {
            width: 100%;
            outline: none;
            border: 1px solid #d5dbd9;
            font-size: 12px;
            padding: 2px 8px;
            border-radius: 3px;
            transition: all 0.3s ease;
        }

        .form-container-details .form-details .inputfield .textarea {
            width: 100%;
            height: 50px;
            resize: none;
        }

        .form-container-details .form-details .inputfield .custom_select {
            position: relative;
            width: 100%;
            height: 30px;
        }

        .form-container-details .form-details .inputfield .custom_select:before {
            content: "";
            position: absolute;
            top: 12px;
            right: 10px;
            border: 8px solid;
            border-color: #d5dbd9 transparent transparent transparent;
            pointer-events: none;
        }

        .form-container-details .form-details .inputfield .custom_select select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            outline: none;
            width: 100%;
            height: 100%;
            border: 0px;
            padding: 2px 8px;
            font-size: 12px;
            border: 1px solid #d5dbd9;
            border-radius: 3px;
        }

        .form-container-details .form-details .inputfield .input:focus,
        .form-container-details .form-details .inputfield .textarea:focus,
        .form-container-details .form-details .inputfield .custom_select select:focus {
            border: 1px solid #2c3d8f;
            ;
        }


        .form-container-details .btn-close {
            width: 100%;
            padding: 2px 8px;
            font-size: 15px;
            border: 0px;
            background: #fcaa93;
            color: #fff;
            cursor: pointer;
            border-radius: 3px;
            outline: none;

        }

        .form-container-details .btn-close:hover {
            background-color: #fa5d5a;
        }

        .form-container .form .inputfield:last-child {
            margin-bottom: 0;
        }

        /**/
        .form-popup-details .detail-table {
            margin-top: 10px;
            margin-bottom: 10px;
            max-height: 200px;
            overflow-y: scroll;
        }

        .form-popup-details table {
            border-collapse: collapse;
            border-spacing: 0;
            table-layout: auto;
            width: 100%;

        }

        .form-popup-details th {
            text-align: center;
            padding: 8px;
            border-bottom: 3px solid #ddd;
            font-size: 20px;
        }

        .form-popup-details td {
            text-align: center;
            padding: 8px;
            border-bottom: 1px solid #ddd;
            font-size: 18px;
        }

        .form-popup-details .visibility {
            color: #5a81fa;
            cursor: pointer;
        }

        .form-popup-details .details-button {
            background-color: #00000000;
            border-style: none;
            color: #5a81fa;
            cursor: pointer;
        }

        .form-popup-details .delete-button {
            background-color: #00000000;
            border-style: none;
            color: #fa5a5a;
            cursor: pointer;
        }

        .form-popup-details .details-button:hover,
        .delete-button:hover {
            color: #252936;
        }


        @media (max-width: 780px) {

            /**/
            .form-container-details {
                width: 400px;
                height: 400px;
                max-width: 400px;
                max-height: 400px;
            }

            .detail-table {
                width: 100%;
                height: 900px;
            }

            .form-container-details .inputfield-grid {
                display: block;
            }

            .form-container-details thead {
                border: none;
                clip: rect(0 0 0 0);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
                width: 1px;
            }

            .form-container-details tr {
                border-bottom: 3px solid #ddd;
                display: block;
                margin-bottom: .625em;
            }

            .form-container-details table td {
                border-bottom: 1px solid #ddd;
                display: block;
                font-size: .8em;
                text-align: right;
            }

            .form-container-details td::before {
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }

            .form-container-details td:last-child {
                border-bottom: 0;
            }
        }
    </style>
    <!--=====Change name mo na lang====-->
    <title>Admin Dashboard Panel</title>
</head>

<body>
    <!--=====Navigation Bar====-->
    <?php require 'nav-bar.html.php'; ?>
    <!--=====Pinaka taas/ title ganon====-->
    <section class="dashboard">
        <div class="top">
            <i class="sidebar-toggle"><span class="material-symbols-outlined">
                    menu
                </span></i>
            <div class="title">
                <span class="text">Clinic Schedule</span>
                <?php require 'alert-notif.php'; ?>
            </div>
        </div>
        <!--=====Customer/Pet/ Pet Grooming====-->
        <div class="dash-content">

            <!--=====Today Schedule and Search====-->
            <div class="activity">
                <div class="table-1">
                    <div class="title-clinic-schedule">
                        <span class="text">Today Schedule</span>
                        <input type="text" id="statusId" style="display: none;">
                        <div class="search-box" style="width: 580px;">
                            <br>
                            <input type="text" placeholder="Search here..." id="search1" name="search1">
                        </div>
                    </div>
                    <div class="bttn">
                        <button class="missed-button" onclick="" style="  background-color: #5a81fa;
                            border: 1px solid #21305d00;
                            border-radius: 8px;
                            box-sizing: border-box;
                            color: #ffffff;
                            cursor: pointer;
                            font-size: 13px;
                            line-height: 29px;
                            width: 150px;
                            float: right;
                            margin-right: 3%;
                            font-weight: bold;
                            ">
                            <a href="Capstone_MissedSchedule.php" style="text-decoration: none; color: white;">
                                Missed Schedules
                            </a>
                        </button>
                    </div>
                </div>

                <br><br>
                <!--=====Table for today schedule====-->
                <div class="today-clinic-schedule-responsive">
                    <table class="clinic-schedule" width=100%>
                        <thead>
                            <tr>
                                <th scope="col" width=5%></th>
                                <th scope="col">Status</th>
                                <th scope="col"> Notify </th>
                                <th scope="col">Date</th>
                                <th scope="col">Name</th>
                                <th scope="col" colspan="3">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="table-body1"></tbody>
                        <?php require 'script files\schedule-today-refresh.js..php'; ?>
                    </table>
                </div>

                <div class="table-2">
                    <div class="title-clinic-schedule">
                        <span class="text">Upcoming Schedule</span>
                    </div>
                </div>

                <!--Search and sort-->
                <div class="table-2">
                    <div class="search-box">
                        <input type="text" placeholder="Search here..." id="search2" name="search2">
                    </div>
                    <div class="date-picker">
                        <label>Sort by Date:</label>
                        <input type="date" class="input-date" id="sortDate" name="sortDate" min="2023-09-20" onchange="onSelect()">
                    </div>
                    <div class="date-picker" style="display: none;">
                        <input type="text" class="input-date" id="rowId" disabled>
                    </div>
                </div>

                <!--=====Upcoming for today schedule====-->
                <div class="upcoming-clinic-schedule">
                    <table>
                        <thead>
                            <tr>
                                <th scope="col"> Notify </th>
                                <th scope="col">Date</th>
                                <th scope="col">Name</th>
                                <th scope="col" colspan="3">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="table-body2"></tbody>
                        <?php require 'script files\schedule-upcoming-refresh.js.php'; ?>
                    </table>
                </div>

                <!--=====Add New Appointment====-->
                <div class="add-button">
                    <a href="#" class="float" onclick="openForm()">
                        <i><span class="material-symbols-outlined">add</span></i>
                    </a>
                </div>
                <div class="form-popup" id="myForm" style="overflow: auto; max-height: 500px;">
                    <form action="/action_page.php" class="form-container">
                        <div class="title">
                            New Appointment
                        </div>
                        <div class="form">
                            <div class="inputfield">
                                <label>Date</label>
                                <input type="date" class="input" id="date">
                            </div>

                            <div class="inputfield" style="display: none;">
                                <label>ID</label>
                                <input type="text" class="input" id="ownerId">
                            </div>
                            <div class="inputfield">
                                <div class="inputfield">
                                    <label for="name">Name</label>
                                    <div class="custom_select">
                                        <div class="select-dropdown">
                                            <input type="text" class="input" id="name" name="name" oninput="filterOptions(); " autocomplete="off">
                                            <ul class="dropdown-options" id="customerNames">
                                                <?php
                                                require 'database-conn.php';

                                                $query = "SELECT * FROM customer";
                                                $result = mysqli_query($conn, $query);


                                                // Check if the query was successful
                                                if ($result) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $customerName = $row["firstname"] . " " . $row["lastname"];
                                                        $firstname = $row["firstname"];
                                                        $lastname = $row["lastname"];

                                                        // Execute another query to get additional information based on firstname and lastname
                                                        $query2 = "SELECT id FROM customer WHERE firstname = '$firstname' AND lastname = '$lastname'";
                                                        $result2 = mysqli_query($conn, $query2);

                                                        if ($result2) {
                                                            $row2 = mysqli_fetch_assoc($result2);
                                                            $customerId = $row2["id"];
                                                        } else {
                                                            // Handle the case where the query failed
                                                            echo "Error in query2: " . mysqli_error($conn);
                                                        }

                                                        echo "<li data-customer-id='$customerId'>$customerName</li>";
                                                    }
                                                } else {
                                                    // Handle the case where the first query failed
                                                    echo "Error in query1: " . mysqli_error($conn);
                                                }

                                                mysqli_close($conn);
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="inputfield">
                                <label>Number of Pets</label>
                                <div class="custom_select">
                                    <select id="numPet" onchange="pets()">
                                        <option value="">SELECT</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="inputfield" id="pet1" style="display: none;">
                                <label>Pet 1</label>
                                <div class="custom_select">
                                    <select id="petname1">
                                        <option value="">Select a pet</option>
                                    </select>
                                </div>
                            </div>
                            <div class="inputfield" id="pet2" style="display: none;">
                                <label>Pet 2</label>
                                <div class="custom_select">
                                    <select id="petname2">
                                        <option value="">Select a pet</option>
                                    </select>
                                </div>
                            </div>
                            <div class="inputfield" id="pet3" style="display: none;">
                                <label>Pet 3</label>
                                <div class="custom_select">
                                    <select id="petname3">
                                        <option value="">Select a pet</option>
                                    </select>
                                </div>
                            </div>
                            <div class="inputfield" id="pet4" style="display: none;">
                                <label>Pet 4</label>
                                <div class="custom_select">
                                    <select id="petname4">
                                        <option value="">Select a pet</option>
                                    </select>
                                </div>
                            </div>
                            <div class="inputfield" id="pet5" style="display: none;">
                                <label>Pet 5</label>
                                <div class="custom_select">
                                    <select id="petname5">
                                        <option value="">Select a pet</option>
                                    </select>
                                </div>
                            </div>

                            <!-- <div class="inputfield">
                                <label>Type</label>
                                <div class="custom_select">
                                    <select id="type">
                                        <option value="Dog">Dog</option>
                                        <option value="Cat">Cat</option>
                                    </select>
                                </div>
                            </div> -->

                            <div class="inputfield">
                                <label>Number of Services</label>
                                <div class="custom_select">
                                    <select id="numServices" onchange="services()">
                                        <option value="">SELECT</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="inputfield" id="s1" style="display: none;">
                                <label>Service 1</label>
                                <div class="custom_select">
                                    <select id="service1">
                                        <option value="Vaccine">Vaccine</option>
                                        <option value="Grooming">Grooming</option>
                                        <option value="Consultation and Treatment">Consultation and Treatment</option>
                                        <option value="Lab Test">Lab Test</option>
                                        <option value="Surgery">Surgery</option>
                                    </select>
                                </div>
                            </div>
                            <div class="inputfield" id="s2" style="display: none;">
                                <label>Service 2</label>
                                <div class="custom_select">
                                    <select id="service2">
                                        <option value="">SELECT</option>
                                        <option value="Vaccine">Vaccine</option>
                                        <option value="Grooming">Grooming</option>
                                        <option value="Consultation">Consultation and Treatment</option>
                                        <option value="Lab Test">Lab Test</option>
                                        <option value="Surgery">Surgery</option>
                                    </select>
                                </div>
                            </div>
                            <div class="inputfield" id="s3" style="display: none;">
                                <label>Service 3</label>
                                <div class="custom_select">
                                    <select id="service3">
                                        <option value="">SELECT</option>
                                        <option value="Vaccine">Vaccine</option>
                                        <option value="Grooming">Grooming</option>
                                        <option value="Consultation and Treatment">Consultation and Treatment</option>
                                        <option value="Lab Test">Lab Test</option>
                                        <option value="Surgery">Surgery</option>
                                    </select>
                                </div>
                            </div>

                            <div class="inputfield">
                                <label>Phone Number</label>
                                <input type="" class="input" placeholder="09*********" id="number" maxlength="11" onkeydown="return /[0-9\s/b]/i.test(event.key)" />
                            </div>
                            <div class="inputfield">
                                <input type="button" value="Add Appointment" class="btn-add" onclick="submitData('addAppointment'); closeForm();">
                                <button class="btn-create">
                                    <a href="zHTML_customer.php" style="text-decoration: none;">Add Customer</a>
                                </button>
                                <?php require 'script files\schedule.data.js.php'; ?>
                            </div>
                        </div>
                        <button type="button" class="btn-close" onclick="closeForm()">Close</button>

                    </form>
                </div>

                <!--popup detail table-->
                <div class="form-popup-details" id="detailsPopup">
                    <form class="form-container-details" id="detailsForm" method="post">
                        <div class="title">Appointment Details</div>
                        <div class="form-details">
                            <div class="inputfield-grid">
                                <div class="inputfield" style="display: none;">
                                    <label>Appointment Id</label>
                                    <input type="text" class="input" id="appointmentID" disabled />
                                </div>
                            </div>
                            <div class="inputfield-grid">
                                <div class="inputfield">
                                    <label>Owner</label>
                                    <input type="text" class="input" id="ownerName" disabled />
                                </div>
                            </div>
                            <div class="detail-table">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Pet Name</th>
                                            <th>Breed</th>
                                            <th>Species</th>
                                            <th>Services</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-details">
                                        <?php
                                        require "script files\getDetailsID.js.php";
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <button type="button" class="btn-close" onclick="closeFormDetails()">Close</button>
                    </form>
                </div>

                <!-- Update Appointment -->
                <div class="form-popup" id="updateForm" style="overflow: auto; max-height: 500px;">
                    <form action="/action_page.php" class="form-container">
                        <div class="title">
                            Update Appointment
                        </div>
                        <div class="form">
                            <div class="inputfield">
                                <label>Date</label>
                                <input type="date" class="input" id="dateUpdate">
                            </div>

                            <div class="inputfield" style="display: none;">
                                <label>ID</label>
                                <input type="text" class="input" id="ownerIdUpdate">
                            </div>
                            <div class="inputfield">
                                <div class="inputfield">
                                    <label for="name">Name</label>
                                    <div class="custom_select">
                                        <div class="select-dropdown">
                                            <input type="text" class="input" id="nameUpdate" name="name" oninput="filterOptions()" autocomplete="off" disabled>
                                            <ul class="dropdown-options" id="customerNamesUpdate">
                                                <?php
                                                require 'database-conn.php';

                                                $query = "SELECT * FROM customer";
                                                $result = mysqli_query($conn, $query);
                                                $number = "";

                                                // Check if the query was successful
                                                if ($result) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $customerName = $row["firstname"] . " " . $row["lastname"];
                                                        $firstname = $row["firstname"];
                                                        $lastname = $row["lastname"];

                                                        // Execute another query to get additional information based on firstname and lastname
                                                        $query2 = "SELECT id FROM customer WHERE firstname = '$firstname' AND lastname = '$lastname'";
                                                        $result2 = mysqli_query($conn, $query2);

                                                        if ($result2) {
                                                            $row2 = mysqli_fetch_assoc($result2);
                                                            $customerId = $row2["id"];
                                                            $number = $row2["number"];
                                                        } else {
                                                            // Handle the case where the query failed
                                                            echo "Error in query2: " . mysqli_error($conn);
                                                        }

                                                        echo "<li data-customer-id='$customerId'>$customerName</li>";
                                                    }
                                                } else {
                                                    // Handle the case where the first query failed
                                                    echo "Error in query1: " . mysqli_error($conn);
                                                }

                                                mysqli_close($conn);
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="inputfield">
                                <table>
                                    <tr>
                                        <td>
                                            <input type="button" value="View Petnames" onclick="viewPets(); submitData('getName');" id="viewBtn">
                                        </td>
                                        <td>
                                            <input type="button" value="Restore" onclick="viewPetsRestore(); submitData('getName');" id="viewBtnRestore" style="display: none;">
                                        </td>
                                    </tr>
                                </table>
                                <?php require 'script files\schedule.data.js.php'; ?>
                            </div>

                            <div class="inputfield" id="pet1U" style="display: none;">
                                <label>Pet 1</label>
                                <div class="custom_select">
                                    <table>
                                        <tr>
                                            <td>
                                                <select id="petname1Update" disabled>
                                                    <option value="">None</option>
                                                    <?php
                                                    require 'database-conn.php';
                                                    $query = "SELECT * FROM pet";
                                                    $result = mysqli_query($conn, $query);

                                                    // Check if the query was successful
                                                    if ($result) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $petname = $row["petname"];
                                                            echo "<option value='$petname'>$petname</option>";
                                                        }
                                                    } else {
                                                        // Handle the case where the query failed
                                                        echo "Error: " . mysqli_error($conn);
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                                <label for="">Change Pet</label>
                                            </td>
                                            <td>
                                                <select id="petname1Update2">
                                                    <option value=""></option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="inputfield" id="pet2U" style="display: none;">
                                <label>Pet 2</label>
                                <div class="custom_select">
                                    <table>
                                        <tr>
                                            <td>
                                                <select id="petname2Update" disabled>
                                                    <option value="">None</option>
                                                    <?php
                                                    require 'database-conn.php';
                                                    $query = "SELECT * FROM pet";
                                                    $result = mysqli_query($conn, $query);

                                                    // Check if the query was successful
                                                    if ($result) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $petname = $row["petname"];
                                                            echo "<option value='$petname'>$petname</option>";
                                                        }
                                                    } else {
                                                        // Handle the case where the query failed
                                                        echo "Error: " . mysqli_error($conn);
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                                <label for="">Change Pet</label>
                                            </td>
                                            <td>
                                                <select id="petname2Update2">
                                                    <option value=""></option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="inputfield" id="pet3U" style="display: none;">
                                <label>Pet 3</label>
                                <div class="custom_select">
                                    <table>
                                        <tr>
                                            <td>
                                                <select id="petname3Update" disabled>
                                                    <option value="">None</option>
                                                    <?php
                                                    require 'database-conn.php';
                                                    $query = "SELECT * FROM pet";
                                                    $result = mysqli_query($conn, $query);

                                                    // Check if the query was successful
                                                    if ($result) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $petname = $row["petname"];
                                                            echo "<option value='$petname'>$petname</option>";
                                                        }
                                                    } else {
                                                        // Handle the case where the query failed
                                                        echo "Error: " . mysqli_error($conn);
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                                <label for="">Change Pet</label>
                                            </td>
                                            <td>
                                                <select id="petname3Update2">
                                                    <option value=""></option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="inputfield" id="pet4U" style="display: none;">
                                <label>Pet 4</label>
                                <div class="custom_select">
                                    <table>
                                        <tr>
                                            <td>
                                                <select id="petname4Update" disabled>
                                                    <option value="">None</option>
                                                    <?php
                                                    require 'database-conn.php';
                                                    $query = "SELECT * FROM pet";
                                                    $result = mysqli_query($conn, $query);

                                                    // Check if the query was successful
                                                    if ($result) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $petname = $row["petname"];
                                                            echo "<option value='$petname'>$petname</option>";
                                                        }
                                                    } else {
                                                        // Handle the case where the query failed
                                                        echo "Error: " . mysqli_error($conn);
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                                <label for="">Change Pet</label>
                                            </td>
                                            <td>
                                                <select id="petname4Update2">
                                                    <option value=""></option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="inputfield" id="pet5U" style="display: none;">
                                <label>Pet 5</label>
                                <div class="custom_select">
                                    <table>
                                        <tr>
                                            <td>
                                                <select id="petname5Update" disabled>
                                                    <option value="">None</option>
                                                    <?php
                                                    require 'database-conn.php';
                                                    $query = "SELECT * FROM pet";
                                                    $result = mysqli_query($conn, $query);

                                                    // Check if the query was successful
                                                    if ($result) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $petname = $row["petname"];
                                                            echo "<option value='$petname'>$petname</option>";
                                                        }
                                                    } else {
                                                        // Handle the case where the query failed
                                                        echo "Error: " . mysqli_error($conn);
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                                <label for="">Change Pet</label>
                                            </td>
                                            <td>
                                                <select id="petname5Update2">
                                                    <option value=""></option>
                                                </select>
                                                <br>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="inputfield">
                                <input type="button" value="View Services" onclick="viewServices();" id="viewSBtn">
                            </div>

                            <div class="inputfield" id="s1U" style="display: none;">
                                <label>Service 1</label>
                                <div class="custom_select">
                                    <select id="service1Update">
                                        <option value="Vaccine">Vaccine</option>
                                        <option value="Grooming">Grooming</option>
                                        <option value="Consultation and Treatment">Consultation and Treatment</option>
                                        <option value="Lab Test">Lab Test</option>
                                        <option value="Surgery">Surgery</option>
                                    </select>
                                </div>
                            </div>
                            <div class="inputfield" id="s2U" style="display: none;">
                                <label>Service 2</label>
                                <div class="custom_select">
                                    <select id="service2Update">
                                        <option value="">SELECT</option>
                                        <option value="Vaccine">Vaccine</option>
                                        <option value="Grooming">Grooming</option>
                                        <option value="Consultation">Consultation and Treatment</option>
                                        <option value="Lab Test">Lab Test</option>
                                        <option value="Surgery">Surgery</option>
                                    </select>
                                </div>
                            </div>
                            <div class="inputfield" id="s3U" style="display: none;">
                                <label>Service 3</label>
                                <div class="custom_select">
                                    <select id="service3Update">
                                        <option value="">SELECT</option>
                                        <option value="Vaccine">Vaccine</option>
                                        <option value="Grooming">Grooming</option>
                                        <option value="Consultation and Treatment">Consultation and Treatment</option>
                                        <option value="Lab Test">Lab Test</option>
                                        <option value="Surgery">Surgery</option>
                                    </select>
                                </div>
                            </div>
                            <div class="inputfield">
                                <label>Phone Number</label>
                                <input type="" class="input" placeholder="09*********" id="numberUpdate" maxlength="11" onkeydown="return /[0-9\s/b]/i.test(event.key)" />
                            </div>
                            <div class="inputfield">
                                <input type="button" value="Update Appointment" class="btn-add" onclick="submitData('updateAppointment'); viewPetsDome();">
                                <button class="btn-create">
                                    <a href="CAPS.INC/zHTML_customer.php" style="text-decoration: none;">Add Customer</a>
                                </button>
                                <?php require 'script files\schedule.data.js.php'; ?>
                            </div>
                        </div>
                        <button type="button" class="btn-close" onclick="closeUpdateForm()">Close</button>

                    </form>
                </div>

                <!--=====Send SMS====-->
                <div class="form-popup-sms" id="myForm-sms">
                    <form action="/action_page.php" class="form-container-sms">
                        <div class="title-sms">
                            Send SMS
                        </div>
                        <div class="form-sms">
                            <div class="inputfield-sms">
                                <label>Date</label>
                                <input type="date" class="input" disabled id="smsDate">
                            </div>
                            <div class="inputfield-sms">
                                <label>Phone Number</label>
                                <input type="number" class="input" placeholder="+63**********" id="smsNumber" disabled>
                            </div>
                            <div class="inputfield-sms">
                                <label>Name</label>
                                <input type="text" class="input" id="smsName" disabled>
                            </div>
                            <div class="inputfield-sms">
                                <label>Pet Name</label>
                                <input type="text" class="input" id="smsPetname" disabled>
                            </div>
                            <div class="inputfield-sms">
                                <label>Message</label>
                                <textarea type="text" class="input" rows="4" cols="50" placeholder="Type your message here" id="smsMessage" oninput="message();"></textarea>
                            </div>

                            <div class="inputfield-sms">
                                <input type="button" value="Send Message" class="btn-send" onclick="submitData('sendSMS'); closeFormsms();">
                            </div>
                            <?php require 'script files\schedule.data.js.php'; ?>
                            <div class="inputfield-sms">
                                <input type="button" value="Close" class="btn-send" onclick="closeFormsms()">
                            </div>
                        </div>
                    </form>
                </div>

                <!--=====Delete====-->
                <div class="form-popup-delete" id="myForm-delete">
                    <form action="/action_page.php" class="form-container-delete">
                        <div class="title">
                            Are you sure?
                        </div>
                        <div class="form-delete">
                            <label>This will be permanently deleted</label>
                            <div class="inputfield">
                                <input type="button" value="Cancel" class="btn-cancel" onclick="closeFormDelete()">
                                <input type="button" value="Delete" class="btn-delete" onclick="submitData('deleteSchedule'); closeFormDelete();">
                                <?php require 'script files\schedule.data.js.php'; ?>
                            </div>
                        </div>
                    </form>
                </div>

                <!--=====confirm status====-->
                <div class="form-popup-delete" id="myForm-confirm">
                    <form action="/action_page.php" class="form-container-delete">
                        <div class="title">
                            Are you sure?
                        </div>
                        <div class="form-delete">
                            <label>This will remove todays appointment</label>
                            <div class="inputfield">
                                <input type="button" value="No" class="btn-cancel" onclick="closeConfirmForm()">
                                <input type="button" value="Yes" class="btn-delete" onclick="submitData('statusDone'); closeConfirmForm();">
                                <?php require 'script files\schedule.data.js.php'; ?>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
    <script>
        //display in alert the selected value

        // var selectElement = document.getElementById("petname1Update2");
        // selectElement.addEventListener("change", function() {
        //     var selectedValue = selectElement.value;
        //     document.getElementById("petname1Update").value = selectedValue;
        // });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Function to handle item selection and display the value in the input field
        function handleItemSelection(element) {
            // Get the text content of the clicked <li> element
            const selectedValue = element.textContent;

            document.getElementById("name").value = selectedValue;

            var data = {
                nameOwner: selectedValue
            }

            $.ajax({
                url: 'get_pet_names.php',
                type: 'post',
                data: data,
                success: function(response) {
                    $("#petname1").html(response);
                    $("#petname2").html(response);
                    $("#petname3").html(response);
                    $("#petname4").html(response);
                    $("#petname5").html(response);
                }
            });
        }

        // Function to handle number retrieval
        function getNumber(element) {
            
            const selectedValue = element.textContent;

            document.getElementById("name").value = selectedValue;

            var data = {
                nameOwner: selectedValue
            }

            $.ajax({
                url: 'get-number.php',
                type: 'post',
                data: data,
                success: function(response) {
                    $("#number").val(response);
                }
            });
        }

        // Function to add click event handlers to the <li> elements for handleItemSelection
        function addClickHandlers() {
            const liElements = document.querySelectorAll("#customerNames li");

            liElements.forEach(function(li) {
                li.addEventListener("click", function() {
                    handleItemSelection(li);
                });
            });
        }

        // Function to add click event handlers to the <li> elements for getNumber
        function addClickHandlers2() {
            const liElements = document.querySelectorAll("#customerNames li");

            liElements.forEach(function(li) {
                li.addEventListener("click", function() {
                    getNumber(li);
                });
            });
        }

        // Call the function to add click event handlers after the page loads
        window.addEventListener("load", function() {
            addClickHandlers();
            addClickHandlers2();
        });



        // // Function to handle item selection and display the value in the input field
        // function handleItemSelection(element) {
        //     // Get the text content of the clicked <li> element
        //     const selectedValue = element.textContent;

        //     document.getElementById("name").value = selectedValue;

        //     var data = {
        //         nameOwner: selectedValue
        //     }

        //     $.ajax({
        //         url: 'get_pet_names.php',
        //         type: 'post',
        //         data: data,
        //         success: function(response) {
        //             $("#petname1").html(response);
        //             $("#petname2").html(response);
        //             $("#petname3").html(response);
        //             $("#petname4").html(response);
        //             $("#petname5").html(response);
        //         }
        //     });
        // }

        // function getNumber() {
        //     // Get the text content of the clicked <li> element
        //     const selectedValue = element.textContent;

        //     document.getElementById("name").value = selectedValue;

        //     var data = {
        //         nameOwner: selectedValue
        //     }

        //     $.ajax({
        //         url: 'get-number.php',
        //         type: 'post',
        //         data: data,
        //         success: function(response) {
        //             $("#number").val(response);
        //         }
        //     });
        // }

        // // Function to add click event handlers to the <li> elements
        // function addClickHandlers() {
        //     const liElements = document.querySelectorAll("#customerNames li");

        //     liElements.forEach(function(li) {
        //         li.addEventListener("click", function() {
        //             handleItemSelection(li);
        //         });
        //     });
        // }

        // function addClickHandlers2() {
        //     const liElements = document.querySelectorAll("#customerNames li");

        //     liElements.forEach(function(li) {
        //         li.addEventListener("click", function() {
        //             handleItemSelection(li);
        //         });
        //     });
        // }

        // // Call the function to add click event handlers after the page loads
        // window.addEventListener("load", addClickHandlers);
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Function to handle item selection and display the value in the input field
        var count = 0;
        var count2 = 0;

        function viewPetsRestore() {
            document.getElementById("pet1U").style.display = "block";
            document.getElementById("pet2U").style.display = "block";
            document.getElementById("pet3U").style.display = "block";
            document.getElementById("pet4U").style.display = "block";
            document.getElementById("pet5U").style.display = "block";
        }

        function viewPetsDome() {
            count = 0;
            document.getElementById("viewBtn").value = "View Petnames";
            document.getElementById("pet1U").style.display = "none";
            document.getElementById("pet2U").style.display = "none";
            document.getElementById("pet3U").style.display = "none";
            document.getElementById("pet4U").style.display = "none";
            document.getElementById("pet5U").style.display = "none";

            closeUpdateForm();
        }

        function viewPets() {
            count++;

            document.getElementById("pet1U").style.display = "block";
            document.getElementById("pet2U").style.display = "block";
            document.getElementById("pet3U").style.display = "block";
            document.getElementById("pet4U").style.display = "block";
            document.getElementById("pet5U").style.display = "block";
            document.getElementById("viewBtn").value = "Hide Petnames";

            //document.getElementById("viewBtnRestore").style.display = "block";

            if (count == 2) {
                count = 0;
                document.getElementById("viewBtn").value = "View Petnames";
                document.getElementById("pet1U").style.display = "none";
                document.getElementById("pet2U").style.display = "none";
                document.getElementById("pet3U").style.display = "none";
                document.getElementById("pet4U").style.display = "none";
                document.getElementById("pet5U").style.display = "none";

                //document.getElementById("viewBtnRestore").style.display = "none";
            }
        }

        function viewServices() {
            count2++;

            document.getElementById("s1U").style.display = "block";
            document.getElementById("s2U").style.display = "block";
            document.getElementById("s3U").style.display = "block";
            document.getElementById("viewSBtn").value = "Hide Services";

            if (count2 == 2) {
                count2 = 0;
                document.getElementById("viewSBtn").value = "View Services";
                document.getElementById("s1U").style.display = "none";
                document.getElementById("s2U").style.display = "none";
                document.getElementById("s3U").style.display = "none";;
            }
        }
    </script>

    <script>
        function openUpdateForm() {
            document.getElementById("updateForm").style.display = "block";
        }

        function closeUpdateForm() {
            document.getElementById("updateForm").style.display = "none";
        }

        function getRowId(rowId, date, name, pet1, pet2, pet3, pet4, pet5, ser1, ser2, ser3, num) {
            document.getElementById("ownerIdUpdate").value = rowId;

            document.getElementById("dateUpdate").value = date;
            document.getElementById("nameUpdate").value = name;
            //original
            document.getElementById("petname1Update").value = pet1;
            document.getElementById("petname2Update").value = pet2;
            document.getElementById("petname3Update").value = pet3;
            document.getElementById("petname4Update").value = pet4;
            document.getElementById("petname5Update").value = pet5;

            document.getElementById("service1Update").value = ser1;
            document.getElementById("service2Update").value = ser2;
            document.getElementById("service3Update").value = ser3;

            document.getElementById("numberUpdate").value = num;
        }

        function petsUpdate() {
            var services = document.getElementById("numPetUpdate");
            var selectedValue = services.value;
            document.getElementById("pet1U").style.display = "none";
            document.getElementById("pet2U").style.display = "none";
            document.getElementById("pet3U").style.display = "none";
            document.getElementById("pet4U").style.display = "none";
            document.getElementById("pet5U").style.display = "none";
            if (selectedValue == 1) {
                document.getElementById("pet1U").style.display = "block";
            }
            if (selectedValue == 2) {
                document.getElementById("pet1U").style.display = "block";
                document.getElementById("pet2U").style.display = "block";
            }
            if (selectedValue == 3) {
                document.getElementById("pet1U").style.display = "block";
                document.getElementById("pet2U").style.display = "block";
                document.getElementById("pet3U").style.display = "block";
            }
            if (selectedValue == 4) {
                document.getElementById("pet1U").style.display = "block";
                document.getElementById("pet2U").style.display = "block";
                document.getElementById("pet3U").style.display = "block";
                document.getElementById("pet4U").style.display = "block";
            }
            if (selectedValue == 5) {
                document.getElementById("pet1U").style.display = "block";
                document.getElementById("pet2U").style.display = "block";
                document.getElementById("pet3U").style.display = "block";
                document.getElementById("pet4U").style.display = "block";
                document.getElementById("pet5U").style.display = "block";
            }
        }

        function servicesUpdate() {
            var services = document.getElementById("numServicesUpdate");
            var selectedValue = services.value;
            document.getElementById("s1U").style.display = "none";
            document.getElementById("s2U").style.display = "none";
            document.getElementById("s3U").style.display = "none";
            if (selectedValue == 1) {
                document.getElementById("s1U").style.display = "block";
            }
            if (selectedValue == 2) {
                document.getElementById("s1U").style.display = "block";
                document.getElementById("s2U").style.display = "block";
            }
            if (selectedValue == 3) {
                document.getElementById("s1U").style.display = "block";
                document.getElementById("s2U").style.display = "block";
                document.getElementById("s3U").style.display = "block";
            }
        }
    </script>
    <script>
        function openFormDetails(ownername, appID) {
            document.getElementById("detailsPopup").style.display = "block";
            getOwnerName(ownername, appID);
        }

        function closeFormDetails() {
            document.getElementById("detailsPopup").style.display = "none";
        }

        function getOwnerName(ownername, appID) {
            document.getElementById("ownerName").value = ownername;
            document.getElementById("appointmentID").value = appID;
        }
    </script>
    <script>
        function filterOptions() {
            var input = document.getElementById('name');
            var filter = input.value.toLowerCase();
            var options = document.getElementById('customerNames').getElementsByTagName('li');

            for (var i = 0; i < options.length; i++) {
                var option = options[i];
                if (option.textContent.toLowerCase().indexOf(filter) > -1) {
                    option.style.display = '';
                } else {
                    option.style.display = 'none';
                }
            }

            // Show or hide the dropdown based on the filter
            var dropdown = document.getElementById('customerNames');
            if (filter === '') {
                dropdown.style.display = 'none';
            } else {
                dropdown.style.display = 'block';
            }
        }

        document.addEventListener('click', function(e) {
            var selectedOption = e.target;
            if (selectedOption && selectedOption.tagName === 'LI') {
                var inputValue = selectedOption.textContent;
                var input = document.getElementById('name');
                input.value = inputValue;
                var dropdown = document.getElementById('customerNames');
                dropdown.style.display = 'none';
            }
        });
    </script>
    <script>
        function pets() {
            var services = document.getElementById("numPet");
            var selectedValue = services.value;
            document.getElementById("pet1").style.display = "none";
            document.getElementById("pet2").style.display = "none";
            document.getElementById("pet3").style.display = "none";
            document.getElementById("pet4").style.display = "none";
            document.getElementById("pet5").style.display = "none";
            if (selectedValue == 1) {
                document.getElementById("pet1").style.display = "block";
            }
            if (selectedValue == 2) {
                document.getElementById("pet1").style.display = "block";
                document.getElementById("pet2").style.display = "block";
            }
            if (selectedValue == 3) {
                document.getElementById("pet1").style.display = "block";
                document.getElementById("pet2").style.display = "block";
                document.getElementById("pet3").style.display = "block";
            }
            if (selectedValue == 4) {
                document.getElementById("pet1").style.display = "block";
                document.getElementById("pet2").style.display = "block";
                document.getElementById("pet3").style.display = "block";
                document.getElementById("pet4").style.display = "block";
            }
            if (selectedValue == 5) {
                document.getElementById("pet1").style.display = "block";
                document.getElementById("pet2").style.display = "block";
                document.getElementById("pet3").style.display = "block";
                document.getElementById("pet4").style.display = "block";
                document.getElementById("pet5").style.display = "block";
            }
        }

        function services() {
            var services = document.getElementById("numServices");
            var selectedValue = services.value;
            document.getElementById("s1").style.display = "none";
            document.getElementById("s2").style.display = "none";
            document.getElementById("s3").style.display = "none";
            if (selectedValue == 1) {
                document.getElementById("s1").style.display = "block";
            }
            if (selectedValue == 2) {
                document.getElementById("s1").style.display = "block";
                document.getElementById("s2").style.display = "block";
            }
            if (selectedValue == 3) {
                document.getElementById("s1").style.display = "block";
                document.getElementById("s2").style.display = "block";
                document.getElementById("s3").style.display = "block";
            }
        }
    </script>
    <script>
        const body = document.querySelector("body"),
            modeToggle = body.querySelector(".mode-toggle");
        sidebar = body.querySelector("nav");
        sidebarToggle = body.querySelector(".sidebar-toggle");


        sidebarToggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
            if (sidebar.classList.contains("close")) {
                localStorage.setItem("status", "close");
            } else {
                localStorage.setItem("status", "open");
            }
        })

        function fetchCustomerId(selectedName) {
            const input = document.getElementById('ownerId');
            const datalist = document.getElementById('customerNames');
            const selectedOption = Array.from(datalist.options).find(option => option.value === selectedName);

            if (selectedOption) {
                const customerId = selectedOption.getAttribute('data-customer-id');
                input.value = customerId;
            } else {
                input.value = ''; // Clear the ownerId input if no matching option is found
            }
        }

        function message() {
            setMessage();
        }


        function setMessageToday(ownername, date, petname1, petname2, petname3, petname4, petname5, service, service2, service3) {
            var textBody = `Dear ${ownername},

This is to confirm your appointment today at Doc Lenon Veterinary Clinic:

Date: ${date}

Pet's Name: 
${petname1}
${petname2}
${petname3}
${petname4}
${petname5}
Reason for Visit: 
${service}
${service2}
${service3}

For questions or changes, contact us at 09124567890.

We look forward to seeing you and your pet.

Best regards,
Doc Lenon
Doc Lenon Veterinary Clinic`;

            document.getElementById("smsMessage").value = textBody;
        }

        function setMessageUpcoming(ownername, date, petname1, petname2, petname3, petname4, petname5, service, service2, service3) {
            var textBody = `Dear ${ownername},

This is to confirm your upcoming appointment at Doc Lenon Veterinary Clinic:

Date: ${date}

Pet's Name: 
${petname1}
${petname2}
${petname3}
${petname4}
${petname5}
Reason for Visit: 
${service}
${service2}
${service3}

For questions or changes, contact us at 09124567890.

We look forward to seeing you and your pet.

Best regards,
Doc Lenon
Doc Lenon Veterinary Clinic`;

            document.getElementById("smsMessage").value = textBody;
        }


        function infoSMS(date, number, name, petname) {
            document.getElementById("smsDate").value = date;
            document.getElementById("smsNumber").value = number;
            document.getElementById("smsName").value = name;
            document.getElementById("smsPetname").value = petname;
        }

        function onSelect() {
            const dateVal = document.getElementById("sortDate").value;
            if (dateVal === "") {
                document.getElementById("search2").value = "";
            } else {
                document.getElementById("search2").value = dateVal;
            }
        }

        function deleteRow(rowId) {
            document.getElementById("rowId").value = rowId;
        }

        function rowStatus(rowId) {
            document.getElementById("statusId").value = rowId;
            document.getElementById("myForm-confirm").style.display = "block";
        }

        function closeConfirmForm() {
            document.getElementById("myForm-confirm").style.display = "none";
        }

        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }

        function opensms() {
            document.getElementById("myForm-sms").style.display = "block";
        }

        function closeFormsms() {
            document.getElementById("myForm-sms").style.display = "none";
        }

        function openFormEdit() {
            document.getElementById("myForm-edit").style.display = "block";
        }

        function closeFormEdit() {
            document.getElementById("myForm-edit").style.display = "none";
        }

        function openFormDelete() {
            document.getElementById("myForm-delete").style.display = "block";
        }

        function closeFormDelete() {
            document.getElementById("myForm-delete").style.display = "none";
        }
    </script>
</body>

</html>