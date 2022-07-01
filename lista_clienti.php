<?php
class BD1{
        private static $conexiune_bd = NULL;
        public static function obtine_conexiune(){
            if(is_null(self::$conexiune_bd)){
                self::$conexiune_bd = new PDO('mysql:host=localhost;dbname=serp', 'root', '');
                    }
                return self::$conexiune_bd;
                }
            }
    
$sqlclienti="SELECT user_id,email,admin_val from users";
$result = BD1::obtine_conexiune()->prepare($sqlclienti);
$result ->execute();



while($fetch = $result->fetch()){
?>

<table >
    
        <tr>
            <td><?php echo $fetch['user_id']?></td>
            <td><?php echo $fetch['email']?></td>
            <td><?php echo $fetch['admin_val']?></td>
        </tr>
    

</table>
<?php
        }
    
?>