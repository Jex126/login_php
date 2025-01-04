<?php 
session_start();
$_SESSION['correo']="";
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/login.css">
    <script defer src="../../public/js/login.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="contenedor">
        <form id="contenedor__form">
            <label class="form__item" for="correo">Correo</label>
                <input type="text" name="correo" id="correo">
            <label class="form__item" for="contrasena">Contraseña</label>
                <input type="password" name="contrasena" id="contrasena">
            <button class="form__item" type="button" onclick="login()">Log In</button>
        </form>
    </div>
</body>

</html>