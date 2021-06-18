<?php 
    include ("funciones.php");
    $conexion = conexion("root", "");
    $email =$_POST['email'];
    $p1 =$_POST['p1'];
    $p2 =$_POST['p2'];

    ?>
    <?php
        $res = $conexion->query("select * from estudiante 
        where correo='$email'
        ");
        $mostrar= $res->fetch()
    ?>
    <?php
        $res1 = $conexion->query("select * from especialista 
        where correo='$email'  
        ");
        $mostrar1= $res1->fetch()
    ?>
    <?php
    if($mostrar['rol_id'] == 2){
            if($p1 == $p2){
                $p1=sha1($p1);
                $conexion->query("update estudiante set contraseña='$p1' where correo='$email' ");
                echo "CONTRASEÑA CAMBIADA  <br><br> Ya puedes <a href= ../views/login.views.php >Iniciar sesion </a>";
                
            }else{
                echo "no coinciden";
            }
    ?>
         <?php
    }elseif ($mostrar1['rol_id'] == 1){
        if($p1 == $p2){
                $p1=sha1($p1);
                $conexion->query("update especialista set contraseña = '$p1' where correo = '$email' ");
                echo "CONTRASEÑA CAMBIADA  <br><br> Ya puedes <a href= ../views/login.views.php >Iniciar sesion </a>";
                
            }else{
                echo "no coinciden";
            }
    }else{
        echo "No se encontro EMAIL";
    }





    
?>