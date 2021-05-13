
<?php

include("con_db.php");


		$pregunta1 = $_POST['Pregunta1'];
		$pregunta2 = $_POST['Pregunta2'];
		$pregunta3 = $_POST['Pregunta3'];
		$pregunta4 = $_POST['Pregunta4'];
		$pregunta5 = $_POST['Pregunta5'];
		$pregunta6 = $_POST['Pregunta6'];
		$pregunta7 = $_POST['Pregunta7'];
		$pregunta8 = $_POST['Pregunta8'];
		$pregunta9 = $_POST['Pregunta9'];
		$pregunta10 = $_POST['Pregunta10'];
		$pregunta11 = $_POST['Pregunta11'];
		$pregunta12 = $_POST['Pregunta12'];
		$pregunta13 = $_POST['Pregunta13'];
		$pregunta14 = $_POST['Pregunta14'];
		$pregunta15 = $_POST['Pregunta15'];
		$pregunta16 = $_POST['Pregunta16'];
		$pregunta17 = $_POST['Pregunta17'];
		$pregunta18 = $_POST['Pregunta18'];
		$pregunta19 = $_POST['Pregunta19'];
		$pregunta20 = $_POST['Pregunta20'];
		$pregunta21 = $_POST['Pregunta21'];

		$consulta = $conex->prepare("INSERT INTO datos (pre1, pre2, pre3, pre4, pre5, pre6, pre7, pre8, pre9, pre10, pre11, pre12, pre13, pre14, pre15, pre16, pre17, pre18, pre19, pre20, pre21) VALUES(:pregunta1, :pregunta2, :pregunta3, :pregunta4, :pregunta5, :pregunta6, :pregunta7, :pregunta8, :pregunta9, :pregunta10, :pregunta11, :pregunta12, :pregunta13, :pregunta14, :pregunta15, :pregunta16, :pregunta17, :pregunta18, :pregunta19, :pregunta20, :pregunta21)");

		$consulta->bindParam(':pregunta1', $pregunta1);
		$consulta->bindParam(':pregunta2', $pregunta2);
		$consulta->bindParam(':pregunta3', $pregunta3);
		$consulta->bindParam(':pregunta4', $pregunta4);
		$consulta->bindParam(':pregunta5', $pregunta5);
		$consulta->bindParam(':pregunta6', $pregunta6);
		$consulta->bindParam(':pregunta7', $pregunta7);
		$consulta->bindParam(':pregunta8', $pregunta8);
		$consulta->bindParam(':pregunta9', $pregunta9);
		$consulta->bindParam(':pregunta10', $pregunta10);
		$consulta->bindParam(':pregunta11', $pregunta11);
		$consulta->bindParam(':pregunta12', $pregunta12);
		$consulta->bindParam(':pregunta13', $pregunta13);
		$consulta->bindParam(':pregunta14', $pregunta14);
		$consulta->bindParam(':pregunta15', $pregunta15);
		$consulta->bindParam(':pregunta16', $pregunta16);
		$consulta->bindParam(':pregunta17', $pregunta17);
		$consulta->bindParam(':pregunta18', $pregunta18);
		$consulta->bindParam(':pregunta19', $pregunta19);
		$consulta->bindParam(':pregunta20', $pregunta20);
		$consulta->bindParam(':pregunta21', $pregunta21);

		if ($consulta->execute()){
			echo "Datos Guardados Correctamente....<br>";
		}else{
			echo "No se ha podido Guardar Datos...";
		}

		
		$mensaje = "";
		
		$puntos = 0;

	if($pregunta1 == "0")
	{
		$puntos = $puntos + 0;
	}
	if($pregunta1 == "1")
	{
		$puntos = $puntos + 1;
	}
	if($pregunta1 == "2")
	{
		$puntos = $puntos + 2;
	}
	if($pregunta1 == "3")
	{
		$puntos = $puntos + 3;
	}
	
	if($pregunta2 == "0")
	{
		$puntos = $puntos + 0;
	}
	if($pregunta2 == "1")
	{
		$puntos = $puntos + 1;
	}
	if($pregunta2 == "2")
	{
		$puntos = $puntos + 2;
	}
	if($pregunta2 == "3")
	{
		$puntos = $puntos + 3;
	}


	if($pregunta3 == "0")
	{
		$puntos = $puntos + 0;
	}
	if($pregunta3 == "1")
	{
		$puntos = $puntos + 1;
	}
	if($pregunta3 == "2")
	{
		$puntos = $puntos + 2;
	}
	if($pregunta3 == "3")
	{
		$puntos = $puntos + 3;
	}

	if($pregunta4 == "0")
	{
		$puntos = $puntos + 0;
	}
	if($pregunta4 == "1")
	{
		$puntos = $puntos + 1;
	}
	if($pregunta4 == "2")
	{
		$puntos = $puntos + 2;
	}
	if($pregunta4 == "3")
	{
		$puntos = $puntos + 3;
	}

	if($pregunta5 == "0")
	{
		$puntos = $puntos + 0;
	}
	if($pregunta5 == "1")
	{
		$puntos = $puntos + 1;
	}
	if($pregunta5 == "2")
	{
		$puntos = $puntos + 2;
	}
	if($pregunta5 == "3")
	{
		$puntos = $puntos + 3;
	}

	if($pregunta6 == "0")
	{
		$puntos = $puntos + 0;
	}
	if($pregunta6 == "1")
	{
		$puntos = $puntos + 1;
	}
	if($pregunta6 == "2")
	{
		$puntos = $puntos + 2;
	}
	if($pregunta6 == "3")
	{
		$puntos = $puntos + 3;
	}

	if($pregunta7 == "0")
	{
		$puntos = $puntos + 0;
	}
	if($pregunta7 == "1")
	{
		$puntos = $puntos + 1;
	}
	if($pregunta7 == "2")
	{
		$puntos = $puntos + 2;
	}
	if($pregunta7 == "3")
	{
		$puntos = $puntos + 3;
	}

	if($pregunta8 == "0")
	{
		$puntos = $puntos + 0;
	}
	if($pregunta8 == "1")
	{
		$puntos = $puntos + 1;
	}
	if($pregunta8 == "2")
	{
		$puntos = $puntos + 2;
	}
	if($pregunta8 == "3")
	{
		$puntos = $puntos + 3;
	}

	if($pregunta9 == "0")
	{
		$puntos = $puntos + 0;
	}
	if($pregunta9 == "1")
	{
		$puntos = $puntos + 1;
	}
	if($pregunta9 == "2")
	{
		$puntos = $puntos + 2;
	}
	if($pregunta9 == "3")
	{
		$puntos = $puntos + 3;
	}

	if($pregunta10 == "0")
	{
		$puntos = $puntos + 0;
	}
	if($pregunta10 == "1")
	{
		$puntos = $puntos + 1;
	}
	if($pregunta10 == "2")
	{
		$puntos = $puntos + 2;
	}
	if($pregunta10 == "3")
	{
		$puntos = $puntos + 3;
	}

	if($pregunta11 == "0")
	{
		$puntos = $puntos + 0;
	}
	if($pregunta11 == "1")
	{
		$puntos = $puntos + 1;
	}
	if($pregunta11 == "2")
	{
		$puntos = $puntos + 2;
	}
	if($pregunta11 == "3")
	{
		$puntos = $puntos + 3;
	}


	if($pregunta12 == "0")
	{
		$puntos = $puntos + 0;
	}
	if($pregunta12 == "1")
	{
		$puntos = $puntos + 1;
	}
	if($pregunta12 == "2")
	{
		$puntos = $puntos + 2;
	}
	if($pregunta12 == "3")
	{
		$puntos = $puntos + 3;
	}

	if($pregunta13 == "0")
	{
		$puntos = $puntos + 0;
	}
	if($pregunta13 == "1")
	{
		$puntos = $puntos + 1;
	}
	if($pregunta13 == "2")
	{
		$puntos = $puntos + 2;
	}
	if($pregunta13 == "3")
	{
		$puntos = $puntos + 3;
	}

	if($pregunta14 == "0")
	{
		$puntos = $puntos + 0;
	}
	if($pregunta14 == "1")
	{
		$puntos = $puntos + 1;
	}
	if($pregunta14 == "2")
	{
		$puntos = $puntos + 2;
	}
	if($pregunta14 == "3")
	{
		$puntos = $puntos + 3;
	}

	if($pregunta15 == "0")
	{
		$puntos = $puntos + 0;
	}
	if($pregunta15 == "1")
	{
		$puntos = $puntos + 1;
	}
	if($pregunta15 == "2")
	{
		$puntos = $puntos + 2;
	}
	if($pregunta15 == "3")
	{
		$puntos = $puntos + 3;
	}

	if($pregunta16 == "0")
	{
		$puntos = $puntos + 0;
	}
	if($pregunta16 == "1")
	{
		$puntos = $puntos + 1;
	}
	if($pregunta16 == "2")
	{
		$puntos = $puntos + 2;
	}
	if($pregunta16 == "3")
	{
		$puntos = $puntos + 3;
	}

	if($pregunta17 == "0")
	{
		$puntos = $puntos + 0;
	}
	if($pregunta17 == "1")
	{
		$puntos = $puntos + 1;
	}
	if($pregunta17 == "2")
	{
		$puntos = $puntos + 2;
	}
	if($pregunta17 == "3")
	{
		$puntos = $puntos + 3;
	}

	if($pregunta18 == "0")
	{
		$puntos = $puntos + 0;
	}
	if($pregunta18 == "1")
	{
		$puntos = $puntos + 1;
	}
	if($pregunta18 == "2")
	{
		$puntos = $puntos + 2;
	}
	if($pregunta18 == "3")
	{
		$puntos = $puntos + 3;
	}

	if($pregunta19 == "0")
	{
		$puntos = $puntos + 0;
	}
	if($pregunta19 == "1")
	{
		$puntos = $puntos + 1;
	}
	if($pregunta19 == "2")
	{
		$puntos = $puntos + 2;
	}
	if($pregunta19 == "3")
	{
		$puntos = $puntos + 3;
	}

	if($pregunta20 == "0")
	{
		$puntos = $puntos + 0;
	}
	if($pregunta20 == "1")
	{
		$puntos = $puntos + 1;
	}
	if($pregunta20 == "2")
	{
		$puntos = $puntos + 2;
	}
	if($pregunta20 == "3")
	{
		$puntos = $puntos + 3;
	}

	if($pregunta21 == "0")
	{
		$puntos = $puntos + 0;
	}
	if($pregunta21 == "1")
	{
		$puntos = $puntos + 1;
	}
	if($pregunta21 == "2")
	{
		$puntos = $puntos + 2;
	}
	if($pregunta21 == "3")
	{
		$puntos = $puntos + 3;
	}



	if(($puntos == 0) || ($puntos <= 21))
	{
		$mensaje="Ansiedad muy baja";
	} else if (($puntos == 22) || ($puntos <= 35))
	{
		$mensaje="Ansiedad Moderada";
	} else if (($puntos == 36) || ($puntos <= 63))
	{
		$mensaje="Ansiedad Severa";
	}
	echo "Resultado: $puntos puntos <br> $mensaje <br>";
	
?>














