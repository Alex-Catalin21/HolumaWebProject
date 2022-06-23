<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="admin.css" rel="stylesheet" type="text/css" />
    <title>AdminStatut</title>
</head>

<body>
    <div class="header">
        <img src="/Imagini/new-logo.png" alt="logo" />
        
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
    <div>
        <form class="adminusers" action="admin_serviciu_update.php" method="post">
        
            <label>Id</label>
            <input 
            type="text"
            placeholder="Id"
            name="id"
            required
            /> 
            <label for="Pret">Pret</label>
            <input 
            type="text"
            id="Pret"
            placeholder="Pret.."
            name="pret"
            />
            <label for="start">Start date:</label>
            <input 
            type="date" 
            id="start" 
            name="firstdate" 
            min="2022-04-15" 
            max="2032-04-15">

            <label for="finish">Last date:</label>
            <input 
            type="date" 
            id="finish" 
            name="lastdate" 
            min="2022-04-15" 
            max="2032-04-15">
            <input type="submit" id="btn" value="Modify user">
            
        </form>

    <form method="POST" action="">
        <button class="btn btn-primary" name="display">Lista servicii</button>
    </form>
    <br /><br />
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ID category</th>
                <th>Pret</th>
                <th>Oras</th>
                <th>Start date</th>
                <th>Last date</th>
            </tr>
        </thead>
        <tbody>
            <?php include'lista_servicii.php'?>
        </tbody>
    </table>
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
    class Actiune_serviciu_update{
        
        public function schimbaPret(){
            $sqlpret = "UPDATE services SET pret=:pret WHERE id=:idcautat";
            $cererepret =  BD::obtine_conexiune()->prepare($sqlpret);
            if(isset($_POST["pret"],$_POST["id"])&& !empty($_POST["pret"])){
                $pret= $_POST["pret"];
                $idcautat=$_POST["id"];
                return $cererepret -> execute ([
                    'pret' => $pret,
                    'idcautat' => $idcautat
                ]);
            }
        }
        public function schimbaStart_date(){
            $sqlstart_date = "UPDATE services SET First_date=:first_date WHERE id=:idcautat";
            $cererestart =  BD::obtine_conexiune()->prepare($sqlstart_date);
            if(isset($_POST["firstdate"],$_POST["id"])&& !empty($_POST["firstdate"])){
                $first_date= $_POST["firstdate"];
                $idcautat=$_POST["id"];
                return $cererestart -> execute ([
                    'first_date' => $first_date,
                    'idcautat' => $idcautat
                ]);
            }
        }
        public function schimbaLast_date(){
            $sqlstart_date = "UPDATE services SET Last_date=:last_date WHERE id=:idcautat";
            $cererestart =  BD::obtine_conexiune()->prepare($sqlstart_date);
            if(isset($_POST["lastdate"],$_POST["id"])&& !empty($_POST["lastdate"])){
                $last_date= $_POST["lastdate"];
                $idcautat=$_POST["id"];
                return $cererestart -> execute ([
                    'last_date' => $last_date,
                    'idcautat' => $idcautat
                ]);
            }
        }
          
    }

    $actiune_serviciu_statut= new Actiune_serviciu_update();
    $actiune_serviciu_statut -> schimbaPret();
    $actiune_serviciu_statut -> schimbaStart_date();
    $actiune_serviciu_statut -> schimbaLast_date();
    

?>