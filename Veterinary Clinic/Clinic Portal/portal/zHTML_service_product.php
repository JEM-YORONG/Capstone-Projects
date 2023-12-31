<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!----======== CSS ======== -->
  <link rel="stylesheet" href="Capstone_ClinicServNProd.css" />

  <!----======== CSS ======== -->
  <link rel="stylesheet" href="Capstone_CustNPetRecords.css" />
  <link rel="stylesheet" href="Capstone_ClinicAboutUs copy.css">
  <link rel="stylesheet" href="Capstone_Staff.css">

  <!----===== Icons ===== -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

  <!----===== Icons ===== -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

  <?php require 'alert-notif-function.php'; ?>
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
        <span class="text">Service and Product</span>
        <?php require 'alert-notif.php'; ?>
      </div>
    </div>

    <!---->
    <div class="web-content">
      <div class="menu">
        <div class="bttn">
          <button class="viewAll-button" onclick="clearRadio()">View All</button>
          <button class="services-button" onclick="serviceOnly()">Services Only</button>
          <button class="product-button" onclick="displayFilter()">Products Only</button>
          <button class="filter" id="filterbttn" onclick="openFormFilter()" style="display: none; color: #ffffff; background-color: #5a81fa;">
            <span class="material-symbols-outlined">filter_list</span>
          </button>
          <button class="add-button" onclick="openAddServProd()">Add New</button>
          <input type="text" id="filterValue" style="display: none;">
        </div>
      </div>

      <div class="boxes-overview" id="refresh">
        <!-- product boxes -->
        <?php require 'service-product-autorefresh.js.php'; ?>
        <!--End of display-->
      </div>

      <!--Add Data-->
      <div class="form-popup-servprod" id="myForm-servprod">
        <form action="" class="form-container-servprod" method="post" enctype="multipart/form-data">
          <div class="title">
            Upload Service or Product
          </div>

          <div class="form">
            <div class="inputfield-image">
              <img id="preview" src=".vscode/Images/didunkow.jpg" alt="Image Preview" width="600" height="400" style="object-fit: cover;">
              <input type="file" id="addImage" accept="image/*">
            </div>
            <div class="inputfield">
              <label>Title</label>
              <input type="text" class="input" id="addTitle" />
            </div>
            <div class="inputfield">
              <label>Categories</label>
              <div class="custom_select">
                <select id="addCategories">
                  <option value="">SELECT</option>
                  <option value="Services">Services</option>
                  <option value="Pet Foods">Pet Foods</option>
                  <option value="Bath Products">Bath Products</option>
                  <option value="Accessories">Accessories</option>
                  <option value="Others">Others</option>
                </select>
              </div>
            </div>
            <div class="inputfield">
              <label>Description</label>
              <textarea type="text" id="addDescription" class="input" rows="5" cols="110" resize="none" placeholder="Type here..."></textarea>
            </div>

            <div class="inputfield">
              <input type="button" value="Upload" class="btn-send" onclick="submitData('Add');" />
              <?php require 'service-product-data.js.php'; ?>
            </div>
            <input type="button" value="Close" class="btn-cancel" onclick="closeAddServProd()" />
          </div>
        </form>
      </div>

      <!--Edit-->
      <div class="form-popup-servprod" id="myForm-Editservprod">
        <form action="" class="form-container-servprod" method="post" enctype="multipart/form-data">
          <div class="title">
            Upload Service or Product
          </div>

          <div class="form">
            <div class="inputfield-image">
              <img id="editPreview" src=".vscode/Images/didunkow.jpg" alt="Image Preview">
              <input type="file" id="editImage" accept="image/*">
              <input type="text" value="" id="id" style="display: none;" disabled>
            </div>
            <div class="inputfield">
              <label>Title</label>
              <input type="text" class="input" id="editTitle" />
            </div>
            <div class="inputfield">
              <label>Categories</label>
              <div class="custom_select">
                <select id="editCategories">
                  <option value="Services">Services</option>
                  <option value="Pet Foods">Pet Foods</option>
                  <option value="Bath Products">Bath Products</option>
                  <option value="Accessories">Accessories</option>
                  <option value="Others">Others</option>
                </select>
                </select>
              </div>
            </div>
            <div class="inputfield">
              <label>Description</label>
              <textarea type="text" id="editDescription" class="input" rows="5" cols="110" resize="none" placeholder="Type here..."></textarea>
            </div>

            <div class="inputfield">
              <input type="button" value="Upload" class="btn-send" onclick="submitData('Edit');" />
              <?php require 'service-product-data.js.php'; ?>
            </div>
            <input type="button" value="Close" class="btn-cancel" onclick="closeEditServProd()" />
          </div>
        </form>
      </div>

      <!--Delete-->
      <div class="form-popup-delete" id="myForm-delete" style="display: none;">
        <form action="/action_page.php" class="form-container-delete">
          <div class="title">Are you sure?</div>
          <div class="form-delete">
            <label>This will be permanently deleted</label>
            <div class="inputfield">
              <input type="button" value="Cancel" class="btn-cancel" onclick="closeFormDelete()" />
              <input type="button" value="Delete" class="btn-delete" onclick="submitData('Delete');" />
            </div>
          </div>
        </form>
      </div>

      <!--Filter--->
      <div class="form-popup-filter" id="myForm-filter">
        <form action="" class="form-container-filter">
          <div class="title-filter">Select Category</div>
          <div class="form-filter">
            <div class="inputfield">
              <input type="radio" id="Pet Food" name="category" value="Pet Food" onclick="displayRadioValue()" />
              <label for="Dog Food">Pet Food</label>
            </div>
            <div class="inputfield">
              <input type="radio" id="Bath Products" name="category" value="Bath Products" onclick="displayRadioValue()" />
              <label for="Cat Food">Bath Products</label>
            </div>
            <div class="inputfield">
              <input type="radio" id="Accessories" name="category" value="Accessories" onclick="displayRadioValue()" />
              <label for="Vaccine">Accessories</label>
            </div>
            <div class="inputfield">
              <input type="radio" id="Others" name="category" value="Others" onclick="displayRadioValue()" />
              <label for="Vitamins">Others</label>
            </div>
          </div>
          <button type="button" class="btn-close" onclick="closeFormFilter();">
            Close
          </button>
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

    function displayRadioValue() {
      var ele = document.getElementsByName('category');

      for (i = 0; i < ele.length; i++) {
        if (ele[i].checked)
          document.getElementById("filterValue").value = ele[i].value;
      }
    }

    function openFormDelete() {
      document.getElementById("myForm-delete").style.display = "block";
    }

    function closeFormDelete() {
      document.getElementById("myForm-delete").style.display = "none";
    }

    function serviceOnly() {
      document.getElementById("filterValue").value = "Services";
      document.getElementById("filterbttn").style.display = "none";
    }

    function productOnly() {
      document.getElementById("filterValue").value = "Product";
    }

    function displayFilter() {
      document.getElementById("filterValue").value = "Product";
      document.getElementById("filterbttn").style.display = "block";
    }

    function clearRadio() {
      document.getElementById("filterValue").value = "";
      document.getElementById("filterbttn").style.display = "none";
    }

    function getInfo(imageName, imageSrc, title, categories, description, id) {
      const fileInput = document.getElementById("editImage");
      const blob = dataURItoBlob(imageSrc); // Convert the data URI to a Blob
      const file = new File([blob], imageName); // Create a File with the Blob and filename
      const dataTransfer = new DataTransfer();
      dataTransfer.items.add(file);
      fileInput.files = dataTransfer.files;

      document.getElementById("id").value = id;
      document.getElementById("editPreview").src = imageSrc;
      document.getElementById("editTitle").value = title;
      document.getElementById("editCategories").value = categories;
      document.getElementById("editDescription").value = description;
    }

    function dataURItoBlob(dataURI) {
      // Convert a data URI to a Blob
      const byteString = atob(dataURI.split(',')[1]);
      const mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];
      const ab = new ArrayBuffer(byteString.length);
      const ia = new Uint8Array(ab);
      for (let i = 0; i < byteString.length; i++) {
        ia[i] = byteString.charCodeAt(i);
      }
      return new Blob([ab], {
        type: mimeString
      });
    }

    function openAddServProd() {
      document.getElementById("myForm-servprod").style.display = "block";
    }

    function closeAddServProd() {
      document.getElementById("myForm-servprod").style.display = "none";
    }

    function getRow(rowId) {
      document.getElementById("editTitle").value = rowId;
    }

    function openEditServProd() {
      document.getElementById("myForm-Editservprod").style.display = "block";
    }

    function closeEditServProd() {
      document.getElementById("myForm-Editservprod").style.display = "none";
    }

    function closeFormServProd() {
      document.getElementById("myForm-sms").style.display = "none";
    }

    function openFormFilter() {
      document.getElementById("myForm-filter").style.display = "block";
    }

    function closeFormFilter() {
      document.getElementById("myForm-filter").style.display = "none";
    }

  </script>
</body>

</html>