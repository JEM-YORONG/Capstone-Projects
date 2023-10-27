<?php
require 'script files\disable-paste.js.php';
require 'script files\staff-data.js.php';
?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!----======== CSS ======== -->
  <link rel="stylesheet" href="css files\Capstone_Staff.css" />
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
  <section class="Contents">
    <div class="top">
      <i class="sidebar-toggle"><span class="material-symbols-outlined"> menu </span></i>
      <div class="title">
        <span class="text">Staff</span>
      </div>
    </div>

    <div class="web-content">
      <div class="overview">
        <div class="menu">
          <div class="search-box">
            <input type="text" id="search" placeholder="Search here..." autocomplete="off" />
          </div>
          <div class="bttn">
            <?php require 'script files\staff-auto-gen-id.js.php'; ?>
            <button class="add-button" onclick="openForm(); generateAndDisplayId();">
              <span>+ Add New</span>
            </button>
          </div>
        </div>
        <div class="staff-table">
          <table>
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Role</th>
                <th scope="col">Contact</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col" colspan="2">Actions</th>
              </tr>
            </thead>
            <tbody id="table-body"></tbody>
            <?php require 'script files\staff-refresh-data.js.php'; ?>
          </table>
        </div>
      </div>
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
              <input type="text" class="input" placeholder="Juan Delacruz" id="name" maxlength="225" onkeydown="return /[a-zA-Z\s]/i.test(event.key)" />
            </div>
            <div class="inputfield">
              <label>Role</label>
              <!--<input type="text" class="input" id="role" onkeydown="return /[a-zA-Z.\s]/i.test(event.key)" /> -->
              <select class="input" id="role" aria-placeholder="Admin">
                <option value="Admin">Admin</option>
                <option value="Staff">Staff</option>
              </select>
            </div>
            <div class="inputfield">
              <label>Contact</label>
              <input type="" class="input" placeholder="09*********" id="contact" maxlength="11" onkeydown="return /[0-9\s/b]/i.test(event.key)" />
            </div>
            <div class="inputfield">
              <label>Email</label>
              <input type="email" class="input" placeholder="Example@gmail.com" id="email" maxlength="225" onkeydown="return /[0-9a-zA-Z@.]/i.test(event.key)" />
            </div>
            <div class="inputfield">
              <label>Password</label>
              <input type="password" class="input" id="password" placeholder="••••••••" maxlength="8" onkeydown="return /[0-9a-zA-Z]/i.test(event.key)" />
            </div>
            <div class="inputfield">
              <input type="button" value="Cancel" class="btn-create" onclick="closeForm(); clearForm();" />
              <input type="button" value="Add Staff" class="btn-add" onclick="submitData('addStaff');" />
              <?php
              require 'script files\staff-data.js.php';
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
                <option value="Staff">Staff</option>
              </select>
            </div>
            <div class="inputfield">
              <label>Contact</label>
              <input type="" class="input" placeholder="09*********" id="editContact" maxlength="11" onkeydown="return /[0-9\s/b]/i.test(event.key)" />
            </div>
            <div class="inputfield">
              <label>Email</label>
              <input type="email" disabled class="input" id="editEmail" placeholder="Example@gmail.com" maxlength="225" onkeydown="return /[0-9a-zA-Z@.]/i.test(event.key)" />
            </div>
            <div class="inputfield">
              <label>Password</label>
              <input type="password" class="input" placeholder="••••••••" id="editPassword" maxlength="8" onkeydown="return /[0-9a-zA-Z]/i.test(event.key)" />
            </div>
            <div class="inputfield">
              <input type="button" value="Update" class="btn-update" onclick="submitData('editStaff'); closeFormEdit();" />
              <?php
              require 'script files\staff-data.js.php';
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
          <div class="title">Are you sure?</div>
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
    }

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