<?php
include "../Model/conexion_bd.php";

if (!empty($_POST["btnagregar"])) {
    // Verificar si se seleccionó un archivo
    if (!empty($_FILES["foto"]["name"])) {
        // Se ha seleccionado una imagen, realizar el proceso normal de carga de imagen
        $foto = $_FILES["foto"]["name"]; // Nombre del archivo
        $foto_temp = $_FILES["foto"]["tmp_name"]; // Ruta temporal del archivo

        // Mover el archivo temporal a una ubicación permanente
        $targetDirectory = "../../../files"; // Cambia esto a la ruta deseada
        $targetFile = $targetDirectory . basename($foto);

        if (move_uploaded_file($foto_temp, $targetFile)) {
            // Resto del código para obtener los valores de los otros campos
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $dni = $_POST["dni"];
            $fecha_nac = $_POST["fecha_nac"];
            $telefono = $_POST["telefono"];
            $direccion = $_POST["direccion"];
            $correo = $_POST["correo"];
        } else {
            echo '<div class="alert alert-danger">Error al subir la imagen</div>';
            exit; // Detener el proceso si ocurre un error en la carga de imagen
        }
    } else {
        // No se seleccionó una imagen, establecer la imagen predeterminada
        $foto = "bombero.png"; // Cambia esto al nombre y extensión de tu imagen predeterminada
        // Resto del código para obtener los valores de los otros campos
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $dni = $_POST["dni"];
        $fecha_nac = $_POST["fecha_nac"];
        $telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];
        $correo = $_POST["correo"];
    }

    // Realizar la inserción en la base de datos
    $sql = $conexion->query("INSERT INTO usuario(foto, nombre, apellido, dni, fecha_nac, telefono, direccion, correo) VALUES ('$foto', '$nombre', '$apellido', '$dni', '$fecha_nac', '$telefono', '$direccion', '$correo')");

    if ($sql == 1) {
        header("location: ../Views/lista_bomberos.php");
    } else {
        echo '<div class="alert alert-danger">Error al registrar bombero</div>';
    }
}

require('../Views/v_agregar_bombero.php');
?>
