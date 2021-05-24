<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php 
    session_start();

    require("../includes/funciones.php");
    verificarSesion();
    require("../clases/Especialista.php");
    require("../clases/pacientes.php");
    require("../views/headerEsp.php");
    
    echo $_GET['id'];
    

 
    

    ?>