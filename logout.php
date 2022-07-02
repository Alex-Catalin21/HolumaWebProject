<?php

        session_start();
        
        // Loggin out the user
        $_SESSION["loggedin"] = false;
        $_SESSION["id"] = "";
        $_SESSION["email"] = "";  

        // Redirect user to register, home is only for registered users
        header("location: register.php"); 
?>