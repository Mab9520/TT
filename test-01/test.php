<?php
session_start();
require("../includes/funciones.php");
verificarSesion();

 $conexion = conexion("root", "");

?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel=StyleSheet href="../css/style.css" type="text/CSS">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Item 1</title>
</head>
<body>
    <script>
        Swal.fire({
        title: 'Bienvenido al test de ansiedad de Beck!',
        text: 'Este cuestionario esta compuesto por los síntomas más comunes de la ansiedad. Lee cada uno de los ítems atentamente e indica cuanto te han afectado en la última semana incluyendo el día de hoy.',
        confirmButtonText: 'Ok'
        });
    </script>

    <div class="container encabezado">
        <div class="row">
            <div class="col-12">
                <h1>Test de Ansiedad de Beck</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Torpe o entumecido. </h2>
            </div>

            <div class="col-12 text-center">
                <form action="Test/pregunta2.php" method="POST">
                    <div class="row">
                        <div class="col-12 respuesta">
                            <input class="form-check-input" type="radio" name="Pregunta1" value="0">
                            <label class="form-check-label">No</label>
                        </div>
                        <div class="col-12  respuesta">
                            <input class="form-check-input" type="radio" name="Pregunta1" value="1"> 
                            <label class="form-check-label">Leve</label>
                        </div>
                        <div class="col-12 respuesta">
                            <input class="form-check-input" type="radio" name="Pregunta1" value="2">
                            <label class="form-check-label">Moderado</label>
                        </div>
                        <div class="col-12 respuesta">
                            <input class="form-check-input" type="radio" name="Pregunta1" value="3">
                            <label class="form-check-label">Bastante</label>
                        </div>
                    </div>
                    
                    <div class="col-6 col-lg-6 d-flex justify-content-end">
                        <input class="btn" type="submit" value="Siguiente">
                    </div>
                </form>
                <form method="POST">
                    <div class="col-6 col-lg-6 d-flex justify-content-end">
                        <input class="btn" name="cancelarTest" type="submit" id="" value="Cancelar">
                    </div>
                </form>
            </div>
        </div>
    </div>

</form>
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
                    location.href = "../views/principalEstudiante.php";
                }
            })
        </script>
        <?php
}
