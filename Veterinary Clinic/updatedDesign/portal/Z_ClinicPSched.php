<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!----======== CSS ======== -->
  <link rel="stylesheet" href="Capstone_ClinicPSched.css" />

  <style>
    .button-wrap {
      position: relative;
    }

    .button {
      display: inline-block;
      padding: 6px 9px;
      cursor: pointer;
      border-radius: 10px;
      background-color: #6990F2;
      font-size: 15px;
      color: #fff;
    }
  </style>

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
  <section class="dashboard">
    <div class="top">
      <i class="sidebar-toggle"><span class="material-symbols-outlined"> menu </span></i>
      <div class="title">
        <span class="text">Clinic Schedule</span>
        <?php require 'alert-notif.php'; ?>
      </div>
    </div>
    <!--=====Info====-->

    <div class="web-content">
      <div class="weekly-sched" id="weeklysched">

        <h3>Schedule</h3>

        <div>
          <div class="day">
            <label>Date</label>
            <label>Start</label>
            <label>End</label>
            <label>Status</label>
          </div>
          <?php
          require 'database-conn.php';

          $query1 = "SELECT * FROM clinicschedule WHERE id = '1'";
          $result1 = mysqli_query($conn, $query1);
          $row1 = mysqli_fetch_assoc($result1);
          $mts = date('H:i', strtotime($row1["start"]));
          $mte = date('H:i', strtotime($row1["end"]));
          $ms = ($row1["status"] == 'Open') ? 'checked' : '';

          $query2 = "SELECT * FROM clinicschedule WHERE id = '2'";
          $result2 = mysqli_query($conn, $query2);
          $row2 = mysqli_fetch_assoc($result2);
          $tts = date('H:i', strtotime($row2["start"]));
          $tte = date('H:i', strtotime($row2["end"]));
          $ts = ($row2["status"] == 'Open') ? 'checked' : '';

          $query3 = "SELECT * FROM clinicschedule WHERE id = '3'";
          $result3 = mysqli_query($conn, $query3);
          $row3 = mysqli_fetch_assoc($result3);
          $wts = date('H:i', strtotime($row3["start"]));
          $wte = date('H:i', strtotime($row3["end"]));
          $ws = ($row3["status"] == 'Open') ? 'checked' : '';

          $query4 = "SELECT * FROM clinicschedule WHERE id = '4'";
          $result4 = mysqli_query($conn, $query4);
          $row4 = mysqli_fetch_assoc($result4);
          $thts = date('H:i', strtotime($row4["start"]));
          $thte = date('H:i', strtotime($row4["end"]));
          $ths = ($row4["status"] == 'Open') ? 'checked' : '';

          $query5 = "SELECT * FROM clinicschedule WHERE id = '5'";
          $result5 = mysqli_query($conn, $query5);
          $row5 = mysqli_fetch_assoc($result5);
          $fts = date('H:i', strtotime($row5["start"]));
          $fte = date('H:i', strtotime($row5["end"]));
          $fs = ($row5["status"] == 'Open') ? 'checked' : '';

          $query6 = "SELECT * FROM clinicschedule WHERE id = '6'";
          $result6 = mysqli_query($conn, $query6);
          $row6 = mysqli_fetch_assoc($result6);
          $sts = date('H:i', strtotime($row6["start"]));
          $ste = date('H:i', strtotime($row6["end"]));
          $ss = ($row6["status"] == 'Open') ? 'checked' : '';

          $query7 = "SELECT * FROM clinicschedule WHERE id = '7'";
          $result7 = mysqli_query($conn, $query7);
          $row7 = mysqli_fetch_assoc($result7);
          $suts = date('H:i', strtotime($row7["start"]));
          $sute = date('H:i', strtotime($row7["end"]));
          $sus = ($row7["status"] == 'Open') ? 'checked' : '';
          ?>

          <div class="day">
            <span>Monday</span>
            <input type="time" class="time-start" name="timeInput" style="width: 100px; background-color: transparent; border: transparent 0px solid;" id="mts" value="<?php echo $mts ?>" disabled>
            <input type="time" class="time-end" name="timeInput" style="width: 100px; background-color: transparent; border: transparent 0px solid;" id="mte" value="<?php echo $mte ?>" disabled>
            <input type="checkbox" id="mc" <?php echo $ms; ?> disabled />
            <input type="text" id="statusM" value="<?php echo $row1["status"]; ?>" style="display: none;">
          </div>
          <div class="day">
            <span>Tuesday</span>
            <input type="time" class="time-start" name="timeInput" style="width: 100px; background-color: transparent; border: transparent 0px solid;" id="tts" value="<?php echo $tts ?>" disabled>
            <input type="time" class="time-end" name="timeInput" style="width: 100px; background-color: transparent; border: transparent 0px solid;" id="tte" value="<?php echo $tte ?>" disabled>
            <input type="checkbox" id="tc" <?php echo $ts ?> disabled />
            <input type="text" id="statusT" value="<?php echo $row2["status"]; ?>" style="display: none;">
          </div>
          <div class="day">
            <span>Wednesday</span>
            <input type="time" class="time-start" name="timeInput" style="width: 100px; background-color: transparent; border: transparent 0px solid;" id="wts" value="<?php echo $wts ?>" disabled>
            <input type="time" class="time-end" name="timeInput" style="width: 100px; background-color: transparent; border: transparent 0px solid;" id="wte" value="<?php echo $wte ?>" disabled>
            <input type="checkbox" id="wc" <?php echo $ws ?> disabled />
            <input type="text" id="statusW" value="<?php echo $row3["status"]; ?>" style="display: none;">
          </div>
          <div class="day">
            <span>Thursday</span>
            <input type="time" class="time-start" name="timeInput" style="width: 100px; background-color: transparent; border: transparent 0px solid;" id="thts" value="<?php echo $thts ?>" disabled>
            <input type="time" class="time-end" name="timeInput" style="width: 100px; background-color: transparent; border: transparent 0px solid;" id="thte" value="<?php echo $thte ?>" disabled>
            <input type="checkbox" id="thc" <?php echo $ths ?> disabled />
            <input type="text" id="statusTh" value="<?php echo $row4["status"]; ?>" style="display: none;">
          </div>
          <div class="day">
            <span>Friday</span>
            <input type="time" class="time-start" name="timeInput" style="width: 100px; background-color: transparent; border: transparent 0px solid;" id="fts" value="<?php echo $fts ?>" disabled>
            <input type="time" class="time-end" name="timeInput" style="width: 100px; background-color: transparent; border: transparent 0px solid;" id="fte" value="<?php echo $fte ?>" disabled>
            <input type="checkbox" id="fc" <?php echo $fs ?> disabled />
            <input type="text" id="statusF" value="<?php echo $row5["status"]; ?>" style="display: none;">
          </div>
          <div class="day">
            <span>Saturday</span>
            <input type="time" class="time-start" name="timeInput" style="width: 100px; background-color: transparent; border: transparent 0px solid;" id="sts" value="<?php echo $sts ?>" disabled>
            <input type="time" class="time-end" name="timeInput" style="width: 100px; background-color: transparent; border: transparent 0px solid;" id="ste" value="<?php echo $ste ?>" disabled>
            <input type="checkbox" id="sc" <?php echo $ss ?> disabled />
            <input type="text" id="statusS" value="<?php echo $row6["status"]; ?>" style="display: none;">
          </div>
          <div class="day">
            <span>Sunday</span>
            <input type="time" class="time-start" name="timeInput" style="width: 100px; background-color: transparent; border: transparent 0px solid;" id="suts" value="<?php echo $suts ?>" disabled>
            <input type="time" class="time-end" name="timeInput" style="width: 100px; background-color: transparent; border: transparent 0px solid;" id="sute" value="<?php echo $sute ?>" disabled>
            <input type="checkbox" id="suc" <?php echo $sus ?> disabled />
            <input type="text" id="statusSu" value="<?php echo $row7["status"]; ?>" style="display: none;">
          </div>
        </div>
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
          <label class="button" onclick="submitData('addSched');" style="width: 500px; text-align: center;">Ok</label>
          <?php require 'clinic-schedule.data.js.php'; ?>
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

      document.getElementById("mts").disabled = false;
      document.getElementById("mte").disabled = false;
      document.getElementById("mc").disabled = false;

      document.getElementById("tts").disabled = false;
      document.getElementById("tte").disabled = false;
      document.getElementById("tc").disabled = false;

      document.getElementById("wts").disabled = false;
      document.getElementById("wte").disabled = false;
      document.getElementById("wc").disabled = false;

      document.getElementById("thts").disabled = false;
      document.getElementById("thte").disabled = false;
      document.getElementById("thc").disabled = false;

      document.getElementById("fts").disabled = false;
      document.getElementById("fte").disabled = false;
      document.getElementById("fc").disabled = false;

      document.getElementById("sts").disabled = false;
      document.getElementById("ste").disabled = false;
      document.getElementById("sc").disabled = false;

      document.getElementById("suts").disabled = false;
      document.getElementById("sute").disabled = false;
      document.getElementById("suc").disabled = false;

    }

    function hideC() {
      document.getElementById("divConfirm").style.display = "none";
      document.getElementById("divUpdate").style.display = "block";

      document.getElementById("mts").disabled = true;
      document.getElementById("mte").disabled = true;
      document.getElementById("mc").disabled = true;

      document.getElementById("tts").disabled = true;
      document.getElementById("tte").disabled = true;
      document.getElementById("tc").disabled = true;

      document.getElementById("wts").disabled = true;
      document.getElementById("wte").disabled = true;
      document.getElementById("wc").disabled = true;

      document.getElementById("thts").disabled = true;
      document.getElementById("thte").disabled = true;
      document.getElementById("thc").disabled = true;

      document.getElementById("fts").disabled = true;
      document.getElementById("fte").disabled = true;
      document.getElementById("fc").disabled = true;

      document.getElementById("sts").disabled = true;
      document.getElementById("ste").disabled = true;
      document.getElementById("sc").disabled = true;

      document.getElementById("suts").disabled = true;
      document.getElementById("sute").disabled = true;
      document.getElementById("suc").disabled = true;
    }

    document.getElementById('mc').addEventListener('change', function() {
      var statusSuInput = document.getElementById('statusM');
      statusSuInput.value = this.checked ? 'Open' : 'Close';
    });
    document.getElementById('tc').addEventListener('change', function() {
      var statusSuInput = document.getElementById('statusT');
      statusSuInput.value = this.checked ? 'Open' : 'Close';
    });
    document.getElementById('wc').addEventListener('change', function() {
      var statusSuInput = document.getElementById('statusW');
      statusSuInput.value = this.checked ? 'Open' : 'Close';
    });
    document.getElementById('thc').addEventListener('change', function() {
      var statusSuInput = document.getElementById('statusTh');
      statusSuInput.value = this.checked ? 'Open' : 'Close';
    });
    document.getElementById('fc').addEventListener('change', function() {
      var statusSuInput = document.getElementById('statusF');
      statusSuInput.value = this.checked ? 'Open' : 'Close';
    });
    document.getElementById('sc').addEventListener('change', function() {
      var statusSuInput = document.getElementById('statusS');
      statusSuInput.value = this.checked ? 'Open' : 'Close';
    });
    document.getElementById('suc').addEventListener('change', function() {
      var statusSuInput = document.getElementById('statusSu');
      statusSuInput.value = this.checked ? 'Open' : 'Close';
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