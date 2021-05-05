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
    <title>Inicia Sesion</title>
</head>
<body>
    <h3>Inicia sesión</h3></div>
    <form method="POST" action=""> 
        <?php if(isset($errorLogin)){
            echo $errorLogin;
        } ?>
        <input type="email" placeholder ="Usuario" name="correo">
        <input type="password" placeholder ="Contraseña"  name ="pass">
        <p>Selecciona tu tipo de usuario</p>
        <select name="tipoUsuario">
            <option value="Iniciar sesion como">Iniciar sesion como</option>
            <option value="Especialista">Especialista</option>
            <option value="Estudiante">Estudiante</option>
        </select><br>
            <input class="botones" type="submit" value="Iniciar sesión"  name='iniciar'>
            <input class="botones" name = "olvide" type=button value="Olvide mi contraseña" >
    </form>

    <?php
    require("../includes/autoload.php");
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $tipoUser = $_POST['tipoUsuario'];
        if($tipoUser == "Iniciar sesion como"){
            ?>
            <script>swal("Selecciona un tipo de usuario");</script>
            <?php
            } else{
            //tipo de usuario estudiante
            if($tipoUser=="Estudiante"){
                require_once("../includes/user_session.php");
                $usuario = new Estudiante();
                $userSession = new UserSession();
                if(isset($_SESSION['correo'])){
                    echo "Hay sesion";
                    $usuario->setUser($userSession->getCurrentUser());
                    require '../views/principalEstudiante.php';
                    } else if(isset($_POST['correo']) && isset($_POST['pass'])){
                                echo "Validacion login";
                                $userForm = $_POST['correo'];
                                $passForm = $_POST['pass'];

                                if($usuario->userExist($userForm, $passForm)){
                                $userSession->setCurrentUser($userForm);
                                $usuario->setUser($userForm);
                                require '../views/principalEstudiante.php';
                                echo "usuario validado";
                                } else{
                                    //echo "nombre de usuario o contraseña incorrectos";
                                    $errorLogin = "nombre de usuario o contraseña incorrectos";
                                    include_once '../views/login.php';
                                }
                            } else {
                                echo "login";
                                include_once '../views/login.php';
                            }
            } else if($tipoUser=="Especialista"){
                        require_once("../includes/user_session.php");
                        $usuario = new Especialista();
                        $userSession = new UserSession();
                        if(isset($_SESSION['correo'])){
                            echo "Hay sesion";
                            $usuario->setUser($userSession->getCurrentUser());
                            require '../views/principalEspecialista.php';
                            } else if(isset($_POST['correo']) && isset($_POST['pass'])){
                                        //echo "Validacion login";
                                        $userForm = $_POST['correo'];
                                        $passForm = $_POST['pass'];
                                        if($usuario->userExist($userForm, $passForm)){                                    $userSession->setCurrentUser($userForm);
                                        $usuario->setUser($userForm);
                                        require '../views/principalEspecialista.php';
                                        //echo "usuario validado";
                                    } else{
                                        //echo "nombre de usuario o contraseña incorrectos";
                                        $errorLogin = "nombre de usuario o contraseña incorrectos";
                                    include_once '../views/login.php';
                                    }
                                    } else {
                                        //echo "login";
                                        include_once '../views/login.php';
                                    }
            }
        }
    }
    
?>
    


</body>
</html>


    
    
    



