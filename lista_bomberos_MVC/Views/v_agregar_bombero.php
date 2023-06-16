<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar</title>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="../../css/modificar_bombero.css?v=1.1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8697250bf3.js" crossorigin="anonymous"></script>
</head>
<body class="container">
        <form class="formulario1" method="POST" enctype="multipart/form-data">
        <a class="d-flex align-items-center" href="../../index.php">
            <img src="../../img/logo.png" alt="..." style="width: 5rem; margin: auto;">
        </a>
        <h3 class="text-center text-light">AGREGAR BOMBERO</h3>
            <?php

            ?>
            <div class="mb-3">
                <label for="image" class="text-white">Foto</label>
                <input type="file" class="form-control" name="foto" >
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-white">Nombre</label>
                <input type="text" class="form-control" name="nombre">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-white">Apellido</label>
                <input type="text" class="form-control" name="apellido">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-white">DNI</label>
                <input type="number" class="form-control" name="dni">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-white">Fecha de nacimiento</label>
                <input type="date" class="form-control" name="fecha_nac">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-white">Telefono</label>
                <input type="text" class="form-control" name="telefono">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-white">Direccion</label>
                <input type="text" class="form-control" name="direccion">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-white">Correo</label>
                <input type="email" class="form-control" name="correo">
            </div>
            <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" name="btnagregar" value="ok">Registrar</button>
            </div>
            
        </form>
        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>