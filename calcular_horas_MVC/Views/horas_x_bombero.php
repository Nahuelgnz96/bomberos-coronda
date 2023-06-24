<?php
    include "../Model/conexion_bd.php";
    $id=$_GET["id"];
    $sql=$conexion->query(" select * from usuario where id=$id ");
    $mesSeleccionado = isset($_GET['mes']) ? $_GET['mes'] : ''; // Obtener el mes seleccionado de la URL
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2df137ad92.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/resumen.css?v=1.0">
</head>
<body class="container">
    
    <nav class="navbar navbar-expand-lg bg-body-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="../../img/logo.png"  class="card-img-top" alt="..." style="width: 5rem;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                <a class="nav-link" href="../../lista_bomberos_MVC/Views/lista_bomberos.php?v=1.1">Lista de Bomberos</a>
                
            </div>
            </div>
        </div>
    </nav>
    <div class="caja">
        <h1><span id="texto">Bomberos Coronda</span></h1>
    </div>
    
    <hr/>
    <main>
        <section class="row mt-4">
            <div class="col-6">
                <div class="card" id="formu">
                    <div class="card-header">
                        <h3 class="card-tittle">Datos del Bombero/a</h3>
                    </div>
                    <div class="card-body bg-light" id="datosbombero" >
                        <form class="row">
                            <div class="col">
                                <?php
                                            $fecha = date('m');
                                            $sql=$conexion->query(" select * from usuario where id = $id");
                                            while ($datos = $sql->fetch_object()){  
                                                
                                            ?>
                                    <div class="form-group col-md4">
                                        <label name="nombre" for=""><?=$datos->nombre." ".$datos->apellido?> </label>
                                    </div>
                                    <div class="form-group col-md4">
                                        <label for="">Puesto: </label>
                                    </div>
                                    <div class="form-group col-md4">
                                        <label for="">Direccion: <?=$datos->direccion?></label>
                                    </div>
                            </div>
                            <div class="col">
                                <div class="form-group col-md4">
                                    <label for="">Ciudad: </label>
                                </div>
                                <div class="form-group col-md4">
                                    <label for="">Telefono: <?=$datos->telefono?> </label>
                                </div>
                                <div class="form-group col-md4">
                                    <label for=""></label>
                                </div>
                            </div>
                            <?php }?>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6 ">
                <div class="card" id="formu2">
                    <div class="card-header text-center">
                        <h3 class="card-tittle text-white">ELIGIR MES</h3>
                    </div>
                    <div class="card-body bg-light" id="datosbombero">
                        <form class="row">
                            <div class="col">
                                <div class="form-group col-md4">
                                <form method="POST">
                                    <div class="mt-1">
                                    <input type="hidden"  name="id" value="<?= $_GET["id"] ?>">
                                    <div class="content-select">
                                        <select id="mes" name="mes">
                                            <option value="1" <?= $mesSeleccionado == '1' ? 'selected' : '' ?>>ENERO</option>
                                            <option value="2" <?= $mesSeleccionado == '2' ? 'selected' : '' ?>>FEBRERO</option>
                                            <option value="3" <?= $mesSeleccionado == '3' ? 'selected' : '' ?>>MARZO</option>
                                            <option value="4" <?= $mesSeleccionado == '4' ? 'selected' : '' ?>>ABRIL</option>
                                            <option value="5" <?= $mesSeleccionado == '5' ? 'selected' : '' ?>>MAYO</option>
                                            <option value="6" <?= $mesSeleccionado == '6' ? 'selected' : '' ?>>JUNIO</option>
                                            <option value="7" <?= $mesSeleccionado == '7' ? 'selected' : '' ?>>JULIO</option>
                                            <option value="8" <?= $mesSeleccionado == '8' ? 'selected' : '' ?>>AGOSTO</option>
                                            <option value="9" <?= $mesSeleccionado == '9' ? 'selected' : '' ?>>SEPTIEMBRE</option>
                                            <option value="10" <?= $mesSeleccionado == '10' ? 'selected' : '' ?>>OCTUBRE</option>
                                            <option value="11" <?= $mesSeleccionado == '11' ? 'selected' : '' ?>>NOVIEMBRE</option>
                                            <option value="12" <?= $mesSeleccionado == '12' ? 'selected' : '' ?>>DICIEMBRE</option>
                                            
                                        </select>
                                        <i></i>
                                    </div>
                                        
                                    
                                </form>
                                </div>
                                
                                <div class="form-group col-md4">
                                    <label for=""></label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section class="row mt-4">
            <div class="col">
                
                <div>
                    
                    <div class="card-body">
                    <div class="caja">
                        <h1><span id="texto2">Historial Mensual</span></h1>
                    </div>
                        <table>
                            <thead>
                                <tr>
                                    <td>Fecha y Hora de Entrada</td>
                                    <td>Fecha y Hora de Salida</td>
                                    <td>Horas del dia</td>
                                    <td></td>
                                </tr>
                            </thead>
                                <?php
                                if (!empty($_GET['id'])) {
                                    
                                    if (!empty($_GET['mes'])) {
                                        $id=$_GET["id"];
                                        $sql=$conexion->query(" select * from usuario where id=$id ");
                                        $fecha = $_GET['mes'];
                                        //agrego un 0 a la izquierda si hace falta ej 5 05
                                        $fechaactual = sprintf("%02d", $fecha);
                                        
                                            $sql=$conexion->query(" select * from bombero_hora where id_bombero = $id AND MONTH(STR_TO_DATE(fecha_hora_entrada, '%d-%m-%Y %H:%i')) = $fechaactual ORDER BY STR_TO_DATE(fecha_hora_entrada, '%d-%m-%Y %H:%i') ASC");
                                            while ($datos = $sql->fetch_object()){  
                                            
                                        ?>
                                    <tr>
                                        <th><?=$datos->fecha_hora_entrada?></th>
                                        <th><?=$datos->fecha_hora_salida?></th>
                                        <th><?=$datos->horas?></th>
                                        <th></th>
                                    </tr>
                                <?php
                                
                            }
                        }
                    }
                        ?>
                        <?php
                                if (!empty($_GET['id'])) {
                                    
                                    if (!empty($_GET['mes'])) {
                                        $id=$_GET["id"];
                                        $sql=$conexion->query(" select * from usuario where id=$id ");
                                        $fecha = $_GET['mes'];
                                        //agrego un 0 a la izquierda si hace falta ej 5 05
                                        $fechaactual = sprintf("%02d", $fecha);
                                        
                                            $sql=$conexion->query(" select * from bombero_hora where id_bombero = $id AND MONTH(STR_TO_DATE(fecha_hora_entrada, '%d-%m-%Y %H:%i')) = $fechaactual  ORDER BY `bombero_hora`.`horas_total` DESC LIMIT 1");
                                            while ($datos = $sql->fetch_object()){  
                                            
                                        ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    
                                    <tr>
                                        <th class="horas">Horas Totales</th>
                                        <td class="horas"></td>
                                        <td class="horas"></td>

                                        <td class="horas"><?=$datos->horas_total?></td>

                                    </tr>

                                    <?php
                                
                            }
                        }
                    }
                    
                        ?>
                            </thead>
                        </table>
                    </div>
                </div>
                <script>
                    document.getElementById('mes').addEventListener('change', function() {
                    var selectedMonth = this.value;
                    var currentUrl = window.location.href;
                    var updatedUrl = currentUrl.split('?')[0] + '?id=<?= $id ?>&mes=' + selectedMonth;
                    window.location.href = updatedUrl;
                    });
                </script>
            </div>
            <?php 
            if (!empty($_GET['mes'])) {
                $mes=$_GET["mes"];
            ?>
                
                
            </a>
            <?php }?>
        </section>
        <footer>

                <div class="col-10 d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href='descargarPDF.php?id=<?= $id?>&mes=<?=$mes?>' target="_blank">
                    <button class="btn btn-primary my-3 me-md-2"><i class="bi bi-download"></i>Descargar Datos</button>
                </div>
            
            </footer>
    </main>
    
<script src="../../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>