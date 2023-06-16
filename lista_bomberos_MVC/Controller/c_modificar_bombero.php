<?php
if (!empty($_POST["btnregistrar"])) {
    // Obtener el ID del usuario
    $id = $_POST["id"];
    
    // Obtener los valores enviados por el formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    // Obtener el nombre del archivo de la foto si se ha cargado
    $foto = $_FILES["foto"]["name"];
    $dni = $_POST["dni"];
    $fecha_nac = $_POST["fecha_nac"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];
    $correo = $_POST["correo"];

    // Verificar si se ha cargado un archivo de foto
    if (!empty($foto)) {
        // Ruta donde se guardará la imagen
        $ruta = "../../img/" . $foto;

        // Mover la imagen desde la ubicación temporal a la ruta especificada
        move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta);

        // Actualizar la foto en la base de datos
        $sql = $conexion->query("UPDATE usuario SET foto='$foto' WHERE id=$id");
    }

    // Actualizar los demás campos en la base de datos
    $sql = $conexion->query("UPDATE usuario SET nombre='$nombre', apellido='$apellido', dni='$dni', fecha_nac='$fecha_nac', telefono='$telefono', direccion='$direccion', correo='$correo' WHERE id=$id");

    if ($sql == 1) {
        header("location: ../Views/lista_bomberos.php");
    } else {
        echo '<div class="alert alert-danger">Error al editar bombero</div>';
    }
}
?>