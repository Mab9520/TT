<?php 
    include "conexion.php";
    $email =$_POST['email'];


    //Se hace la verifiacion del codigo que se manda al correo
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
    if($mostrar['correo'] == isset($email)){
        include "mail_reset.php";
        $conexion->query("update estudiante set codigo = '$codigo' where correo = '$email' ");
        echo "<p>Verifica tu email para restablecer tu cuenta</p>" ;
    ?>
         <?php
    }elseif ($mostrar1['correo'] = $email){
        include "mail_reset.php";
        $conexion->query("update especialista set codigo = '$codigo' where correo = '$email' ");
        echo "<p>Verifica tu email para restablecer tu cuenta</p>" ;
    }else{
        echo "No se encontro EMAIL";
    }


    /* 
    if($enviado){
        $conexion->query(" insert into  (email, token, codigo) 
         values('$email','$token','$codigo') ") or die($conexion->error);
         echo '<p>Verifica tu email para restablecer tu cuenta</p>';
    }
   */

?>