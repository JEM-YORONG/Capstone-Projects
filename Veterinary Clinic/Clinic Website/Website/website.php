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
  </nav>
  <!--top-->
  <section class="home">
    <div class="clinic-name">
      <a>Doc Lenon <br />Veterinary Clinic</a>
      <p>Paws-itively passionate about pets!</p>
    </div>

    <div class="clinic-name">
      <button>Location</button>
    </div>
    <div class="clinic-contacts">
      <p>Got a concern? Contact us!</p>
      <div style="display: flex; flex: row">
        <p class="contacts">0912 456 7890</p>
        <p class="contacts">0912 456 7890</p>
      </div>
    </div>
  </section>
  <div class="intro-info">
    <p>
      The righteous care for the needs of their animals, but the kindest acts
      of the wicked are cruel. PROVERBS 12:10
    </p>
  </div>
  <!--About us-->
  <div class="clinic-info">
    <div class="infos">
      <div class="infos-logo">
        <img src=".vscode/Doc Lenon Logo.png" />
      </div>
      <div class="infos-about">
        <h1>About Us</h1>
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
  <br />
  <br />
  <!--Schedule-->
  <h1>Our Schedule</h1>
  <div class="clinic-schedule">
    <div class="sched">
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
              <td data-label="">9:00 am</td>
              <td data-label="">5:00 pm</td>
              <td data-label="">Open</td>
            </tr>
            <tr>
              <td data-label="Day">Tuesday</td>
              <td data-label="">9:00 am</td>
              <td data-label="">5:00 pm</td>
              <td data-label="">Open</td>
            </tr>
            <tr>
              <td data-label="Day">Wednesday</td>
              <td data-label="">9:00 am</td>
              <td data-label="">5:00 pm</td>
              <td data-label="">Open</td>
            </tr>
            <tr>
              <td data-label="Day">Thursday</td>
              <td data-label="">9:00 am</td>
              <td data-label="">5:00 pm</td>
              <td data-label="">Open</td>
            </tr>
            <tr>
              <td data-label="Day">Friday</td>
              <td data-label="">9:00 am</td>
              <td data-label="">5:00 pm</td>
              <td data-label="">Open</td>
            </tr>
            <tr>
              <td data-label="Day">Saturday</td>
              <td data-label="">9:00 am</td>
              <td data-label="">5:00 pm</td>
              <td data-label="">Open</td>
            </tr>
            <tr>
              <td data-label="Day">Sunday</td>
              <td data-label="">9:00 am</td>
              <td data-label="">5:00 pm</td>
              <td data-label="">Open</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div>
        <img src=".vscode/bg-2.svg" style="width: 500px" />
      </div>
    </div>
  </div>
  <!--Services-->
  <h1>Services</h1>
  <div class="clinic-services-main">
    <div class="clinic-services">
      <div class="services">
        <div class="services-gallery">
          <img src=".vscode/Services-consultation.jpg" />
        </div>
        <div class="services-title">
          <p>Consultation</p>
        </div>
      </div>
      <div class="services">
        <div class="services-gallery">
          <img src=".vscode/Services-grooming.jpg" />
        </div>
        <div class="services-title">
          <p>Grooming</p>
        </div>
      </div>
      <div class="services">
        <div class="services-gallery">
          <img src=".vscode/Services-lab tes.jpg" />
        </div>
        <div class="services-title">
          <p>Laboratory Test</p>
        </div>
      </div>
      <div class="services">
        <div class="services-gallery">
          <img src=".vscode/Services-Vaccination.jpg" />
        </div>
        <div class="services-title">
          <p>Vaccination</p>
        </div>
      </div>
      <div class="services">
        <div class="services-gallery">
          <img src=".vscode/Services-surgery.jpg" />
        </div>
        <div class="services-title">
          <p>Surgery</p>
        </div>
      </div>
    </div>
  </div>
  <!--Announcements-->
  <h1>Announcements</h1>
  <div class="clinic-announcement">
    <div class="announcement">
      <div class="announcement-image">
        <img src=".vscode/announcement-1.svg" />
      </div>
      <div class="announcement-contents">
        <h2>Succesful Delivery</h2>
        <h3>mm/dd/yyyy</h3>
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
    <div class="announcement">
      <div class="announcement-image">
        <img src=".vscode/announcement-1.svg" />
      </div>
      <div class="announcement-contents">
        <h2>Succesful Delivery</h2>
        <h3>mm/dd/yyyy</h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
          eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
      </div>
    </div>
    <div class="announcement">
      <div class="announcement-image">
        <img src=".vscode/announcement-1.svg" />
      </div>
      <div class="announcement-contents">
        <h2>Succesful Delivery</h2>
        <h3>mm/dd/yyyy</h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
          eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
          ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
          aliquip ex ea commodo consequat. Duis aute irure dolor in
          reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
          pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
          culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum
          dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
          incididunt ut labore et dolore magna aliqua. Ut enim ad minim
          veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
          ea commodo consequat. Duis aute irure dolor in reprehenderit in
          voluptate velit esse cillum dolore eu fugiat nulla pariatur.
          Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
          officia deserunt mollit anim id est laborum.
        </p>
      </div>
    </div>
  </div>

  <!--Messenger ChatBox-->
  <div id="fb-root"></div>
  <div id="fb-customer-chat" class="fb-customerchat"></div>
  <script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "144479405406937"); //page id (144479405406937)
    chatbox.setAttribute("attribution", "biz_inbox");
  </script>
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        xfbml: true,
        version: 'v12.0'
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
  <!--End Of Messenger ChatBox-->

  <div class="footer">
    <p>est. 2015</p>
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
</script>