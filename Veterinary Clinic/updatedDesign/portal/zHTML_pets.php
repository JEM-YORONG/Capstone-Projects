<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!----======== CSS ======== -->
  <link rel="stylesheet" href="Capstone_Pets.css" />
  <link rel="stylesheet" href="Capstone_ClinicAboutUs copy.css">

  <!----===== Icons ===== -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

  <!-- pagenation design -->
  <style>
    .pagination-container {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 20px;
    }

    .pagination-button {
      background-color: #ffffff;
      border: 1px solid #5a81fa;
      border-radius: 8px;
      box-sizing: border-box;
      color: #5a81fa;
      cursor: pointer;
      font-size: 13px;
      line-height: 29px;
      padding: 0 10px;
      margin: 0 5px;
    }

    .pagination-button.active {
      background-color: #5a81fa;
      color: #ffffff;
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
      <i class="sidebar-toggle"><span class="material-symbols-outlined"> menu </span></i>
      <div class="title">
        <span class="text">Pets</span>
      </div>
    </div>

    <div class="web-content">
      <div class="menu">
        <div class="search-box">
          <input type="text" placeholder="Search here..." oninput="filterTable();" id="search" autocomplete="off" value="" />
        </div>
      </div>
      <div class="overview">
        <div class="item-table">
          <table id="petTable">
            <thead>
              <tr>
                <th scope="col">Pet Name</th>
                <th scope="col">Owner Name</th>
                <th scope="col">Owner Contact</th>
                <th scope="col">Birth Date</th>
                <th scope="col">Breed</th>
                <th scope="col">Species</th>
                <th scope="col">Gender</th>
                <th scope="col">Action</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody id="table-body">
              <?php require 'pet-fetch-data.php'; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div id="pagination-container" class="pagination"></div>

    <script>
      var rowsPerPage = 16; // Adjust this to your desired number of rows per page
      var currentPage = 1;

      function showPage(pageNumber) {
        var startIndex = (pageNumber - 1) * rowsPerPage;
        var endIndex = startIndex + rowsPerPage;

        var rows = document.getElementById('petTable').rows;

        for (var i = 1; i < rows.length; i++) {
          rows[i].style.display = (i > startIndex && i <= endIndex) ? '' : 'none';
        }

        updatePaginationButtons(pageNumber);
        currentPage = pageNumber;
      }

      function updatePaginationButtons(activePage) {
        var buttons = document.getElementsByClassName('pagination-button');

        for (var i = 0; i < buttons.length; i++) {
          buttons[i].classList.remove('active');
        }

        var activeButton = document.getElementById('pageBtn' + activePage);

        if (activeButton) {
          activeButton.classList.add('active');
        }
      }

      function generatePaginationControls() {
        var paginationContainer = document.getElementById('pagination-container');
        var pageCount = Math.ceil((document.getElementById('petTable').rows.length - 1) / rowsPerPage);

        var paginationHtml = '<button class="pagination-button" onclick="previousPage()">Previous</button>';

        for (var i = 1; i <= pageCount; i++) {
          paginationHtml += '<button id="pageBtn' + i + '" class="pagination-button ' + (i === currentPage ? 'active' : '') + '" onclick="showPage(' + i + ')">' + i + '</button>';
        }

        paginationHtml += '<button class="pagination-button" onclick="nextPage()">Next</button>';

        paginationContainer.innerHTML = paginationHtml;
      }


      function previousPage() {
        if (currentPage > 1) {
          showPage(currentPage - 1);
        }
      }

      function nextPage() {
        var pageCount = Math.ceil((document.getElementById('petTable').rows.length - 1) / rowsPerPage);
        if (currentPage < pageCount) {
          showPage(currentPage + 1);
        }
      }

      function filterTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search");
        filter = input.value.toUpperCase();
        table = document.getElementById("petTable");
        tr = table.getElementsByTagName("tr");

        if (filter === "") {
          showPage(1);
          return;
        }

        for (i = 1; i < tr.length; i++) {
          var visible = false;
          for (var j = 0; j < tr[i].cells.length; j++) {
            td = tr[i].cells[j];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                visible = true;
                break;
              }
            }
          }
          tr[i].style.display = visible ? "" : "none";
        }
      }

      generatePaginationControls();
      showPage(1);
    </script>
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