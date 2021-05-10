<?php

    function conexion($usuario, $pass){
        try{
            $conexion = new PDO('mysql:host=localhost;dbname=tt', $usuario, $pass);
            return $conexion;
        } catch (PDOException $e){
            return $e->getMessage();
        }
    }
    function datosVacios($datos){
        $vacio = false;
        $tamaño = count($datos);

        for($contador = 0; $contador <$tamaño; $contador++){
            if(empty($datos[$contador])){
                $vacio = true;
                break;
            }
        }

        return $vacio;
    }

    function limpiar($datos){
        $tamaño = $datos;
        for($contador = 0; $contador <$tamaño; $contador++){
            if($contador != 4){
                $datos[$contador] = htmlspecialchars($datos[$contador]);
                $datos[$contador] = trim($datos[$contador]);
                $datos[$contador] = stripcslashes($datos[$contador]);
            }
        }
        return $datos;
    }

    function verificarSesion(){
        if(!isset($_SESSION['id'])){
            header('location: ../index.php');
        }
    }
   

    
    

?>