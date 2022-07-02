<?php
  session_start();
?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link href="login.css" rel="stylesheet" type="text/css" />
    <title>Log-in</title>
  </head>
  <body>
    <div class="header">
      <img src="/imagini/new-logo.png" alt="logo" />
  
      <span style="color:red;font-weight:bold"><?php if( isset($_SESSION['Error']) )
        {
                echo $_SESSION['Error'];

                unset($_SESSION['Error']);

        } ?>
        </span>
      <div class="header-right">
        <a class="active" href="home.php">Home</a>
        <a href="shop.php">Services</a>
        <?php
        if(!$_SESSION["loggedin"])
        {
        ?>
          <a href="login.php">Log-in/Sign-up</a>
        <?php
        }else{
        ?>
      
        <a href="javascript:{}" onclick="document.getElementById('logout_form').submit();">Log-out</a>
        <?php
        }
        ?>
      </div>
    </div>

    <div class="wrapper">
      <div class="title-text">
        <img id="logo" src="Imagini/new-logo.png"  alt="Logo"/>
      </div>
      <div class="form-container">
        <div class="slide-controls">
          <input type="radio" name="slide" id="login" checked />
          <input type="radio" name="slide" id="signup" />
          <label for="login" class="slide login">Login</label>
          <label for="signup" class="slide signup">Signup</label>
          <div class="slider-tab"></div>
        </div>
        <div class="form-inner">
          
          <form class="login" action="login-user.php" method="post">
            <div class="field">
              <input
                id="login--email-field"
                type="email"
                name="remail"
                placeholder="Email Address"
                required
              />
            </div>
            <div class="field">
              <input
                id="login--password-field"
                type="password"
                name="rpass"
                placeholder="Password"
                required
              />
            </div>

            <div class="field btn">
              <div class="btn-layer"></div>
              <button id="login-btn" type="submit" value="Login">Login</button>
            </div>
            <div class="signup-link">
              Not a member? <a href="register.php">Signup now</a>
            </div>
          </form>

        </div>
      </div>
    </div>
    
    <form action="logout.php" id="logout_form" method="post">
    <form>
  </body>
</html>