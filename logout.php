<?php

        session_start();
        
        // Loggin out the user
        $_SESSION["loggedin"] = false;
        $_SESSION["id"] = "";
        $_SESSION["email"] = "";  

        // Redirect user to home page
        header("location: home.php"); 
?>