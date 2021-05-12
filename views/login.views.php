<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Login</title>
</head>
<body>
    <div class="container">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="iniciar_sesion">
            <div class="contenedor_inputs">
            <h2>Ingresa a la herramienta</h2> 
            <input type="text" name="usuario" class="content_entradas" placeholder="Usuario"><br>
            <input type="password" name="pass" class="content_entradas" placeholder="Contraseña"><br>
            <select name="tipoUsuario">
                <option value="Iniciar sesion como">Iniciar sesion como</option>
                <option value="Especialista">Especialista</option>
                <option value="Estudiante">Estudiante</option>
                </select><br>
            <input type="submit" name="ingresar" value="Ingresar" class="botones"></div>
            <a href="../index.php">Ir al inicio</a>
            </form>
    </div>
</body>
</html>

<?php
session_start();
require("../includes/funciones.php");
require("../clases/Estudiante.php");
require("../clases/Especialista.php");

if(isset($_POST['ingresar'])){
    if($_POST['tipoUsuario'] =='Iniciar sesion como'){?>
    <script>swal("Selecciona el tipo de usuario de tu registro");</script>

<?php
        
    }else if($_POST['tipoUsuario'] == 'Estudiante'){
        //$contraseña = hash('sha512', $_POST['pass']);
        $datos = array($_POST['usuario'], $_POST['pass']);//$contraseña);

        if(datosVacios($datos) == false){
            
            if(strpos($datos[0], " ") == false){
                $resultados = Estudiante::verificar($datos[0]);

                if(empty($resultados) == false){

                    if($datos[1] == $resultados[0]['Contraseña']){
                        $_SESSION['id'] = $resultados[0]["id"];
                        $_SESSION['Nombre'] = $resultados[0]["Nombre"];
                        header("location: principalEstudiante.php");
                    }
                    else{?>
                    <script>swal("Usuario o contraseña incorrectos");</script>
                    <?php

                    }
                }
            }
        }
        
    } else if($_POST['tipoUsuario'] == 'Especialista'){
        $datos = array($_POST['usuario'], $_POST['pass']);
        if(datosVacios($datos) == false){

            if(strpos($datos[0], " ") == false){
                $resultados = Especialista::verificar($datos[0]);

                if(empty($resultados) == false){

                    if($datos[1] == $resultados[0]['Contraseña']){
                        $_SESSION['id'] = $resultados[0]["Cedula"];
                        $_SESSION['Nombre'] = $resultados[0]["Nombre"];
                        header("location: principalEspecialista.php");
                    }
                    else{?>
                    <script>swal("Usuario o contraseña incorrectos");</script>
                    <?php

                    }
                }
            }
        }
    }
}
?>