<?php
class Especialista {

    public static function registrar($datos){//registra el usuario   
        $conexion = conexion("root", "");

        $correo = $_POST['correo'];
        $consulta = $conexion->prepare("INSERT INTO especialista (Nombre, Apellidos, Correo, Contraseña, Cedula, Especialidad, Sexo, Telefono, rol_id, confirmado , codigo) VALUES (:nombre, :apellidos, :correo, :pass, :cedula, :especialidad, :sexo, :telefono, 1, :confirmado, :codigo)");
        if ($consulta->execute(array(
            ':nombre'=> $datos[0],
            ':apellidos'=> $datos[1],
            ':correo' => $datos[2],
            ':pass' => $datos[3],
            ':cedula' => $datos[4],
            ':especialidad' =>$datos[5],
            ':sexo' => $datos[6],
            ':telefono' => $datos[7],
            ':confirmado' => $datos[8],
            ':codigo' => $datos[9]
        ))) {//si se registra correctamente se muestra este mensaje
            ?>
        <script>
            Swal.fire({
                title: 'Se han registrado los datos correctamente',
                text: 'Te hemos enviado un código de verificación, revisa tu correo',
                icon: 'success',
                confirmButtonText: 'Ok'
            });
        </script>
        <?php
        } else{
            //si hay error muestra este mensaje
            ?>
        <script>
            Swal.fire({
                title: 'Ha ocurrido un error en su registro, inténtelo nuevamente',
                icon: 'success',
                confirmButtonText: 'Ok'
            });
        </script>
        <?php
        }
    }
    public static function verificar($correo){  //verifica que el usuario no exista en la base de datos mediante el correo
        $conexion = conexion("root", "");

        $consulta = $conexion->prepare("SELECT * FROM especialista WHERE Correo = :correo");
        $consulta->execute(array(
            ':correo' => $correo
    ));
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public static function verificarVacio($cedula){  //verifica que el usuario no exista mediante la cedula
        $conexion = conexion("root", "");

        $consulta = $conexion->prepare("SELECT * FROM especialista WHERE Cedula = :cedula");
        $consulta->execute(array(
            ':cedula' => $cedula
    ));
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public static function verEstudiantes(){ //Muestra los estudiantes que han enviado solicitud al especialista
        $conexion = conexion("root", "");

        $sql= "SELECT * FROM estudiante";
        $execute = $conexion->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;           
    }


    public static function verInfoEstudiantes(){//Muestra la información de los estudiantes en una tabla
        $conexion = conexion("root", "");
        $result ='';
        $row = null;
        $sql = "SELECT * FROM estudiante WHERE id =?";
        $execute = $conexion->prepare($sql);
        $results = $execute->execute(array($_GET['id']));
        $row = $execute->fetch();
        ?>
        
        <table class="informacion" style=" width: 18rem; text-align:center;  border-radius: 20px;">
        <thead><th colspan="2"><?php echo $row['Nombre']; echo " "; echo $row['Apellidos']?></th></thead>
        <tr><td>Correo</td>
        <td><?php echo $row['Correo'];?></td></tr>
        <tr><td>Numero de telefono</td>
        <td><?php echo $row['Telefono'];?></td></tr>
        <tr><td>Instituto</td>
        <td><?php echo $row['Instituto'];?></td></tr>
        <tr><td colspan="2"><a href="">Seguimiento de actividades</a></td></tr>
        <tr><td colspan="2"><a href = "perfilEstudiantePrivado.php?id=<?php echo $row['id'] ?>"><input class="btn" type="submit" value="Ver Perfil"></a></td></tr>
        <tr><td colspan="2"><a onclick= "location.href = 'AgendaVista.php'"><input class="btn" type="submit" value="Agendar cita"></a></td></tr>
        </table>
    <?php   
}

public static function verTest(){//Muestra el test del estudiante
    $conexion = conexion("root", "");
    $result= $conexion->query("SELECT * from datos");

    $mostrar= $result->fetch();
     ?>

    <br>
    <table border="1" >
        <tr>
        <td>1.- Torpe o entumecido.</td>
        <td><?php if ($mostrar['pre1'] == 0){
            echo "No";
        }elseif ($mostrar['pre1'] == 1) {
            echo "Leve";
        }elseif ($mostrar['pre1'] == 2) {
            echo "Moderado";
        }elseif ($mostrar['pre1'] == 3) {
            echo "Bastante";
        }

        ?></td>
        </tr>
        <tr>
        <td>2.- Acalorado.</td>
        <td><?php if ($mostrar['pre2'] == 0){
            echo "No";
        }elseif ($mostrar['pre2'] == 1) {
            echo "Leve";
        }elseif ($mostrar['pre2'] == 2) {
            echo "Moderado";
        }elseif ($mostrar['pre2'] == 3) {
            echo "Bastante";
        }

        ?></td>
        </tr>
        <tr>
        <td>3.- Con temblor en las piernas.</td>
        <td><?php if ($mostrar['pre3'] == 0){
            echo "No";
        }elseif ($mostrar['pre3'] == 1) {
            echo "Leve";
        }elseif ($mostrar['pre3'] == 2) {
            echo "Moderado";
        }elseif ($mostrar['pre3'] == 3) {
            echo "Bastante";
        }

        ?></td>
        </tr>
        <tr>
        <td>4.- Incapaz de relajarse.</td>
        <td><?php if ($mostrar['pre4'] == 0){
            echo "No";
        }elseif ($mostrar['pre4'] == 1) {
            echo "Leve";
        }elseif ($mostrar['pre4'] == 2) {
            echo "Moderado";
        }elseif ($mostrar['pre4'] == 3) {
            echo "Bastante";
        }

        ?></td>
        </tr>
        <tr>
        <td>5.- Con temor a que ocurra lo peor.</td>
        <td><?php if ($mostrar['pre3'] == 0){
            echo "No";
        }elseif ($mostrar['pre3'] == 1) {
            echo "Leve";
        }elseif ($mostrar['pre3'] == 2) {
            echo "Moderado";
        }elseif ($mostrar['pre3'] == 3) {
            echo "Bastante";
        }

        ?></td>
        </tr>
        <tr>
        <td>6.- Mareado, o que se le va la cabeza.</td>
        <td><?php if ($mostrar['pre1'] == 0){
            echo "No";
        }elseif ($mostrar['pre1'] == 1) {
            echo "Leve";
        }elseif ($mostrar['pre1'] == 2) {
            echo "Moderado";
        }elseif ($mostrar['pre1'] == 3) {
            echo "Bastante";
        }

        ?></td>
        </tr>
        <tr>
        <td>7.- Con latidos del corazón fuertes y acelerados.</td>
        <td><?php if ($mostrar['pre1'] == 0){
            echo "No";
        }elseif ($mostrar['pre1'] == 1) {
            echo "Leve";
        }elseif ($mostrar['pre1'] == 2) {
            echo "Moderado";
        }elseif ($mostrar['pre1'] == 3) {
            echo "Bastante";
        }

        ?></td>
        </tr>
        <tr>
        <td>8.- Inestable.</td>
        <td><?php if ($mostrar['pre1'] == 0){
            echo "No";
        }elseif ($mostrar['pre1'] == 1) {
            echo "Leve";
        }elseif ($mostrar['pre1'] == 2) {
            echo "Moderado";
        }elseif ($mostrar['pre1'] == 3) {
            echo "Bastante";
        }

        ?></td>
        </tr>
        <tr>
        <td>9.- Atemorizado o asustado.</td>
        <td><?php if ($mostrar['pre1'] == 0){
            echo "No";
        }elseif ($mostrar['pre1'] == 1) {
            echo "Leve";
        }elseif ($mostrar['pre1'] == 2) {
            echo "Moderado";
        }elseif ($mostrar['pre1'] == 3) {
            echo "Bastante";
        }

        ?></td>
        </tr>
        <tr>
        <td>10.- Nervioso.</td>
        <td><?php if ($mostrar['pre1'] == 0){
            echo "No";
        }elseif ($mostrar['pre1'] == 1) {
            echo "Leve";
        }elseif ($mostrar['pre1'] == 2) {
            echo "Moderado";
        }elseif ($mostrar['pre1'] == 3) {
            echo "Bastante";
        }

        ?></td>
        </tr>

        <tr>
        <td>11.- Con sensación de bloqueo.</td>
        <td><?php if ($mostrar['pre1'] == 0){
            echo "No";
        }elseif ($mostrar['pre1'] == 1) {
            echo "Leve";
        }elseif ($mostrar['pre1'] == 2) {
            echo "Moderado";
        }elseif ($mostrar['pre1'] == 3) {
            echo "Bastante";
        }

        ?></td>
        </tr>
        <tr>
        <td>12.- Con temblores en las manos.</td>
        <td><?php if ($mostrar['pre1'] == 0){
            echo "No";
        }elseif ($mostrar['pre1'] == 1) {
            echo "Leve";
        }elseif ($mostrar['pre1'] == 2) {
            echo "Moderado";
        }elseif ($mostrar['pre1'] == 3) {
            echo "Bastante";
        }

        ?></td>
        </tr>
        <tr>
        <td>13.- Inquieto, inseguro.</td>
        <td><?php if ($mostrar['pre1'] == 0){
            echo "No";
        }elseif ($mostrar['pre1'] == 1) {
            echo "Leve";
        }elseif ($mostrar['pre1'] == 2) {
            echo "Moderado";
        }elseif ($mostrar['pre1'] == 3) {
            echo "Bastante";
        }

        ?></td>
        </tr>
        <tr>
        <td>14.- Con miedo a perder el control.</td>
        <td><?php if ($mostrar['pre1'] == 0){
            echo "No";
        }elseif ($mostrar['pre1'] == 1) {
            echo "Leve";
        }elseif ($mostrar['pre1'] == 2) {
            echo "Moderado";
        }elseif ($mostrar['pre1'] == 3) {
            echo "Bastante";
        }

        ?></td>
        </tr>
        <tr>
        <td>15.- Con sensación de ahogo.</td>
        <td><?php if ($mostrar['pre1'] == 0){
            echo "No";
        }elseif ($mostrar['pre1'] == 1) {
            echo "Leve";
        }elseif ($mostrar['pre1'] == 2) {
            echo "Moderado";
        }elseif ($mostrar['pre1'] == 3) {
            echo "Bastante";
        }

        ?></td>
        </tr>
        <tr>
        <td>16.- Con temor a morir.</td>
        <td><?php if ($mostrar['pre1'] == 0){
            echo "No";
        }elseif ($mostrar['pre1'] == 1) {
            echo "Leve";
        }elseif ($mostrar['pre1'] == 2) {
            echo "Moderado";
        }elseif ($mostrar['pre1'] == 3) {
            echo "Bastante";
        }

        ?></td>
        </tr>
        <tr>
        <td>17.- Con miedo.</td>
        <td><?php if ($mostrar['pre1'] == 0){
            echo "No";
        }elseif ($mostrar['pre1'] == 1) {
            echo "Leve";
        }elseif ($mostrar['pre1'] == 2) {
            echo "Moderado";
        }elseif ($mostrar['pre1'] == 3) {
            echo "Bastante";
        }

        ?></td>
        </tr>
        <tr>
        <td>18.- Con problemas digestivos.</td>
        <td><?php if ($mostrar['pre1'] == 0){
            echo "No";
        }elseif ($mostrar['pre1'] == 1) {
            echo "Leve";
        }elseif ($mostrar['pre1'] == 2) {
            echo "Moderado";
        }elseif ($mostrar['pre1'] == 3) {
            echo "Bastante";
        }

        ?></td>
        </tr>
        <tr>
        <td>19.- Con desvanecimientos.</td>
        <td><?php if ($mostrar['pre1'] == 0){
            echo "No";
        }elseif ($mostrar['pre1'] == 1) {
            echo "Leve";
        }elseif ($mostrar['pre1'] == 2) {
            echo "Moderado";
        }elseif ($mostrar['pre1'] == 3) {
            echo "Bastante";
        }

        ?></td>
        </tr>
        <tr>
        <td>20.- Con rubor facial.</td>
        <td><?php if ($mostrar['pre1'] == 0){
            echo "No";
        }elseif ($mostrar['pre1'] == 1) {
            echo "Leve";
        }elseif ($mostrar['pre1'] == 2) {
            echo "Moderado";
        }elseif ($mostrar['pre1'] == 3) {
            echo "Bastante";
        }

        ?></td>
        </tr>
        <tr>
        <td>21.- Con sudores, fríos o calientes.</td>
        <td><?php if ($mostrar['pre1'] == 0){
            echo "No";
        }elseif ($mostrar['pre1'] == 1) {
            echo "Leve";
        }elseif ($mostrar['pre1'] == 2) {
            echo "Moderado";
        }elseif ($mostrar['pre1'] == 3) {
            echo "Bastante";
        }

        ?></td>
        </tr>
        
        </table><?php
}
	
public static function verResultados(){//Muestra los resultados del test y los cheems
    $conexion = conexion("root", "");
    $id_estudiante = $_GET['id'];
    $result= $conexion->query("SELECT * from datos WHERE id_estudiante = '$id_estudiante'");
    $mostrar= $result->fetch();

if ($mostrar['id_estudiante'] == "") {
    echo "No se ha realizado aun el Test";
}else { 
    $puntos = $mostrar['puntos'];
    if(($puntos == 0) || ($puntos <= 21))
{
    $mensaje="Ansiedad muy baja";
    $img= "<img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTgnmpHqY8TdHNEg6qeO0ttO-kZ6mrF0jpHvG6By7LQ5h4OyLdVx9Ie_cFo__gIYp8U-PY&usqp=CAU' border='0' width='300' height='300'>";
} else if (($puntos == 4) || ($puntos <= 35))
{
    $mensaje="Ansiedad Moderada";
    $img= "<img src='https://pbs.twimg.com/media/EQ74g1wW4AEptSV.jpg' border='0' width='300' height='300'>";
} else if (($puntos == 8) || ($puntos <= 63))
{
    $mensaje="Ansiedad Severa";
    $img= "<img src='https://holatelcel.com/wp-content/uploads/2020/09/cheems-memes-3.jpg' border='0' width='300' height='300'>";

}
echo "Resultado: $puntos puntos <br> $mensaje <br><br><br> $img ";
}
}

    

    public static function usuarioPorId($id){ //busca el especialista mediante el id que jalamos de la url con un get
        $conexion = conexion("root", "");

        $consulta = $conexion->prepare("SELECT * FROM especialista WHERE Cedula = :cedula");
        $consulta->execute(array(':cedula' => $id));
        $resultado = $consulta->fetchAll();
        return $resultado;
    }
    public static function editarDatos($id, $datos){// Edita los datos 
        $conexion = conexion("root", "");

        $consulta = $conexion->prepare("UPDATE especialista SET Nombre = :nombre, Apellidos = :apellidos, Contraseña = :pass, Telefono = :telefono WHERE Cedula = :cedula");
        if($consulta->execute(array(
            ':nombre'=> $datos[0],
            ':apellidos'=> $datos[1],
            ':pass' => $datos[2],
            ':telefono' => $datos[3],
            ':cedula' =>$id
        ))){
            ?>
        <script>
            Swal.fire({
                title: 'Se han editado los datos!',
                icon: 'success',
                confirmButtonText: 'Ok'
            }).then( () =>{
                location.href = "editarDatosEspecialista.php";
            });
        </script>
        <?php
    } else{
        ?>
            <script>
        		Swal.fire({
            	title: 'No se han podido actualizar los datos, inténtelo nuevamente',
            	icon: 'error',
            	confirmButtonText: 'Aceptar'
        		});
    		</script>
            <?php
        }
    }

    public static function closeSession(){ //Cierra y destruye la sesion
        session_unset();
        session_destroy();
        
    }

    function seleccionarPaciente(){ //Creo que este no sirve xD
        $conexion = conexion("root", "");

        $sql= "SELECT * FROM estudiante";
        $execute = $conexion->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request; 
    }

    function verSeguimiento(){//Creo que este tampoco sirve :v
        $conexion = conexion("root", "");
        
        $result ='';
        $row = null;
        $sql = "SELECT * FROM";
        $execute = $conexion->prepare($sql);
        $results = $execute->execute(array($_GET['id']));
       
    }
}