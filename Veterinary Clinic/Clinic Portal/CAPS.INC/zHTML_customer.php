<?php
require 'script files\disable-paste.js.php'; ?>
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
  <!----===== Icons ===== -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  
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
        <span class="text">Customer</span>
        <?php require 'alert-notif.php'; ?>
      </div>
    </div>

    <div class="web-content">
      <div class="overview">
        <div class="menu">
          <div class="search-box">
            <input type="text" id="search" placeholder="Search here..." autocomplete="off" />
          </div>
          <div class="bttn">
            <?php require 'script files\customer-auto-gen-id.js.php'; ?>
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
            require 'script files\customer-table-refresh-data.js.php'; 
            ?>
          </table>
        </div>
      </div>
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
              <input type="button" value="Add Customer" class="btn-add" onclick="submitData('addCustomer'); closeForm();" />
              <?php
              require 'script files\customer-data.js.php';
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
          <div class="title">Are you sure?</div>
          <div class="form-delete">
            <label>This will be permanently deleted</label>
            <div class="inputfield">
              <input type="button" value="Cancel" class="btn-cancel" onclick="closeFormDelete()" />
              <input type="button" value="Delete" class="btn-delete" onclick="submitData('deleteCustomer'); closeFormDelete();" />
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