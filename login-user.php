

<?php
    include_once  'bdConnection.php';
          
      class Login{
        public function loginUtilizator(){


          // Prepare a select statement
          $sql = "SELECT users_id, email, pass FROM users WHERE email = :email";

          $cerere = BD::obtine_conexiune()->prepare($sql);
          $cerere->execute([
            'email' =>  $_POST["remail"],
          ]);
          $user = $cerere->fetch();

          if(count($user)){   
                if(password_verify($_POST["rpass"], $user['pass'])){
                    // Password is correct, so start a new session
                    session_start();
                    
                    // Store data in session variables
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $user['user_id'];
                    $_SESSION["email"] = $user['email'];                            
                    
                    // Redirect user to home page
                    header("location: home.php");

                } else{
                    // Password is not valid, display a generic error message
                    $login_err = "Invalid username or password.";
                    session_start();
                    $_SESSION['Error'] =  $login_err;
                    header("location: login.php");
                }
            } else{
                // Username doesn't exist, display a generic error message
                $login_err = "Invalid username or password.";
                session_start();
                $_SESSION['Error'] =  $login_err;
                header("location: login.php");
            }
        }
      }
      $actiune = new Login();
      $actiune -> loginUtilizator();

      //SELECT Id_cat, COUNT(Id_cat) AS `orders` FROM services WHERE Oras='Cluj' GROUP BY Id_cat ORDER BY `orders` DESC
      //query for statistics
?>