<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=StyleSheet href="style/style.css" type="text/CSS">
    <link rel=StyleSheet href="style/responsiveCelular.css" type="text/CSS">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>Herramienta de apoyo al psicólogo</title>
</head>
<body>
    
    //Holaaa
    <div class="title">
        <h1>Bienvenido</h1>
        <h2>Herramienta de apoyo al psicólogo en la evaluación de la ansiedad en jóvenes universitarios.</h2> 
    </div>

<div  id="inicioSesionIndex">
    <a href="views/login.php"><input class="botones" type="submit" value="Iniciar sesión" name="iniciaSesion"></a>
    

</div>

<div class="container">
    <div class="flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front">
                <h1>Estudiante</h1> 
                <p>¿Ya estas registrado?</p> 
                <p>Inicia sesión en la herramienta</p>
                <img src="images/est.png" alt="Avatar" >
            </div>
            <div class="flip-card-back">
                <p>Registrate como estudiante para realizar tu test  de nivel  de ansiedad</p>
                <a href = 'views/RegEstudiante.php'"><img src="images/registro.png" alt=""></a>
            </div>
        </div>
    </div>

    <div class="flip-card">
        <div class="flip-card-inner">
            <div class = "flip-card-front">
                <h1>Especialista</h1>
                <p>¿Ya estás registrado? </p>
                <p>Inicia sesión en la herramienta.</p>
                <img src="images/psico.png" alt="Avatar">
            </div>
            <div class="flip-card-back">
                <p>Registrate como especialista con tu cedula profesional</p>
                <a href = 'views/RegEspecialista.php'"><img src="images/registro.png" alt=""></a>
            </div>
        </div>
    </div>
</div> 

<!--<div class="overlay" id="overlay" name='overlay'>
    <div class="popup" id="popup" name="popup">
        <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
        <div class="contenedor">
            <img src="images/ini.png" alt="" id="degradado">
            <div class=texto-encima>
                <h3>Inicia sesión</h3></div>
                <form method="post" name="iniciar_sesion" id="iniciar_sesion"> 
                    <div class="contenedor_inputs">
                        <input type="email" placeholder ="Usuario" name="correo">
                        <input type="password" placeholder ="Contraseña"  name ="pass">
                        
                    </div>
            
                    <input class="botones" type="submit" value="Iniciar sesión"  name='iniciar'>
                    <input class="botones" name = "olvide" type=button value="Olvide mi contraseña" >
                </form>
                
            </div> 
        </div>
</div>!-->


<?php
session_start();



?>
<script src="js/dinamica.js"></script>

</body>
</html>