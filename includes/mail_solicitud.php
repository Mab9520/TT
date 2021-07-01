<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$estudiante=$_SESSION['Nombre'];
$correo=$row['Correo'];

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'herramientaapoyoalpsicologo@gmail.com
';                     //SMTP username
    $mail->Password   = 'herramientaapoyo';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('herramientaapoyoalpsicologo@gmail.com', 'Herramienta Apoyo al Psicologo
');
    $mail->addAddress($correo);     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Has recibido una nueva solicitud';
    $mail->Body    = '<html>
<head>
    <meta charset="UTF8" />
    <link rel=StyleSheet href="../css/style.css" type="text/CSS">
  <title>Nueva Solicitud</title>
</head>
<body>
<h1>  El estudiante '.$estudiante.'  </h1>
  <p>Te ha enviado una solicitud.</p>
  <p> <a 
     href="https://82820e037cd9.ngrok.io/TT/views/verEstudiantes.php">

    Aceptar Estudiante</a> 
    </p>
 <h2></h2>
  
</body>
</html>';

$mail->send();
    
} catch (Exception $e) {
    
}
?>