<html>
<head>
<meta charset="UTF-8">
</head>
<body>

<h2>Test de Ansiedad de Beck</h2>



<form action="pregunta4.php" method="POST">
	<input type="hidden" name="Pregunta1" value=<?php echo $_POST['Pregunta1']; ?>>
	<input type="hidden" name="Pregunta2" value=<?php echo $_POST['Pregunta2']; ?>>

<h4>3.- Con temblor en las piernas.</h4>
<input type="radio" name="Pregunta3" value="0">No
<input type="radio" name="Pregunta3" value="1">Leve
<input type="radio" name="Pregunta3" value="2">Moderado
<input type="radio" name="Pregunta3" value="3">Bastante

<br>
<br>
<input type="submit" value="Siguiente">

</form>
</body>
</html>