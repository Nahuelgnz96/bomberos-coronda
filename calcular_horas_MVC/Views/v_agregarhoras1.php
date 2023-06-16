<?php
    include "../Model/conexion_bd.php";
    $id=$_GET["id"];
    $sql=$conexion->query(" select * from usuario where id=$id ");
    date_default_timezone_set("America/Araguaina");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horas</title>
    <link rel="stylesheet" href="../../css/agregarhoras.css">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2df137ad92.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Gajraj+One&family=Secular+One&display=swap" rel="stylesheet">
</head>
<body class="container">
<script>
    function agregar(){
        var repuesta = confirm('Estas seguro?');
        return repuesta;
    }
</script>
<nav class="navbar navbar-expand-lg bg-body-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="../../img/logo.png"  class="card-img-top" alt="..." style="width: 5rem;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
            <div class="navbar-nav border-bottom border-bottom-dark" data-bs-theme="dark">
                <a class="nav-link text-white " aria-current="page" href="index.php">Inicio</a>
                <a class="nav-link text-white" href="../../lista_bomberos_MVC/Views/lista_bomberos.php">Lista de Bomberos</a>
            </div>
        </div>
</nav>
    
    <div class="container pt-2">
        <div class="row">
            <div class="col">
                <div class="caja" method="POST">
                    
                    <?php
                   
                    
                    while($datos=$sql->fetch_object()){ 
                        ?>
                        <h1><span id="texto">Agregar Horas al Bombero <?=$datos->nombre?> <?=$datos->apellido?> <?=$datos->dni?></span></h1>
                           
                    <?php }
                    
                    ?>
                </div>
                <div class="container row pt-5">
                    <div class="col">
                        <form method="POST" class="formulario1">
                            
                            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
                                <div class="row mb-3 mx-auto" style="width: 300px;">
                                    <div class="col">
                                    <label class="form-label text-white">Entrada</label>
                                    <?php $hs = date("h:i")?>
                                    <input type="text" class="form-control text-center" name="entrada" value="<?php echo( date('d-m-Y 06:00', time()) );?>">
                                    </div>
                                    
                                </div>
                                <div class="row mb-3 mx-auto" style="width: 300px;">
                                    <div class="col">
                                        <label class="form-label text-white">Salida</label>
                                        <input type="text" class="form-control text-center" name="salida" value="<?php echo( date('d-m-Y H:00', time()) );?>">
                                        </div>
                                    
                                </div>
                                    
                            <div class="d-grid gap-2 col-2 mx-auto">
                                <button   type="submit" class="btn btn-primary" name="btnenviar" value="enviar">Enviar</button>
                            </div>
                        </form>
                        
                    </div>
                    <div class="col">
                        <div class="text-center">
                            <?php
                                if (!empty($_POST["btnenviar"])) {
                                    $entrada2 = $_POST['entrada'];
                                    $salida2 = $_POST['salida'];
                                    $entrada = strtotime($_POST['entrada']);
                                    $salida = strtotime($_POST['salida']);
                                    $horasdecimal = ($salida - $entrada) /60/ 60;
                                    //horas en formato decimal
                                    $horasdecimal = number_format((float)$horasdecimal,2,'.'.'');
                                    
                                    //obtener la parte entera de las horas
                                    $horas = floor($horasdecimal); 

                                    //obtener los minutos de la parte decimal
                                    $minuto = $horasdecimal - $horas;
                                    $minuto = round($minuto * 60);

                                    //formatear los minutos con ceros a la izquierda si es neceesario
                                    $minutos = str_pad($minuto,2,'0',STR_PAD_LEFT);
                                    

                                    //crear un objeto DataTime a partir del valor del input
                                    $dateTimeEntra = date_create_from_format('d-m-Y H:i', $entrada2);
                                    $dateTimeSal = date_create_from_format('d-m-Y H:i', $salida2);

                                    //Extraer la fecha en el formato deseado (d-m-Y)
                                    $horaEntrada = $dateTimeEntra->format('H:i');
                                    $horaSalida = $dateTimeSal->format('H:i');
                                    $fechaEntrada = $dateTimeEntra->format('d-m-Y');
                                    $fechaSalida = $dateTimeSal->format('d-m-Y');
                                    

                                    //imprimir la fecha
                                    $fechaHoraEntrada = "$fechaEntrada $horaEntrada";
                                    $fechaHoraSalida = "$fechaSalida $horaSalida";
                                    $horaTrabajadas = "$horas:$minutos";
                                
                                    ?>
                                    <form action="" method="post" class="formulario1">.
                                        <div class="row g-3 align-items-center">
                                            <div class="col">
                                                <label for="inputPassword6" class="col-form-label text-white">FECHA Y HORA DE ENTRADA:  </label>
                                            </div>
                                            <div class="col">
                                                <input value="<?php echo "$fechaEntrada $horaEntrada"; ?>" name="fechahsentrada" type="text" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline">
                                            </div>
                                        </div>
                                        <div class="row g-3 align-items-center">
                                            <div class="col">
                                                <label for="inputPassword6" class="col-form-label text-white">FECHA Y HORA DE SALIDA:</label>
                                            </div>
                                            <div class="col">
                                                <input value="<?php echo "$fechaSalida $horaSalida"; ?>" name="fechahssalida" type="text" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline">
                                            </div>
                                        </div>
                                        <div class="row g-3 align-items-center">
                                            <div class="col">
                                                <label for="inputPassword6" class="col-form-label text-white">HORAS TRABAJADAS: </label>
                                            </div>
                                            <div class="col">
                                                <input value="<?php echo "$horas:$minutos"; ?>" name="hstrabajadas" type="text" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline">
                                            </div>
                                        </div>
                                        <div class="d-grid gap-2 col-2 mx-auto">
                                            <button onclick="return agregar()"  type="submit" class="btn btn-primary" name="btnguardar" value="ok">Guardar</button>
                                        </div>
                                    </form>
<?php
}?>                        
                                    <?php
