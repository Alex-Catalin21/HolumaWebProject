<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
      crossorigin="anonymous"
    />
    <link href="home.css" rel="stylesheet" type="text/css" />
    <title>Home</title>
  </head>
  <body>

    <div class="header">
      <img src="imagini/new-logo.png" alt="logo" />
    
      <div class="header-right">
        <a class="active" href="home.php">Home</a>
        <a href="shop.html">Services</a>
        <?php
        if(!$_SESSION["loggedin"])
        {
        ?>
           <a href="login.php">Log-in/Sign-in</a>
        <?php
        }else{
        ?>
      
        <a href="javascript:{}" onclick="document.getElementById('logout_form').submit();">Log-out</a>
        <?php
        }
        ?>
      </div>
    </div>

    <main>
      <img id="logo" src="imagini/new-logo.png" alt="logo picture" />
      <div class="products"></div>

      
    </main>
    <form action="logout.php" id="logout_form" method="post">
    <form>
  </body>
</html>
