<?php
session_start();
require("../includes/funciones.php");
verificarSesion();

 $conexion = conexion("root", "");
 echo $_SESSION['Nombre'];
 require("../views/headerEstu.php");

?>
<html>
<head>
<meta charset="UTF-8">
<link rel=StyleSheet href="../css/style.css" type="text/CSS">
</head>
<body>
<h2>Test de Ansiedad de Beck</h2>

<form action="Test/pregunta2.php" method="POST">

<h4>1.- Torpe o entumecido.</h4>
<input type="radio" name="Pregunta1" value="0">No
<input type="radio" name="Pregunta1" value="1">Leve
<input type="radio" name="Pregunta1" value="2">Moderado
<input type="radio" name="Pregunta1" value="3">Bastante

<br>
<br>

<input type="submit" value="Siguiente">
</form>

</form>
    <script src="../js/navegacion.js"></script>
    <script src="../js/dinamica.js"></script>
</body>

</html>
