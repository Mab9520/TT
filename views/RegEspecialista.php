<!DOCTYPE html>
<html lang="es">
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
    <title>Registro especialista</title>
</head>
<body>
    
<div class ="encabezado">
    <a href="../index.php"><i class="fas fa-arrow-alt-circle-left"></i></a>
</div>

<div class = "title"><h1>Registro especialista</h1></div>
<div class = "content" class="texto-encima">
    <img src="../images/psico.png" alt="" class="imgFondo">
    <form method = "post" class="encima">
    <p><input class = "content_entradas" type="text"  placeholder="Nombre" name = "nombre"></p><br>
    <p><input class = "content_entradas" type="text"  placeholder="Apellidos" name = "apellidos"></p><br>
    <p><input class = "content_entradas" type="email"  placeholder="Correo Electronico" name = "correo"></p><br>
    <p> <input class = "content_entradas" type="password"  placeholder="Contraseña" name = "password"></p><br>
    <p> <input class = "content_entradas" type="number"  placeholder="Cedula profesional" name = "cedula"></p><br>
    <p> <input class = "content_entradas" type="text"  placeholder="Especialidad" name = "especialidad"></p><br>
    <p> <input class = "content_entradas" type="text"  placeholder="Sexo M/F" name = "sexo"></p><br>
    <p><input class = "botones" id="agregarTelefono" type="button" value="Agregar telefono" ></p><br>
    <p><input class = "campoTelefono" id="campoTelefono" type="tel" placeholder="Telefono" name = "telefono" ></p><br> 
    <p><input class = "botones" type="submit" name="Registrar" value="Registrar" name = "registra"></p><br>
    
    </form>
    <?php 
        require_once('../includes/autoload.php');
        $usuario = new Especialista();
        
        if($_SERVER['REQUEST_METHOD']=='POST'){  
                $insert = $usuario->registraEspecialista(
                    $_POST['nombre'], 
                    $_POST['apellidos'],
                    $_POST['correo'], 
                    $_POST['password'], 
                    $_POST['cedula'], 
                    $_POST['especialidad'], 
                    $_POST['sexo'], 
                    $_POST['telefono']);
                echo $insert;             
        }           
    ?>
    </div>
    <script src="../js/ocultaCampos.js"></script>
</body>
</html>