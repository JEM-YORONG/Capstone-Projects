<?php session_start(); ?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!----======== CSS ======== -->
  <link rel="stylesheet" href="css files\Capstone_CustNPetRecords.css" />
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
  <section class="dashboard">
    <div class="top">
      <i class="sidebar-toggle"><span class="material-symbols-outlined"> menu </span></i>
      <div class="title">
        <span class="text">Client Records</span>
      </div>
    </div>

    <?php
    require 'database-conn.php';

    // Initialize variables for customer info
    $lastname = "";
    $firstname = "";
    $contact = "";
    $email = "";
    $address = "";

    // Initialize variables for pet info
    $petId = "";
    $petname = "";
    $breed = "";
    $species = "";
    $birthdate = "";

    // Using GET
    $getPetId = isset($_GET['petId']) ? $_GET['petId'] : '';
    $getCustId = isset($_GET['custId']) ? $_GET['custId'] : '';

    if ($getCustId !== "") {
      // Customer ID is provided
      // Fetch customer info
      $query = "SELECT * FROM customer WHERE id = ?";
      $stmt = mysqli_prepare($conn, $query);
      mysqli_stmt_bind_param($stmt, "s", $getCustId);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      // Check if the query returned any rows for the customer
      if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Assign customer info
        $id = $row["id"];
        $lastname = $row["lastname"];
        $firstname = $row["firstname"];
        $contact = $row["contact"];
        $email = $row["email"];
        $address = $row["address"];

        // Fetch customer's pets
        $query2 = "SELECT * FROM pet WHERE ownerid = ?";
        $stmt2 = mysqli_prepare($conn, $query2);
        mysqli_stmt_bind_param($stmt2, "s", $getCustId);
        mysqli_stmt_execute($stmt2);
        $resultPets = mysqli_stmt_get_result($stmt2);

        // Check if the query returned any rows for customer's pets
        if (mysqli_num_rows($resultPets) >= 1) {
          // You can loop through $resultPets to process pet information if needed
        }
      }
    } elseif ($getPetId !== "") {
      // Pet ID is provided
      // Fetch pet info 
      $query = "SELECT p.*, c.* FROM pet p
              LEFT JOIN customer c ON p.ownerid = c.id
              WHERE p.id = ?";
      $stmt = mysqli_prepare($conn, $query);
      mysqli_stmt_bind_param($stmt, "s", $getPetId);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      // Check if the query returned any rows for the pet and its owner
      if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Assign owner's info
        $id = $row["ownerid"];
        $lastname = $row["ownerlastname"];
        $firstname = $row["ownerfirstname"];
        $contact = $row["ownercontact"];
        $email = $row["owneremail"];
        $address = $row["owneraddress"];

        // Assign pet info
        $petId = $row["id"];
        $petname = $row["petname"];
        $breed = $row["breed"];
        $species = $row["species"];
        $birthdate = $row["birthdate"];
      }
    }
    ?>


    <!--Customer Info-->
    <div class="customer-content">
      <div class="customer-records">
        <div class="customer-top">
          <div style="padding-left: 1%; display: grid; grid-template-columns: 30% auto;">
            <label for="">Customer Information</label>
            <div style="padding-left: 10%;">
              <button class="edit-button" id="edit" onclick="edit();">
                <span class="material-symbols-outlined"> edit </span>
              </button>
            </div>
          </div>

          <br />
        </div>

        <div class="customer-info">
          <div class="customer-name-contacts">
            <div class="inputfield" style="display: none;">
              <label>ID </label>
              <input type="text" class="input" required id="id" value="<?php echo $id; ?>" disabled />
            </div>
            <div class="inputfield">
              <label>Last Name </label>
              <input type="text" class="input" required id="custLastName" value="<?php echo $lastname; ?>" disabled />
            </div>
            <div class="inputfield">
              <label>First Name</label>
              <input type="text" class="input" id="custFirstName" value="<?php echo $firstname; ?>" disabled />
            </div>
            <div class="inputfield">
              <label>Contact Number</label>
              <input type="number" class="input" id="custContact" value="<?php echo $contact; ?>" disabled />
            </div>
            <div class="inputfield">
              <label>Email</label>
              <input type="text" class="input" id="custEmail" value="<?php echo $email; ?>" disabled />
            </div>
          </div>
          <div class="inputfield">
            <label>Address</label>
            <textarea type="text" class="input" rows="3" cols="5" id="custAddress" disabled><?php echo $address; ?></textarea>
            <!---->
            <div class="savecancel">
              <button class="add-button" id="ok" onclick="ok(); submitData('update');" style="display: none;">Update</button>
              <button class="add-button" id="cancel" onclick="cancel()" style="display: none;">Cancel</button>
              <?php require 'script files\customer-pet-record-data.js.php'; ?>
            </div>

          </div>
          <div></div>
        </div>
      </div>

      <!--Customer Pet Table-->
      <div class="customer-records">
        <div class="pet-table-top">
          <label>Fur-babies</label>
          <div style="padding-left: 50%;">
            <button class="add-pet-button" onclick="openAddPets(); generateAndDisplayId();">
              Add Pet
            </button>
            <?php require 'script files\pet-id-auto-gen.js.php'; ?>
          </div>
        </div>
        <div class="customer-pet-table">
          <table width="100%">
            <thead>
              <tr>
                <th width="10%"></th>
                <th width="45%">Name</th>
                <th>Species</th>
                <th width="10%"></th>
              </tr>
            </thead>
            <tbody id="refresh">

              <?php require 'script files\get-cust-id.jd.php'; ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!--Pet Information-->
    <hr class="seperator" />
    <br />
    <button class="add-button" id="addRecord" onclick="openAddRecords()" style="display: none;">+ Add Record</button>
    <br />
    <div class="pet-content">
      <div class="pet-records">
        <div class="pet-top">

          <!--gawing responsive-->
          <div style="padding-left: 1%; display: grid; grid-template-columns: 30% auto;">
            <label for="">Pet Information</label>
            <div style="padding-left: 10%;">
              <button class="edit-button" id="editPet" onclick="editPet();">
                <span class="material-symbols-outlined"> edit </span>
              </button>
            </div>
          </div>
          <br />
        </div>
        <div class="pet-info">
          <div class="pet-name-breed">
            <div class="inputfield" style="display: none;">
              <label>Pet ID </label>
              <input type="text" class="input" required value="<?php echo $getPetId; ?>" disabled id="Petid" />
            </div>
            <div class="inputfield">
              <label>Pet Name </label>
              <input type="text" class="input" required value="<?php echo $petname; ?>" disabled id="Petname" />
            </div>
            <div></div>
            <div class="inputfield">
              <label>Breed</label>
              <input type="text" class="input" value="<?php echo $breed; ?>" disabled id="Breed" />
            </div>
            <div class="inputfield">
              <label>Species</label>
              <input type="text" class="input" value="<?php echo $species; ?>" disabled id="Species" />
            </div>
            <div class="inputfield">
              <label>Birth Date</label>
              <input type="date" class="input" value="<?php echo $birthdate; ?>" disabled id="Birthdate" />

              <br>
              <!--gawing responsive OK and Cancel-->
              <div class="savecancel">
                <button class="add-button" id="okPet" onclick="okPet(); submitData('updatePet');" style="display: none;">Update</button>
                <button class="add-button" id="cancelPet" onclick="cancelPet();" style="display: none;">Cancel</button>
                <?php require 'script files\customer-pet-record-data.js.php'; ?>
              </div>
            </div>
            <div></div>
          </div>
        </div>
      </div>

      <!--Pet Record Table-->
      <div class="pet-records">
        <div class="customer-pet-table" id="petRecordTable" style="display: none;">
          <table width="100%">
            <thead>
              <tr>
                <th width="35%">Visit Date</th>
                <th width="35%">Next Visit</th>
                <th>Service</th>
              </tr>
            </thead>
            <tbody id="pRcrd">
              <tr>
                <td style="color: crimson">mm-dd-yyyy</td>
                <td>n/a</td>
                <td>Vaccine</td>
              </tr>
              <tr>
                <td>mm-dd-yyyy</td>
                <td>n/a</td>
                <td>Vaccine</td>
              </tr>
              <tr>
                <td>mm-dd-yyyy</td>
                <td>n/a</td>
                <td>Vaccine</td>
              </tr>
              <tr>
                <td>mm-dd-yyyy</td>
                <td>n/a</td>
                <td>Vaccine</td>
              </tr>
              <tr>
                <td>mm-dd-yyyy</td>
                <td>n/a</td>
                <td>Vaccine</td>
              </tr>
              <tr>
                <td>mm-dd-yyyy</td>
                <td>n/a</td>
                <td>Vaccine</td>
              </tr>
              <tr>
                <td>mm-dd-yyyy</td>
                <td>n/a</td>
                <td>Vaccine</td>
              </tr>
              <tr>
                <td>mm-dd-yyyy</td>
                <td>n/a</td>
                <td>Vaccine</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="pets-records">
      <div class="filter-box">
        <label class="title-petrec">Pet Records</label>
        <div class="inputfield">
          <form>
            <label>View Only:</label>
            <input type="radio" name="radio" />
            <label>All </label>

            <input type="radio" name="radio" />
            <label>Consultation </label>

            <input type="radio" name="radio" />
            <label>Surgeries </label>

            <input type="radio" name="radio" />
            <label>Vaccine </label>
          </form>
        </div>
      </div>

      <div class="inputfield">
        <label>Filter Date</label>
        <div class="date-seperator">
          <div>
            <label class="label-date">Start At</label>
            <input type="date" class="input" />
          </div>
          <div>
            <label class="label-date">End At</label>
            <input type="date" class="input" />
          </div>
        </div>
      </div>
      <div class="pet-visit-all">
        <table>
          <tr>
            <th scope="col" style="width: 20%">Date</th>
            <th scope="col" style="width: 20%">Service</th>
            <th scope="col" style="width: 50">About</th>
            <th style="width: 10%"></th>
          </tr>
          <tr>
            <td data-label="Name">mm-dd-yyyy</td>
            <td data-label="Contact">Vaccine</td>
            <td data-label="Recent Visit">dhudjhfjdhfkf</td>
            <td class="pet-rec" onclick="openViewRecords()"><u>View</u></td>
          </tr>
          <tr>
            <td data-label="Name">mm-dd-yyyy</td>
            <td data-label="Contact">Vaccine</td>
            <td data-label="Recent Visit">dhudjhfjdhfkf</td>
            <td class="pet-rec"><u>View</u></td>
          </tr>
        </table>
      </div>
    </div>

    <!--Pop up-->
    <!--Add Pets-->
    <form class="form-popup-pets" id="myform-pets">
      <div class="form-pet">
        <div class="title">
          <a>Add Pets</a>
        </div>
        <div class="inputfield">
          <label>ID</label>
          <input type="text" class="input" id="petId" / disabled>
        </div>
        <div class="inputfield">
          <label>Pet Name</label>
          <input type="text" class="input" id="petName" />
        </div>
        <div class="inputfield">
          <label>Gender </label>
          <select name="gender" id="gender" style="width: 100%;" id="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </div>
        <div class="inputfield">
          <label>Birth Date</label>
          <input type="date" class="input" id="birthDate" />
        </div>
        <div class="inputfield">
          <label>Type</label>
          <input type="text" class="input" id="type" />
        </div>
        <div class="inputfield">
          <label>Breed</label>
          <input type="text" class="input" id="breed" value="" />
        </div>
        <div class="inputfield">
          <label>Species</label>
          <input type="text" class="input" id="species" value="" />
        </div>
        <div class="inputfield">
          <input type="button" value="Cancel" class="btn-cancel" onclick="closeAddPets()" />
          <input type="button" value="Add Pet" class="btn-add" onclick="submitData('addPet')" />
          <?php require 'script files\customer-pet-record-data.js.php'; ?>
        </div>
      </div>
    </form>

    <!--add record-->
    <form class="form-popup-record" id="myform-records">
      <div class="form-record">
        <div class="title">
          <a>Add Pets</a>
        </div>
        <div class="inputfield">
          <label>Date</label>
          <input type="date" class="input" />
        </div>
        <div class="inputfield">
          <label>Service</label>
          <div class="custom_select">
            <select>
              <option value="">Select</option>
              <option value="male">1</option>
              <option value="female">2</option>
              <option value="male">1</option>
              <option value="female">2</option>
              <option value="male">1</option>
              <option value="female">2</option>
            </select>
          </div>
        </div>
        <div class="inputfield">
          <label>Weight</label>
          <input type="number" class="input" />
        </div>
        <div class="inputfield">
          <label>About</label>
          <textarea class="input"></textarea>
        </div>
        <div class="inputfield">
          <label>Next Schedule</label>
          <input type="date" class="input" />
        </div>
        <div class="inputfield">
          <label>Notes</label>
          <textarea class="input"></textarea>
        </div>
        <div class="inputfield">
          <input type="button" value="Cancel" class="btn-cancel" />
          <input type="submit" value="Add Customer" class="btn-add" />
        </div>
        <button type="button" class="btn-close" onclick="closeAddRecords()">
          Close
        </button>
      </div>
    </form>

    <!--view record-->
    <form class="form-popup-viewrecord" id="myform-viewrecords">
      <div class="form-record">
        <div class="title">
          <a>Add Pets</a>
        </div>
        <div class="inputfield">
          <label>Date</label>
          <input type="date" class="input" />
        </div>
        <div class="inputfield">
          <label>Weight</label>
          <input type="number" class="input" />
        </div>
        <div class="inputfield">
          <label>About</label>
          <textarea class="input"></textarea>
        </div>
        <div class="inputfield">
          <label>Notes</label>
          <textarea class="input"></textarea>
        </div>
        <div class="inputfield">
          <input type="submit" value="Add Customer" class="btn-add" />
          <input type="button" value="Close" class="btn-close" onclick="closeViewRecords()" />
        </div>
      </div>
    </form>
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

    function myFunction() {
      const boxes = document.querySelectorAll(".input");
      boxes.forEach((box) => {
        box.disabled = false;
      });
    }

    function openAddPets() {
      document.getElementById("myform-pets").style.display = "block";
    }

    function closeAddPets() {
      document.getElementById("myform-pets").style.display = "none";
    }

    function openAddRecords() {
      document.getElementById("myform-records").style.display = "block";
    }

    function closeAddRecords() {
      document.getElementById("myform-records").style.display = "none";
    }

    function openViewRecords() {
      document.getElementById("myform-viewrecords").style.display = "block";
    }

    function closeViewRecords() {
      document.getElementById("myform-viewrecords").style.display = "none";
    }

    function viewPetInfo(id, name, breeds, speciess, birthdate) {
      document.getElementById("Petid").value = id;
      document.getElementById("Petname").value = name;
      document.getElementById("Breed").value = breeds;
      document.getElementById("Species").value = speciess;
      document.getElementById("Birthdate").value = birthdate;
    }

    function edit() {
      document.getElementById("edit").style.display = "none";
      document.getElementById("ok").style.display = "block";
      document.getElementById("cancel").style.display = "block";
      document.getElementById("custLastName").disabled = false;
      document.getElementById("custFirstName").disabled = false;
      document.getElementById("custContact").disabled = false;
      document.getElementById("custEmail").disabled = false;
      document.getElementById("custAddress").disabled = false;
    }

    function ok() {
      document.getElementById("edit").style.display = "block";
      document.getElementById("ok").style.display = "none";
      document.getElementById("cancel").style.display = "none";
      document.getElementById("custLastName").disabled = true;
      document.getElementById("custFirstName").disabled = true;
      document.getElementById("custContact").disabled = true;
      document.getElementById("custEmail").disabled = true;
      document.getElementById("custAddress").disabled = true;
    }

    function cancel() {
      document.getElementById("edit").style.display = "block";
      document.getElementById("ok").style.display = "none";
      document.getElementById("cancel").style.display = "none";
      document.getElementById("custLastName").disabled = true;
      document.getElementById("custFirstName").disabled = true;
      document.getElementById("custContact").disabled = true;
      document.getElementById("custEmail").disabled = true;
      document.getElementById("custAddress").disabled = true;
    }

    function addRecord(){
      document.getElementById("addRecord").style.display = "block";
      document.getElementById("petRecordTable").style.display = "block";
    }

    function editPet() {

      var name = document.getElementById("Petname");
      var breed = document.getElementById("Breed");
      var species = document.getElementById("Species");
      var birthdate = document.getElementById("Birthdate");

      if (name.value === "" || breed.value === "" || species.value === "" || birthdate.value === "") {
        //
      } else {
        document.getElementById("editPet").style.display = "none";
        document.getElementById("okPet").style.display = "block";
        document.getElementById("cancelPet").style.display = "block";
        name.disabled = false;
        breed.disabled = false;
        species.disabled = false;
        birthdate.disabled = false;
      }
    }

    function okPet() {
      document.getElementById("editPet").style.display = "block";
      document.getElementById("okPet").style.display = "none";
      document.getElementById("cancelPet").style.display = "none";
      document.getElementById("Petname").disabled = true;
      document.getElementById("Breed").disabled = true;
      document.getElementById("Species").disabled = true;
      document.getElementById("Birthdate").disabled = true;
    }

    function cancelPet() {
      document.getElementById("editPet").style.display = "block";
      document.getElementById("okPet").style.display = "none";
      document.getElementById("cancelPet").style.display = "none";
      document.getElementById("Petname").disabled = true;
      document.getElementById("Breed").disabled = true;
      document.getElementById("Species").disabled = true;
      document.getElementById("Birthdate").disabled = true;
    }

    function deletePet(id) {
      document.getElementById("Petid").value = id;
    }
  </script>
</body>

</html>