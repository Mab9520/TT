<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=StyleSheet href="../style/style.css" type="text/CSS">
    <link rel=StyleSheet href="style/responsiveCelular.css" type="text/CSS">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
    <title>Editar mis datos</title>
</head>
<body>
<div class ="encabezado">
    <nav class="navegacion" id="navegacion">
        <ul>
            <li><a href="../views/principalEspecialista.php"><i class="fal fa-home-heart"></i>Página principal</a></li>
            <li><a href="../views/verEstudiantes.php"><i class="fal fa-head-side-medical"></i>Estudiantes</a></li>
            <li><a href="../views/AgendaCitas.php"><i class="fal fa-question-circle"></i>Agenda</a></li>
            <li><a href="../views/editarDatosEspecialista.php"><i class="fal fa-user-edit"></i>Editar datos</a></li>
            <li class="cerrarSesion"><a href="../includes/logout.php" >Cerrar sesion</a></li>
        </ul>
    </nav>

    <div class="menuNavegacion" id="menuNavegacion">
        <div class="menu">
        </div>
    </div>
</div>
<div class="title">
    <h1>Editar mis datos</h1>
</div>
    <div clas="container">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre"/ value="<?php echo $row['Nombre'];?>"><br/>
        <label for="email">Apellidos:</label>
        <input type="text" name="email" id="email" value="<?php echo $row['Apellidos'];?>"/><br/>
        <label for="telefono">Telefono:</label>
        <input type="text" name="telefono" id="telefono" value="<?php echo $row['Telefono'];?>"/><br/>
        <label for="telefono">Contraseña:</label>
        <input type="text" name="telefono" id="telefono" value="<?php echo $row['Password'];?>"/><br/>
        <input type="submit" name="update" value="Actualizar" >
        <input type="submit" name="delete" value="Eliminar">

    </div>

    
    <script src = "../js/navegacion.js"></script>
</body>
</html>