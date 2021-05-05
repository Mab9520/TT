<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=StyleSheet href="../style/style.css" type="text/CSS">
    <link rel=StyleSheet href="style/responsiveCelular.css" type="text/CSS">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
    <title>Especialistas</title>
</head>
<body>
    
<div class ="encabezado">
    <nav class="navegacion" id="navegacion">
        <ul>
            <li><a href="../views/principalEstudiante.php"><i class="fal fa-home-heart"></i>Página principal</a></li>
            <li><a href="../views/resultadosTest.php"><i class="fal fa-poll-h"></i>Mis resultados del test</a></li>
            <li><a href="..views/Actividades.php"><i class="fal fa-tasks"></i>Mis actividades</a></li>
            <li><a href="../views/verEspecialistas.php"><i class="fal fa-head-side-medical"></i>Especialistas</a></li>
            <li><a href="../views/realizarTest.php"><i class="fal fa-question-circle"></i>Realizar test</a></li>
            <li><a href="../views/editarDatosEstudiante.php"><i class="fal fa-user-edit"></i>Editar datos</a></li>
            <li class="cerrarSesion"><a href="../includes/logout.php" >Cerrar sesion</a></li>
        </ul>
    </nav>

    <div class="menuNavegacion" id="menuNavegacion">
        <div class="menu">
        </div>
    </div>
</div>
<div class="title">
    <h1>Información de especialistas que pueden ayudarte</h1>
    <h3> Bienvenido(a) <?php session_start();
    echo $_SESSION['correo'] ?> </h3>
</div>

<div class="container">
<form action="" method = "POST">
        <table class="listaNombres">
            <thead>
                <th>Nombre de los especialistas</th>
            </thead>
            <?php
            require_once("../includes/autoload.php");
            $usuario = new Estudiante();
            $userts = $usuario ->verEspecialistas();
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
                $usuario = new Estudiante();
                $usuario->verInfoEspecialistas();
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

