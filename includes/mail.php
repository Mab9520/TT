<?php
// Varios destinatarios
$para  = $correo . ', '; // atención a la coma
//$para = 'wez@example.com' . ', ';

// título
$título = 'Gracias por registrarte';

//aleatoria
$codigo = rand(1000,9999);

// mensaje
$mensaje = '
<html>
<head>
    <meta charset="UTF8" />
  <title>Gracias por registrarte</title>
</head>
<body>
  <p>tu codigo de verificacion es :!</p>
  <p> <a 
     href="http://localhost/ttmain/views/registro/confirm.php?email='.$correo.'">

    Verificar cuenta </a> 
    </p>
 <h2>'.$codigo.'</h2>
  
</body>
</html>
';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
$cabeceras .= 'To: ' .$correo . "\r\n";
$cabeceras .= 'From: Verificar Correo <verificacorreo@example.com>' . "\r\n";
$cabeceras .= 'Cc: verificacorreoarchive@example.com' . "\r\n";
$cabeceras .= 'Bcc: verificacorreocheck@example.com' . "\r\n";

// Enviarlo
$enviado=false;
if(mail($para, $título, $mensaje, $cabeceras)){
   $enviado=true;
}




?>