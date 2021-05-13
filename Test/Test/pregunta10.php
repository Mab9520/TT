<html>
<head>
<meta charset="UTF-8">
</head>
<body>

<h2>Test de Ansiedad de Beck</h2>



<form action="pregunta11.php" method="POST">
	<input type="hidden" name="Pregunta1" value=<?php echo $_POST['Pregunta1']; ?>>
	<input type="hidden" name="Pregunta2" value=<?php echo $_POST['Pregunta2']; ?>>
	<input type="hidden" name="Pregunta3" value=<?php echo $_POST['Pregunta3']; ?>>
	<input type="hidden" name="Pregunta4" value=<?php echo $_POST['Pregunta4']; ?>>
	<input type="hidden" name="Pregunta5" value=<?php echo $_POST['Pregunta5']; ?>>
	<input type="hidden" name="Pregunta6" value=<?php echo $_POST['Pregunta6']; ?>>
	<input type="hidden" name="Pregunta7" value=<?php echo $_POST['Pregunta7']; ?>>
	<input type="hidden" name="Pregunta8" value=<?php echo $_POST['Pregunta8']; ?>>
	<input type="hidden" name="Pregunta9" value=<?php echo $_POST['Pregunta9']; ?>>

<h4>10.- Nervioso.</h4>
<input type="radio" name="Pregunta10" value="0">No
<input type="radio" name="Pregunta10" value="1">Leve
<input type="radio" name="Pregunta10" value="2">Moderado
<input type="radio" name="Pregunta10" value="3">Bastante

<br>
<br>
<input type="submit" value="Siguiente">

</form>
</body>
</html>