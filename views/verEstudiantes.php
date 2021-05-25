<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=StyleSheet href="../css/style.css" type="text/CSS">
    <link rel=StyleSheet href="style/responsiveCelular.css" type="text/CSS">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
    <title>Estudiantes</title>
</head>
<body>
<div class="title">
    <h1>Información de estudiantes que quieren contactarlo</h1>
    <h3> Bienvenido(a) <?php 
      session_start();
      require("../includes/funciones.php");
      require("../clases/Especialista.php");
      require("../clases/Estudiante.php");
      require("headerEsp.php");
      //require("../clases/pacientes.php");
      verificarSesion();
      echo $_SESSION['Nombre']; ?></h3> 
</div>

<div class="container">
<h1>Solicitudes</h1>
    <h2>Seleccione de la lista el estudiante del que quiera consultar los datos</h2>
        <table class="listaNombres">
            <ul>
            <?php
            require("../clases/pacientes.php");            
            $solicitud = pacientes::solicitudes($_SESSION['id']);
            if(count($solicitud) > 0){
                echo "Usted tiene: ".count($solicitud) ." solicitudes";
                foreach($solicitud as $solicitudes):?>
                    <li><a href="perfilEstudiante.php?id=<?php echo $solicitudes['id'] ?>"><?php echo $solicitudes['Nombre']; echo " "; echo $solicitudes['Apellidos'];?></a></li>
                    <?php endforeach; 
            }else{
                echo "no hay solicitudes";
            }
            ?>
            </ul>
            
</div>

    <script src="../js/navegacion.js"></script>
    <script src="../js/dinamica.js"></script>
    
</body>
</html>