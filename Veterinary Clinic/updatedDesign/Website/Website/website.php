<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!----======== CSS ======== -->
  <link rel="stylesheet" href="0_Capstone_WebSite.css" />

  <!----===== Icons ===== -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <!--=====Change name mo na lang====-->
  <title>Web</title>
</head>

<body>
  <nav class="nav">
    <div class="container">
      <div class="logo">
        <?php require 'title.php'; ?>
      </div>
      <div id="mainListDiv" class="main_list">
        <ul class="navlinks">
          <li><a href="website.php">About</a></li>
          <li><a href="services.php">Services</a></li>
          <li><a href="products.php">Products</a></li>
        </ul>
      </div>
      <span class="navTrigger">
        <i></i>
        <i></i>
        <i></i>
      </span>
    </div>
  </nav>
  <!--top-->
  <section class="home">
    <div class="clinic-name">
      <!--  -->
      <?php require 'title.php'; ?>
      <p>Paws-itively passionate about pets!</p>
    </div>

    <?php
    require 'database-conn.php';

    $query1 = "SELECT * FROM aboutus WHERE id = '1'";
    $result1 = mysqli_query($conn, $query1);
    $row1 = mysqli_fetch_assoc($result1);

    $imageName = $row1['imagename'];
    $imageType = $row1['imagetype'];
    $imageData = $row1['imagedata'];

    $logoSrc = "data:" . $imageType . ";base64," . base64_encode($imageData);
    $title = $row1['title'];
    $address = $row1['address'];
    $intro = $row1['intro'];
    $about = $row1['about'];
    ?>

    <div class="clinic-name">
      <!-- <button>Location</button> -->
      <p><?php echo $address; ?></p>
    </div>
    <div class="clinic-contacts">
      <p>Got a concern? Contact us!</p>
      <?php
      global $conn;
      $queryC = "SELECT * FROM cliniccontact WHERE id = '1'";
      $resultC = mysqli_query($conn, $queryC);
      $rowC = mysqli_fetch_assoc($resultC);

      $c1 = $rowC["contact1"];
      $c2 = $rowC["contact2"]
      ?>
      <div style="display: flex; flex: row">
        <p class="contacts"><?php echo $c1; ?></p>
        <p class="contacts"><?php echo $c2; ?></p>
      </div>
    </div>
  </section>
  <div class="intro-info">
    <p><?php echo $intro; ?></p>
  </div>

  <!-- messenger plugin -->
  <div id="fb-customer-chat" class="fb-customerchat">
  </div>

  <script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "144479405406937");
    chatbox.setAttribute("attribution", "biz_inbox");
  </script>

  <!-- Your SDK code -->
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        xfbml: true,
        version: 'v18.0'
      });
    };

    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s);
      js.id = id;
      js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>

  <!--About us-->
  <div class="clinic-info">
    <div class="infos">
      <div class="infos-logo">
        <img src="<?php echo $logoSrc; ?>" />
      </div>
      <div class="infos-about">
        <h1>About Us</h1>
        <p><?php echo $about; ?></p>
      </div>
    </div>
  </div>
  <br />
  <br />
  <!--Schedule-->
  <h1>Our Schedule</h1>
  <div class="clinic-schedule">
    <div class="sched">
      <?php
      require 'database-conn.php';

      $query1 = "SELECT * FROM clinicschedule WHERE id = '1'";
      $result1 = mysqli_query($conn, $query1);
      $row1 = mysqli_fetch_assoc($result1);
      $mts = date('h:i A', strtotime($row1["start"]));
      $mte = date('h:i A', strtotime($row1["end"]));
      $ms = ($row1["status"] == 'Open') ? 'checked' : '';

      $query2 = "SELECT * FROM clinicschedule WHERE id = '2'";
      $result2 = mysqli_query($conn, $query2);
      $row2 = mysqli_fetch_assoc($result2);
      $tts = date('h:i A', strtotime($row2["start"]));
      $tte = date('h:i A', strtotime($row2["end"]));
      $ts = ($row2["status"] == 'Open') ? 'checked' : '';

      $query3 = "SELECT * FROM clinicschedule WHERE id = '3'";
      $result3 = mysqli_query($conn, $query3);
      $row3 = mysqli_fetch_assoc($result3);
      $wts = date('h:i A', strtotime($row3["start"]));
      $wte = date('h:i A', strtotime($row3["end"]));
      $ws = ($row3["status"] == 'Open') ? 'checked' : '';

      $query4 = "SELECT * FROM clinicschedule WHERE id = '4'";
      $result4 = mysqli_query($conn, $query4);
      $row4 = mysqli_fetch_assoc($result4);
      $thts = date('h:i A', strtotime($row4["start"]));
      $thte = date('h:i A', strtotime($row4["end"]));
      $ths = ($row4["status"] == 'Open') ? 'checked' : '';

      $query5 = "SELECT * FROM clinicschedule WHERE id = '5'";
      $result5 = mysqli_query($conn, $query5);
      $row5 = mysqli_fetch_assoc($result5);
      $fts = date('h:i A', strtotime($row5["start"]));
      $fte = date('h:i A', strtotime($row5["end"]));
      $fs = ($row5["status"] == 'Open') ? 'checked' : '';

      $query6 = "SELECT * FROM clinicschedule WHERE id = '6'";
      $result6 = mysqli_query($conn, $query6);
      $row6 = mysqli_fetch_assoc($result6);
      $sts = date('h:i A', strtotime($row6["start"]));
      $ste = date('h:i A', strtotime($row6["end"]));
      $ss = ($row6["status"] == 'Open') ? 'checked' : '';

      $query7 = "SELECT * FROM clinicschedule WHERE id = '7'";
      $result7 = mysqli_query($conn, $query7);
      $row7 = mysqli_fetch_assoc($result7);
      $suts = date('h:i A', strtotime($row7["start"]));
      $sute = date('h:i A', strtotime($row7["end"]));
      $sus = ($row7["status"] == 'Open') ? 'checked' : '';
      ?>
      <div class="table-clinic">
        <table>
          <thead>
            <tr>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td data-label="Day">Monday</td>
              <td data-label=""><?php echo $mts; ?></td>
              <td data-label=""><?php echo $mte; ?></td>
              <td data-label=""><?php echo $row1['status']; ?></td>
            </tr>
            <tr>
              <td data-label="Day">Tuesday</td>
              <td data-label=""><?php echo $tts; ?></td>
              <td data-label=""><?php echo $tte; ?></td>
              <td data-label=""><?php echo $row2['status']; ?></td>
            </tr>
            <tr>
              <td data-label="Day">Wednesday</td>
              <td data-label=""><?php echo $wts; ?></td>
              <td data-label=""><?php echo $wte; ?></td>
              <td data-label=""><?php echo $row3['status']; ?></td>
            </tr>
            <tr>
              <td data-label="Day">Thursday</td>
              <td data-label=""><?php echo $thts; ?></td>
              <td data-label=""><?php echo $thte; ?></td>
              <td data-label=""><?php echo $row4['status']; ?></td>
            </tr>
            <tr>
              <td data-label="Day">Friday</td>
              <td data-label=""><?php echo $fts; ?></td>
              <td data-label=""><?php echo $fte; ?></td>
              <td data-label=""><?php echo $row5['status']; ?></td>
            </tr>
            <tr>
              <td data-label="Day">Saturday</td>
              <td data-label=""><?php echo $sts; ?></td>
              <td data-label=""><?php echo $ste; ?></td>
              <td data-label=""><?php echo $row6['status']; ?></td>
            </tr>
            <tr>
              <td data-label="Day">Sunday</td>
              <td data-label=""><?php echo $suts; ?></td>
              <td data-label=""><?php echo $sute; ?></td>
              <td data-label=""><?php echo $row7['status']; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div>
        <img src=".vscode/catbg.png" style="width: 450px" />
      </div>
    </div>
  </div>
  <!--Services-->
  <h1>Services</h1>
  <div class="clinic-services-main">
    <div class="clinic-services">
      <?php
      require 'database-conn.php';
      slider_services();
      function slider_services()
      {
        global $conn;
        $category = "Services";

        $query = "SELECT * FROM serviceandproduct WHERE categories = '$category'";
        $result = mysqli_query($conn, $query);

        if (!$result) {
          die("Query failed: " . mysqli_error($conn));
        }

        foreach ($result as $row) {
          $imageName = $row['imagename'];
          $imageType = $row['imagetype'];
          $imageData = $row['imagedata'];

          $imageScr = "data:" . $imageType . ";base64," . base64_encode($imageData);
          $name = $row['title'];
          $description = $row['description'];
      ?>
          <div class="services">
            <div class="services-gallery">
              <img src="<?php echo $imageScr; ?>" />
            </div>
            <div class="services-title">
              <p><?php echo $name; ?></p>
            </div>
          </div>
      <?php
        }
      }
      ?>
    </div>
  </div>
  <!--Announcements-->
  <h1>Announcements</h1>
  <div class="web-announcement">
    <?php
    require 'database-conn.php';
    announcement();
    function announcement()
    {
      global $conn;

      $query = "SELECT * FROM announcement";
      $result = mysqli_query($conn, $query);

      if (!$result) {
        die("Query failed: " . mysqli_error($conn));
      }

      foreach ($result as $row) {
        $imageName = $row['imagename'];
        $imageType = $row['imagetype'];
        $imageData = $row['imagedata'];

        $imageScr = "data:" . $imageType . ";base64," . base64_encode($imageData);
        $name = $row['title'];
        $description = $row['description'];
        $date = $row['date'];
    ?>
        <div class="clinic-announcement">
          <div class="announcement">
            <div class="announcement-image">
              <img src="<?php echo $imageScr; ?>" />
            </div>
            <div class="announcement-contents">
              <h2 ><?php echo $name; ?></h2>
              <h3><?php echo $date; ?></h3>
              <p onclick="openFormAnnouncement('<?php echo $name; ?>', '<?php echo $description; ?>', '<?php echo $date; ?>', '<?php echo $imageScr; ?>')">Read Contents</p>
            </div>
          </div>
        </div>
    <?php
      }
    }
    ?>
  </div>

  <div class="announcement-popup" id="myForm-announcement">
    <div class="announcement">
      <div class="close-bttn" style="margin-left: 90%; margin-top: 20px" onclick="closeFormAnnouncement()">
        <span class="material-symbols-outlined"> close </span>
      </div>
      <h1 id="name"></h1>

      <div class="announcement-image">
        <img src=".vscode/announcement-1.svg" id="imageV" />
      </div>

      <div class="announcement-contents">
        <h2 id="title"></h2>
        <h3 id="date"></h3>
        <p id="des"></p>
      </div>
    </div>
  </div>

  <div class="footer">
    <p>est. 2015</p>
    <img src="C:\xampp2\htdocs\dianeweb\Website\email_3178158.png" alt="Email" style="margin-right:10px"/>
    <img src="Website\facebook_1384005.png" alt="Facebook"/>
  </div>
</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="js/scripts.js"></script>

<!-- Function used to shrink nav bar removing paddings and adding black background -->
<script>
  $(window).scroll(function() {
    if ($(document).scrollTop() > 50) {
      $(".nav").addClass("affix");
      console.log("OK");
    } else {
      $(".nav").removeClass("affix");
    }
  });

  $(".navTrigger").click(function() {
    $(this).toggleClass("active");
    console.log("Clicked menu");
    $("#mainListDiv").toggleClass("show_list");
    $("#mainListDiv").fadeIn();
  });

  function openFormAnnouncement(name, description, date, src) {
    document.getElementById("myForm-announcement").style.display = "block";
    document.getElementById("name").innerText = name;
    document.getElementById("title").innerText = name;
    document.getElementById("des").innerText = description;
    document.getElementById("date").innerText = date;
    document.getElementById("imageV").src = src;
  }

  function closeFormAnnouncement() {
    document.getElementById("myForm-announcement").style.display = "none";
  }
</script>