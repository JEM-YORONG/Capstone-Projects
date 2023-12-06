<?php
require 'disable-paste.js.php'; ?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!----======== CSS ======== -->
  <link rel="stylesheet" href="Capstone_Staff.css" />
  <link rel="stylesheet" href="Capstone_ClinicAboutUs copy.css">

  <!----===== Icons ===== -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <!----===== Icons ===== -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

  <?php require 'alert-notif-function.php'; ?>

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
  <section class="Contents">
    <div class="top">
      <i class="sidebar-toggle"><span class="material-symbols-outlined"> menu </span></i>
      <div class="title">
        <span class="text">Customer</span>
        <?php require 'alert-notif.php'; ?>
      </div>
    </div>

    <div class="web-content">
      <div class="overview">
        <div class="menu">
          <div class="search-box">
            <input type="text" id="search" oninput="filterTable();" placeholder="Search here..." autocomplete="off" />
          </div>
          <div class="bttn">
            <?php require 'customer-auto-gen-id.js.php'; ?>
            <button class="add-button" onclick="openForm(); generateAndDisplayId();">
              <span>+ Add New</span>
            </button>
          </div>
        </div>
        <div class="staff-table">
          <table id="staffTable">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Contact</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col" colspan="2">Actions</th>
              </tr>
            </thead>
            <tbody id="table-body"></tbody>
            <?php
            require 'customer-fetch-data.php';
            ?>
          </table>
          <div id="pagination-container" class="pagination"></div>
        </div>
      </div>

      <script>
        var rowsPerPage = 16; // Adjust this to your desired number of rows per page
        var currentPage = 1;

        function showPage(pageNumber) {
          var startIndex = (pageNumber - 1) * rowsPerPage;
          var endIndex = startIndex + rowsPerPage;

          var rows = document.getElementById('staffTable').rows;

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
          var pageCount = Math.ceil((document.getElementById('staffTable').rows.length - 1) / rowsPerPage);

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
          var pageCount = Math.ceil((document.getElementById('staffTable').rows.length - 1) / rowsPerPage);
          if (currentPage < pageCount) {
            showPage(currentPage + 1);
          }
        }

        function filterTable() {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("search");
          filter = input.value.toUpperCase();
          table = document.getElementById("staffTable");
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

      <!--Add Staff-->
      <div class="form-popup" id="myForm">
        <form action="" class="form-container" method="post">
          <div class="title">Customer</div>
          <div class="form">
            <div class="inputfield" style="display: block;">
              <label>ID</label>
              <input type="text" class="input" disabled id="addId" />
            </div>
            <div class="inputfield">
              <label>First Name</label>
              <input type="text" class="input" id="addFirstName" maxlength="225" onkeydown="return /[a-zA-Z\s]/i.test(event.key)" />
            </div>
            <div class="inputfield">
              <label>Last Name</label>
              <input type="text" class="input" id="addLastName" maxlength="225" onkeydown="return /[a-zA-Z\s]/i.test(event.key)" />
            </div>
            <div class="inputfield">
              <label>Contact</label>
              <input type="tel" class="input" id="addContact" maxlength="11" onkeydown="return /[0-9\s/b]/i.test(event.key)" />
            </div>
            <div class="inputfield">
              <label>Email (Optional)</label>
              <input type="email" class="input" id="addEmail" maxlength="225" onkeydown="return /[0-9a-zA-Z@.]/i.test(event.key)" />
            </div>
            <div class="inputfield">
              <label>Address</label>
              <input type="text" class="input" id="addAddress" onkeydown="return /[0-9a-zA-Z]/i.test(event.key)" />
            </div>
            <div class="inputfield">
              <input type="button" value="Cancel" class="btn-create" onclick="closeForm(); clearForm();" />
              <input type="button" value="Add Customer" class="btn-add" onclick="submitData('addCustomer');" />
              <?php
              require 'customer-data.js.php';
              ?>
            </div>
          </div>
          <button type="button" class="btn-close" onclick="closeForm(); clearForm();">
            Close
          </button>
        </form>
      </div>
      <!--Delete-->
      <div class="form-popup-delete" id="myForm-delete">
        <form action="/action_page.php" class="form-container-delete">
          <div class="delete-title">Are you sure?</div>
          <div class="form-delete">
            <label>This will be permanently deleted</label>
            <div class="inputfield">
              <input type="button" value="Cancel" class="btn-cancel" onclick="closeFormDelete()" />
              <input type="button" value="Delete" class="btn-delete" onclick="submitData('deleteCustomer');" />
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

    function getId(rowId) {
      document.getElementById("addId").value = rowId;
    }

    function deleteId(rowId) {
      document.getElementById("addId").value = rowId;
    }

    function openForm() {
      document.getElementById("myForm").style.display = "block";
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