<?php
class Especialista {

    function registrar($datos){//registra el usuario
        $conexion = conexion("root", "");

        $consulta = $conexion->prepare("INSERT INTO especialista (Nombre, Apellidos, Correo, Contraseña, Cedula, Especialidad, Sexo, Telefono, id_rol) VALUES (:nombre, :apellidos, :correo, :pass, :cedula, :especialidad, :sexo, :telefono, 1)");
        $consulta->execute(array(
            ':nombre'=> $datos[0],
            ':apellidos'=> $datos[1],
            ':correo' => $datos[2],
            ':pass' => $datos[3],
            ':cedula' => $datos[4],
            ':especialidad' =>$datos[5],
            ':sexo' => $datos[6],
            ':telefono' => $datos[7]
        ));
    }
    function verificar($correo){  //verifica que el usuario no exista
        $conexion = conexion("root", "");

        $consulta = $conexion->prepare("SELECT * FROM especialista WHERE Correo = :correo");
        $consulta->execute(array(
            ':correo' => $correo
    ));
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    function verificarVacio($cedula){  //verifica que el usuario no exista
        $conexion = conexion("root", "");

        $consulta = $conexion->prepare("SELECT * FROM especialista WHERE Cedula = :cedula");
        $consulta->execute(array(
            ':cedula' => $cedula
    ));
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function verEstudiantes(){
        $conexion = conexion("root", "");

        $sql= "SELECT * FROM estudiante";
        $execute = $conexion->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;           
    }


    public function verInfoEstudiantes(){
        $conexion = conexion("root", "");
        
        $result ='';
        $row = null;
        $sql = "SELECT * FROM estudiante WHERE id =?";
        $execute = $conexion->prepare($sql);
        $results = $execute->execute(array($_GET['id']));
        $row = $execute->fetch();
        ?>
        <table class="informacion">
        <thead><th colspan="2"><?php echo $row['Nombre']; echo " "; echo $row['Apellidos']?></th></thead>
        <tr><td>Correo</td>
        <td><?php echo $row['Correo'];?></td></tr>
        <tr><td>Numero de telefono</td>
        <td><?php echo $row['Telefono'];?></td></tr>
        <tr><td>Instituto</td>
        <td><?php echo $row['Instituto'];?></td></tr>
        <tr ><td colspan="2"><a href="">Visualiza test de ansiedad</a></td></tr>
        <tr><td colspan="2"><a href="">Visualiza resultados del test</a></td></tr>
        <tr><td colspan="2"><a href="">Seguimiento de actividades</a></td></tr>
        <tr><td colspan="2"><input type="submit" value="Aceptar estudiante"></td></tr>
        <tr><td colspan="2"><a onclick= "location.href = 'Seguimiento.php'"><input type="submit" value="Agendar cita"></a></td></tr>
        </table>
    <?php   
    }

    function usuarioPorId($id){
        $conexion = conexion("root", "");

        $consulta = $conexion->prepare("SELECT * FROM especialista WHERE Cedula = :cedula");
        $consulta->execute(array(':cedula' => $id));
        $resultado = $consulta->fetchAll();
        return $resultado;
    }
    function editarDatos($id, $datos){
        $conexion = conexion("root", "");

        $consulta = $conexion->prepare("UPDATE especialista SET Nombre = :nombre, Apellidos = :apellidos, Contraseña = :pass, Telefono = :telefono WHERE Cedula = :cedula");
        $consulta->execute(array(
            ':nombre'=> $datos[0],
            ':apellidos'=> $datos[1],
            ':pass' => $datos[2],
            ':telefono' => $datos[3],
            ':cedula' =>$id
        ));
    }
    function closeSession(){
        session_unset();
        session_destroy();
        
    }
}


?>