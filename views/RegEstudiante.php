<!DOCTYPE html>
<html lang="es">
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

    <title>Registro estudiante</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <a href="../index.php"><i class="fas fa-arrow-alt-circle-left"></i></a>
            </div>
            <div class="col-12 col-lg-12">
                <p>Registrate como estudiante</p>
            </div>
        </div>
            <div class="col-12 col-lg-12">
                <img class="imgFondo" src="../images/est.png" alt="">
                <div class="col-12 col-lg-12 encima">
                    <form  action="<?php echo $_SERVER['PHP_SELF'] ?>" method = "POST">
                        <p><input class = "form-control" type="text"  placeholder="Nombre" name = "nombre"></p>
                        <p><input class = "form-control" type="text"  placeholder="Apellidos" name ="apellidos"></p>
                        <p><input class = "form-control" type="text"  placeholder="Instituto" name = "instituto"></p>
                        <p><input class = "form-control" type="email"  placeholder="Correo Electronico" name = "correo"></p>
                        <p> <input class = "form-control" type="password"  placeholder="Contraseña" name = "pass"></p>
                        <p>Verifica tu contraseña</p>
                        <p> <input class = "form-control" type="password"  placeholder="Contraseña" name = "pass2"></p>
                        <p><input class = "btn" id="agregarTelefono" type="button" value="Agregar telefono"></p>
                        <p><input class = "form-control campoTelefono" id="campoTelefono" type="tel" placeholder="Telefono" name = "telefono"></p>
                        <p><input class = "btn" type="submit" value="Registrar"  name = "registrar"></p>
                            <p><a href="login.views.php">Iniciar sesion</a></p>
                        </form>
                </div> 
            </div>
        </div>
    
    
    <?php if(!empty($error)): ?>
        <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
</body>
<script src="../js/ocultaCampos.js"></script>
</html>

<?php

require("../includes/funciones.php");
require("../clases/Estudiante.php");
$error = "";
if(isset($_POST['registrar'])){
    $pass=sha1($_POST['pass']);
    $correo = $_POST['correo'];
    $confirmado = 'no';
    include "../includes/mail.php";
    $codigo = $codigoran;

    $datos = array(
        $_POST['nombre'],
        $_POST['apellidos'],
        $_POST['instituto'],
        $correo,
        $pass,
        $_POST['telefono'],
        $confirmado,
        $codigo

    );

    if(empty($_POST['nombre']) || empty($_POST['apellidos']) || empty($_POST['instituto']) || empty($_POST['correo']) || empty($_POST['pass'])){
        ?> 
        <script>swal("Completa los campos");</script>
    <?php
    } else{
        $datos = limpiarEst($datos);
            if(empty(Estudiante::verificar($datos[3]))){
                if($_POST['pass'] == $_POST['pass2'] ){
                    Estudiante::registrar($datos);?>
                <script>swal( "Te has registrado exitosamente!")</script>
                <?php
                } else {
                    ?>
                <script>swal("Las contraseñas no coinciden")</script>
                <?php
                } 
                
            }
            else{?> 
            <script>swal("Este usuario ya existe");</script>
            <?php
            }
    }
    
}
?>