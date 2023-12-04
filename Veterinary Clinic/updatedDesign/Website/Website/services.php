<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!----======== CSS ======== -->
  <link rel="stylesheet" href="0_Capstone_WebSite_Services.css" />

  <!----===== Icons ===== -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <!--=====Change name mo na lang====-->

  <style>
    .services{
      display: grid;
      grid-template-columns: 25% 75%;
      width: 100%;
    }
  </style>
  <title>Services</title>
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
    </div>
  </nav>
  <!--top-->
  <section class="home">
    <div class="clinic-name">
      <a>Our Services</a>
    </div>
  </section>

  <!--Services-->
  <h1>Services</h1>
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
          <div class="services-image">
            <img src="<?php echo $imageScr; ?>"/>
          </div>
          <div class="services-contents">
            <h2><?php echo $name; ?></h2>
            <p><?php echo $description; ?></p>
          </div>
        </div>
    <?php
      }
    }
    ?>
  </div>


  <div class="footer">
    <p>est. 2015</p>
  </div>
</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


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
</script>