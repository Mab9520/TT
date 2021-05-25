<?php
    include ("../includes/conexion.php");


    $email =$_POST['email'];
    $password = sha1($_POST['pass']);
    $res = $conexion->query("SELECT * from estudiante 
        where correo ='$email' and 
        password ='$password'  and 
        confirmado = 'si'
        ");
    $mostrar= $res->fetch();
?>
<?php
    $res1 = $conexion->query("SELECT * from especialista 
        where correo ='$email' and 
        password ='$password'  and 
        confirmado = 'si'
        ");
    $mostrar1= $res1->fetch();
?>
<?php
    if ($mostrar['identificador'] == 1) {
        echo "Soy Alumno";
    }elseif ($mostrar1['identificador'] == 2) {
        echo "Soy Especialista";
    }else {
        echo "login incorrecto";
    }
    
?>