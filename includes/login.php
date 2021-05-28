<?php
    session_start();
    include ("conexion.php");

    $email =$_POST['email'];
    $password =sha1($_POST['pass']);

    $res = $conexion->query("select * from estudiante 
        where correo ='$email' and 
        contraseña ='$password'  and 
        confirmado = 'si'
        ");
    $mostrar = $res->fetch()
?>
<?php
    $res1 = $conexion->query("select * from especialista 
        where correo ='$email' and 
        contraseña ='$password'  and 
        confirmado = 'si'
        ");
    $mostrar1 = $res1->fetch()
?>
<?php
    if ($mostrar['rol_id'] == 2) {
        $_SESSION['id'] = $mostrar['id'];;
        $_SESSION['Nombre'] = $mostrar['Nombre'];
        header("location: http://localhost/tt/views/principalEstudiante.php");
    }elseif ($mostrar1['rol_id'] == 1) {
        $_SESSION['id'] = $mostrar1['Cedula'];
        $_SESSION['Nombre'] = $mostrar1['Nombre'];
        header("location: http://localhost/tt/views/principalEspecialista.php");
    }else {
        echo "login incorrecto";
    }
    
?>