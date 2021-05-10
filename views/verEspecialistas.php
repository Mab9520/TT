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
    <title>Especialistas</title>
</head>
<body>
    

<div class="title">
    <h1>Información de especialistas que pueden ayudarte</h1>
    <h3> Bienvenido(a) <?php 
      require("../includes/funciones.php");

      session_start();
      verificarSesion();
      echo $_SESSION['Nombre']; ?></h3> 
</div>

<div class="container">
<form action="" method = "POST">
        <table class="listaNombres">
            <thead>
                <th>Nombre de los especialistas</th>
            </thead>
            <?php
            require("../clases/Estudiante.php");
            
            $userts = Estudiante::verEspecialistas();
            foreach($userts as $row){?>
                <tr>
                   <ul>
                        <td><li><a href="?id=<?php echo $row['Cedula']; ?> " ><?php echo $row['Nombre']; echo " ";echo $row['Apellidos'];?></a></li></td>
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
                
                Estudiante::verInfoEspecialistas();
            if (empty($row)) {
                $result = "No se encontraron resultados !!";
            }else{
                ?>    
          
            <?php
            }
        }    

      ?>
</div>

    <script src="../js/navegacion.js"></script>
    <script src="../js/dinamica.js"></script>
</body>
</html>

