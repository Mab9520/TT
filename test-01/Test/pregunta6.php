<?php
session_start();
require("../../includes/funciones.php");
verificarSesion();

 $conexion = conexion("root", "");
 echo $_SESSION['Nombre'];
 require("..//../views/headerEstu.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<form action="pregunta7.php" method="POST">
	<input type="hidden" name="Pregunta1" value=<?php echo $_POST['Pregunta1']; ?>>
	<input type="hidden" name="Pregunta2" value=<?php echo $_POST['Pregunta2']; ?>>
	<input type="hidden" name="Pregunta3" value=<?php echo $_POST['Pregunta3']; ?>>
	<input type="hidden" name="Pregunta4" value=<?php echo $_POST['Pregunta4']; ?>>
	<input type="hidden" name="Pregunta5" value=<?php echo $_POST['Pregunta5']; ?>>

<h4>6.- Mareado, o que se le va la cabeza.</h4>
<input type="radio" name="Pregunta6" value="0">No
<input type="radio" name="Pregunta6" value="1">Leve
<input type="radio" name="Pregunta6" value="2">Moderado
<input type="radio" name="Pregunta6" value="3">Bastante

<br>
<br>
<input type="submit" value="Siguiente">

</form>
</body>
</html>
