<?php
if (!empty($_POST["btnregistrar"])) {
    if (!empty($_FILES["foto"]["name"]) && !empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["dni"]) && !empty($_POST["fecha_nac"]) && !empty($_POST["telefono"]) && !empty($_POST["direccion"]) && !empty($_POST["correo"])) {
        $id = $_POST["id"];
        $foto = $_FILES["foto"]["name"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $dni = $_POST["dni"];
        $fecha_nac = $_POST["fecha_nac"];
        $telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];
        $correo = $_POST["correo"];

        // Ruta donde se guardará la imagen
        $ruta = "../../img/" . $foto;

        // Mover la imagen desde la ubicación temporal a la ruta especificada
        move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta);

        $sql = $conexion->query("UPDATE usuario SET foto='$foto', nombre='$nombre', apellido='$apellido', dni='$dni', fecha_nac='$fecha_nac', telefono='$telefono', direccion='$direccion', correo='$correo' WHERE id=$id");

        if ($sql == 1) {
            header("location: ../Views/lista_bomberos.php");
        } else {
            echo '<div class="alert alert-danger">Error al editar bombero</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Algunos de los campos están vacíos</div>';
    }
}
?>
