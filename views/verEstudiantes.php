<?php 
      session_start();
      require("../includes/funciones.php");
      require("../clases/Especialista.php");
      require("../clases/Estudiante.php");
      require("headerEsp.php");
      //require("../clases/pacientes.php");
      verificarSesion();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel=StyleSheet href="../css/style.css" type="text/CSS">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Registro especialista</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
               <p>Solicitudes</p> 
            </div>
            <div class="col-12">
                <p>Seleccione de la lista el estudiante del que quiera consultar los datos</p>
            </div>
            <div class="col-12 lista">
                <table>
                <ul>
                    <?php
                    require("../clases/pacientes.php");            
                    $solicitud = pacientes::solicitudes($_SESSION['id']);
                    if(count($solicitud) > 0){
                        echo "Usted tiene: ".count($solicitud) ." solicitudes";
                        foreach($solicitud as $solicitudes):?>
                            <li><a href="perfilEstudiantePublico.php?id=<?php echo $solicitudes['id'] ?>"><?php echo $solicitudes['Nombre']; echo " "; echo $solicitudes['Apellidos'];?></a></li>
                        <?php endforeach; 
                    }else{
                        echo "no hay solicitudes";
                    }
                    ?>
                </ul>
                </table>
            </div>
        </div>
    </div>
    <script src="../js/dinamica.js"></script>
    
</body>
</html>