<?php
include "../Model/conexion_bd.php";
$id = $_GET["id"];
$sql = $conexion->query("SELECT * FROM usuario WHERE id = $id");

date_default_timezone_set("America/Araguaina");

if (!empty($_POST["btnenviar"])) {
    $entrada2 = $_POST['entrada'];
    $salida2 = $_POST['salida'];
    $entrada = strtotime($_POST['entrada']);
    $salida = strtotime($_POST['salida']);
    
    $horasdecimal = ($salida - $entrada) / 60 / 60;
    $horasdecimal = number_format((float)$horasdecimal, 2, '.', '');

}

?>