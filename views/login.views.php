<?php
session_start();
require("../includes/funciones.php");
require("../clases/Estudiante.php");
require("../clases/Especialista.php");

if(isset($_POST['ingresar'])){
    if($_POST['tipoUsuario'] =='Iniciar sesion como'){
        echo "Selecciona un tipo de usuario";
    }else if($_POST['tipoUsuario'] == 'Estudiante'){
        $datos = array(limpiar($_POST['usuario'], $_POST['pass']));
        if(datosVacios($datos) == false){
            $resultados = Estudiante::verificar($datos[0]);
            if(empty($resultados) == false){
                if($datos[1] == $resultados[0]['pass']){
                    $_SESSION['id'] = $resultados[0]['id'];
                    $_SESSION['Nombre'] = $resultados[0]["Nombre"];
                    header("location: principalEstudiante.php");
                }
            } 
        }
    } else if($_POST['tipoUsuario'] == 'Especialista'){
        $datos = array(limpiar($_POST['usuario'], $_POST['pass']));
        if(datosVacios($datos) == false){
            $resultados = Especialista::verificar($datos[0]);
            if(empty($resultados) == false){
                if($datos[1] == $resultados[0]['pass']){
                    $_SESSION['id'] = $resultados[0]['Cedula'];
                    $_SESSION['Nombre'] = $resultados[0]["Nombre"];
                    header("location: principalEspecialista.php");
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>login</title>
</head>
<body>
    <div class="contenedor-form">
        <h1>Ingresa a la herramienta</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="text" name="usuario" class="inputs" placeholder="Usuario"><br>
        <input type="password" name="pass" class="inputs" placeholder="Contraseña"><br>
        <select name="tipoUsuario">
                            <option value="Iniciar sesion como">Iniciar sesion como</option>
                            <option value="Especialista">Especialista</option>
                            <option value="Estudiante">Estudiante</option>
                        </select><br>
        <input type="submit" name="ingresar" value="Ingresar" class="botones">
    </form>
    </div>
    
</body>
</html>