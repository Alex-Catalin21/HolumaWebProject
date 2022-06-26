<?php
    include_once  'bdConnection.php';

    class Actiune{
        public function adaugaUtilizator(){
            $sql = "INSERT INTO users(email, pass) VALUES (:email, :pass)";
            $cerere = BD::obtine_conexiune()->prepare($sql);
            if($_POST['rpass'] != $_POST['rpass_confirm']){
                
                session_start();
                $_SESSION['Error'] =  "Password and Password Confirmation are not the same.";
                // Redirect user to login page
                header("location: register.php");
            }

            if(isset($_POST["remail"], $_POST["rpass"])){
            $email = $_POST["remail"];
            $password = $_POST["rpass"];
            $hash = password_hash($password, PASSWORD_DEFAULT);
            if($cerere -> execute ([
                'email' => $email,
                'pass' => $hash
            ])){
                
                    // Redirect user to login page
                    header("location: login.php");
            };
            }else{

                
                session_start();
                $_SESSION['Error'] =  "DB Error.";
                // Redirect user to login page
                header("location: register.php");
            }
        }
    }

    $actiune = new Actiune();
    $actiune -> adaugaUtilizator();
?>