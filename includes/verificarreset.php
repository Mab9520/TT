<?php 
    include ("funciones.php");
    $conexion = conexion("root", "");
    $email =$_POST['email'];
    $codigo =$_POST['codigo'];

    ?>
    <?php
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
    $correcto=false;
    if($mostrar['rol_id'] == 2){
        $correcto=true;
    ?>
         <?php
    }elseif ($mostrar1['rol_id'] == 1){
        $correcto=true;
    }else{
        $correcto=false;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar password </title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row justify-content-md-center" style="margin-top:15%">
            <?php if($correcto){ ?>
                <form class="col-3" action="cambiarpassword.php" method="POST">
                    <h2>Restablecer Password</h2>
                    <div class="mb-3">
                        <label for="c" class="form-label">Nuevo Password</label>
                        <input type="password" class="form-control" id="c" name="p1">
                    
                    </div>
                    <div class="mb-3">
                        <label for="c" class="form-label">Confirmar Password</label>
                        <input type="password" class="form-control" id="c" name="p2">
                        <input type="hidden" class="form-control" id="c" name="email" value="<?php echo $email?>">

                    </div>
                
                    <button type="submit" class="btn btn-primary">Cambiar</button>
                </form>
            <?php }else{ ?>
                <div class="alert alert-danger" >Código incorrecto</div>
            <?php } ?>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>