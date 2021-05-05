<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=StyleSheet href="../style/style.css" type="text/CSS">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Editar mis datos</title>
</head>
<body>
<div class ="encabezado">
<a href="../index.php"><i class="fas fa-arrow-alt-circle-left"></i></a>
</div>
<div class = "title"><h1>Editar mis datos</h1></div>
<div class = "content">
<img src="../images/est.png" alt="" class="imgFondo">
<form method = "post" class="encima">
    <p><input class = "content_entradas" type="text"  placeholder="Nombre" name = "nombre"></p><br>
    <p><input class = "content_entradas" type="text"  placeholder="Apellidos" name ="apellidos"></p><br>
    <p><input class = "content_entradas" type="text"  placeholder="Instituto" name = "instituto"></p><br>
    <p><input class = "content_entradas" type="email"  placeholder="Correo Electronico" name = "correo" disabled="disabled"></p><br>
    <p> <input  class = "content_entradas" type="password"  placeholder="Contraseña" name = "password"/></p><br>
    <p><input class = "botones" id="agregarTelefono" type="button" value="Agregar telefono"></p><br>
    <p><input class = "campoTelefono" id="campoTelefono" type="tel" placeholder="Telefono" name = "telefono"></p><br> 
    <p><input class = "botones" type="submit" name="editar" value="Editar"></p><br>
    <p><input class = "botones" type="submit" name="elimina" value="Eliminar cuenta"></p><br>

    </form>

    <?php 
        require_once('../includes/autoload.php'); 
        session_start();
        $usuario = new Estudiante();
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if(isset($_POST['editar'])){
                //editar datos cuenta
                echo "Editar datos";?>

                <script>swal("Desea editar sus datos?");</script>

                <?php
            } else if(isset($_POST['editar'])){
                //método de eliminar datos
                echo "Eliminar cuenta";?>
                <script>swal("Desea editar sus datos?");</script>

<?php
            }
        }  
              
    ?>

</div>
<script src="../js/ocultaCampos.js"></script>

</body>
</html>