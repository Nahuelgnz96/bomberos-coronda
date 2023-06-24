<?php
if (!empty($_POST["btnregistrar"])) {
    // Obtener el ID del usuario
    $id = $_POST["id"];
    
    // Obtener los valores enviados por el formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $foto_actual = $_POST["foto_actual"]; // Nombre de la foto actual
    $foto_nombre = $_FILES["foto"]["name"]; // Nombre del archivo de la foto
    $foto_temp = $_FILES["foto"]["tmp_name"]; // Ruta temporal del archivo
    $foto_extension = pathinfo($foto_nombre, PATHINFO_EXTENSION); // Extensión del archivo
    
    // Verificar si se ha cargado un archivo de foto
    if (!empty($foto_temp)) {
        // Generar un nombre único para el archivo de foto
        $foto_con_extension = uniqid('', true) . '.' . $foto_extension;
        
        // Ruta donde se guardará la imagen
        $ruta = "../../img/" . $foto_con_extension;

        // Mover la imagen desde la ubicación temporal a la ruta especificada
        move_uploaded_file($foto_temp, $ruta);
        
        // Eliminar la foto anterior si existe
        if (!empty($foto_actual) && $foto_actual != "bombero.png") {
            $ruta_anterior = "../../img/" . $foto_actual;
            if (file_exists($ruta_anterior)) {
                unlink($ruta_anterior);
            }
        }
    } else {
        // No se ha cargado una nueva imagen, mantener la imagen actual
        $foto_con_extension = $foto_actual;
    }

    // Actualizar los demás campos en la base de datos
    $sql = $conexion->query("UPDATE usuario SET nombre='$nombre', apellido='$apellido', foto='$foto_con_extension' WHERE id=$id");

    if ($sql == 1) {
        header("location: ../Views/lista_bomberos.php");
    } else {
        echo '<div class="alert alert-danger">Error al editar bombero</div>';
    }
}
?>
