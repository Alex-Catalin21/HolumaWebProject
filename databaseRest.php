<?php
class DatabaseRest{

    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "serp";
    private $username = "root";
    private $password = "";
    public $conne;

    // get the database connection
    public function getConnectionRest(){

        $this->conne = null;

        try{
            $this->conne = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conne->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conne;
    }
}
?>