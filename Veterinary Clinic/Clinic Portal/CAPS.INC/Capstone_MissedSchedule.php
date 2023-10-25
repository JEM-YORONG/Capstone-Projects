<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!----======== CSS ======== -->
  <link rel="stylesheet" href="css files\Capstone_MissedSchedule.css" />
  <link rel="stylesheet" href="css files\Capstone_ClinicSched.css">

  <!----===== Icons ===== -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <!--=====Change name mo na lang====-->
  <title>Admin Dashboard Panel</title>
</head>

<body>
  <!--=====Navigation Bar====-->
  <?php require 'nav-bar.html.php'; ?>
  <!--=====Pinaka taas/ title ganon====-->
  <section class="Contents">
    <div class="top">
      <i class="sidebar-toggle"><span class="material-symbols-outlined"> menu </span></i>
      <div class="title">
        <span class="text">Missed Schedule</span>
      </div>
    </div>

    <div class="web-content">
      <div class="overview">
        <div class="menu">
          <div class="search-box">
            <input type="text" placeholder="Search here..." id="search" name="search" />
          </div>
        </div>

        <div class="upcoming-clinic-schedule">
          <table>
            <thead>
              <tr>
                <th scope="col">Date</th>
                <th scope="col">Name</th>
                <th scope="col">Pet Name</th>
                <th scope="col">Service</th>
                <th scope="col" colspan="2">Actions</th>
              </tr>
            </thead>

            <tbody id="table-body">
              <?php require 'script files\missed-schedule-refresh.js.php'; ?>
            </tbody>
          </table>
        </div>

        <!--reschedule-->
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
                  <input type="text" class="input" id="name" name="name" autocomplete="off" disabled>
                </div>
              </div>

              <div class="inputfield">
                <label>Pet Name</label>
                <input type="text" class="input" id="petname" autocomplete="off" disabled>
              </div>

              <!-- <div class="inputfield">
                <label>Type</label>
                <div class="custom_select">
                  <select id="type" disabled>
                    <option value="Dog">Dog</option>
                    <option value="Cat">Cat</option>
                  </select>
                </div>
              </div> -->
              <div class="inputfield">
                <label>Service</label>
                <div class="custom_select">
                  <select id="service" disabled>
                    <option value="Vaccine">Vaccine</option>
                    <option value="Grooming">Grooming</option>
                    <option value="Consultation">Consultation</option>
                    <option value="Lab Test">Lab Test</option>
                  </select>
                </div>
              </div>
              <div class="inputfield">
                <label>Phone Number</label>
                <input type="number" class="input" placeholder="+63**********" id="number" autocomplete="off" disabled>
              </div>
              <div class="inputfield">
                <input type="button" value="Add Appointment" class="btn-add" onclick="submitData('addAppointment');">
                <?php require 'script files\schedule.data.js.php'; ?>
              </div>
            </div>
            <button type="button" class="btn-close" onclick="closeForm()">Close</button>
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
    });

    function openForm(date, name, petname, service, number) {
      document.getElementById("myForm").style.display = "block";
      document.getElementById("name").value = name;
      document.getElementById("petname").value = petname;
      document.getElementById("service").value = service;
      document.getElementById("number").value = number;
    }

    function closeForm() {
      document.getElementById("myForm").style.display = "none";
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