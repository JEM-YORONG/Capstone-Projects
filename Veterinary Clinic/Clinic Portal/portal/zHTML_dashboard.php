<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!----======== CSS ======== -->
  <link rel="stylesheet" href="Capstone_Dashboard.css" />
  <link rel="stylesheet" href="Capstone_ClinicAboutUs copy.css">

  <!----======== CSS ======== -->
  <link rel="stylesheet" href="Capstone_ClinicSched.css">

  <link rel="stylesheet" href="Capstone_Pets.css">
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
      <i class="sidebar-toggle"><span class="material-symbols-outlined"> menu </span></i>
      <div class="title">
        <span class="text">Dashboard</span>
      </div>
    </div>
    <!--=====Customer/Pet/ Pet Grooming====-->
    <div class="dash-content">
      <div class="overview">
        <!-- Daily -->
        <?php
        require 'database-conn.php';

        $currentDate = new DateTime();
        $currentDateFormatted = $currentDate->format('Y-m-d');
        // customer
        // get the count of scheduled items where date is the current date
        $query = "SELECT COUNT(*) as count FROM schedule WHERE date = '$currentDateFormatted'";
        $result = mysqli_query($conn, $query);

        if ($result) {
          $row = mysqli_fetch_assoc($result);
          $dailyCustomers = $row['count'];
        } else {
          //echo "Error in query: " . mysqli_error($conn);
        }

        // pet
        // get the count of scheduled items where date is the current date
        $query2 = "SELECT petname, petname2, petname3, petname4, petname5 FROM schedule WHERE date = '$currentDateFormatted'";
        $result2 = mysqli_query($conn, $query2);

        if ($result2) {
          $dailyPets = 0;

          while ($row2 = mysqli_fetch_assoc($result2)) {
            // Loop through each column and count the pets
            foreach ($row2 as $pet) {
              if (!empty($pet)) {
                $dailyPets++;
              }
            }
          }
        } else {
          // echo "Error in query: " . mysqli_error($conn);
        }

        // grooming
        // get the count of scheduled items where date is the current date
        $query3 = "SELECT service, service2, service3 FROM schedule WHERE date = '$currentDateFormatted'";
        $result3 = mysqli_query($conn, $query3);

        if ($result3) {
          $dailyGrooming = 0;

          while ($row3 = mysqli_fetch_assoc($result3)) {
            // Loop through each column and count the grooming services
            foreach ($row3 as $service) {
              if (!empty($service) && $service == "Grooming") {
                $dailyGrooming++;
              }
            }
          }
        } else {
          // echo "Error in query: " . mysqli_error($conn);
        }
        ?>
        <div class="boxes-overview">
          <div class="box box1">
            <span class="text">Customer</span>
            <span class="number"><?php echo $dailyCustomers; ?></span>
          </div>
          <div class="box box2">
            <span class="text">Pets</span>
            <span class="number"><?php echo $dailyPets; ?></span>
          </div>
          <div class="box box3">
            <span class="text">Pet Grooming</span>
            <span class="number"><?php echo $dailyGrooming; ?></span>
          </div>
        </div>
      </div>
      <!--=====Clinic Schedule====-->
      <div class="activity">
        <div class="title-clinic-schedule">
          <span class="text">Clinic Schedule</span>
          <input type="text" id="search1" disabled style="display: none;">
        </div>

        <!--=====Table for today schedule====-->
        <div class="today-clinic-schedule-responsive">
          <table class="clinic-schedule" width=100%>
            <thead>
              <tr>
                <!-- <th scope="col" width=5%></th> -->
                <th scope="col"> Notify </th>
                <th scope="col">Date</th>
                <th scope="col">Name</th>
              </tr>
            </thead>
            <tbody id="table-body1"></tbody>
            <?php require 'dashboard-schedule-refresh.js.php'; ?>
          </table>
        </div>

        <!-- reprot analytics -->

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
              <?php require 'schedule.data.js.php'; ?>
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
                <?php require 'schedule.data.js.php'; ?>
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
                <?php require 'schedule.data.js.php'; ?>
              </div>
            </div>
          </form>
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
    });


    function message() {
      setMessage();
    }


    function setMessageToday(ownername, date, petname, service) {
      var textBody = `Dear ${ownername},

This is to confirm your appointment today at Doc Lenon Veterinary Clinic:

Date: ${date}

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

    function opensms() {
      document.getElementById("myForm-sms").style.display = "block";
    }

    function closeFormsms() {
      document.getElementById("myForm-sms").style.display = "none";
    }
    //Open Edit
    function openFormEdit() {
      document.getElementById("myForm-edit").style.display = "block";
    }

    function closeFormEdit() {
      document.getElementById("myForm-edit").style.display = "none";
    }
    //Delete
    function openFormDelete() {
      document.getElementById("myForm-delete").style.display = "block";
    }

    function closeFormDelete() {
      document.getElementById("myForm-delete").style.display = "none";
    }
  </script>
</body>

</html>