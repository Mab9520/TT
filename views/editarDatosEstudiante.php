<?php
session_start();
require("../includes/funciones.php");
require("../clases/Estudiante.php");
verificarSesion();

    $usuario = Estudiante::usuarioPorId($_SESSION['id']);
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=StyleSheet href="../css/style.css" type="text/CSS">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Editar mis datos</title>
</head>
<body>
<?php require('../views/headerEstu.php') ?>
<div class = "title"><h1>Editar mis datos</h1></div>
<div class = "content">
<img src="../images/est.png" alt="" class="imgFondo">
<form method = "post" class="encima">
    <p><input class = "content_entradas" type="text"  name = "nombre" value="<?php echo $usuario[0]['Nombre']; ?>" ></p><br>
    <p><input class = "content_entradas" type="text"   name ="apellidos" value="<?php echo $usuario[0]['Apellidos']; ?>"></p><br>
    <p> <input  class = "content_entradas" type="password" name = "pass" value="<?php echo $usuario[0]['Contraseña']; ?>"/></p><br>
    <p><input class = "botones" id="agregarTelefono" type="button" value="Agregar telefono"></p><br>
    <p><input class = "campoTelefono" id="campoTelefono" type="tel" name = "telefono" value="<?php echo $usuario[0]['Telefono']; ?>"></p><br> 
    <p><input class = "botones" type="submit" name="editar" value="Editar"></p><br>
    <p><input class = "botones" type="submit" name="eliminar" value="Eliminar cuenta"></p><br>

    </form>

    

</div>
<script src="../js/ocultaCampos.js"></script>
<script src="../js/navegacion.js"></script>

</body>
</html>
<?php
if(isset($_POST['editar'])){
    $datos = array(
        $_POST['nombre'],
        $_POST['apellidos'],
        $_POST['pass'],
        $_POST['telefono']           
    );
        Estudiante::editarDatos($_SESSION['id'], $datos);
        ?>
        <script>swal({
            title:  "Datos editados",
            text:"Tus datos se han editado correctamente",
            icon: "success"
            });</script>
        <?php
}else

if(isset($_POST['eliminar'])){  
    ?>
    <script>
    swal({
        title: "Eliminar cuenta?",
        text: "Una vez eliminada perderás todos tus datos",
        icon: "warning"
        }
        
        );
    </script>
    <?php
    Estudiante::eliminarDatos($_SESSION['id']);
    Estudiante::cerrarSesion();
        
        
        
}