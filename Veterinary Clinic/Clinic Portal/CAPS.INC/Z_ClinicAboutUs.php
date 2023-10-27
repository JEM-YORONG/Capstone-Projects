<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!----======== CSS ======== -->
  <link rel="stylesheet" href="css files\Capstone_ClinicAboutUs.css" />

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
        <span class="text">About Us</span>
      </div>
    </div>
    <!--=====Info====-->

    <div class="web-content">
      <div class="img-content">
        <div class="wrapper">
          <form action="#">
            <img src=".vscode/Doc Lenon Logo.png" />
          </form>
          <div class="button-img">
            <div class="button-wrap">
              <label class="button" for="uploadimg">Upload Logo</label>
              <input type="file" id="uploadimg" name="img" accept="image/*" />
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="about-clinic">
      <div class="myDiv">
        <p class="edit" onclick="editTitle()"><u>Edit</u></p>
        <br />
        <h1 id="edit-title">Doc Lenon Veterinary Clinic</h1>
        <button class="saveedit-button" id="btn">save</button>
      </div>
      <div>
        <br />
        <label>Address</label>
        <p class="edit"><u>Edit</u></p>
        <br />
        <p>
          Lutgarda Bldg., Km 40, National Highway, Pulong Buhangin, Santa
          Maria, Bulacan, Philippines
        </p>
      </div>
      <div>
        <label>Intro</label>
        <p class="edit"><u>Edit</u></p>
        <br />
        <p>
          The righteous care for the needs of their animals, but the kindest
          acts of the wicked are cruel Prov
        </p>
        <br />
        <label>About</label>
        <p class="edit"><u>Edit</u></p>
        <br />
        <p class="about-content" id="myP">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
          eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
          ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
          aliquip ex ea commodo consequat. Duis aute irure dolor in
          reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
          pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
          culpa qui officia deserunt mollit anim id est laborum.
        </p>
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