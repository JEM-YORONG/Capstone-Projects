<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!----======== CSS ======== -->
  <link rel="stylesheet" href="css files\Capstone_ClinicAnnouncement.css" />
  <link rel="stylesheet" href="css files\Capstone_ClinicServNProd.css">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css files\Capstone_CustNPetRecords.css" />

  <!----===== Icons ===== -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <!--=====Change name mo na lang====-->
  <title>Admin Clinic Information Panel</title>
</head>

<body>
  <!--=====Navigation Bar====-->
  <?php require 'nav-bar.html.php'; ?>
  <!--=====Pinaka taas/ title ganon====-->
  <section class="dashboard">
    <div class="top">
      <i class="sidebar-toggle"><span class="material-symbols-outlined"> menu </span></i>
      <div class="title">
        <span class="text">Clinic Announcement</span>
      </div>
    </div>

    <!---->
    <div class="web-content">
      <div style="padding-left: 80%;">
        <input type="text" id="id" style="display: none;">
        <div style="padding-top: 10px;">
        <button class="add-button" onclick="openAnnouncement()">Add New</button>
        </div>
      </div>

      <div class="boxes-overview" id="refresh">
        <!-- product boxes -->
        <?php require 'script files\announcement-autorefresh.js.php'; ?>
        <!--End of display-->
      </div>

      <!--Add Announcement-->
      <div class="form-popup-servprod" id="myForm-announcement">
        <form action="" class="form-container-servprod" method="post" enctype="multipart/form-data">
          <div class="title">
            Upload Announcement
          </div>
          <div class="form">
            <div class="inputfield-image">
              <img id="preview" src=".vscode/Images/didunkow.jpg" alt="Image Preview" width="600" height="400" style="object-fit: cover;">
              <input type="file" id="addImage" accept="image/*" value="Upload Image">
            </div>
            <div class="inputfield">
              <label>Title</label>
              <input type="text" class="input" id="addTitle" />
            </div>
            <div class="inputfield">
              <label>Description</label>
              <textarea type="text" id="addDescription" class="input" rows="5" cols="110" resize="none" placeholder="Type here..."></textarea>
            </div>

            <div class="inputfield">
              <?php require 'script files\announcement-data.js.php'; ?>
              <input type="button" value="Upload" class="btn-send" onclick="submitData('Add');" />
            </div>
            <input type="button" value="Close" class="btn-cancel" onclick="closeFormAnnouncement()" />
          </div>
        </form>
      </div>

      <!--Edit Announcement-->
      <div class="form-popup-servprod" id="myForm-Editannouncement">
        <form action="" class="form-container-servprod" method="post" enctype="multipart/form-data">
          <div class="title">
            Upload Announcement
          </div>
          <div class="form">
            <div class="inputfield-image">
              <img id="editPreview" src=".vscode/Images/didunkow.jpg" alt="Image Preview" width="600" height="400" style="object-fit: cover;">
              <input type="file" id="editImage" accept="image/*" value="Upload Image">
            </div>
            <div class="inputfield">
              <label>Title</label>
              <input type="text" class="input" id="editTitle" />
            </div>
            <div class="inputfield">
              <label>Description</label>
              <textarea type="text" id="editDescription" class="input" rows="5" cols="110" resize="none" placeholder="Type here..."></textarea>
            </div>

            <div class="inputfield">
              <?php require 'script files\announcement-data.js.php'; ?>
              <input type="button" value="Upload" class="btn-send" onclick="submitData('Edit')" />
            </div>
            <input type="button" value="Close" class="btn-cancel" onclick="closeEditFormAnnouncement(); clearId();" />
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

    function getInfo(imageName, imageSrc, imageFile, title, description, id) {
      const fileInput = document.getElementById("editImage");
      const file = new File([imageName], imageFile);
      const dataTransfer = new DataTransfer();
      dataTransfer.items.add(file);
      fileInput.files = dataTransfer.files;

      document.getElementById("id").value = id;
      document.getElementById("editPreview").src = imageSrc;
      document.getElementById("editTitle").value = title;
      document.getElementById("editDescription").value = description;
    }

    function getRow(rowId) {
      document.getElementById("editTitle").value = rowId;
    }


    function clearId(){
      document.getElementById("id").value = "";
    }

    function openAnnouncement() {
      document.getElementById("myForm-announcement").style.display = "block";
    }

    function closeFormAnnouncement() {
      document.getElementById("myForm-announcement").style.display = "none";
    }

    function openEditAnnouncement() {
      document.getElementById("myForm-Editannouncement").style.display = "block";
    }

    function closeEditFormAnnouncement() {
      document.getElementById("myForm-Editannouncement").style.display = "none";
    }

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

    document.getElementById('addImage').addEventListener('change', function() {
      readURL(this);
    });

    //load image edit
    function readURLEdit(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          document.getElementById('editPreview').src = e.target.result;
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    document.getElementById('editImage').addEventListener('change', function() {
      readURLEdit(this);
    });
  </script>
</body>

</html>