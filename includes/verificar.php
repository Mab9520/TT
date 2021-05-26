<?php
    include ("conexion.php");

    $email =$_POST['email'];
    $codigo =$_POST['codigo'];

        $res = $conexion->query("select * from estudiante 
        where correo='$email' 
        and codigo='$codigo' 
        ");
        $mostrar= $res->fetch()
?>      
<?php
        $res1 = $conexion->query("select * from especialista 
        where correo='$email' 
        and codigo='$codigo' 
        ");
        $mostrar1= $res1->fetch()
?>
<?php 
    if( $mostrar['rol_id'] == 2){
        $conexion->query("update estudiante set confirmado = 'si' where correo = '$email' ");
        echo "TODO CORRECTO  <br><br> Ya puedes <a href= ../views/login.views.php >Iniciar sesion </a>";
    }elseif ($mostrar1['rol_id'] == 1) {
        $conexion->query("update especialista set confirmado = 'si' where correo = '$email' ");
        echo "TODO CORRECTO  <br><br> Ya puedes <a href= ../views/login.views.php >Iniciar sesion </a>";
    }else{
        echo "codigo invalido";
    }
?>