<?php
    include "../Model/conexion_bd.php";
    $id=$_GET["id"];
    $sql=$conexion->query("SELECT * FROM usuario WHERE id=$id");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horas</title>
    <link rel="stylesheet" href="../../css/agregarhoras.css?v=1.0">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2df137ad92.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Gajraj+One&family=Secular+One&display=swap" rel="stylesheet">
</head>
<body class="container">
<script>
    function agregar() {
        var respuesta = confirm('¿Estás seguro?');
        return respuesta;
    }

    function calcularHoras() {
        var entrada = document.getElementById("entrada").value;
        var salida = document.getElementById("salida").value;
        var fechaEntrada = document.getElementById("fechaentrada").value;
        var fechaSalida = document.getElementById("fechasalida").value;

        var fechaHoraEntrada = new Date(fechaEntrada + " " + entrada);
        var fechaHoraSalida = new Date(fechaSalida + " " + salida);

        var diff = (fechaHoraSalida - fechaHoraEntrada) / 1000 / 60 / 60;
        if (diff < 0) {
            diff += 24;
        }

        var horas = Math.floor(diff);
        var minutos = Math.round((diff % 1) * 60);

        document.getElementById("horas").value = horas.toString().padStart(2, "0") + ":" + minutos.toString().padStart(2, "0");
    }
</script>

</script>
<nav class="navbar navbar-expand-lg bg-body-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="../../img/logo.png" class="card-img-top" alt="..." style="width: 5rem;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav border-bottom border-bottom-dark" data-bs-theme="dark">
                <a class="nav-link text-white" aria-current="page" href="index.php">Inicio</a>
                <a class="nav-link text-white" href="../../lista_bomberos_MVC/Views/lista_bomberos.php">Lista de Bomberos</a>
            </div>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="caja" method="POST">
                <?php
                while ($datos = $sql->fetch_object()) {
                    ?>
                    <h1><span id="texto">Agregar Horas al Bombero <?= $datos->nombre ?> <?= $datos->apellido ?> <?= $datos->dni ?></span></h1>
                    <?php
                }
                ?>
            </div>
            <div class="container row ">
                <div class="col">
                    <form method="POST" class="formulario1">
                        <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
                        <div class="row mb-3 mx-auto" style="width: 300px;">
                            <div class="col text-center">
                                <label class="form-label text-white">Entrada</label>
                                <input type="time" class="form-control text-center" id="entrada" name="entrada" value="<?=date("06:00") ?>" onchange="calcularHoras()">
                            </div>
                            <div class="col text-center">
                                <label class="form-label text-white">Salida</label>
                                <input type="time" class="form-control text-center" id="salida" name="salida" value="<?=date("H:00") ?>" onchange="calcularHoras()" required>
                            </div>
                        </div>
                        <div class="row mb-3 mx-auto" style="width: 300px;">
                            <div class="col-6">
                                <input type="date" class="form-control text-center" id="fechaentrada" name="fechaentrada" value="<?= date("Y-m-d") ?>" onchange="calcularHoras()">
                            </div>
                            <div class="col-6" >
                                
                                <input type="date" class="form-control text-center" id="fechasalida" name="fechasalida" value="<?= date("Y-m-d") ?>" onchange="calcularHoras()" required>
                            </div>
                        </div>
                            <div class="col mb-3 mx-auto" style="width: 150px;">
                                <label class="form-label text-white">Horas Trabajadas</label>
                                <input type="text" class="form-control text-center" id="horas" name="horas" value="" readonly>
                            </div>
                        <div class="row">
                            <div class="col text-center">
                                <input type="submit" class="btn btn-danger" name="agregar" value="Agregar" onclick="return agregar()">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<?php include "../Controller/c_agregarhoras.php" ?>
</body>
</html>
