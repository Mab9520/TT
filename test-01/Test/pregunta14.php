<?php
session_start();
require("../../includes/funciones.php");
verificarSesion();

 $conexion = conexion("root", "");
?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel=StyleSheet href="../../css/style.css" type="text/CSS">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>
<body>
    <div class="container text-center">
        <div class="row">
            <div class="col-12">
                <h2>Test de Ansiedad de Beck</h2>
            </div>
            <div class="col-12">
                <h1>14.- Con miedo a perder el control.</h1>
            </div>

            <div class="col-12">
                <form action="pregunta15.php" method="POST">
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
                    <div class="row">
                        <div class="col-12 col-lg-6 respuesta">
                            <input type="radio" name="Pregunta14" value="0">No
                        </div>
                        <div class="col-12 col-lg-6 respuesta">
                            <input type="radio" name="Pregunta14" value="1">Leve 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6 respuesta">
                            <input type="radio" name="Pregunta14" value="2">Moderado
                        </div>
                        <div class="col-12 col-lg-6 respuesta">
                            <input type="radio" name="Pregunta14" value="3">Bastante
                        </div>
                    </div>
                    <div class="col-12">
                        <input class="btn" type="submit" value="Siguiente">
                    </div>
                </form>
                <form method="POST">
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
                    <div class="col-12 col-lg-6">
                        <input class="btn" name="cancelarTest" type="submit" id="" value="Cancelar"> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php

if(isset($_POST['cancelarTest'])){?>
        <script>
            Swal.fire({
                title: 'Deseas cancelar tu test?',
                showCancelButton: true,
                icon: 'warning',
                text:'Si cancelas el test se perderán todas tus respuestas',
                confirmButtonText: `Ok`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    location.href = "../../views/principalEstudiante.php";
                }
            })
        </script>
        <?php
}

