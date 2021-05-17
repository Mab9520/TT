<?php
session_start();

require("../includes/funciones.php");
verificarSesion();
require("../clases/Especialista.php");
require("../clases/Estudiante.php");
require("../clases/pacientes.php");
require("../views/headerEsp.php");

$usuario = Estudiante::usuarioPorId($_GET['id']);
$conexion = conexion("root", "");

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
    <title>Document</title>
</head>
<body>
<div class="title">
    <h1>Consulta el perfil del estudiante</h1>
      <h3><?php 

      echo $_SESSION['Nombre']; ?></h3> 
</div>
    <div id="perfil">
    <ul>
        <li>
            <h3><?php echo $usuario[0]['Nombre']; echo " "; echo $usuario[0]['Apellidos'];?></h3>
            <ul>
                <li>Correo: <span><?php echo $usuario[0]['Correo']; ?></span></li>
                <li>Numero de telefono: <span><?php echo $usuario[0]['Telefono']; ?></span></li>
                <li>Instituto: <span><?php echo $usuario[0]['Instituto']; ?></span></li>
            </ul>
        </li>
        <form action="" method="POST">
        <li><input type="submit" value="Aceptar" name="aceptarEstudiante"></li>
        <li><input type="submit" value="Rechazar" name="rechazarEstudiante"></li></form>
        <li><h3>Visualizacion de las respuestas del test de ansiedad de Beck</h3>
        <?php 
			Especialista::verTest();
		?>
			</li>
            <li><h3>Visualizacion de los resultados del test</h3>
            <?php 
			Especialista::verResultados();
  ?>
            
            </li>
    </ul>
    
</div>
</body>
<script src = "../js/navegacion.js"></script>
</html>
