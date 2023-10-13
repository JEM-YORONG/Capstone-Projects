<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="0_Capstone_WebSite_Services.css" />

    <!----===== Icons ===== -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"
    />
    <!--=====Change name mo na lang====-->
    <title>Services</title>
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
            <li><a href="webiste-service.php">Services</a></li>
            <li><a href="website-product.php">Products</a></li>
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
      <div class="services">
        <div class="services-image">
          <img src=".vscode/Services-consultation.jpg" />
        </div>
        <div class="services-contents">
          <h2>Consultation</h2>
          <p>
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
      <div class="services">
        <div class="services-image">
          <img src=".vscode/Services-Vaccination.jpg" />
        </div>
        <div class="services-contents">
          <h2>Vaccination</h2>
          <p>
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
      <div class="services">
        <div class="services-image">
          <img src=".vscode/Services-surgery.jpg" />
        </div>
        <div class="services-contents">
          <h2>Surgery</h2>
          <p>
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
    </div>


    <div class="footer">
      <p>est. 2015</p>
    </div>
  </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


<!-- Function used to shrink nav bar removing paddings and adding black background -->
<script>
  $(window).scroll(function () {
    if ($(document).scrollTop() > 50) {
      $(".nav").addClass("affix");
      console.log("OK");
    } else {
      $(".nav").removeClass("affix");
    }
  });

  $(".navTrigger").click(function () {
    $(this).toggleClass("active");
    console.log("Clicked menu");
    $("#mainListDiv").toggleClass("show_list");
    $("#mainListDiv").fadeIn();
  });

  function testing(){
    alert("may error ka");
  }
</script>
