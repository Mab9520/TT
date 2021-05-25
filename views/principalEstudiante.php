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
    <title>Document</title>
</head>
<body>
<div class ="encabezado">
    <?php require('headerEstu.php');?>
<div class="title">
    <h1>Bienvenido</h1>



      <h3> Bienvenido(a) <?php 
      require("../includes/funciones.php");

      session_start();
      verificarSesion();
      echo $_SESSION['Nombre']; ?></h3> 
</div>

<div class="container" >
<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
    <img src="../images/test.png" alt="Avatar" >
    <h1>Realizar test</h1>
    <p>En esta sección puedes realizar el test para permitirnos calcular tus niveles de ansiedad</p>
    </div>
    <div class="flip-card-back">
        <p>Realizar mi test de ansiedad</p>
        <a href = '../test-01/test.php'"><img src="../images/testb.png" alt="test"></a>
    </div>
  </div>
</div>

<div class="flip-card">
    <div class="flip-card-inner">
        <div class = "flip-card-front">
        <img src="../images/Actividades.png" alt="Avatar">
        <h1>Actividades</h1>
        <p>En esta sección puedes consultar las actividades  que el especialista haya cargado para ti</p>
        </div>
        <div class="flip-card-back">
        <p>Ver mis actividades</p>
        <a href = '../subir/ArchivosEstudiantes.php'"><img src="../images/actividadesb.png" alt=""></a>
        </div>
    </div>
</div>


</div>

<script src = "../js/navegacion.js"></script>
</body>
</html>
