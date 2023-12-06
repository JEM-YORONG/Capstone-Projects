<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="Capstone_Login.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />

  <?php require 'alert-notif-function.php'; ?>
  <title>Doc Lenon Veterinary Clinic | Login</title>
</head>

<body>
  <section class="side">
    <img src=".vscode\Images\Doc Lenon Logo.png" alt="" />
    <div class="separator-vertical"></div>
  </section>

  <section class="main">
    <div class="login-container">
      <p class="title">Doc Lenon Veterinary Clinic</p>
      <p class="system-title">Vet Portal</p>

      <p class="welcome-message">LOGIN</p>

      <form class="login-form" method="post">
        <div class="form-control">
          <input type="text" placeholder="Email" id="username" autocomplete="off" />
          <i><span class="material-symbols-outlined">person</span></i>
        </div>
        <div class="form-control">
          <input type="password" placeholder="Password" id="password" />
          <i><span class="material-symbols-outlined">lock</span></i>
        </div>

        <?php require 'alert-notif.php'; ?>
        <div class="form-password">
        </div>
        <button type="button" class="submit" onclick="login('checker');">Login</button>
      </form>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
      </script>
      <script>
        //session_start();

        function login(action) {
          $(document).ready(function() {
            var data = {
              action: action,
              id: $("#id").val(),
              username: $("#username").val(),
              password: $("#password").val()
            }

            $.ajax({
              url: 'login-function.php',
              type: 'post',
              data: data,

              success: function(response) {
                //alert(response);
                //let username = $_SESSION['username'];
                if (response == "admin") {
                  successAlert("Welcome Admin");
                  location.replace("zHTML_dashboard.php");
                } else if (response == "secretary") {
                  successAlert("Welcome Secretary");
                  location.replace("zStaff_dashboard.php");
                } else if (response == "veterinarian") {
                  successAlert("Welcome Veterinarian");
                  location.replace("zStaff_dashboard.php");
                } else {
                  successAlert(response);
                }
              }
            });
          });
        }
      </script>
    </div>
  </section>
</body>

</html>