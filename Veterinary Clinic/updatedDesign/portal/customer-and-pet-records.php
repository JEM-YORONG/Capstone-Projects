<?php session_start(); ?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!----======== CSS ======== -->
  <link rel="stylesheet" href="Capstone_CustNPetRecords.css" />
  <link rel="stylesheet" href="Capstone_ClinicAboutUs copy.css">

  <!----===== Icons ===== -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

  <?php require 'alert-notif-function.php'; ?>

  <!-- AJAX -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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
        <?php require 'alert-notif.php'; ?>
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
              <label>Email (Optional)</label>
              <input type="text" class="input" id="custEmail" value="<?php echo $email; ?>" disabled />
            </div>
          </div>
          <div class="inputfield">
            <label>Address</label>
            <textarea type="text" class="input" rows="3" cols="5" id="custAddress" disabled><?php echo $address; ?></textarea>
            <!---->
            <div class="savecancel">
              <button class="add-button" id="ok" onclick="submitData('update');" style="display: none;">Update</button>
              <button class="add-button" id="cancel" onclick="cancel()" style="display: none;">Cancel</button>
              <?php require 'customer-pet-record-data.js.php'; ?>
            </div>

          </div>
          <div></div>
        </div>
      </div>

      <!--Customer Pet Table-->
      <div class="customer-records">
        <div class="pet-table-top">
          <label>Pets</label>
          <div style="padding-left: 50%;">
            <button class="add-pet-button" onclick="openAddPets(); generateAndDisplayId();">
              Add Pet
            </button>
            <?php require 'pet-id-auto-gen.js.php'; ?>
          </div>
        </div>
        <div class="customer-pet-table">
          <table width="100%">
            <thead>
              <tr>
                <th width="10%"></th>
                <th width=""></th>
                <th width="20%">Name</th>
                <th>Species</th>
                <th width="10%"></th>
              </tr>
            </thead>
            <tbody id="refresh">

              <?php require 'get-cust-id.js.php'; ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!--Pet Information-->
    <hr class="seperator" />
    <br />
    <!-- add record button -->
    <?php
    require 'database-conn.php';

    $query = "SELECT * FROM login WHERE id = '1'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    foreach ($row as $user) {
      $user = $row['user'];
    }

    if ($user == 'admin') {
      echo '<button class="add-button" id="addRecord" onclick="openAddRecords()" style="display: none;">+ Add Record</button>';
    } else if ($user == 'veterinarian') {
      echo '<button class="add-button" id="addRecord" onclick="openAddRecords()" style="display: none;">+ Add Record</button>';
    } else {
      echo '<button id="addRecord" style="display: none;" disabled></button>';
    }
    mysqli_close($conn);
    ?>
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
                <button class="add-button" id="okPet" onclick="submitData('updatePet');" style="display: none;">Update</button>
                <button class="add-button" id="cancelPet" onclick="cancelPet();" style="display: none;">Cancel</button>
                <?php require 'customer-pet-record-data.js.php'; ?>
              </div>
            </div>
            <div></div>
          </div>
        </div>
      </div>

      <!--Visit Date Table-->
      <div class="pet-records">
        <div class="customer-pet-table" id="petRecordTable" style="display: block;">
          <input type="text" id="getPetID" value="" style="display: none;">
          <input type="text" id="getOwnerName" name="getOwnerName" value="" style="display: none;">
          <input type="text" id="getOwnerID" name="getOwnerID" value="" style="display: none;">
          <table width="100%">
            <thead>
              <tr>
                <th width="35%">Visit Date</th>
                <th>Service</th>
              </tr>
            </thead>
            <tbody id="pRcrd">
              <!--  -->
            </tbody>
          </table>
        </div>

        <!-- Next Visit -->
        <div class="customer-pet-table" id="petRecordTable" style="display: block;">
          <input type="text" id="getPetID" value="" style="display: none;">
          <input type="text" id="getOwnerName" name="getOwnerName" value="" style="display: none;">
          <input type="text" id="getOwnerID" name="getOwnerID" value="" style="display: none;">
          <table width="100%">
            <thead>
              <tr>
                <th width="35%">Next Visit</th>
              </tr>
            </thead>
            <tbody id="nVisit">
              <!--  -->
            </tbody>
          </table>
        </div>
      </div>

      <!-- Pet record table filters-->
      <div class="pets-records" id="petTableRecord" style="display: none;">
        <div class="filter-box">
          <label class="title-petrec">Pet Records</label>
          <div class="inputfield">
            <form>
              <input type="text" style="display: none;" value="" id="searchInput" name="searchInput">
              <label>View Only:</label>
              <input type="radio" name="radio" id="all" />
              <label for="all">All</label>

              <input type="radio" name="radio" id="grooming" />
              <label for="grooming">Grooming</label>

              <input type="radio" name="radio" id="consultation" />
              <label for="consultation">Consultation</label>

              <input type="radio" name="radio" id="surgery" />
              <label for="Surgery">Surgery</label>

              <input type="radio" name="radio" id="vaccine" />
              <label for="vaccine">Vaccine</label>

              <input type="radio" name="radio" id="Lab Test" />
              <label for="Lab Test">Lab Test</label>
            </form>
          </div>
        </div>

        <!-- pet record table -->
        <div class="inputfield">
          <label>Filter by month</label>
          <div class="date-seperator">
            <div>
              <input type="month" class="input" id="startDate" />
            </div>
          </div>
        </div>
        <div class="pet-visit-all" style="
            height: 390px;
            overflow-x: hidden;
            overflow-y: auto;
          ">
          <table>
            <thead>
              <tr>
                <th scope="col" style="width: 20%">Date</th>
                <th scope="col" style="width: 20%">Service</th>
                <th scope="col" style="width: 50">About</th>
                <th style="width: 10%"></th>
              </tr>
            </thead>
            <tbody id="pRecordt">
              <!--  -->
              <?php require 'pet-record-refresh-table.js.php'; ?>
            </tbody>
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
            <input type="text" class="input" id="petId" disabled>
          </div>
          <div class="inputfield">
            <label>Pet Name</label>
            <input type="text" class="input" id="petName" />
          </div>
          <div class="inputfield">
            <label>Gender </label>
            <select name="gender" id="gender" style="width: 100%;">
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>
          <div class="inputfield">
            <label>Birth Date</label>
            <input type="date" class="input" id="birthDate" />
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
            <input type="button" value="Add Pet" class="btn-add" onclick="submitData('addPet'); closeAddPets2();" />
          </div>
          <?php require 'customer-pet-record-data.js.php'; ?>
        </div>
      </form>

      <!--add record-->
      <form class="form-popup-record" id="myform-records" style="display: none;">
        <div class="form-record" style="
            height: 390px;
            overflow-x: hidden;
            overflow-y: auto;
        ">
          <div class="title">
            <a>Add Pet Record</a>
          </div>
          <div class="inputfield">
            <label>Date</label>
            <input type="date" class="input" id="rDate" />
          </div>

          <div class="inputfield">
            <label>Number of Services</label>
            <div class="custom_select">
              <select id="numServices" onchange="services()">
                <option value="">SELECT</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
            </div>
          </div>
          <div class="inputfield" id="s1" style="display: none;">
            <label>Service 1</label>
            <div class="custom_select">
              <select id="service1">
                <option value="">SELECT</option>
                <option value="Vaccine">Vaccine</option>
                <option value="Grooming">Grooming</option>
                <option value="Consultation and Treatment">Consultation and Treatment</option>
                <option value="Lab Test">Lab Test</option>
                <option value="Surgery">Surgery</option>
              </select>
            </div>
          </div>

          <!-- For vaccine -->
          <div class="inputfield" id="v1" style="display: none;">
            <label>Vaccine Type</label>
            <div class="custom_select">
              <select id="vaccine1">
                <option value="">SELECT</option>
                <option value="5in1">5in1</option>
                <option value="6in1">6in1</option>
                <option value="Rabies Vax">Rabies Vax</option>
                <option value="Kennel Cough">Kennel Cough</option>
              </select>
            </div>
          </div>

          <div class="inputfield" id="s2" style="display: none;">
            <label>Service 2</label>
            <div class="custom_select">
              <select id="service2">
                <option value="">SELECT</option>
                <option value="Vaccine">Vaccine</option>
                <option value="Grooming">Grooming</option>
                <option value="Consultation">Consultation and Treatment</option>
                <option value="Lab Test">Lab Test</option>
                <option value="Surgery">Surgery</option>
              </select>
            </div>
          </div>

          <!-- For vaccine -->
          <div class="inputfield" id="v2" style="display: none;">
            <label>Vaccine Type</label>
            <div class="custom_select">
              <select id="vaccine2">
                <option value="">SELECT</option>
                <option value="5in1">5in1</option>
                <option value="6in1">6in1</option>
                <option value="Rabies Vax">Rabies Vax</option>
                <option value="Kennel Cough">Kennel Cough</option>
              </select>
            </div>
          </div>

          <div class="inputfield" id="s3" style="display: none;">
            <label>Service 3</label>
            <div class="custom_select">
              <select id="service3">
                <option value="">SELECT</option>
                <option value="Vaccine">Vaccine</option>
                <option value="Grooming">Grooming</option>
                <option value="Consultation and Treatment">Consultation and Treatment</option>
                <option value="Lab Test">Lab Test</option>
                <option value="Surgery">Surgery</option>
              </select>
            </div>
          </div>

          <!-- For vaccine -->
          <div class="inputfield" id="v3" style="display: none;">
            <label>Vaccine Type</label>
            <div class="custom_select">
              <select id="vaccine3">
                <option value="">SELECT</option>
                <option value="5in1">5in1</option>
                <option value="6in1">6in1</option>
                <option value="Rabies Vax">Rabies Vax</option>
                <option value="Kennel Cough">Kennel Cough</option>
              </select>
            </div>
          </div>

          <div class="inputfield">
            <label>Weight in Kg</label>
            <input type="number" class="input" id="rWeight" />
          </div>
          <div class="inputfield">
            <label>About</label>
            <textarea class="input" id="rAbout"></textarea>
          </div>
          <div class="inputfield">
            <label>Next Schedule</label>
            <input type="date" class="input" id="nDate" />
          </div>
          <div class="inputfield">
            <label>Notes</label>
            <textarea class="input" id="rNote"></textarea>
          </div>
          <div class="inputfield">
            <input type="button" value="Cancel" class="btn-cancel" />
            <input type="button" value="Add Record" class="btn-add" onclick="submitData('addPetRecord');" />
          </div>
          <?php require "customer-pet-record-data.js.php"; ?>
          <button type="button" class="btn-close" onclick="closeAddRecords()">
            Close
          </button>
        </div>
      </form>

      <!--pet record details-->
      <form class="form-popup-viewrecord" id="myform-viewrecords">
        <div class="form-record">
          <div class="title">
            <a>Pet Record Details</a>
          </div>
          <div class="inputfield">
            <label>Date</label>
            <input type="date" class="input" readonly id="vDate" />
          </div>
          <div class="inputfield">
            <label>Services</label>
            <table>
              <tr>
                <td>
                  <input type="text" class="input" placeholder="s1" readonly id="vS1" style="display: none;" />
                </td>
                <td>
                  <input type="text" class="input" placeholder="if may vaccine" readonly id="vV1" style="display: none;" />
                </td>
              </tr>
              <tr>
                <td>
                  <input type="text" class="input" placeholder="s2" readonly id="vS2" style="display: none;" />
                </td>
                <td>
                  <input type="text" class="input" placeholder="if may vaccine" readonly id="vV2" style="display: none;" />
                </td>
              </tr>
              <tr>
                <td>
                  <input type="text" class="input" placeholder="s3" readonly id="vS3" style="display: none;" />
                </td>
                <td>
                  <input type="text" class="input" placeholder="if may vaccine" readonly id="vV3" style="display: none;" />
                </td>
              </tr>
            </table>
          </div>
          <div class="inputfield">
            <label>Weight</label>
            <input type="text" class="input" readonly id="vWeight" />
          </div>
          <div class="inputfield">
            <label>About</label>
            <textarea class="input" readonly id="vAbout"></textarea>
          </div>
          <div class="inputfield">
            <label>Notes</label>
            <textarea class="input" readonly id="vNote"></textarea>
          </div>
          <div class="inputfield">
            <input type="button" value="Close" class="btn-close" onclick="closeViewRecords()" />
          </div>
        </div>
      </form>

      <!-- Edit pet record -->
      <form class="form-popup-record" id="edit-records">
        <div class="form-record" style="
            height: 390px;
            overflow-x: hidden;
            overflow-y: auto;
        ">
          <div class="title">
            <a>Update Pet Record</a>
          </div>
          <div class="inputfield">
            <input type="text" id="testDisplay" value="" style="display: none;">
            <label>Date</label>
            <input type="date" class="input" id="eDate" />
          </div>

          <div class="inputfield">
            <label>Services</label>
            <div class="custom_select">
              <input class="view-bttn" type="button" value="View" onclick="eservices();" style="display: none;" id="eBtn1">
              <input class="view-bttn" type="button" value="Hide" onclick="eHservices();" style="display: block;" id="eBtn2">
            </div>
          </div>
          <div class="inputfield" id="es1" style="display: none;">
            <label>Service 1</label>
            <div class="custom_select">
              <select id="eservice1">
                <option value="">SELECT</option>
                <option value="Vaccine">Vaccine</option>
                <option value="Grooming">Grooming</option>
                <option value="Consultation and Treatment">Consultation and Treatment</option>
                <option value="Lab Test">Lab Test</option>
                <option value="Surgery">Surgery</option>
              </select>
            </div>
          </div>

          <!-- For vaccine -->
          <div class="inputfield" id="ev1" style="display: none;">
            <label>Vaccine Type</label>
            <div class="custom_select">
              <select id="evaccine1">
                <option value="">SELECT</option>
                <option value="5in1">5in1</option>
                <option value="6in1">6in1</option>
                <option value="Rabies Vax">Rabies Vax</option>
                <option value="Kennel Cough">Kennel Cough</option>
              </select>
            </div>
          </div>

          <div class="inputfield" id="es2" style="display: none;">
            <label>Service 2</label>
            <div class="custom_select">
              <select id="eservice2">
                <option value="">SELECT</option>
                <option value="Vaccine">Vaccine</option>
                <option value="Grooming">Grooming</option>
                <option value="Consultation">Consultation and Treatment</option>
                <option value="Lab Test">Lab Test</option>
                <option value="Surgery">Surgery</option>
              </select>
            </div>
          </div>

          <!-- For vaccine -->
          <div class="inputfield" id="ev2" style="display: none;">
            <label>Vaccine Type</label>
            <div class="custom_select">
              <select id="evaccine2">
                <option value="">SELECT</option>
                <option value="5in1">5in1</option>
                <option value="6in1">6in1</option>
                <option value="Rabies Vax">Rabies Vax</option>
                <option value="Kennel Cough">Kennel Cough</option>
              </select>
            </div>
          </div>

          <div class="inputfield" id="es3" style="display: none;">
            <label>Service 3</label>
            <div class="custom_select">
              <select id="eservice3">
                <option value="">SELECT</option>
                <option value="Vaccine">Vaccine</option>
                <option value="Grooming">Grooming</option>
                <option value="Consultation and Treatment">Consultation and Treatment</option>
                <option value="Lab Test">Lab Test</option>
                <option value="Surgery">Surgery</option>
              </select>
            </div>
          </div>

          <!-- For vaccine -->
          <div class="inputfield" id="ev3" style="display: none;">
            <label>Vaccine Type</label>
            <div class="custom_select">
              <select id="evaccine3">
                <option value="">SELECT</option>
                <option value="5in1">5in1</option>
                <option value="6in1">6in1</option>
                <option value="Rabies Vax">Rabies Vax</option>
                <option value="Kennel Cough">Kennel Cough</option>
              </select>
            </div>
          </div>

          <div class="inputfield">
            <label>Weight</label>
            <input type="number" class="input" id="eWeight" />
          </div>
          <div class="inputfield">
            <label>About</label>
            <textarea class="input" id="eAbout"></textarea>
          </div>
          <div class="inputfield">
            <label>Next Schedule</label>
            <input type="date" class="input" id="enxDate" />
          </div>
          <div class="inputfield">
            <label>Notes</label>
            <textarea class="input" id="eNote"></textarea>
          </div>
          <div class="inputfield">
            <input type="button" value="Cancel" class="btn-cancel" />
            <input type="button" value="Update Record" class="btn-add" onclick="submitData('editPetRecord'); closeEditRecord();" />
          </div>
          <?php require "customer-pet-record-data.js.php"; ?>
          <button type="button" class="btn-close" onclick="closeEditRecord()">
            Close
          </button>
        </div>
      </form>

  </section>
  <script>
    function openEditRecord(id, date, s01, s02, s03, v01, v02, v03, weight, about, note, nextDate) {
      document.getElementById("edit-records").style.display = "block";
      document.getElementById("testDisplay").value = id;

      var d = date;
      var s1 = s01;
      var s2 = s02;
      var s3 = s03;
      var v1 = v01;
      var v2 = v02;
      var v3 = v03;
      var w = weight;
      var a = about;
      var n = note;

      document.getElementById("eDate").value = d;
      document.getElementById("eWeight").value = w;
      document.getElementById("eAbout").value = a;
      document.getElementById("enxDate").value = nextDate;
      document.getElementById("eNote").value = n;

      if (s1 != "") {
        document.getElementById("es1").style.display = "block";
        document.getElementById("eservice1").value = s1;
        if (s1 == "Vaccine") {
          document.getElementById("ev1").style.display = "block";
          document.getElementById("evaccine1").value = v1;
        }
      }

      if (s2 != "") {
        document.getElementById("es2").style.display = "block";
        document.getElementById("eservice2").value = s1;
        if (s1 == "Vaccine") {
          document.getElementById("ev2").style.display = "block";
          document.getElementById("evaccine2").value = v1;
        }
      }

      if (s3 != "") {
        document.getElementById("es3").style.display = "block";
        document.getElementById("eservice3").value = s1;
        if (s1 == "Vaccine") {
          document.getElementById("ev3").style.display = "block";
          document.getElementById("evaccine3").value = v1;
        }
      }
    }

    function closeEditRecord() {
      document.getElementById("edit-records").style.display = "none";
    }
  </script>
  <script>
    // Get the current date
    var today = new Date();

    // Set the value to the current month (format: "YYYY-MM")
    var currentMonth = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2);
    document.getElementById('startDate').value = currentMonth;
  </script>
  <script>
    // Add event listeners to the date input elements
    var startDateInput = document.getElementById('startDate');

    startDateInput.addEventListener('change', function() {
      document.getElementById("searchInput").value = this.value;
    });
  </script>
  <script>
    // Add event listener to the radio buttons
    var radioButtons = document.querySelectorAll('input[name="radio"]');

    radioButtons.forEach(function(radio) {
      radio.addEventListener('change', function() {
        // Check if the radio button is checked
        if (this.checked) {
          document.getElementById("searchInput").value = this.id;
        }
      });
    });
  </script>
  <script>
    // Add event listener to the dropdown
    document.getElementById('service1').addEventListener('change', function() {
      // Get the selected value
      var selectedValue = this.value;

      if (selectedValue == 'Vaccine') {
        document.getElementById("v1").style.display = "block";
      } else {
        document.getElementById("v1").style.display = "none";
      }
    });
    // Add event listener to the dropdown
    document.getElementById('service2').addEventListener('change', function() {
      // Get the selected value
      var selectedValue = this.value;

      if (selectedValue == 'Vaccine') {
        document.getElementById("v2").style.display = "block";
      } else {
        document.getElementById("v2").style.display = "none";
      }
    });
    // Add event listener to the dropdown
    document.getElementById('service3').addEventListener('change', function() {
      // Get the selected value
      var selectedValue = this.value;

      if (selectedValue == 'Vaccine') {
        document.getElementById("v3").style.display = "block";
      } else {
        document.getElementById("v3").style.display = "none";
      }

    });

    // edit pet record
    // Add event listener to the dropdown
    document.getElementById('eservice1').addEventListener('change', function() {
      // Get the selected value
      var selectedValue = this.value;

      if (selectedValue == 'Vaccine') {
        document.getElementById("ev1").style.display = "block";
      } else {
        document.getElementById("ev1").style.display = "none";
      }
    });
    // Add event listener to the dropdown
    document.getElementById('eservice2').addEventListener('change', function() {
      // Get the selected value
      var selectedValue = this.value;

      if (selectedValue == 'Vaccine') {
        document.getElementById("ev2").style.display = "block";
      } else {
        document.getElementById("ev2").style.display = "none";
      }
    });
    // Add event listener to the dropdown
    document.getElementById('eservice3').addEventListener('change', function() {
      // Get the selected value
      var selectedValue = this.value;

      if (selectedValue == 'Vaccine') {
        document.getElementById("ev3").style.display = "block";
      } else {
        document.getElementById("ev3").style.display = "none";
      }

    });

    function services() {
      var services = document.getElementById("numServices");
      var selectedValue = services.value;
      document.getElementById("s1").style.display = "none";
      document.getElementById("s2").style.display = "none";
      document.getElementById("s3").style.display = "none";
      if (selectedValue == 1) {
        document.getElementById("s1").style.display = "block";
      }
      if (selectedValue == 2) {
        document.getElementById("s1").style.display = "block";
        document.getElementById("s2").style.display = "block";
      }
      if (selectedValue == 3) {
        document.getElementById("s1").style.display = "block";
        document.getElementById("s2").style.display = "block";
        document.getElementById("s3").style.display = "block";
      }
    }

    function eservices() {
      document.getElementById("eBtn1").style.display = "none";
      document.getElementById("eBtn2").style.display = "block";
      document.getElementById("es1").style.display = "block";
      document.getElementById("es2").style.display = "block";
      document.getElementById("es3").style.display = "block";
      document.getElementById("ev1").style.display = "block";
      document.getElementById("ev2").style.display = "block";
      document.getElementById("ev3").style.display = "block";
    }

    function eHservices() {
      document.getElementById("eBtn1").style.display = "block";
      document.getElementById("eBtn2").style.display = "none";
      document.getElementById("es1").style.display = "none";
      document.getElementById("es2").style.display = "none";
      document.getElementById("es3").style.display = "none";
      document.getElementById("ev1").style.display = "none";
      document.getElementById("ev2").style.display = "none";
      document.getElementById("ev3").style.display = "none";
    }
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

    function myFunction() {
      const boxes = document.querySelectorAll(".input");
      boxes.forEach((box) => {
        box.disabled = false;
      });
    }

    function openAddPets() {
      document.getElementById("myform-pets").style.display = "block";
    }

    function closeAddPets2() {
      //
      var petname = document.getElementById("petName").value;
      var petgnder = document.getElementById("gender").value;
      var petbday = document.getElementById("birthDate").value;
      var petbreed = document.getElementById("breed").value;
      var petspecies = document.getElementById("species").value;

      if (petname == "" || petgnder == "" || petbreed == "" || petspecies == "" || petbday == "") {
        successAlert("Empty fields detected");
      } else {
        document.getElementById("myform-pets").style.display = "none";
        successAlert("Pet added successfully");
      }
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

    function openViewRecords(date, s01, s02, s03, v01, v02, v03, weight, about, note) {
      document.getElementById("myform-viewrecords").style.display = "block";
      var d = date;
      var s1 = s01;
      var s2 = s02;
      var s3 = s03;
      var v1 = v01;
      var v2 = v02;
      var v3 = v03;
      var w = weight;
      var a = about;
      var n = note;

      document.getElementById("vDate").value = d;
      document.getElementById("vWeight").value = w + " kg";
      document.getElementById("vAbout").value = a;
      document.getElementById("vNote").value = n;

      if (s1 != "") {
        document.getElementById("vS1").style.display = "block";
        document.getElementById("vS1").value = s1;
        if (s1 == "Vaccine") {
          document.getElementById("vV1").style.display = "block";
          document.getElementById("vV1").value = v1;
        }
      }

      if (s2 != "") {
        document.getElementById("vS2").style.display = "block";
        document.getElementById("vS2").value = s2;
        if (s2 == "Vaccine") {
          document.getElementById("vV2").style.display = "block";
          document.getElementById("vV2").value = v2;
        }
      }

      if (s3 != "") {
        document.getElementById("vS3").style.display = "block";
        document.getElementById("vS3").value = s3;
        if (s3 == "Vaccine") {
          document.getElementById("vV3").style.display = "block";
          document.getElementById("vV3").value = v3;
        }
      }
    }

    function closeViewRecords() {
      document.getElementById("myform-viewrecords").style.display = "none";
    }

    function viewPetInfo(id, name, breeds, speciess, birthdate, visitID, ownername, ownerid) {
      document.getElementById("Petid").value = id;
      document.getElementById("Petname").value = name;
      document.getElementById("Breed").value = breeds;
      document.getElementById("Species").value = speciess;
      document.getElementById("Birthdate").value = birthdate;
      document.getElementById("getPetID").value = visitID;
      document.getElementById("getOwnerName").value = ownername;
      document.getElementById("getOwnerID").value = ownerid;
      recordBtnTable();
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

    function openFormDelete() {
      document.getElementById("myForm-delete").style.display = "block";
    }

    function closeFormDelete() {
      document.getElementById("myForm-delete").style.display = "none";
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

    function recordBtnTable() {
      document.getElementById("addRecord").style.display = "block";
      document.getElementById("petTableRecord").style.display = "block";
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
      //document.getElementById("Petid").value = name;
    }

    function deletePet2(id) {
      document.getElementById("searchInput").value = id;
    }
  </script>
</body>

</html>