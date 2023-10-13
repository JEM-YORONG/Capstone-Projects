<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css files\Capstone_ClinicInfo.css" />

    <!----===== Icons ===== -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"
    />
    <!--=====Change name mo na lang====-->
    <title>Admin Dashboard Panel</title>
  </head>
  <body>
    <!--=====Navigation Bar====-->
    <?php require 'nav-bar.html.php'; ?>
    <!--=====Pinaka taas/ title ganon====-->
    <section class="dashboard">
      <div class="top">
        <i class="sidebar-toggle"
          ><span class="material-symbols-outlined"> menu </span></i
        >
        <div class="title">
          <span class="text">Clinic Information</span>
        </div>
      </div>
      
      <!--=====Info====-->
      <div class="content">
        <div class="Neon Neon-theme-dragdropbox">
          <input
            style="
              z-index: 999;
              opacity: 0;
              width: 320px;
              height: 200px;
              position: absolute;
              right: 0px;
              left: 0px;
              margin-right: auto;
              margin-left: auto;
            "
            type="file"
            id="img"
            name="img"
            accept="image/*"
          />
          <div class="Neon-input-dragDrop">
            <div class="Neon-input-inner">
              <div class="Neon-input-icon">
                <i class="fa fa-file-image-o"></i>
              </div>
              <a class="Neon-input-choose-btn blue"><u>Change Image</u></a>
              <br />
              <img src=".vscode/Images/Doc Lenon Logo.png" />
            </div>
          </div>
        </div>
        <div class="web-content">
          <div class="myDiv">
            <p class="edit" onclick="editTitle()"><u>Edit</u></p>
            <br />
            <h1 id="edit-title">Doc Lenon Veterinary Clinic</h1>
            <button class="saveedit-button" id="btn">save</button>
          </div>
          <div class="contact-edit">
            <label>Contact</label>
            <p class="edit"><u>Edit</u></p>
            <br />
            <div class="contact">
              <p>+63 900 000 0000</p>
              <p>+63 900 000 0000</p>
              <button id="btn">save</button>
            </div>
          </div>
          <br />
          <div>
            <label>Email</label>
            <p class="edit"><u>Edit</u></p>
            <br />
            <p>himenohimko.pot@gmail.com</p>
          </div>
          <br />
          <div>
            <label>Socials</label>
            <p class="edit"><u>Edit</u></p>
            <br />
            <div class="contact">
              <p>Instagram</p>
              <p>Facebook</p>
            </div>
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
        </div>
      </div>
      <div class="about-clinic">
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
              <span>Monday</span>
              <span class="time-start" onclick="timeOpen()">8:00 am</span>
              <span class="time-end">5:00pm</span>
              <input type="checkbox" />
            </div>
            <div class="day">
              <span>Tuesday</span>
              <span class="time-start">8:00 am</span>
              <span class="time-end">5:00pm</span>
              <input type="checkbox" />
            </div>
            <div class="day">
              <span>Wednesday</span>
              <span class="time-start">8:00 am</span>
              <span class="time-end">5:00pm</span>
              <input type="checkbox" />
            </div>
            <div class="day">
              <span>Thursday</span>
              <span class="time-start">8:00 am</span>
              <span class="time-end">5:00pm</span>
              <input type="checkbox" />
            </div>
            <div class="day">
              <span>Friday</span>
              <span class="time-start">8:00 am</span>
              <span class="time-end">5:00pm</span>
              <input type="checkbox" />
            </div>
            <div class="day">
              <span>Saturday</span>
              <span class="time-start">8:00 am</span>
              <span class="time-end">5:00pm</span>
              <input type="checkbox" />
            </div>
            <div class="day">
              <span>Sunday</span>
              <span class="time-start">8:00 am</span>
              <span class="time-end">5:00pm</span>
              <input type="checkbox" checked="false" />
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
