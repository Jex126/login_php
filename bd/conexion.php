<?php 
class conexion{
    private $dbName; 
    private $dbUser; 
    private $dbPass; 
    function __construct()
    {
        $this->dbName = $_ENV[0]['DB_NAME'];
        $this->dbUser = $_ENV[0]['DB_USER'];
        $this->dbPass = $_ENV[0]['DB_PASS'];
    }
    function con(){
        try {
            return $mbd = new PDO("mysql:host=localhost;dbname=$this->dbName",$this->dbUser,$this->dbPass);
        } catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

}
?>