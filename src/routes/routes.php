<?php 
require_once $_ENV[1]['dir']."/src/controllers/controllerLogin.php";
require_once $_ENV[1]['dir']."/src/controllers/controllerPrin.php";
class routeLogin{
    private $uri;
    private $method;
    private $controllerLoginObj;
    private $controllerPrinObj;
    function __construct($uri,$method)
    {
        $this->method = $method;
        $this->uri = $uri;
        $this->controllerLoginObj = new controllerLogin($method);
        $this->controllerPrinObj = new principal();
    }
    function vistaLogin(){
        match($this->uri){
            "/" => $this->controllerLoginObj->vistaLogin(),
            "/principal"=>$this->controllerPrinObj->viewPrin(),
            default => $this->controllerLoginObj->vistaLogin(),
        };
    }
}
?>