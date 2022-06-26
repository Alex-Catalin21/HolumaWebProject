<!DOCTYPE html>
<?php
  session_start();
?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link href="login.css" rel="stylesheet" type="text/css" />
    <title>Register</title>
  </head>
  <body>
    <div class="header">
      <img src="/imagini/new-logo.png" alt="logo" />
  
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
    
    <div class="fields-error">
      <span id="err-email">Email looks incorrectly</span>
      <span id="err-register">User already exists.</span>
    </div>
    <div class="wrapper">
      <div class="title-text">
        <img id="logo" src="Imagini/new-logo.png"  alt="Logo"/>
      </div>
  
        <span style="color:red;font-weight:bold"><?php if( isset($_SESSION['Error']) )
          {
                  echo $_SESSION['Error'];

                  unset($_SESSION['Error']);

          } ?>
          </span>
      <div class="form-container">
        <div class="slide-controls">
          <input type="radio" name="slide" id="login"/>
          <input type="radio" name="slide" id="signup" checked/>
          <label for="login" class="slide login">Login</label>
          <label for="signup" class="slide signup">Signup</label>
          <div class="slider-tab"></div>
        </div>
        <div class="form-inner">
          
          <form class="login" action="register-user.php" method="post">
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
            <div class="field">
              <input
                id="login--password-field"
                type="password"
                name="rpass_confirm"
                placeholder="Repeat Password"
                required
              />
            </div>

            <div class="field btn">
              <div class="btn-layer"></div>
              <button id="login-btn" type="submit" value="Register">Sign Up</button>
            </div>
            <div class="signup-link">
              Already a member ? <a href="login.php">Login now</a>
            </div>
          </form>
        </div>
      </div>
    </div>
    <form action="logout.php" id="logout_form" method="post">
    <form>
  </body>
</html>
