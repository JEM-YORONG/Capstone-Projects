<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!----======== CSS ======== -->
  <link rel="stylesheet" href="Capstone_ClinicAboutUs.css" />

  <!----===== Icons ===== -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

  <!-- alert script -->
  <?php require 'alert-notif-function.php' ?>;

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

        <!-- alert -->
        <?php require 'alert-notif.php'; ?>

      </div>
    </div>
    <!--=====Info====-->

    <div class="web-content">
      <div class="img-content">
        <div class="wrapper">
          <form action="#">
            <?php
            require 'database-conn.php';

            $query = "SELECT * FROM aboutus WHERE id = '1'";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
              $imageName = $row['imagename'];
              $imageType = $row['imagetype'];
              $imageData = $row['imagedata'];

              $title = $row['title'];
              $address = $row['address'];
              $intro = $row['intro'];
              $about = $row['about'];
            }

            $imageScr = "data:" . $imageType . ";base64," . base64_encode($imageData);
            ?>
            <!-- .vscode/Doc Lenon Logo.png -->
            <img src="<?php echo $imageScr; ?>" id="imagePreview" />
          </form>
          <div class="button-img">
            <div class="button-wrap" id="upload" style="display: none;">
              <label class="button" for="uploadimg">Upload Logo</label>
              <input type="file" id="uploadimg" name="img" accept="image/*" />
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="about-clinic">
      <div class="myDiv">
        <br>
        <h1 id="title" style="padding: 5px; text-transform: none;"><?php echo $title; ?></h1>
      </div>
      <div style="text-align: center;">
        <br />
        <h2>Address</h2>
        <br />
        <p id="address"><?php echo $address; ?></p>
      </div>
      <div style="text-align: center;">
        <br>
        <h2>Intro</h2>
        <br />
        <p id="intro"><?php echo $intro; ?></p>
        <br />
        <h2>About</h2>
        <br />
        <p class="about-content" id="about"><?php echo $about; ?></p>
      </div>
    </div>

    <!-- buttons -->
    <div style="   
        margin-top: 50px;
        display: flex;
        align-self: center;
        justify-content: center;
        ">
      <div class="button-wrap" style="display: block;" id="divUpdate">
        <label class="button" onclick="showC();" style="width: 100px; text-align: center;">
          <span class="material-symbols-outlined">
            edit
          </span>
        </label>
      </div>
      <div style="display: none;" id="divConfirm">
        <div class="button-wrap" style="padding: 10px;">
          <label class="button" onclick="submitData('addInfo');" style="width: 500px; text-align: center;">Ok</label>
          <?php require 'about-us.data.php'; ?>
        </div>
        <div class="button-wrap" style="padding: 10px;">
          <label class="button" onclick="hideC();" style="width: 500px; text-align: center;">Cancel</label>
        </div>
      </div>
    </div>
  </section>

  <script>
    function showC() {
      document.getElementById("divConfirm").style.display = "block";
      document.getElementById("divUpdate").style.display = "none";

      document.getElementById('upload').style.display = "block";

      document.getElementById("title").contentEditable = true;
      document.getElementById("address").contentEditable = true;
      document.getElementById("intro").contentEditable = true;
      document.getElementById("about").contentEditable = true;
    }

    function hideC() {
      document.getElementById("divConfirm").style.display = "none";
      document.getElementById("divUpdate").style.display = "block";

      document.getElementById('upload').style.display = "none";

      document.getElementById("title").contentEditable = false;
      document.getElementById("address").contentEditable = false;
      document.getElementById("intro").contentEditable = false;
      document.getElementById("about").contentEditable = false;
    }

    //load image add
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          document.getElementById('imagePreview').src = e.target.result;
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    document.getElementById('uploadimg').addEventListener('change', function() {
      readURL(this);
    });
  </script>

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
  </script>
</body>

</html>