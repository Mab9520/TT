<?php
session_start();
require("../../includes/funciones.php");
verificarSesion();

 $conexion = conexion("root", "");
 echo $_SESSION['Nombre'];
 require("..//../views/headerEstu.php");

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>

<html>
<head>
<meta charset="UTF-8">
</head>
<body>

<h2>Test de Ansiedad de Beck</h2>



<form action="pregunta5.php" method="POST">
	<input type="hidden" name="Pregunta1" value=<?php echo $_POST['Pregunta1']; ?>>
	<input type="hidden" name="Pregunta2" value=<?php echo $_POST['Pregunta2']; ?>>
	<input type="hidden" name="Pregunta3" value=<?php echo $_POST['Pregunta3']; ?>>

<h4>4.- Incapaz de relajarse.</h4>
<input type="radio" name="Pregunta4" value="0">No
<input type="radio" name="Pregunta4" value="1">Leve
<input type="radio" name="Pregunta4" value="2">Moderado
<input type="radio" name="Pregunta4" value="3">Bastante

<br>
<br>
<input type="submit" value="Siguiente">

</form>
</body>
</html>