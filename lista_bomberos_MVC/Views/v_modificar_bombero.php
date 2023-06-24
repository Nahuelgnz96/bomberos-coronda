<?php
    include "../Model/conexion_bd.php";
    $id=$_GET["id"];
    $sql=$conexion->query(" select * from usuario where id=$id ");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="../../css/modificar_bombero.css?v=1.1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body class="container">
    <form class="formulario1" method="POST" enctype="multipart/form-data">
        <a class="d-flex align-items-center" href="../../index.php">
            <img src="../../img/logo.png" alt="..." style="width: 5rem; margin: auto;">
        </a>
        <h3 class="text-center text-light">MODIFICAR BOMBERO</h3>
        <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
        <?php
        include "../Controller/c_modificar_bombero.php";
        while($datos=$sql->fetch_object()){ ?>
            <div class="row mb-3">
                <label for="image" class="form-label text-white">Foto</label>
                <?php if (!empty($datos->foto)): ?>
                    <img src="../../img/<?= $datos->foto ?>" alt="Imagen" width="300" height="200">
                <?php else: ?>
                    <p>No hay foto existente</p>
                <?php endif; ?>
                <input type="file" class="form-control" name="foto">
                <input type="hidden" name="foto_actual" value="<?= $datos->foto ?>">
            </div>

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-light">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= $datos->nombre?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-light">Apellido</label>
                <input type="text" class="form-control" name="apellido" value="<?= $datos->apellido ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-light">DNI</label>
                <input type="number" class="form-control" name="dni" value="<?= $datos->dni ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-light">Fecha de nacimiento</label>
                <input type="date" class="form-control" name="fecha_nac" value="<?= $datos->fecha_nac ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-light">Telefono</label>
                <input type="text" class="form-control" name="telefono" value="<?= $datos->telefono ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-light">Direccion</label>
                <input type="text" class="form-control" name="direccion" value="<?= $datos->direccion ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-light">Correo</label>
                <input type="email" class="form-control" name="correo" value="<?= $datos->correo ?>">
            </div>
        <?php }
        ?>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary " name="btnregistrar" value="ok">Registrar</button>
        </div>
        
        
    </form>

    <script src="../../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>