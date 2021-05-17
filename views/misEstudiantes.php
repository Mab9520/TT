<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=StyleSheet href="../css/style.css" type="text/CSS">
    <link rel=StyleSheet href="style/responsiveCelular.css" type="text/CSS">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
    <title>Estudiantes</title>
</head>
<body>
<div class="title">
    <h1>Estudiantes con los que tiene seguimiento</h1>
    <h3> Bienvenido(a) <?php 
      session_start();
      require("../includes/funciones.php");
      require("../clases/Especialista.php");
      //require("../clases/Estudiante.php");
      require("../clases/pacientes.php");
      require("headerEsp.php");
      verificarSesion();
      echo $_SESSION['Nombre']; ?></h3> 
</div>
<div>

<div class="container">
<form action="" method = "POST">
        <table class="listaNombres">
            <thead>
                <th>Nombre de los estudiantes</th>
            </thead>
            <?php
            require("../clases/Estudiante.php");
            
            $paciente = pacientes::verPacientes($_SESSION['id']);
            foreach($paciente as $row){?>
                <tr>
                   <ul>
                        <td><li><a href="?id=<?php echo $row['id']; ?> " ><?php echo $row['Nombre']; echo " ";echo $row['Apellidos'];?></a></li></td>
                    </ul>
                    
                </tr>
            <?php
            }
            ?>
        </table>
        </form>        
        
      <?php
        if (isset($_GET['id'])) {
            // Create the query
                
                Especialista::verInfoEstudiantes();
             
        }
      ?>
</div>





</div>
<script src = "../js/navegacion.js"></script>
</body>
</html>