if (!empty($_POST["btnguardar"])) {
    if (!empty($_POST["fechahsentrada"]) && !empty($_POST["fechahssalida"]) && !empty($_POST["hstrabajadas"])) {
        $fechaHoraEntrada = $_POST["fechahsentrada"];
        $fechaHoraSalida = $_POST["fechahssalida"];
        $horaTrabajadas = $_POST["hstrabajadas"];
        

        $id_bombero = $_GET["id"]; // Obtener el ID del empleado desde la URL o cualquier otra fuente

        // Consulta SQL para sumar las horas trabajadas del empleado con el ID específico
        $consulta = "SELECT SUM(horas) AS horas_total FROM bombero_hora WHERE id_bombero = $id_bombero";
        
        // Ejecutar la consulta y obtener el resultado
        $resultado = $conexion->query($consulta);
        
        if ($resultado) {
            // Verificar si se encontraron registros
            if ($resultado->num_rows > 0) {
                // Obtener el resultado como un arreglo asociativo
                $fila = $resultado->fetch_assoc();
                $horas_total = $fila['horas_total'];
        
                // Mostrar el total de horas trabajadas
                
            } else {
                echo "No se encontraron registros de horas trabajadas para este empleado.";
                $horasTotal = $horaTrabajadas;
            }
        } else {

            echo "Error al ejecutar la consulta: " . $conexion->error;
        } 
        //convierto las horas trabajadas ej 24:00 a 240000
        $tiempo = $horaTrabajadas;

        $tiempo_sin_dos_puntos = str_replace(':', '', $tiempo);
        $tiempo_formato_24h = $tiempo_sin_dos_puntos . "00";
        
        
        //echo "<br>fecha ".$fechaHoraEntrada;//06-06-2023 06:00
        
        $fechaHora = $fechaHoraEntrada;

        // Obtener el valor del mes
        $mes = date("m", strtotime($fechaHora));
        
        // Mostrar el valor del mes
       



        // Realizar la consulta SQL para obtener el ultimo registro
        $consuMes = "SELECT * FROM bombero_hora WHERE id_bombero = $id_bombero ORDER BY id_hora DESC LIMIT 1";
        $resul = $conexion->query($consuMes);

        if ($resul) {
            if ($resultado->num_rows > 0) {
                $fila = $resul->fetch_assoc();
                $fechaHoraEntradaAnterior = $fila['fecha_hora_entrada'];

                // Obtener el valor del mes de la fecha de entrada anterior
                $mesAnterior = date("m", strtotime($fechaHoraEntradaAnterior));

                // Mostrar el valor del mes
                
            } else {
                echo "No se encontraron registros anteriores para este empleado.";
            }
        } else {
            echo "Error al ejecutar la consulta: " . $conexion->error;
        }

       
        



        $horasTotal = $horas_total+$tiempo_formato_24h;
        

        if ($mes>$mesAnterior) {
            echo"<br>horas totales 0";
            $horasTotal = $tiempo_formato_24h;
            $sql = "INSERT INTO `bombero_hora` (`id_bombero`, `fecha_hora_entrada`, `fecha_hora_salida`, `horas`, `horas_total`) VALUES ('$id_bombero', '$fechaHoraEntrada', '$fechaHoraSalida', '$horaTrabajadas', '$horasTotal')";    
        
            if ($conexion->query($sql) === TRUE) {
            } else {
                echo '<div class="alert alert-danger">Error al registrar alumno</div>';
            }

        }else{
            
            $sql = "INSERT INTO `bombero_hora` (`id_bombero`, `fecha_hora_entrada`, `fecha_hora_salida`, `horas`, `horas_total`) VALUES ('$id_bombero', '$fechaHoraEntrada', '$fechaHoraSalida', '$horaTrabajadas', '$horasTotal')";    
        
            if ($conexion->query($sql) === TRUE) {
                
                header("location: index.php");
            } else {
                echo '<div class="alert alert-danger">Error al registrar Bombero</div>';
            }
        }


    }
}

                            ?>
                            
                            
                        </div>
                        
                    </div>
                </div>
                    
            </div>
                
        </div>
    </div>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

