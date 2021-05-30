<?php
session_start();
require("../includes/funciones.php");
require("../clases/Estudiante.php");
verificarSesion();
require('headerEstu.php');
    $usuario = Estudiante::usuarioPorId($_SESSION['id']);
    

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
    <title>Editar mis datos</title>
</head>

<body>
<div class="container text-center">

    <div class="row">
            <div class="col-12 col-lg-12">
                <p>Editar mis datos</p>
            </div>
        </div>
            <div class="col-12 col-lg-12">
                <img class="imgFondo" src="../images/est.png" alt="">
                <div class="col-12 col-lg-12 encima">
                    <form method = "post">
                        <p><input class = "form-control" type="text"  name = "nombre" value="<?php echo $usuario[0]['Nombre']; ?>" ></p>
                        <p><input class = "form-control" type="text"   name ="apellidos" value="<?php echo $usuario[0]['Apellidos']; ?>"></p>
                        <p> <input  placeholder="Contraseña" class = "form-control" type="password" name = "pass" value=""/></p><br>
                        <p><input class = "btn" id="agregarTelefono" type="button" value="Agregar telefono"></p>
                        <p><input class = "form-control campoTelefono" id="campoTelefono" type="tel" name = "telefono" value="<?php echo $usuario[0]['Telefono']; ?>"></p>
                        <p><input class = "btn" type="submit" name="editar" value="Editar"></p>
                        <p><input class = "btn" type="submit" name="eliminar" value="Eliminar cuenta"></p>
                    
                        </form>
                </div> 
            </div>
        </>
    
    
    <?php if(!empty($error)): ?>
        <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
</body>
</html>
<?php

if(isset($_POST['editar'])){
    $pass=sha1($_POST['pass']);
    $datos = array(
        $_POST['nombre'],
        $_POST['apellidos'],
        $pass,
        $_POST['telefono']           
    );
        Estudiante::editarDatos($_SESSION['id'], $datos);
    }else

    if(isset($_POST['eliminar'])){  
    ?>
    <script>
        Swal.fire({
            title: '“Ha seleccionado eliminar su cuenta, ¿Está seguro?”',
            icon: 'warning',
            confirmButtonText: 'ok'
        }).then( () =>{
            location.href = "../index.php";
        });
    </script>
    <?php
    Estudiante::eliminarDatos($_SESSION['id']);
    Estudiante::cerrarSesion();
        
        
        
}