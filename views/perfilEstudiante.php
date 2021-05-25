<?php
session_start();

require("../includes/funciones.php");
verificarSesion();
require("../clases/Especialista.php");
require("../clases/Estudiante.php");
require("../clases/pacientes.php");
require("../views/headerEsp.php");

$usuario = Estudiante::usuarioPorId($_GET['id']);
//$conexion = conexion("root", "");

if(isset($_POST['aceptarEstudiante'])){
    //metodo para aceptar al estudiante
    pacientes::aceptarSolicitud($_GET['id']);

}else

if(isset($_POST['rechazarEstudiante'])){
    //metodo para rechazar solicitud
    pacientes::eliminarSolicitud($_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=StyleSheet href="../css/style.css" type="text/CSS">
    <link rel=StyleSheet href="../css/style.css" type="text/CSS">
    <title>Perfil</title>   
</head>
<body>
<div class="title">
    <h1>Consulta el perfil del estudiante</h1>
      <h3><?php 

      echo $_SESSION['Nombre']; ?></h3> 
</div>

<div class="container">
    <div id="perfil">
        <h1><?php echo $usuario[0]['Nombre']; echo " "; echo $usuario[0]['Apellidos'];?></h1>
        <h2>Correo: <span><?php echo $usuario[0]['Correo']; ?></span></h2>
        <h2>Numero de telefono: <span><?php echo $usuario[0]['Telefono']; ?></span></h2>
        <h2>Instituto: <span><?php echo $usuario[0]['Instituto']; ?></span></h2>     
        <form action="" method="POST">
        <input type="submit" value="Aceptar" name="aceptarEstudiante">
        <input type="submit" value="Rechazar" name="rechazarEstudiante"></form>
        <div>
        <a href="../subir/subirActividadEsp.php?id=<?php echo $usuario[0]['id'];?>"><input type="submit" value="Subir actividad" name="aceptarEstudiante"></a>
        <a href="seguimiento.php?id=<?php echo $usuario[0]['id'];?>"><input type="submit" value="Seguimiento" name="aceptarEstudiante">Seguimiento</a>
    </div>
    </div>

    <div class="flip-card">
        <div class="flip-card-inner">
            <div class = "flip-card-front">
                <h1>Resultados del test</h1>
                <img src="../images/test.png" alt="Avatar" >
            </div>
            <div class="flip-card-back">
            <h3>Visualizacion de los resultados del test</h3>
            <?php 
			Especialista::verResultados();
  ?>
            </div>
        </div>
    </div>
</div>

<div class="container">
<div class="flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front">
                <h1>Test de ansiedad</h1> 
                <img src="../images/test.png" alt="Avatar" >
            </div>
            <div class="flip-card-back">
            <h3>Visualizacion de las respuestas del test de ansiedad de Beck</h3>
            <?php 
			Especialista::verTest();
		?>
            </div>
        </div>
    </div>

</div>
</body>
<script src = "../js/navegacion.js"></script>
</html>
