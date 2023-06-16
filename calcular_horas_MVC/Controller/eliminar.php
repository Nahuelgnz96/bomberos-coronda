<?php
include "../Model/conexion_bd.php";
if (!empty($_GET["id"])) {
        $id=$_GET["id"];
        $sql=$conexion->query(" delete from usuario where id=$id ");
        if ($sql==1) {
            
            header("location: lista.php");
            echo '<div class="alert alert-success">Bombero elimanado correctamente</div>';
        }else {
            echo '<div class="alert alert-warning">Error al eliminar bombero</div>';
        }
    }


?>