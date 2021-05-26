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
        $consulta->execute(array(
                       ':est_enviador' => $est_enviador,
                       ':esp_receptor' => $esp_receptor,
                       ':status' => '',
                       ':solicitud' => 1      
        ));

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

    public static function aceptarSolicitud($id){
        $conexion = conexion("root", "");
        $consulta = $conexion->prepare("UPDATE pacientes SET status = 1 WHERE est_enviador = :id");
        $consulta->execute(array(
                       ':id' => $id   
        ));
    }
    
    public static function eliminarSolicitud($id){
        $conexion = conexion("root", "");
        $consulta = $conexion->prepare("DELETE FROM pacientes WHERE est_enviador = :id");
        $consulta->execute(array(
                       ':id' => $id   
        ));
    }

    public static function cantidadPacientes($cedula){
        $conexion = conexion("root", "");
        $consulta = $conexion->prepare("SELECT count(*) FROM pacientes WHERE (est_enviador = :id or esp_receptor = :Cedula) AND status = 1 ");
        $consulta->execute(array(
                       ':Cedula' => $cedula   
        ));

        $resultados = $consulta->fetchAll();
        return $resultados;
    }

    public static function verPacientes($cedula){
        $conexion = conexion("root", "");
        $consulta = $conexion->prepare("SELECT E.id, E.Nombre, E.Apellidos, P.est_enviador from estudiante E INNER JOIN pacientes P on E.id = P.est_enviador WHERE P.esp_receptor = :Cedula and status = 1");
        $consulta->execute(array(
                       ':Cedula' => $cedula   
        ));

        $resultados = $consulta->fetchAll();
        return $resultados;
    }

    public static function verInfoPacientes($cedula){
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