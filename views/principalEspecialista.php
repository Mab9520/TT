<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel=StyleSheet href="../css/style.css" type="text/CSS">
    <link rel=StyleSheet href="style/responsiveCelular.css" type="text/CSS">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
    <title>Mi pagina principal</title>
</head>
<body>
<div class="title">
    <h1>Bienvenido</h1>
    <?php 
      require("../includes/funciones.php");

      session_start();
      verificarSesion();
      echo $_SESSION['Nombre']; ?>
   
</div>
<?php require('headerEsp.php') ?>

<div class="container" >
<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
    <img src="../images/est.png" alt="Ver estudiantes" >
    <h1>Estudiantes</h1>
    <p>En esta sección usted podrá ver a los estudiantes que ha aceptado para su seguimiento</p>
    </div>
    <div class="flip-card-back">
        <p>Consultar estudiantes</p>
        <a href = '../views/verEstudiantes.php'"><img src="../images/testb.png" alt="test"></a>
    </div>
  </div>
</div>

<div class="flip-card">
    <div class="flip-card-inner">
        <div class = "flip-card-front">
        <img src="../images/agen.png" alt="Ver agenda">
        <h1>Agenda</h1>
        <p>En esta sección usted podrá consultar su agenda de citas, editarlas o crear nuevas citas para sus estudiantes</p>
        </div>
        <div class="flip-card-back">
        <p>Consultar agenda</p>
        <a href = '../views/Agenda.php'"><img src="../images/agen.png" alt=""></a>
        </div>
    </div>
</div>


</div>
<script src="../js/navegacion.js"></script>
    <script src="../js/dinamica.js"></script>
    
</body>
</html>
<?php





?>