<?php
include "../Model/conexion_bd.php";

if (!empty($_POST["btnagregar"])) {
    // Verificar si se seleccionó un archivo
    if (!empty($_FILES["foto"]["name"])) {
        // Se ha seleccionado una imagen, realizar el proceso normal de carga de imagen
        $foto_extension = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
        $foto = "bombero." . $foto_extension;
        $foto_temp = $_FILES["foto"]["tmp_name"];

        $targetDirectory = "../../img/";
        $targetFile = $targetDirectory . basename($foto);

        if (move_uploaded_file($foto_temp, $targetFile)) {
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $dni = $_POST["dni"];
            $fecha_nac = $_POST["fecha_nac"];
            $telefono = $_POST["telefono"];
            $direccion = $_POST["direccion"];
            $correo = $_POST["correo"];
        } else {
            echo '<div class="alert alert-danger">Error al subir la imagen</div>';
            exit;
        }
    } else {
        $foto = "bombero.png";
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $dni = $_POST["dni"];
        $fecha_nac = $_POST["fecha_nac"];
        $telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];
        $correo = $_POST["correo"];
    }

    $sql = $conexion->query("INSERT INTO usuario(foto, nombre, apellido, dni, fecha_nac, telefono, direccion, correo) VALUES ('$foto', '$nombre', '$apellido', '$dni', '$fecha_nac', '$telefono', '$direccion', '$correo')");

    if ($sql == 1) {
        header("location: ../Views/lista_bomberos.php");
    } else {
        echo '<div class="alert alert-danger">Error al registrar bombero</div>';
    }
}

require('../Views/v_agregar_bombero.php');
?>
