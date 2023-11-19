<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!----======== CSS ======== -->
  <link rel="stylesheet" href="Capstone_ClinicInfo.css" />
  <link rel="stylesheet" href="Capstone_ClinicAboutUs copy.css">

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
        <span class="text">Clinic Information</span>
      </div>
    </div>

    <!--=====Info====-->
    <div class="content">
      <div class="Neon Neon-theme-dragdropbox">
        <input style="
              z-index: 999;
              opacity: 0;
              width: 320px;
              height: 200px;
              position: absolute;
              right: 0px;
              left: 0px;
              margin-right: auto;
              margin-left: auto;
            " type="file" id="img" name="img" accept="image/*" />
        <div class="Neon-input-dragDrop">
          <div class="Neon-input-inner">
            <div class="Neon-input-icon">
              <i class="fa fa-file-image-o"></i>
            </div>
            <br />
            <img id="preview" src=".vscode/Images/Doc Lenon Logo.png" />
          </div>
          <form>
            <input type="file" id="changeImage" accept="image/*" onchange="submitData('editInformation')">
            <?php require 'information-data.js.php'; ?>
          </form>
        </div>
      </div>
      <div class="web-content">
        <div class="myDiv">
          <p class="edit" onclick="editTitle()"><u>Edit</u></p>
          <br />
          <h1 id="edit-title">Doc Lenon Veterinary Clinic</h1>
          <button id="saveTitle" style="display: none;" onclick="saveTitle(); submitData('editInformation')">Save</button>
          <?php require 'information-data.js.php'; ?>
        </div>
        <div class="contact-edit">
          <label>Contact</label>
          <p class="edit" onclick="editContacts()"><u>Edit</u></p>
          <br />
          <div class="contact">
            <p id="num1">+63 900 000 0000</p>
            <p id="num2">+63 900 000 0000</p>
          </div>
          <button id="saveContacts" onclick="saveContacts()" style="display: none;">Save</button>
          <?php require 'information-data.js.php'; ?>
        </div>
        <br />
        <div>
          <label>Email</label>
          <p class="edit" onclick="editEmail()"><u>Edit</u></p>
          <br />
          <p id="email">himenohimko.pot@gmail.com</p>
        </div>
        <button id="saveEmail" onclick="saveEmail()" style="display: none;">Save</button>
        <?php require 'information-data.js.php'; ?>
        <br />
        <div>
          <label>Socials</label>
          <p class="edit" onclick="editSocial()"><u>Edit</u></p>
          <br />
          <div class="contact">
            <p id="social">Facebook</p>
          </div>
          <button id="saveSocial" onclick="saveSocial()" style="display: none;">Save</button>
          <?php require 'information-data.js.php'; ?>
        </div>
        <div>
          <br />
          <label>Address</label>
          <p class="edit" onclick="editAddress()"><u>Edit</u></p>
          <br />
          <p id="address">
            Lutgarda Bldg., Km 40, National Highway, Pulong Buhangin, Santa
            Maria, Bulacan, Philippines
          </p>
        </div>
        <button id="saveAddress" onclick="saveAddress()" style="display: none;">Save</button>
        <?php require 'information-data.js.php'; ?>
      </div>
    </div>
    <div class="about-clinic">
      <div>
        <label>Intro</label>
        <p class="edit" onclick="editIntro()"><u>Edit</u></p>
        <br />
        <p id="intro">
          The righteous care for the needs of their animals, but the kindest
          acts of the wicked are cruel Prov
        </p>
        <button id="saveIntro" onclick="saveIntro()" style="display: none;">Save</button>
        <?php require 'information-data.js.php'; ?>
        <br />
        <label>About</label>
        <p class="edit" onclick="editAbout()"><u>Edit</u></p>
        <br />
        <p class="about-content" id="about">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
          eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
          ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
          aliquip ex ea commodo consequat. Duis aute irure dolor in
          reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
          pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
          culpa qui officia deserunt mollit anim id est laboru.
        </p>
        <button id="saveAbout" onclick="saveAbout()" style="display: none;">Save</button>
        <?php require 'information-data.js.php'; ?>
      </div>
    </div>

    <div class="add-button">
      <a href="#" class="float" onclick="openForm()">
        <i><span class="material-symbols-outlined">date_range</span></i>
      </a>
    </div>

    <div class="weekly-sched" id="weeklysched">
      <form>
        <span class="material-symbols-outlined" onclick="closeForm()" style="cursor: pointer;">
          close
        </span>
        <br />
        <h3>Schedule</h3>

        <div>
          <div class="day">
            <label>Date</label>
            <label>Start</label>
            <label>End</label>
          </div>
          <div class="day">
            <span id="monday">Monday</span>
            <span id="mondayStart" class="time-start" onclick="timeOpen()">8:00 am</span>
            <span id="mondayEnd" class="time-end">5:00pm</span>
            <input id="mondayStatus" type="checkbox" />
          </div>
          <div class="day">
            <span id="tuesday">Tuesday</span>
            <span id="tuesdayStart" class="time-start" onclick="timeOpen()">8:00 am</span>
            <span id="tuesdayEnd" class="time-end">5:00pm</span>
            <input id="tuesdayStatus" type="checkbox" />
          </div>
          <div class="day">
            <span id="wednesday">Wednesday</span>
            <span id="wednesdayStart" class="time-start" onclick="timeOpen()">8:00 am</span>
            <span id="wednesdayEnd" class="time-end">5:00pm</span>
            <input id="wednesdayStatus" type="checkbox" />
          </div>
          <div class="day">
            <span id="thursday">Thursday</span>
            <span id="thursdayStart" class="time-start" onclick="timeOpen()">8:00 am</span>
            <span id="thursdayEnd" class="time-end">5:00pm</span>
            <input id="thursdayStatus" type="checkbox" />
          </div>
          <div class="day">
            <span id="friday">Friday</span>
            <span id="fridayStart" class="time-start" onclick="timeOpen()">8:00 am</span>
            <span id="fridayEnd" class="time-end">5:00pm</span>
            <input id="fridayStatus" type="checkbox" />
          </div>
          <div class="day">
            <span id="saturday">Saturday</span>
            <span id="saturdayStart" class="time-start" onclick="timeOpen()">8:00 am</span>
            <span id="saturdayEnd" class="time-end">5:00pm</span>
            <input id="saturdayStatus" type="checkbox" />
          </div>
          <div class="day">
            <span id="sunday">Sunday</span>
            <span id="sundayStart" class="time-start" onclick="timeOpen()">8:00 am</span>
            <span id="sundayEnd" class="time-end">5:00pm</span>
            <input id="sundayStatus" type="checkbox" />
          </div>
          <div class="day">
            <input type="button" value="Save" id="saveSchedule" onclick="submitData('editInformation')" />
            <?php require 'information-data.js.php'; ?>
          </div>
        </div>
      </form>
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
    //load image add
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          document.getElementById('preview').src = e.target.result;
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    document.getElementById('changeImage').addEventListener('change', function() {
      readURL(this);
    });

    function editAbout() {
      document.getElementById("about").contentEditable = true;
      document.getElementById("saveAbout").style.display = "block";
    }

    function saveAbout() {
      document.getElementById("about").contentEditable = false;
      document.getElementById("saveAbout").style.display = "none";
    }

    function editIntro() {
      document.getElementById("intro").contentEditable = true;
      document.getElementById("saveIntro").style.display = "block";
    }

    function saveIntro() {
      document.getElementById("intro").contentEditable = false;
      document.getElementById("saveIntro").style.display = "none";
    }

    function editAddress() {
      document.getElementById("address").contentEditable = true;
      document.getElementById("saveAddress").style.display = "block";
    }

    function saveAddress() {
      document.getElementById("address").contentEditable = false;
      document.getElementById("saveAddress").style.display = "none";
    }

    function editSocial() {
      document.getElementById("social").contentEditable = true;
      document.getElementById("saveSocial").style.display = "block";
    }

    function saveSocial() {
      document.getElementById("social").contentEditable = false;
      document.getElementById("saveSocial").style.display = "none";
    }

    function editEmail() {
      document.getElementById("email").contentEditable = true;
      document.getElementById("saveEmail").style.display = "block";
    }

    function saveEmail() {
      document.getElementById("email").contentEditable = false;
      document.getElementById("saveEmail").style.display = "none";
    }

    function editContacts() {
      document.getElementById("num1").contentEditable = true;
      document.getElementById("num2").contentEditable = true;
      document.getElementById("saveContacts").style.display = "block";
    }

    function saveContacts() {
      document.getElementById("num1").contentEditable = false;
      document.getElementById("num2").contentEditable = false;
      document.getElementById("saveContacts").style.display = "none";
    }

    function editTitle() {
      document.getElementById("edit-title").contentEditable = true;
      document.getElementById("saveTitle").style.display = "block";
    }

    function saveTitle() {
      document.getElementById("edit-title").contentEditable = false;
      document.getElementById("saveTitle").style.display = "none";
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