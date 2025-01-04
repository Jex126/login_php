<?php
class principal
{
    private $correo;
    private $pass;
    function __construct() {

    }
    function viewPrin()
    {
        session_start();
        echo $_SESSION['correo'];
        if(isset($_SESSION['correo'])){
            require $_ENV[1]['dir'] . "/src/views/principal.php";
        }else{
            require $_ENV[1]['dir'] . "/src/views/login.php";
        }
    }
}
