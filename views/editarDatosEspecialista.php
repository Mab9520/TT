<?php
session_start();
require("../includes/funciones.php");
require("../clases/Especialista.php");
require("headerEsp.php");
verificarSesion();

    $usuario = Especialista::usuarioPorId($_SESSION['cedula']);
    if(isset($_POST['editar'])){
        $datos = array(
            $_POST['nombre'],
            $_POST['apellidos'],
            sha1($_POST['pass']),
            $_POST['telefono']           
        );
            Especialista::editarDatos($_SESSION['cedula'], $datos);
            ?>
            <script>swal("Datos editados correctamente");</script>
            <?php
            
    } 

?>

<!DOCTYPE html>
<html lang="es">
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
    <title>Registro especialista</title>
</head>
<body>
    

<div class = "title"><h1>Registro especialista</h1></div>
<div class = "content" class="texto-encima">
    <img src="../images/psico.png" alt="" class="imgFondo">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method = "POST" class="encima" >
    <p><input class = "content_entradas" type="text" name = "nombre"  value="<?php echo $usuario[0]['Nombre']; ?>"></p><br>
    <p><input class = "content_entradas" type="text" name = "apellidos"  value="<?php echo $usuario[0]['Apellidos']; ?>"></p><br>
    <p> <input class = "content_entradas" type="password" name = "pass"  value=""></p><br>
    <p><input class = "botones" id="agregarTelefono" type="button" value="Agregar telefono" ></p><br>
    <p><input class = "campoTelefono" id="campoTelefono" type="tel" name = "telefono"  value="<?php echo $usuario[0]['Telefono']; ?>"></p><br> 
    <p><input class = "botones" type="submit" value="Editar" name = "editar"></p><br>
    <p><a href="principalEspecialista.php">Regresar al inicio</a></p>
    </form>
    <?php if(!empty($error)): ?>
        <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
    </div>
    <script src="../js/ocultaCampos.js"></script>
    <script src="../js/navegacion.js"></script>

</body>
</html>
