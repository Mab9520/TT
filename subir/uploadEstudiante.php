<?php
require("../includes/funciones.php");
session_start();
verificarSesion();

$id_estudiante = $_SESSION['id'];
$idActividad = $_GET['id'];
$conexion = conexion("root", "");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $file_name = $_FILES['file']['name'];

    $new_name_file = null;

    if ($file_name != '' || $file_name != null) {
        $file_type = $_FILES['file']['type'];
        list($type, $extension) = explode('/', $file_type);
        if ($extension == 'pdf') {
            $dir = 'filesEst/';
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            $file_tmp_name = $_FILES['file']['tmp_name'];
            //$new_name_file = 'files/' . date('Ymdhis') . '.' . $extension;
            $new_name_file = $dir . file_name($file_name) . '.' . $extension;
            if (copy($file_tmp_name, $new_name_file)) {
                
            }
        }
    }

    $ins = $conexion->query("INSERT INTO filesest(title,description,url, type, id_fileEspecialista, id_Estudiante) VALUES ('$title','$description','$new_name_file', '','$idActividad', '$id_estudiante' )");

    $completada = $conexion->prepare("UPDATE files SET status = 1");
    $completada->execute();

    if ($ins) {
        echo 'success';
    } else {
        echo 'fail';
    }
} else {
    echo 'fail';
}
