<?php
class BDservicii{
        private static $conexiune_bd = NULL;
        public static function obtine_conexiune(){
            if(is_null(self::$conexiune_bd)){
                self::$conexiune_bd = new PDO('mysql:host=localhost;dbname=serp', 'root', '');
                    }
                return self::$conexiune_bd;
                }
            }
    
$sqlservicii="SELECT Id,Id_cat,Pret,Oras,First_date,Last_date from services";
$result = BDservicii::obtine_conexiune()->prepare($sqlservicii);
$result ->execute();



while($fetch = $result->fetch()){
?>

<table >
    
        <tr>
            <td><?php echo $fetch['Id']?></td>
            <td><?php echo $fetch['Id_cat']?></td>
            <td><?php echo $fetch['Pret']?></td>
            <td><?php echo $fetch['Oras']?></td>
            <td><?php echo $fetch['First_date']?></td>
            <td><?php echo $fetch['Last_date']?></td>
        </tr>
    
              
</table>
<?php
        }
    
?>