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
          <a href="home.html">Home</a>
          <a href="shop.html">Services</a>
          <a href="login.html">Log-in/Sign-in</a>
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
        <form class="adminusers" action="admin_statut.php" method="post">
        
        <div class="title">
      <h2>Schimba calitatea utilizatorului</h2>
        </div>
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

    <form method="POST" action="">
        <button >Lista clienti</button>
    </form>
    <br /><br />
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Admin</th>
            </tr>
        </thead>
        <tbody>
            <?php include'lista_clienti.php'?>
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
    class Actiune_statut{
        
        public function schimbaStatut(){
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

    $actiune_statut= new Actiune_statut();
    $actiune_statut -> schimbaStatut();
    

?>