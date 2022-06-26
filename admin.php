<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="admin.css" rel="stylesheet" type="text/css" />
    <title>Admin</title>
</head>

<body>
    <div class="header">
        <img src="imagini/new-logo.png" alt="logo" />
        
        <div class="header-right">
            <a href="home.php">Home</a>
            <a href="shop.html">Services</a>
            <a href="login.php">Log-in/Sign-in</a>
            <a href="">Log-out</a>
            <a class="active" href="admin.html">Admin</a>
        </div>
    </div>
    <div>
    <a href="admin.php">Adauga Serviciu</a>
    <a href="admin_statut.php">Schimba calitatea utilizatorului</a>
    <a href="admin_serviciu_update.php">Actualizare Serviciu</a>
    </div>
    <div class="title">
        <h2>Add new Service</h2>
    </div>
    <div >
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
        value="2022-07-02" 
        min="2022-07-02" 
        max="2032-07-02">

        <label for="finish">Last date:</label>
        <input 
        type="date" 
        id="finish" 
        name="lastdate" 
        value="2022-07-02" 
        min="2022-07-02" 
        max="2032-07-02">
        
        <input type="submit" id="btn" value="Add Service">
        
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
                return $cerereserviciu -> execute ([
                    'Id_cat' => $Id_cat,
                    'Pret' => $Pret,
                    'Oras' => $Oras,
                    'First_date' => $First_date,
                    'Last_date' => $Last_date
                ]);
            }
        }
    }
    $actiune_admin= new Actiune_admin();
    $actiune_admin -> adaugaServiciu();


?>