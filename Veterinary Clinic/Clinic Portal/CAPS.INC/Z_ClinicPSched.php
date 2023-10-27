<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!----======== CSS ======== -->
  <link rel="stylesheet" href="css files\Capstone_ClinicPSched.css" />

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
        <span class="text">Clinic Schedule</span>
      </div>
    </div>
    <!--=====Info====-->

    <div class="web-content">
      <div class="weekly-sched" id="weeklysched">

        <h3>Schedule</h3>

        <div>
          <div class="day">
            <label>Date</label>
            <label>Start</label>
            <label>End</label>
          </div>
          <div class="day">
            <span>Monday</span>
            <span class="time-start" onclick="timeOpen()">8:00 am</span>
            <span class="time-end">5:00pm</span>
            <input type="checkbox" />
          </div>
          <div class="day">
            <span>Tuesday</span>
            <span class="time-start">8:00 am</span>
            <span class="time-end">5:00pm</span>
            <input type="checkbox" />
          </div>
          <div class="day">
            <span>Wednesday</span>
            <span class="time-start">8:00 am</span>
            <span class="time-end">5:00pm</span>
            <input type="checkbox" />
          </div>
          <div class="day">
            <span>Thursday</span>
            <span class="time-start">8:00 am</span>
            <span class="time-end">5:00pm</span>
            <input type="checkbox" />
          </div>
          <div class="day">
            <span>Friday</span>
            <span class="time-start">8:00 am</span>
            <span class="time-end">5:00pm</span>
            <input type="checkbox" />
          </div>
          <div class="day">
            <span>Saturday</span>
            <span class="time-start">8:00 am</span>
            <span class="time-end">5:00pm</span>
            <input type="checkbox" />
          </div>
          <div class="day">
            <span>Sunday</span>
            <span class="time-start">8:00 am</span>
            <span class="time-end">5:00pm</span>
            <input type="checkbox" checked="false" />
          </div>
        </div>
      </div>
    </div>
    <!--Time picker-->
    <div class="time-edit" id="timeedit">
      <form>
        <div class="modal-content">
          <span>Edit Time</span>
          <span class="close" onclick="timeClose()" style="cursor:pointer;">&times;</span>
          <input type="time" />
        </div>
      </form>
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
    //kapag niclick ung edit button lilitaw ung save button and magiging editable ung mga nakalagay
    // tas after masave di dapat editable (contenteditable)
    const btn = document.getElementById("btn");

    btn.addEventListener("click", () => {
      btn.style.display = "none";
      document.getElementById("edit-title").contentEditable = false;
    });

    function editTitle() {
      document.getElementById("edit-title").contentEditable = true;
      document.getElementById("btn").style.display = "block";
    }

    function openForm() {
      document.getElementById("weeklysched").style.display = "block";
    }

    function closeForm() {
      document.getElementById("weeklysched").style.display = "none";
    }

    function timeOpen() {
      document.getElementById("timeedit").style.display = "block";
    }

    function timeClose() {
      document.getElementById("timeedit").style.display = "none";
    }
  </script>
</body>

</html>