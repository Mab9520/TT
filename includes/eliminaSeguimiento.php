<?php

//Unicamente elimina la cuenta
session_start();

require('funciones.php');
require('../clases/Estudiante.php');
verificarSesion();
Estudiante::eliminarSeguimiento($_SESSION['id']);
Estudiante::eliminarActividadesEsp($_SESSION['id']);
Estudiante::eliminarActividades($_SESSION['id']);
header('location: ../views/verEspecialistas.php');
?>