<?php
session_start();
require("../../includes/funciones.php");
verificarSesion();

 $conexion = conexion("root", "");
 $idest = $_SESSION['id'];
 echo $_SESSION['Nombre'];
 require("../../views/headerEstu.php");

 ?>
<html>
<head>
<meta charset="UTF-8">
<link rel=StyleSheet href="../../css/style.css" type="text/CSS">
</head>
<body>

<h2>Test de Ansiedad de Beck</h2>



<form action="ans.php" method="POST">
	<input type="hidden" name="Pregunta1" value=<?php echo $_POST['Pregunta1']; ?>>
	<input type="hidden" name="Pregunta2" value=<?php echo $_POST['Pregunta2']; ?>>
	<input type="hidden" name="Pregunta3" value=<?php echo $_POST['Pregunta3']; ?>>
	<input type="hidden" name="Pregunta4" value=<?php echo $_POST['Pregunta4']; ?>>
	<input type="hidden" name="Pregunta5" value=<?php echo $_POST['Pregunta5']; ?>>
	<input type="hidden" name="Pregunta6" value=<?php echo $_POST['Pregunta6']; ?>>
	<input type="hidden" name="Pregunta7" value=<?php echo $_POST['Pregunta7']; ?>>
	<input type="hidden" name="Pregunta8" value=<?php echo $_POST['Pregunta8']; ?>>
	<input type="hidden" name="Pregunta9" value=<?php echo $_POST['Pregunta9']; ?>>
	<input type="hidden" name="Pregunta10" value=<?php echo $_POST['Pregunta10']; ?>>
	<input type="hidden" name="Pregunta11" value=<?php echo $_POST['Pregunta11']; ?>>
	<input type="hidden" name="Pregunta12" value=<?php echo $_POST['Pregunta12']; ?>>
	<input type="hidden" name="Pregunta13" value=<?php echo $_POST['Pregunta13']; ?>>
	<input type="hidden" name="Pregunta14" value=<?php echo $_POST['Pregunta14']; ?>>
	<input type="hidden" name="Pregunta15" value=<?php echo $_POST['Pregunta15']; ?>>
	<input type="hidden" name="Pregunta16" value=<?php echo $_POST['Pregunta16']; ?>>
	<input type="hidden" name="Pregunta17" value=<?php echo $_POST['Pregunta17']; ?>>
	<input type="hidden" name="Pregunta18" value=<?php echo $_POST['Pregunta18']; ?>>
	<input type="hidden" name="Pregunta19" value=<?php echo $_POST['Pregunta19']; ?>>
	<input type="hidden" name="Pregunta20" value=<?php echo $_POST['Pregunta20']; ?>>

<h4>21.- Con sudores, fríos o calientes.</h4>
<input type="radio" name="Pregunta21" value="0">No
<input type="radio" name="Pregunta21" value="1">Leve
<input type="radio" name="Pregunta21" value="2">Moderado
<input type="radio" name="Pregunta21" value="3">Bastante

<br>
<br>
<input type="submit" value="Siguiente">

</form>
</body>
</html>