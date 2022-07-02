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
    <link href="admin.css" rel="stylesheet" type="text/css" />
    <title>Shop</title>
  </head>
  <body>

    <div class="header">
      <img src="imagini/new-logo.png" alt="logo" />
    
      <div class="header-right">
        <a href="home.php">Home</a>
        <a class="active" href="shop.php">Services</a>
        <a href="login.php">Log-in/Sign-up</a>
        <a href="">Log-out</a>
        <a href="admin.php">Admin</a>
      </div>
    </div>
    
    <div>
      <form class="shopservices" action="shop.php" method="post">
        <label>Categorie</label>
        <select name="idcat" id="category">
            <option value="1">Inchiriere risca</option>
            <option value="2">Dirijabil a la Uber</option>
            <option value="3">Masaj electric</option>
            <option value="4">Inhumari de lux</option>
            <option value="5">Curatat gradina</option>
        </select>
        
        <label>Pret</label>
        <input 
        type="text"
        placeholder="Pret.."
        name="pret"
        required
        />

        <label>Oras</label>
        <input 
        type="text" 
        placeholder="Oras"
        name="oras"
        required/>

        <label for="start">Start date:</label>
        <input 
        type="date" 
        id="start" 
        name="firstdate" 
        value="2022-07-02" 
        min="2022-06-02" 
        max="2032-07-02">

        <label for="finish">Last date:</label>
        <input 
        type="date" 
        id="finish" 
        name="lastdate" 
        value="2022-07-02" 
        min="2022-06-02" 
        max="2032-07-02">
        
        <input type="submit" id="btn" value="Search Service">
        
      </form>
    </div>
    
  </body>
  
</html>


<?php
    class BDshop{
        private static $conexiune_bd = NULL;
        public static function obtine_conexiune(){
            if(is_null(self::$conexiune_bd)){
                self::$conexiune_bd = new PDO('mysql:host=localhost;dbname=serp', 'root', '');
                    }
                return self::$conexiune_bd;
                }
            }
    class Actiune_client{
        public function cautaServiciu(){
            $sqlserviciu = "SELECT Id,Id_cat,Pret,Oras,First_date,Last_date FROM services WHERE Id_cat=:Id_cat AND Pret<=:Pret AND Oras=:Oras AND First_date<=:First_date AND Last_date>=:Last_date ORDER BY Pret";
            $cerereserviciu =  BDshop::obtine_conexiune()->prepare($sqlserviciu);
            if(isset($_POST["idcat"],$_POST["pret"],$_POST["oras"],$_POST["firstdate"],$_POST["lastdate"])){
                $Id_cat = $_POST["idcat"];
                $Pret = $_POST["pret"];
                $Oras = $_POST["oras"];
                $First_date = $_POST["firstdate"];
                $Last_date = $_POST["lastdate"];
                $cerereserviciu -> execute ([
                    'Id_cat' => $Id_cat,
                    'Pret' => $Pret,
                    'Oras' => $Oras,
                    'First_date' => $First_date,
                    'Last_date' => $Last_date
                ]);
                if($fetch = $cerereserviciu->fetch()){
                  ?>
                  <p>
                    Comanda a fost plasata.
                </p>
                  
                   <?php 

                   $sqldeleteservicu = "DELETE FROM services where Id=:id_serviciu";
                   $deleteserviciu =  BDshop::obtine_conexiune()-> prepare($sqldeleteservicu);
                   $deleteserviciu -> execute ([
                    'id_serviciu'=> $fetch['Id']
                   ]);
                
              }
                else{
                  ?>
                  <p>
                    Serviciul nu a fost gasit cu datele introduse.
                </p>
                  <?php
                }
            }
        }
    }
    $actiune_client= new Actiune_client();
    $actiune_client -> cautaServiciu();


?>