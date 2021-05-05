<?php
class Especialista extends Conexion{
    public  $nombre;
    public  $apellidos;
    public  $telefono;
    public  $sexo;
    public  $correo;
    public  $password;
    public  $especialidad;
    public  $conexion;

    function __construct(){
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }
    public function registraEspecialista($nombre, $apellidos, $correo, $password, $cedula, $especialidad, $sexo, $telefono){
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->correo = $correo;
        $this->password = $password;//encriptamos la contraseña
        $this->cedula = $cedula;
        $this->especialidad = $especialidad;
        $this->sexo = $sexo;
        $this->telefono = $telefono;

        $errores='';
        
        if(empty($nombre) || empty($apellidos) || empty($correo) || empty($password) || empty($cedula) || empty($especialidad) || empty($sexo)){
            ?>
                <script>
                    swal('Por favor rellena los campos');
                </script>
            <?php
            $errores.='<li class="error">Por favor rellena los campos</li>';
        } else{
            $sql = "SELECT * FROM especialista WHERE Cedula = :cedula LIMIT 1";
            $vacio = $this->conexion->prepare($sql);
            $vacio -> execute([
                ':cedula'=>$cedula
            ]);
             $resultado = $vacio->fetch();

            if($resultado == true){
                ?>
                <script>
                    swal('Error', 'El correo o la cédula que intentas ingresar ya se encuentra registrado', 'error');
                </script>
            <?php
            $errores .= '<li class = "error">Este usuario ya existe</li>';
            }
        }
        if($errores == ''){
            $sql = "INSERT INTO especialista (Nombre, Apellidos,  Correo, Contraseña, Cedula, Especialidad, Sexo, Telefono, id_rol) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 1)";
            $insert = $this->conexion->prepare($sql);
            $arrData = array($this->nombre, $this->apellidos, $this->correo, $this->password, $this->cedula, $this->especialidad, $this->sexo, $this->telefono);
            $resInsert = $insert->execute($arrData); 

            ?>
                <script>
                    swal('¡Te has registrado exitosamente!', "Inicia sesion",  "success");
                </script>
            <?php 
        } 
    } 

    public function userExist($correo, $password){
            
        $query = $this->conexion->prepare("SELECT * FROM especialista WHERE Correo = :correo AND Contraseña = :pass");
        $query->execute(['correo' =>$correo, 'pass'=>$password]);

        if($query->rowCount()){
            return true;
        } else{
            return false;
        }
    }
    public function setUser($correo){
        $query=$this->conexion->prepare("SELECT * FROM especialista WHERE Correo = :correo");
        $query->execute(['correo' =>$correo]);

        foreach($query as $currentUser){
            $this->nombre = $currentUser['Nombre'];
            $this->correo = $currentUser['Correo'];
        }
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function verEstudiantes(){
        $sql= "SELECT * FROM estudiante";
        $execute = $this->conexion->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;           
}

    public function verInfoEstudiantes(){
        $result ='';
        $row = null;
        $sql = "SELECT * FROM estudiante WHERE id =?";
        $execute = $this->conexion->prepare($sql);
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

}


?>