<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="css files\Capstone_Login.css" />
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

      <form class="login-form" method="post" autocomplete="off">
        <div class="form-control">
          <input type="text" placeholder="Email" id="username" />
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
    </div>
  </section>
  <?php
  require 'script files\login.js.php';
  ?>
</body>

</html>