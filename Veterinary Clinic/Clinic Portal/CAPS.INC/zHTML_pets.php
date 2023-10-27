<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!----======== CSS ======== -->
  <link rel="stylesheet" href="css files\Capstone_Pets.css" />
  <link rel="stylesheet" href="css files\Capstone_ClinicAboutUs copy.css">

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
        <span class="text">Pets</span>
      </div>
    </div>

    <div class="web-content">
      <div class="menu">
        <div class="search-box">
          <input type="text" placeholder="Search here..." id="search" autocomplete="off" value=""/>
        </div>
      </div>
      <div class="overview">
        <div class="item-table">
          <table>
            <thead>
              <tr>
                <th scope="col">Pet Name</th>
                <th scope="col">Owner Name</th>
                <th scope="col">Owner Contact</th>
                <th scope="col">Birth Date</th>
                <th scope="col">Type</th>
                <th scope="col">Breed</th>
                <th scope="col">Species</th>
                <th scope="col">Gender</th>
                <th scope="col">Action</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody id="table-body">
              <?php require 'script files\pet-table-refresh-data.js.php'; ?>
            </tbody>
          </table>
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

    function getId(rowId) {
      document.getElementById("search").value = rowId;
    }

    function myFunction() {
      const boxes = document.querySelectorAll(".input");
      boxes.forEach((box) => {
        box.disabled = false;
      });
    }

    function myFunctionRec() {
      const boxes = document.querySelectorAll(".input-rec");
      boxes.forEach((box) => {
        box.disabled = false;
      });
    }

    function myFunctionOwner() {
      const boxes = document.querySelectorAll(".input-owner");
      boxes.forEach((box) => {
        box.disabled = false;
      });
    }

    function openFormRecords() {
      document.getElementById("myFormRecords").style.display = "block";
    }

    function closeFormRecords() {
      document.getElementById("myFormRecords").style.display = "none";
    }
  </script>
</body>

</html>