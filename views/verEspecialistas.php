<?php
require("../includes/funciones.php");

      session_start();
      verificarSesion();
    require("headerEstu.php");
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Especialistas</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12 lista">
            <table>
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
        </div>
    </div>
    <div class="col-12">
    <?php
        if (isset($_GET['id'])) {
            // Create the query
            
                Estudiante::verInfoEspecialistas();
            if (empty($row)) {
                $result = "No se encontraron resultados !!";
            }
        }    
      ?>
    </div>
</div>
</body>
</html>
<?php 
require("../clases/pacientes.php");
            if(isset($_POST['solicitar'])){
                pacientes::solicitar($_SESSION['id'], $_GET['id']);
            }
            ?>
