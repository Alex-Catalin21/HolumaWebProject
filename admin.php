<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="admin.css" rel="stylesheet" type="text/css" />
    <title>Admin</title>
</head>

<body>
    <div class="header">
        <img src="/Imagini/new-logo.png" alt="logo" />
        
        <div class="header-right">
          <a href="home.html">Home</a>
          <a href="shop.html">Services</a>
          <a href="login.html">Log-in/Sign-in</a>
          <a href="">Log-out</a>
          <a class="active" href="admin.html">Admin</a>
        </div>
      </div>
    <div class="title">
      <h2>Add new Service</h2>
    </div>
    <div >
        <input type="radio" name="slide" id="adminservices" checked />
        <input type="radio" name="slide" id="adminusers" />
        <label for="adminservices" class="">Services</label>
        <label for="adminusers" class="">Users</label>
    <form class="adminservices" action="admin.php" method="post">
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
        value="2022-04-15" 
        min="2022-04-15" 
        max="2032-04-15">

        <label for="finish">Last date:</label>
        <input 
        type="date" 
        id="finish" 
        name="lastdate" 
        value="2022-04-15" 
        min="2022-04-15" 
        max="2032-04-15">
        
        <input type="submit" id="btn" value="Add Service">
        
    </form>
    </div>
    <div>
        <form class="adminusers" action="admin.php" method="post">
        
            <label>Id</label>
            <input 
            type="text"
            placeholder="Id"
            name="id"
            required
            /> 
            <select name="CatUser" id="categoryUser">
                <option value="0">Client</option>
                <option value="1">Admin</option>
            </select>
            <input type="submit" id="btn" value="Modify user">
        </form>
    </div>


    
</body>
</html>

<?php
    class BD{
        private static $conexiune_bd = NULL;
        public static function obtine_conexiune(){
            if(is_null(self::$conexiune_bd)){
                self::$conexiune_bd = new PDO('mysql:host=localhost;dbname=serp', 'root', '');
                    }
                return self::$conexiune_bd;
                }
            }
    class Actiune_admin{
        public function adaugaServiciu(){
            $sqlserviciu = "INSERT INTO services(Id_cat,Pret,Oras,First_date,Last_date) VALUES (:Id_cat,:Pret,:Oras,:First_date,:Last_date)";
            $cerereserviciu =  BD::obtine_conexiune()->prepare($sqlserviciu);
            if(isset($_POST["idcat"],$_POST["pret"],$_POST["oras"],$_POST["firstdate"],$_POST["lastdate"])){
                $Id_cat = $_POST["idcat"];
                $Pret = $_POST["pret"];
                $Oras = $_POST["oras"];
                $First_date = $_POST["firstdate"];
                $Last_date = $_POST["lastdate"];
                return $cerere -> execute ([
                    'Id_cat' => $Id_cat,
                    'Pret' => $Pret,
                    'Oras' => $Oras,
                    'First_date' => $First_date,
                    'Last_date' => $Last_date
                ]);
            }
        }
        public function schimbaUser(){
            $sqluser = "UPDATE users SET admin_val=:catUser WHERE user_id=:idcautat";
            $cerereuser =  BD::obtine_conexiune()->prepare($sqluser);
            if(isset($_POST["CatUser"],$_POST["id"])){
                $catUser= $_POST["CatUser"];
                $idcautat=$_POST["id"];
                return $cerereuser -> execute ([
                    'catUser' => $catUser,
                    'idcautat' => $idcautat
                ]);
            }
        }
    }
    $actiune_admin= new Actiune_admin();
    $actiune_admin -> adaugaServiciu();
    $actiune_admin -> schimbaUser();

?>