<?php
require 'disable-paste.js.php';
require 'staff-data.js.php';
?>
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
        <span class="text">Staff</span>
        <?php require 'alert-notif.php'; ?>
      </div>
    </div>

    <div class="web-content">
      <div class="overview">
        <div class="menu">
          <div class="search-box">
            <input type="text" id="search" placeholder="Search here..." autocomplete="off" oninput="filterTable()" />
          </div>
          <div class="bttn">
            <?php require 'staff-auto-gen-id.js.php'; ?>
            <button class="add-button" onclick="openForm(); generateAndDisplayId();">
              <span>+ Add New</span>
            </button>
          </div>
        </div>

        <div class="staff-table" id="refresh">
          <table width=100% id="staffTable">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col" width=25%>Name</th>
                <th scope="col" width=10%>Role</th>
                <th scope="col" width=15%>Contact</th>
                <th scope="col" width=15%>Email</th>
                <th scope="col">Password</th>
                <th scope="col" colspan="2">Actions</th>
              </tr>
            </thead>
            <tbody id="table-body"></tbody>
            <?php require 'staff-fetch-data.php'; ?>
          </table>
        </div>
      </div>

      <div id="pagination-container" class="pagination"></div>

      <script>
        var rowsPerPage = 17; // Adjust this to your desired number of rows per page
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
          <div class="title">Add Staff</div>
          <div class="form">
            <div class="inputfield">
              <label>ID</label>
              <input type="text" class="input" disabled id="id" />
            </div>
            <div class="inputfield">
              <label>Name</label>
              <input type="text" class="input" id="name" maxlength="225" onkeydown="return /[a-zA-Z\s]/i.test(event.key)" />
            </div>
            <div class="inputfield">
              <label>Role</label>
              <!--<input type="text" class="input" id="role" onkeydown="return /[a-zA-Z.\s]/i.test(event.key)" /> -->
              <select class="input" id="role" aria-placeholder="Admin">
                <option value="Admin">Admin</option>
                <option value="Secretary">Secretary</option>
                <option value="Veterinarian">Veterinarian</option>
                <option value="Assistant">Assistant</option>
                <option value="Groomer">Groomer</option>
              </select>
            </div>

            <script>
              // Get the select element by its ID
              const roleSelect = document.getElementById('role');

              // Attach an event listener to the select element
              roleSelect.addEventListener('change', function() {
                // Get the selected value
                const selectedValue = roleSelect.value;

                if (selectedValue == "Assistant" || selectedValue == "Groomer") {
                  document.getElementById('emailTxt').style.display = "none";
                  document.getElementById('passTxt').style.display = "none";
                  document.getElementById('email').style.display = "none";
                  document.getElementById('password').style.display = "none";
                  document.getElementById('email').value = "-@gmail.com";
                  document.getElementById('password').value = "nonenone";
                } else {
                  document.getElementById('emailTxt').style.display = "block";
                  document.getElementById('passTxt').style.display = "block";
                  document.getElementById('email').style.display = "block";
                  document.getElementById('password').style.display = "block";
                }
              });
            </script>


            <div class="inputfield">
              <label>Contact</label>
              <input type="" class="input" placeholder="09*********" id="contact" maxlength="11" onkeydown="return /[0-9\s/b]/i.test(event.key)" />
            </div>
            <div class="inputfield">
              <label id="emailTxt">Email</label>
              <input type="email" class="input" placeholder="Example@gmail.com" id="email" maxlength="225" onkeydown="return /[0-9a-zA-Z@.]/i.test(event.key)" />
            </div>
            <div class="inputfield">
              <label id="passTxt">Password</label>
              <input type="password" class="input" id="password" placeholder="••••••••" maxlength="8" onkeydown="return /[0-9a-zA-Z]/i.test(event.key)" />
            </div>
            <div class="inputfield">
              <input type="button" value="Cancel" class="btn-create" onclick="closeForm(); clearForm();" />
              <input type="button" value="Add Staff" class="btn-add" onclick="submitData('addStaff');" />
              <?php
              require 'staff-data.js.php';
              ?>
            </div>
          </div>
          <button type="button" class="btn-close" onclick="closeForm(); clearForm();">
            Close
          </button>
        </form>
      </div>
      <!--Edit--->
      <div class="form-popup-edit" id="myForm-edit">
        <form action="" class="form-container-edit" method="post">
          <div class="title">Edit Staff</div>
          <div class="form-edit">
            <div class="inputfield">
              <label>ID</label>
              <input type="text" class="input" disabled id="editId" />
            </div>
            <div class="inputfield">
              <label>Name</label>
              <input type="text" class="input" placeholder="Juan Delacruz" id="editName" maxlength="225" onkeydown="return /[a-zA-Z\s]/i.test(event.key)" />
            </div>
            <div class="inputfield">
              <label>Role</label>
              <!--<input type="text" class="input" id="editRole" onkeydown="return /[a-zA-Z.\s]/i.test(event.key)" /> -->
              <select class="input" id="editRole" aria-placeholder="Admin">
                <option value="Admin">Admin</option>
                <option value="Secretary">Secretary</option>
                <option value="Veterinarian">Veterinarian</option>
                <option value="Assistant">Assistant</option>
                <option value="Groomer">Groomer</option>
              </select>
            </div>
            <div class="inputfield">
              <label>Contact</label>
              <input type="" class="input" placeholder="09*********" id="editContact" maxlength="11" onkeydown="return /[0-9\s/b]/i.test(event.key)" />
            </div>
            <div class="inputfield">
              <label id="editEmailtxt">Email</label>
              <input type="email" disabled class="input" id="editEmail" placeholder="Example@gmail.com" maxlength="225" onkeydown="return /[0-9a-zA-Z@.]/i.test(event.key)" />
            </div>
            <div class="inputfield">
              <label id="editPasstxt">Password</label>
              <input type="password" class="input" placeholder="••••••••" id="editPassword" maxlength="8" onkeydown="return /[0-9a-zA-Z]/i.test(event.key)" />
            </div>
            <div class="inputfield">
              <input type="button" value="Update" class="btn-update" onclick="submitData('editStaff');" />
              <?php
              require 'staff-data.js.php';
              ?>
            </div>
          </div>
          <button type="button" class="btn-close" onclick="closeFormEdit();">
            Cancel
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
              <input type="button" value="Delete" class="btn-delete" onclick="submitData('deleteStaff'); closeFormDelete();" />
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

    function deleteId(rowId) {
      document.getElementById("editId").value = rowId;
    }

    function getRowID(rowId, rowName, rowRole, rowContact, rowEmail, rowPassword) {
      document.getElementById("editId").value = rowId;
      document.getElementById("editName").value = rowName;
      document.getElementById("editRole").value = rowRole;
      document.getElementById("editContact").value = rowContact;
      document.getElementById("editEmail").value = rowEmail;
      document.getElementById("editPassword").value = rowPassword;

      var role = document.getElementById("editRole");
      var email = document.getElementById("editEmail");
      var password = document.getElementById("editPassword");
      var emailTxt = document.getElementById("editEmailtxt");
      var passTxt = document.getElementById("editPasstxt");

      if (rowRole == "Groomer" || rowRole == "Assistant") {
        email.style.display = "none";
        password.style.display = "none";
        emailTxt.style.display = "none";
        passTxt.style.display = "none";
      } else {
        email.style.display = "block";
        password.style.display = "block";
        emailTxt.style.display = "block";
        passTxt.style.display = "block";
      }
    }

    document.getElementById('editRole').addEventListener('change', function() {
      var selectedValue = this.value;

      var role = document.getElementById("editRole");
      var email = document.getElementById("editEmail");
      var password = document.getElementById("editPassword");
      var emailTxt = document.getElementById("editEmailtxt");
      var passTxt = document.getElementById("editPasstxt");

      if (selectedValue == "Admin" || selectedValue == "Secretary" || selectedValue == "Veterinarian") {
        email.style.display = "block";
        password.style.display = "block";
        emailTxt.style.display = "block";
        passTxt.style.display = "block";

        email.disabled = false;
        email.value = "";
        password.value = "";
      } else {
        email.style.display = "none";
        password.style.display = "none";
        emailTxt.style.display = "none";
        passTxt.style.display = "none";

        email.disabled = true;
        email.value = "--------";
        password.value = "--------";
      }
    });

    function clearForm() {
      document.getElementById("id").value = "";
      document.getElementById("name").value = "";
      document.getElementById("contact").value = "";
      document.getElementById("email").value = "";
      document.getElementById("password").value = "";
    }

    function openForm() {
      document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
      document.getElementById("myForm").style.display = "none";
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