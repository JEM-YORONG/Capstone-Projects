<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css files\Capstone_ClinicSched.css">

    <link rel="stylesheet" href="css files\Capstone_Pets.css">


    <!----===== Icons ===== -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
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
                                <th scope="col" width=5%> Status </th>
                                <th scope="col"> Notify </th>
                                <th scope="col">Date</th>
                                <th scope="col">Name</th>
                                <th scope="col">Pet Name</th>
                                <th scope="col">Type</th>
                                <th scope="col">Service</th>
                                <th scope="col" colspan="2">Actions</th>
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
                                <th scope="col">Pet Name</th>
                                <th scope="col">Type</th>
                                <th scope="col">Service</th>
                                <th scope="col" colspan="2">Actions</th>
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
                <div class="form-popup" id="myForm">
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
                                    <input type="text" class="input" id="name" name="name" autocomplete="off" oninput="this.setAttribute('list', 'customerNames')">
                                    <datalist id="customerNames">
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

                                                echo "<option value='$customerName' data-customer-id='$customerId'>";
                                            }
                                        } else {
                                            // Handle the case where the first query failed
                                            echo "Error in query1: " . mysqli_error($conn);
                                        }

                                        mysqli_close($conn);
                                        ?>

                                    </datalist>
                                </div>
                            </div>

                            <div class="inputfield">
                                <label>Pet Name</label>
                                <input type="text" class="input" id="petname" autocomplete="off" oninput="this.setAttribute('list', 'customerPets')">
                                <datalist id="customerPets">
                                    <?php
                                    require 'database-conn.php';

                                    $query = "SELECT * FROM pet";
                                    $result = mysqli_query($conn, $query);

                                    // Check if the query was successful
                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $petname = $row["petname"];
                                            echo "<option value='$petname'>";
                                        }
                                    } else {
                                        // Handle the case where the query failed
                                        echo "Error: " . mysqli_error($conn);
                                    }
                                    ?>
                                </datalist>

                            </div>

                            <div class="inputfield">
                                <label>Type</label>
                                <div class="custom_select">
                                    <select id="type">
                                        <option value="Dog">Dog</option>
                                        <option value="Cat">Cat</option>
                                    </select>
                                </div>
                            </div>
                            <div class="inputfield">
                                <label>Service</label>
                                <div class="custom_select">
                                    <select id="service">
                                        <option value="Vaccine">Vaccine</option>
                                        <option value="Grooming">Grooming</option>
                                        <option value="Consultation">Consultation</option>
                                        <option value="Lab Test">Lab Test</option>
                                    </select>
                                </div>
                            </div>
                            <div class="inputfield">
                                <label>Phone Number</label>
                                <input type="number" class="input" placeholder="+63**********" id="number" autocomplete="off">
                            </div>
                            <div class="inputfield">
                                <input type="button" value="Add Appointment" class="btn-add" onclick="submitData('addAppointment');">
                                <button class="btn-create">
                                    <a href="zHTML_customer.php" style="text-decoration: none;">Add Customer</a>
                                </button>
                                <?php require 'script files\schedule.data.js.php'; ?>
                            </div>
                        </div>
                        <button type="button" class="btn-close" onclick="closeForm()">Close</button>

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
                                <input type="button" value="Send Message" class="btn-send" onclick="submitData('sendSMS')">
                            </div>
                            <div class="inputfield-sms">
                                <input type="button" value="Close" class="btn-send" onclick="closeFormsms()">
                            </div>
                        </div>
                    </form>
                </div>

                <!--=====Update====-->
                <div class="form-popup-edit" id="myForm-edit">
                    <form action="/action_page.php" class="form-container-edit">
                        <div class="title">
                            Edit Appointment
                        </div>
                        <div class="form-edit">
                            <div class="inputfield" style="display: none;">
                                <label>ID</label>
                                <input type="text" class="input" id="updateId">
                            </div>
                            <div class="inputfield">
                                <label>Date</label>
                                <input type="date" class="input" id="updateDate">
                            </div>
                            <div class="inputfield">
                                <label>Name</label>
                                <input type="text" class="input" id="updateName">
                            </div>
                            <div class="inputfield">
                                <label>Pet Name</label>
                                <input type="text" class="input" id="updatePetname">
                            </div>
                            <div class="inputfield">
                                <label>Type</label>
                                <input type="text" class="input" id="updateType">
                            </div>
                            <div class="inputfield">
                                <label>Service</label>
                                <div class="custom_select">
                                    <select id="updateService">
                                        <option value="Vaccine">Vaccine</option>
                                        <option value="Grooming">Grooming</option>
                                        <option value="Consultation">Consultation</option>
                                        <option value="Lab Test">Lab Test</option>
                                    </select>
                                </div>
                            </div>
                            <div class="inputfield">
                                <label>Phone Number</label>
                                <input type="number" class="input" placeholder="+63**********" id="updateNumber">
                            </div>
                            <div class="inputfield">
                                <input type="button" value="Update Appointment" class="btn-update" onclick="submitData('updateAppointment');">
                                <?php require 'script files\schedule.data.js.php'; ?>
                            </div>
                        </div>
                        <button type="button" class="btn-close" onclick="closeFormEdit()">Cancel</button>

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
                                <input type="button" value="Delete" class="btn-delete" onclick="submitData('deleteSchedule')">
                                <?php require 'script files\schedule.data.js.php'; ?>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
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


        function setMessageToday(ownername, date, petname, service) {
            var textBody = `Dear ${ownername},

This is to confirm your appointment today at Doc Lenon Veterinary Clinic:

Date: ${date}
Pet's Name: ${petname}
Reason for Visit: ${service}

For questions or changes, contact us at 09124567890.

We look forward to seeing you and your pet.

Best regards,
Doc Lenon
Doc Lenon Veterinary Clinic`;

            document.getElementById("smsMessage").value = textBody;
        }

        function setMessageUpcoming(ownername, date, petname, service) {
            var textBody = `Dear ${ownername},

This is to confirm your upcoming appointment at Doc Lenon Veterinary Clinic:

Date: ${date}
Pet's Name: ${petname}
Reason for Visit: ${service}

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

        function getRowId(rowId, date, name, petname, type, service, number) {
            document.getElementById("updateId").value = rowId;
            document.getElementById("updateDate").value = date;
            document.getElementById("updateName").value = name;
            document.getElementById("updatePetname").value = petname;
            document.getElementById("updateType").value = type;
            document.getElementById("updateService").value = service;
            document.getElementById("updateNumber").value = number;
        }

        function deleteRow(rowId) {
            document.getElementById("rowId").value = rowId;
        }

        function rowStatus(rowId) {
            document.getElementById("statusId").value = rowId;
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