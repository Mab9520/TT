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
    <title>Registro estudiante</title>
</head>
<body>
<div class ="encabezado">
<a href="../index.php"><i class="fas fa-arrow-alt-circle-left"></i></a>
</div>
<div class = "title"><h1>Registro estudiantes</h1></div>
<div class = "content">
<img src="../images/est.png" alt="" class="imgFondo">
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method = "POST" class="encima"><br>
    <p><input class = "content_entradas" type="text"  placeholder="Nombre" name = "nombre"></p><br>
    <p><input class = "content_entradas" type="text"  placeholder="Apellidos" name ="apellidos"></p><br>
    <p><input class = "content_entradas" type="text"  placeholder="Instituto" name = "instituto"></p><br>
    <p><input class = "content_entradas" type="email"  placeholder="Correo Electronico" name = "correo"></p><br>
    <p> <input class = "content_entradas" type="password"  placeholder="Contraseña" name = "pass"></p><br>
    <p><input class = "botones" id="agregarTelefono" type="button" value="Agregar telefono"></p><br>
    <p><input class = "campoTelefono" id="campoTelefono" type="tel" placeholder="Telefono" name = "telefono"></p><br> 
    <p><input class = "botones" type="submit" value="Registrar"  name = "registrar"></p><br>
        <p><a href="login.views.php">Iniciar sesion</a></p>
    </form>
    <?php if(!empty($error)): ?>
        <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

    

</div>
<script src="../js/ocultaCampos.js"></script>

</body>
</html>
<?php

require("../includes/funciones.php");
require("../clases/Estudiante.php");
$error = "";
if(isset($_POST['registrar'])){
    $contraseña = hash('sha512', $_POST['pass']);
    $datos = array(
        $_POST['nombre'],
        $_POST['apellidos'],
        $_POST['instituto'],
        $_POST['correo'],
        $contraseña,
        $_POST['telefono']
    );

    if(empty($_POST['nombre']) || empty($_POST['apellidos']) || empty($_POST['instituto']) || empty($_POST['correo']) || empty($_POST['pass'])){
        ?> 
        <script>swal("Completa los campos");</script>
    <?php
    } else{
        $datos = limpiarEst($datos);
            if(empty(Estudiante::verificar($datos[3]))){
                Estudiante::Registrar($datos);
                ?>
                <script>swal("OK", "Te has registrado exitosamente!")</script>
                <?php
            }
            else{?> 
            <script>swal("Este usuario ya existe");</script>
            <?php
            }
    }
    
}
?>