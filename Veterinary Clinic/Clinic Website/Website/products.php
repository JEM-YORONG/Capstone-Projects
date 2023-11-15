<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!----======== CSS ======== -->
  <link rel="stylesheet" href="0_Capstone_WebSite_Products.css" />

  <!----===== Icons ===== -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <!--=====Change name mo na lang====-->
  <title>Products</title>
</head>

<body>
  <nav class="nav">
    <div class="container">
      <div class="logo">
        <a href="#">Doc Lenon Veterinary Clinic</a>
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
      <a>Our Services</a>
    </div>
  </section>

  <!--Products-->
  <h1>Products</h1>
  <h4> Contact Us for more info!</h4>
  <h2>Pet Food</h2>
  <div class="slider-food" id="slider-food">

    <div class="slide" id="slideFood">
      <!--  -->
      <?php
      require 'database-conn.php';
      slider_food();
      function slider_food()
      {
        global $conn;
        $category = "Pet Foods";

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
          <div class="item">
            <div class="services-gallery">
              <img src="<?php echo $imageScr; ?>" />
            </div>
            <div class="services-title">
              <h3><?php echo $name; ?></h3>
              <p><?php echo $description; ?></p>
            </div>
          </div>
      <?php
        }
      }
      ?>
    </div>
  </div>
  <button class="ctrl-btn pro-prev-food">&#8592;</button>
  <button class="ctrl-btn pro-next-food"> &#8594;</button>
  </div>

  <!---->
  <h2>Accessories</h2>
  <div class="slider-accesories" id="slider-accesories">
    <div class="slide" id="slideaccesories">
      <?php
      require 'database-conn.php';
      slider_accesories();
      function slider_accesories()
      {
        global $conn;
        $category = "Accessories";

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
          <div class="item">
            <div class="prodbath-gallery">
              <img src="<?php echo $imageScr; ?>" />
            </div>
            <div class="services-title">
              <h3><?php echo $name; ?></h3>
              <p><?php echo $description; ?></p>
            </div>
          </div>

      <?php
        }
      }
      ?>
    </div>
    <button class="ctrl-btn pro-prev-accesories">&#8592;</button>
    <button class="ctrl-btn pro-next-accesories"> &#8594;</button>
  </div>

  <!--Bath Products-->
  <h2>Bath Products</h2>
  <div class="clinic-products-bath">
    <div class="clinic-products">
      <?php
      require 'database-conn.php';
      slider_Bath();
      function slider_Bath()
      {
        global $conn;
        $category = "Bath Products";

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
          <div class="prodBath">
            <div class="prodbath-gallery">
              <img src="<?php echo $imageScr; ?>" />
            </div>
            <div class="services-title">
              <h3><?php echo $name; ?></h3>
              <p><?php echo $description; ?></p>
            </div>
          </div>

      <?php
        }
      }
      ?>
    </div>
  </div>
  <!--Others-->
  <h2>Others</h2>
  <div class="clinic-products-others">
    <div class="clinic-products">
      <?php
      require 'database-conn.php';
      slider_Other();
      function slider_Other()
      {
        global $conn;
        $category = "Others";

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
          <div class="prodothers">
            <div class="prodbath-gallery">
              <img src="<?php echo $imageScr; ?>" />
            </div>
            <div class="services-title">
              <h3><?php echo $name; ?></h3>
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
  //products
  ("use strict");

  productScroll();

  function productScroll() {
    let sliderFood = document.getElementById("slider-food");
    let nextFood = document.getElementsByClassName("pro-next-food");
    let prevFood = document.getElementsByClassName("pro-prev-food");
    let slide = document.getElementById("slideFood");
    let item = document.getElementById("slideFood");

    for (let i = 0; i < nextFood.length; i++) {
      //refer elements by class name

      let position = 0; //slider postion

      prevFood[i].addEventListener("click", function() {
        //click previos button
        if (position > 0) {
          //avoid slide left beyond the first item
          position -= 1;
          translateX(position); //translate items
        }
      });

      nextFood[i].addEventListener("click", function() {
        if (position >= 0 && position < hiddenItems()) {
          //avoid slide right beyond the last item
          position += 1;
          translateX(position); //translate items
        }
      });
    }

    function hiddenItems() {
      //get hidden items
      let items = getCount(item, false);
      let visibleItems = sliderFood.offsetWidth / 210;
      return items - Math.ceil(visibleItems);
    }
  }

  function translateX(position) {
    //translate items
    slideFood.style.left = position * -210 + "px";
  }

  function getCount(parent, getChildrensChildren) {
    //count no of items
    let relevantChildren = 0;
    let children = parent.childNodes.length;
    for (let i = 0; i < children; i++) {
      if (parent.childNodes[i].nodeType != 3) {
        if (getChildrensChildren)
          relevantChildren += getCount(parent.childNodes[i], true);
        relevantChildren++;
      }
    }
    return relevantChildren;
  }
  //accessories
  ("use strict");

  productScroll1();

  function productScroll1() {
    let slideraccesories = document.getElementById("slider-accesories");
    let nextaccesories = document.getElementsByClassName("pro-next-accesories");
    let prevaccesories = document.getElementsByClassName("pro-prev-accesories");
    let slide = document.getElementById("slideaccesories");
    let item = document.getElementById("slideaccesories");

    for (let i = 0; i < nextaccesories.length; i++) {
      //refer elements by class name

      let position = 0; //slider postion

      prevaccesories[i].addEventListener("click", function() {
        //click previos button
        if (position > 0) {
          //avoid slide left beyond the first item
          position -= 1;
          translateXAcces(position); //translate items
        }
      });

      nextaccesories[i].addEventListener("click", function() {
        if (position >= 0 && position < hiddenItems()) {
          //avoid slide right beyond the last item
          position += 1;
          translateXAcces(position); //translate items
        }
      });
    }

    function hiddenItems() {
      //get hidden items
      let items = getCount(item, false);
      let visibleItems = slideraccesories.offsetWidth / 210;
      return items - Math.ceil(visibleItems);
    }
  }

  function translateXAcces(position) {
    //translate items
    slideaccesories.style.left = position * -210 + "px";
  }

  function getCount(parent, getChildrensChildren) {
    //count no of items
    let relevantChildren = 0;
    let children = parent.childNodes.length;
    for (let i = 0; i < children; i++) {
      if (parent.childNodes[i].nodeType != 3) {
        if (getChildrensChildren)
          relevantChildren += getCount(parent.childNodes[i], true);
        relevantChildren++;
      }
    }
    return relevantChildren;
  }
</script>