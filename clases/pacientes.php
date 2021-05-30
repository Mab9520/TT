<?php

class Pacientes{
    //Funcion que nos permite agregar amigos
    public static function solicitar($est_enviador, $esp_receptor){

        $conexion = conexion("root", ""); //conexion de bd
        $consulta = $conexion->prepare("INSERT INTO pacientes
        (id/*id del paciente*/, 
        est_enviador, 
        esp_receptor, 
        status, 
        solicitud) 
        VALUES 
        (null, 
        :est_enviador, 
        :esp_receptor, 
        :status /*indica cuando se ha aceptado una solicitud*/, 
        :solicitud/*indica cuando se ha enviado una solicitud*/)");
        if($consulta->execute(array(
                       ':est_enviador' => $est_enviador,
                       ':esp_receptor' => $esp_receptor,
                       ':status' => '',
                       ':solicitud' => 1      
        ))){
            ?>
            <script>
                Swal.fire({
                    title: 'Se ha enviado la solicitud!',
                    icon: 'success',
                    text: 'Espera a recibir una notificación para saber si el especialista te acepta',
                    confirmButtonText: 'Ok'
                }).then( () =>{
                    location.href = "principalEstudiante.php";
                });
            </script>
    <?php
                }
                else{
                    ?>
                    <script>
                        Swal.fire({
                            title: 'No se ha podido enviar la solicitud',
                            icon: 'error',
                            text: 'Intentalo nuevamente',
                            confirmButtonText: 'Ok'
                        });
                    </script>
            <?php
    
                }

    }
//verificar si un amigo es amigo de otro
    public static function verificar($est_enviador, $esp_receptor){
        $conexion = conexion("root", "");
        $consulta = $conexion->prepare("SELECT * FROM pacientes WHERE (est_enviador = :est_enviador AND esp_receptor = :esp_receptor) OR (est_enviador = :esp_receptor AND est_receptor = :est_enviador)");
        $consulta->execute(array(
                       ':est_enviador' => $est_enviador,
                       ':esp_receptor' => $esp_receptor
                            
        ));

        $resultados = $consulta->fetchAll();
        return $resultados;
    }
//obtenemos los pacientes de un especialista
    public static function codPacientes($cedula){//id del usuario del que queremos obtener los amigos
        $conexion = conexion("root", "");
        $consulta = $conexion->prepare("SELECT group_concat(est_enviador, ',' , esp_receptor) AS pacientes FROM pacientes WHERE (est_enviador = :id or esp_receptor = :Cedula) AND status = 1 ");
        $consulta->execute(array(
                       ':Cedula' => $cedula   
        ));

        $resultados = $consulta->fetchAll();
        return $resultados;
    }
//muestra las solicitudes del usuario logeado
    public static function solicitudes($cedula){//codigo del usuario del que veremos las solicitudes
        $conexion = conexion("root", "");
        $consulta = $conexion->prepare("SELECT E.id, E.Nombre, E.Apellidos, P.est_enviador from estudiante E INNER JOIN pacientes P on E.id = P.est_enviador WHERE P.esp_receptor = :Cedula and status != 1");
        $consulta->execute(array(
                       ':Cedula' => $cedula   
        ));

        $resultados = $consulta->fetchAll();
        return $resultados;
        
    }

    public static function aceptarSolicitud($id){ //Acepta la solicitud del estudiante y coloca el status en 1 como aceptado, muestra el mensaje del script
        $conexion = conexion("root", "");
        $consulta = $conexion->prepare("UPDATE pacientes SET status = 1 WHERE est_enviador = :id");
        if($consulta->execute(array(
                       ':id' => $id   
        ))){
            ?>
        <script>
            Swal.fire({
                title: 'Se ha aceptado al estudiante!',
                icon: 'success',
                confirmButtonText: 'Ok'
            }).then( () =>{
                location.href = "misEstudiantes.php";
            });
        </script>
    <?php
        }
    }
    
    public static function eliminarSolicitud($id){ //Rechaza la solicitud del estudiante y la elimina de la base de datos, muestra el mensaje del script
        $conexion = conexion("root", "");
        $consulta = $conexion->prepare("DELETE FROM pacientes WHERE est_enviador = :id");
        if($consulta->execute(array(
                       ':id' => $id   
        ))){
            ?>
        <script>
            Swal.fire({
                title: 'Se ha rechazado la solicitud!',
                icon: 'success',
                confirmButtonText: 'Ok'
            }).then( () =>{
                location.href = "verEstudiantes.php";
            });
        </script>
    <?php
        } 
    }

    public static function cantidadPacientes($cedula){//hace un conteo de los estudiantes aceptados
        $conexion = conexion("root", "");
        $consulta = $conexion->prepare("SELECT count(*) FROM pacientes WHERE (est_enviador = :id or esp_receptor = :Cedula) AND status = 1 ");
        $consulta->execute(array(
                       ':Cedula' => $cedula   
        ));

        $resultados = $consulta->fetchAll();
        return $resultados;
    }

    public static function verPacientes($cedula){ //obtiene el nombre, apellidos, id de la tabla estudiante ligados a la cedula del especialista en un INNER JOIN de la tabla paciente 
        $conexion = conexion("root", "");
        $consulta = $conexion->prepare("SELECT E.id, E.Nombre, E.Apellidos, P.est_enviador from estudiante E INNER JOIN pacientes P on E.id = P.est_enviador WHERE P.esp_receptor = :Cedula and status = 1");
        $consulta->execute(array(
                       ':Cedula' => $cedula   
        ));

        $resultados = $consulta->fetchAll();
        return $resultados;
    }

    public static function verInfoPacientes($cedula){ //obtiene los datos de los pacientes y los muestra 
        $conexion = conexion("root", "");
        $result ='';
        $row = null;
        
        $consulta = $conexion->prepare("SELECT E.id, E.Nombre, E.Apellidos, E.Instituto, E.Correo, E.Telefono, P.est_enviador from estudiante E INNER JOIN pacientes P on E.id = P.est_enviador WHERE P.esp_receptor = :Cedula and status = 1");
        $consulta->execute(array(
            ':Cedula' => $cedula
        ));
        $row = $consulta->fetch();
        ?>
        
    <?php   
    }
    
}