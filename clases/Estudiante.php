<?php

class Estudiante{
    
    public static function registrar($datos){//registra el usuario
        $conexion = conexion("root", "");
        //$correo = $_POST['correo'];
        $consulta = $conexion->prepare("INSERT INTO estudiante (Nombre, Apellidos, Instituto, Correo, Contraseña, Telefono, rol_id, confirmado , codigo) VALUES (:nombre, :apellidos, :instituto, :correo, :pass, :telefono, 2, :confirmado, :codigo)");
        $consulta->execute(array(
            ':nombre'=> $datos[0],
            ':apellidos'=> $datos[1],
            ':instituto' => $datos[2],
            ':correo' => $datos[3],
            ':pass' => $datos[4],
            ':telefono' => $datos[5],
            ':confirmado' => $datos[6],
            ':codigo' => $datos[7]
        ));
    }
   public static function verificar($correo){  //verifica que el usuario no exista
        $conexion = conexion("root", "");

        $consulta = $conexion->prepare("SELECT * FROM estudiante WHERE correo = :correo");
        $consulta->execute(array(':correo' => $correo));
        $resultado = $consulta->fetchAll();
        return $resultado;
    }
    
    

    public static function verEspecialistas(){
            $conexion = conexion("root", "");
    
            $sql= "SELECT * FROM especialista";
            $execute = $conexion->query($sql);
            $request = $execute->fetchall(PDO::FETCH_ASSOC);
            return $request;           
    }

    public static function verInfoEspecialistas(){
        $conexion = conexion("root", "");
        $result ='';
        $row = null;
        $sql = "SELECT * FROM especialista WHERE Cedula =?";
        $execute = $conexion->prepare($sql);
        $results = $execute->execute(array($_GET['id']));
        $row = $execute->fetch();
        ?>
        
    <?php   
    }

    public static function usuarioPorId($id){
        $conexion = conexion("root", "");

        $consulta = $conexion->prepare("SELECT * FROM estudiante WHERE id = :id");
        $consulta->execute(array(':id' => $id));
        $resultado = $consulta->fetchAll();
        return $resultado;
    }
    public static function editarDatos($id, $datos){
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

    public static function eliminarDatos($id){
        $conexion = conexion("root", "");
        $consulta = $conexion->prepare("DELETE FROM estudiante WHERE id = :id");
        $consulta->execute(array(
            ':id' =>$id
        ));
        
    }
    public static function cerrarSesion(){
        
        session_unset();
        session_destroy();
}
    public static function completarActividad($id){
        $conexion = conexion("root", "");
        $result= $conexion->prepare("UPDATE files SET status = 1 WHERE id = :id");
        $consulta->execute(array(
            ':id' => $id   
));
    }

}
?>