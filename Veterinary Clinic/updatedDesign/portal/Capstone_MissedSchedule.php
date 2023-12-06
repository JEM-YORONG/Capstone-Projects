<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!----======== CSS ======== -->
  <link rel="stylesheet" href="Capstone_MissedSchedule.css" />
  <link rel="stylesheet" href="Capstone_ClinicSched.css">
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

  <?php require 'alert-notif-function.php'; ?>
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
        <?php require 'alert-notif.php'; ?>
      </div>
    </div>

    <div class="web-content">
      <div class="overview">
        <div class="menu">
          <div class="search-box">
            <input type="text" placeholder="Search here..." oninput="filterTable();" id="search" name="search" />
          </div>
          <div class="search-box" style="display: none;">
            <input type="text" id="rowId" value="">
          </div>
        </div>

        <div class="upcoming-clinic-schedule">
          <table id="missed">
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
              <?php require 'missed-schedule-fetchData.php'; ?>
            </tbody>
          </table>
        </div>


        <div id="pagination-container" class="pagination"></div>

        <script>
          var rowsPerPage = 6; // Adjust this to your desired number of rows per page
          var currentPage = 1;

          function showPage(pageNumber) {
            var startIndex = (pageNumber - 1) * rowsPerPage;
            var endIndex = startIndex + rowsPerPage;

            var rows = document.getElementById('missed').rows;

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
            var pageCount = Math.ceil((document.getElementById('missed').rows.length - 1) / rowsPerPage);

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
            var pageCount = Math.ceil((document.getElementById('missed').rows.length - 1) / rowsPerPage);
            if (currentPage < pageCount) {
              showPage(currentPage + 1);
            }
          }

          function filterTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.getElementById("missed");
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

        <!--reschedule-->
        <div class="form-popup" id="myForm">
          <form action="/action_page.php" class="form-container">
            <div class="title">
              Reschedule Appointment
            </div>
            <div class="form">
              <div class="inputfield">
                <label>Date</label>
                <input type="date" class="input" id="date">
              </div>

              <div class="inputfield" style="display: none;">
                <label>ID</label>
                <input type="text" class="input" id="schedID">
              </div>
              <div class="inputfield">
                <div class="inputfield">
                  <label for="name">Name</label>
                  <input type="text" class="input" id="name" name="name" autocomplete="off" disabled>
                </div>
              </div>

              <div class="inputfield">
                <input type="button" value="Add Appointment" class="btn-add" onclick="submitData('addAppointment'); closeForm2();">
                <?php require 'missed-schedule-data.js.php'; ?>
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
                <input type="button" value="Delete" class="btn-delete" onclick="submitData('deleteSchedule'); closeFormDelete();">
                <?php require 'missed-schedule-data.js.php'; ?>
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

    function openForm(date, name, petname, service, number, id) {
      document.getElementById("myForm").style.display = "block";
      document.getElementById("name").value = name;
      document.getElementById("schedID").value = id;
      document.getElementById("petname").value = petname;
      document.getElementById("service").value = service;
      document.getElementById("number").value = number;
    }

    function deleteRow(rowId) {
      document.getElementById("rowId").value = rowId;
    }

    function closeForm2() {
      var date = document.getElementById("date").value;
      if (date == "") {
        //successAlert("Empty fields detected");
      } else {
        document.getElementById("myForm").style.display = "none";
      }
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