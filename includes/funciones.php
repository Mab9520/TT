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

    function limpiarEst($datos){
        $tamaño = count($datos);
        for($contador = 0; $contador <$tamaño; $contador++){
            if($contador != 4){
                $datos[$contador] = htmlspecialchars($datos[$contador]);
                $datos[$contador] = trim($datos[$contador]);
                $datos[$contador] = stripcslashes($datos[$contador]);
            }
        }
        return $datos;
    }

    function limpiarEsp($datos){
        $tamaño = count($datos);
        for($contador = 0; $contador <$tamaño; $contador++){
            if($contador != 3){
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
   
    function file_name($string) {

        // Tranformamos todo a minusculas
    
        $string = strtolower($string);
    
        //Rememplazamos caracteres especiales latinos
    
        $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
    
        $repl = array('a', 'e', 'i', 'o', 'u', 'n');
    
        $string = str_replace($find, $repl, $string);
    
        // Añadimos los guiones
    
        $find = array(' ', '&', '\r\n', '\n', '+');
        $string = str_replace($find, '-', $string);
    
        // Eliminamos y Reemplazamos otros carácteres especiales
    
        $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
    
        $repl = array('', '-', '');
    
        $string = preg_replace($find, $repl, $string);
    
        return $string;
    }
    
    

?>