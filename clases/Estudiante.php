<?php

class Estudiante{
    
    function registrar($datos){//registra el usuario
        $conexion = conexion("root", "");

        $consulta = $conexion->prepare("INSERT INTO estudiante (Nombre, Apellidos, Instituto, Correo, Contraseña, Telefono, rol_id) VALUES (:nombre, :apellidos, :instituto, :correo, :pass, :telefono, 2)");
        $consulta->execute(array(
            ':nombre'=> $datos[0],
            ':apellidos'=> $datos[1],
            ':instituto' => $datos[2],
            ':correo' => $datos[3],
            ':pass' => $datos[4],
            ':telefono' => $datos[5]
        ));
    }
    function verificar($correo){  //verifica que el usuario no exista
        $conexion = conexion("root", "");

        $consulta = $conexion->prepare("SELECT * FROM estudiante WHERE Correo = :correo");
        $consulta->execute(array(':correo' => $correo));
        $resultado = $consulta->fetchAll();
        return $resultado;
    }
    
    

    public function verEspecialistas(){
            $conexion = conexion("root", "");
    
            $sql= "SELECT * FROM especialista";
            $execute = $conexion->query($sql);
            $request = $execute->fetchall(PDO::FETCH_ASSOC);
            return $request;           
    }

    public function verInfoEspecialistas(){
        $conexion = conexion("root", "");
        $result ='';
        $row = null;
        $sql = "SELECT * FROM especialista WHERE Cedula =?";
        $execute = $conexion->prepare($sql);
        $results = $execute->execute(array($_GET['id']));
        $row = $execute->fetch();
        ?>
        <table class="informacion">
            <thead><th colspan="2"><?php echo $row['Nombre']; echo " "; echo $row['Apellidos']?></th></thead>
            <tr><td>Correo electrónico</td>
            <td><?php echo $row['Correo'];?></td></tr>
            <tr><td>Telefono</td>
            <td><?php echo $row['Telefono'];?></td></tr>
            <tr><td>Cedula profesional</td>
            <td><?php echo $row['Cedula'];?></td></tr>
            <td colspan="2"><a href="?agregar=<?php echo $_GET['Cedula']?>"><input type="submit" value="Enviar solicitud" name="solicitar"></a></td>
            </table>
        
    <?php   
    }

    function usuarioPorId($id){
        $conexion = conexion("root", "");

        $consulta = $conexion->prepare("SELECT * FROM estudiante WHERE id = :id");
        $consulta->execute(array(':id' => $id));
        $resultado = $consulta->fetchAll();
        return $resultado;
    }
    function editarDatos($id, $datos){
        $conexion = conexion("root", "");

        $consulta = $conexion->prepare("UPDATE estudiante SET Nombre = :nombre, Apellidos = :apellidos, Contraseña = :pass, Telefono = :telefono WHERE id = :id");
        $consulta->execute(array(
            ':nombre'=> $datos[0],
            ':apellidos'=> $datos[1],
            ':pass' => $datos[2],
            ':telefono' => $datos[3],
            ':id' =>$id
        ));
    }

    public function eliminarDatos($id){
        $conexion = conexion("root", "");
        $consulta = $conexion->prepare("DELETE FROM estudiante WHERE id = :id");
        $consulta->execute(array(
            ':id' =>$id
        ));
        
    }
    function cerrarSesion(){
        
        session_unset();
        session_destroy();
}


}
?>