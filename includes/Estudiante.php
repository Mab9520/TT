<?php
//session_start();
require_once("autoload.php");

class Estudiante extends Conexion{
    public  $nombre;
    public  $apellidos;
    public  $instituto;
    public  $correo;
    public  $password;
    public  $telefono;
    public  $conexion;

    function __construct(){
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    public function registraEstudiante($nombre, $apellidos, $instituto, $correo, $password, $telefono){
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->instituto = $instituto;
        $this->correo = $correo;
        $this->password = $password;//encriptamos la contraseña
        $this->telefono = $telefono;
        
        $errores='';

        if(empty($nombre) || empty($apellidos) || empty($instituto) || empty($correo) || empty($password)){
            ?>
                <script>
                    swal('Por favor rellena los campos');
                </script>
            <?php
            $errores.='<li class="error">Por favor rellena los campos</li>';
        }else{
            $sql = "SELECT * FROM estudiante WHERE Correo= :correo LIMIT 1";
            $vacio = $this->conexion->prepare($sql);
            $vacio -> execute([
                ':correo'=>$correo
            ]);
             $resultado = $vacio->fetch();

            if($resultado == true){
                ?>
                <script>
                    swal('Error', 'El correo que intentas ingresar ya se encuentra registrado', 'error');
                </script>
            <?php
            $errores .= '<li class = "error">Este usuario ya existe</li>';
            }
        }
        if($errores == ''){
            $sql = "INSERT INTO estudiante(Nombre, Apellidos, Instituto, Correo, Contraseña, Telefono, rol_id) VALUES (?, ?, ?, ?, ?, ?, 2)";
            $insert = $this->conexion->prepare($sql);
            $arrData = array($this->nombre, $this->apellidos, $this->instituto, $this->correo, $this->password, $this->telefono);
            $resInsert = $insert->execute($arrData); 

            ?>
                <script>
                    swal('¡Te has registrado exitosamente!', "Inicia sesion",  "success");
                </script>
            <?php 
        }
    }

    public function userExist($correo, $password){
            
            $query = $this->conexion->prepare("SELECT * FROM estudiante WHERE Correo = :correo AND Contraseña = :pass");
            $query->execute(['correo' =>$correo, 'pass'=>$password]);

            if($query->rowCount()){
                return true;
            } else{
                return false;
            }
    }
    public function setUser($correo){
        $query=$this->conexion->prepare("SELECT * FROM estudiante WHERE Correo = :correo");
        $query->execute(['correo' =>$correo]);

        foreach($query as $currentUser){
            $this->nombre = $currentUser['Nombre'];
            $this->correo = $currentUser['Correo'];
        }
    }
    public function getNombre(){
        return $this->nombre;
    }

    public function verEspecialistas(){
            $sql= "SELECT * FROM especialista";
            $execute = $this->conexion->query($sql);
            $request = $execute->fetchall(PDO::FETCH_ASSOC);
            return $request;           
    }

    public function verInfoEspecialistas(){
        $result ='';
        $row = null;
        $sql = "SELECT * FROM especialista WHERE Cedula =?";
        $execute = $this->conexion->prepare($sql);
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
        <td colspan="2"><input type="submit" value="Enviar solicitud"></td>
        </table>
    <?php   
    }

    public function editarDatos($id, $nombre, $apellidos, $instituto, $password, $telefono){
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->instituto = $instituto;
        $this->correo = $correo;
        $this->password = $password;
        $this->telefono = $telefono;

        $sql = "UPDATE  estudiante SET Nombre=?, Apellidos=?, Instituto=?, Contraseña=?, telefono=?";
        $update = $this->conexion->prepare($sql);
        $arrData = array($this->nombre, $this->apellidos, $this->instituto, $this->password, $this->telefono);
        $resExecute = $update->execute($arrData);
        return $resExecute;
    }

    public function eliminarDatos($id){
        //session_start();
        echo "hola";
        //$sql= "DELETE estudiante WHERE id=?";
        //$arrWhere= array($id);
        //$eliminar= $eliminar->execute($arrWhere);
        //return $eliminar;
    }

}
?>