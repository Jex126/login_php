<?php 
require_once $_ENV[1]['dir']."/bd/conexion.php";
class modelLogin{
    private $coneccionObj;
    private $con;
    function __construct()
    {
        $this->coneccionObj = new conexion();
        $this->con = $this->coneccionObj->con();
    }
    function getPass($correo){
        $sql = "call spContraseña(:correo)";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam('correo',$correo,PDO::PARAM_STR);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }
}
?>