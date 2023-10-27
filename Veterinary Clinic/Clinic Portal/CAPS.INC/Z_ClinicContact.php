<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!----======== CSS ======== -->
  <link rel="stylesheet" href="css files\Capstone_ClinicContact.css" />

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
        <span class="text">Clinic Contacts</span>
      </div>
    </div>
    <!--=====Info====-->

    <div class="web-content">
    </div>

    <div class="about-clinic">
      <div>
        <br />
        <label>Contact Number</label>
        <p class="edit"><u>Edit</u></p>
        <br />
        <div class="cnumber-div">
          <input type="number" placeholder="+63 000 000 0000" style="margin-bottom: 10px;" />
          <input type="number" placeholder="+63 000 000 0000" style="margin-bottom: 10px;" />
        </div>
      </div>
      <div>
        <label>Email</label>
        <p class="edit"><u>Edit</u></p>
        <br />
        <input type="text" placeholder="vetclinic@email.com" class="email-input">
        <br />
        <label>Social Media Accounts</label>
        <p class="edit"><u>Edit</u></p>
        <br />
        <input type="text" placeholder="Social Media Links" class="socmed-input">
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