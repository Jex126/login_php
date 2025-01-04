<?php 
require_once $_ENV[1]['dir']."/src/models/modelLogin.php";
    class controllerLogin{
        private $modelLoginObj;
        private $method;
        private $data;
        function __construct($method)
        {
            $this->modelLoginObj = new modelLogin();
            $this->method = $method;
            $this->data = json_decode(file_get_contents("php://input"), true);
        }
        function vistaLogin(){
            match($this->method){
                "GET"=>require $_ENV[1]['dir']."/src/views/login.php",
                "POST"=>$this->acceso($this->data['correo'],$this->data['contrasena']),
            };
        }
        function acceso($correo,$Apass){
            header("Content-Type: application/json");
            $pass = $this->modelLoginObj->getPass($correo);
            if($pass[0]['status']==0){
                if(password_verify($Apass,$pass[0]['pass'])){
                    session_start();
                    $_SESSION['correo'] = $correo;
                    echo json_encode([
                        "status"=>"0",
                        "msj"=>"Contraseña correcta",
                    ]);
                }else{
                    echo json_encode([
                        "status"=>"1",
                        "msj"=>"contraseña incorrecta",
                    ]);
                }
            }else{
                echo json_encode([
                    "status"=>"2",
                    "msj"=>"Usuario no registrado",
                ]);
            }
            
        }
    }

?>