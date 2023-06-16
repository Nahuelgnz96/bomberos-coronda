<?php
error_reporting(E_ERROR | E_PARSE); // Excluye los mensajes de advertencia, muestra solo errores fatales y errores de análisis
$id = $_GET["id"];
$sql = $conexion->query("SELECT * FROM usuario WHERE id = $id");

date_default_timezone_set("America/Araguaina");

if (!empty($_POST["agregar"])) {
    $entrada2 = $_POST['entrada'];
    $salida2 = $_POST['salida'];
    $entrada = strtotime($_POST['entrada']);
    $salida = strtotime($_POST['salida']);
    $horasdia = $_POST['horas'];
    $horasdecimal = ($salida - $entrada) / 60 / 60;
    $horasdecimal = number_format((float)$horasdecimal, 2, '.', '');

    $horas = floor($horasdecimal);
    $minuto = $horasdecimal - $horas;
    $minuto = round($minuto * 60);
    $minutos = str_pad($minuto, 2, '0', STR_PAD_LEFT);

    $dateTimeEntra = date_create_from_format('Y-m-d H:i', $_POST['fechaentrada'] . ' ' . $_POST['entrada']);
    $dateTimeSal = date_create_from_format('Y-m-d H:i', $_POST['fechasalida'] . ' ' . $_POST['salida']);

    $horaEntrada = $dateTimeEntra->format('H:i');
    $horaSalida = $dateTimeSal->format('H:i');
    $fechaEntrada = $dateTimeEntra->format('d-m-Y');
    $fechaSalida = $dateTimeSal->format('d-m-Y');

    $fechaHoraEntrada = "$fechaEntrada $horaEntrada";
    $fechaHoraSalida = "$fechaSalida $horaSalida";
    $horaTrabajadas = "$horas:$minutos";

    $id_bombero = $_GET["id"];
    $consulta = "SELECT SUM(horas) AS horas_total FROM bombero_hora WHERE id_bombero = $id_bombero";
    $resultado = $conexion->query($consulta);

    if ($resultado) {
        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            $horas_total = $fila['horas_total'];
        } else {
            echo "No se encontraron registros de horas trabajadas para este empleado.";
            $horas_total = 0;
        }
    } else {
        echo "Error al ejecutar la consulta: " . $conexion->error;
        $horas_total = 0;
    }

    $tiempo = $horaTrabajadas;
    $tiempo_sin_dos_puntos = str_replace(':', '', $tiempo);
    $tiempo_formato_24h = $tiempo_sin_dos_puntos . "00";

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

    $fechaHora = $fechaHoraEntrada;

    // Obtener el valor del mes
    $mes = date("m", strtotime($fechaHora));
    // Realizar la consulta SQL para obtener el ultimo registro
    $consuMes = "SELECT * FROM bombero_hora WHERE id_bombero = $id_bombero ORDER BY id_hora DESC LIMIT 1";
    $resul = $conexion->query($consuMes);

    if ($resul) {
        if ($resultado->num_rows > 0) {
            $fila = $resul->fetch_assoc();
            $fechaHoraEntradaAnterior = $fila['fecha_hora_entrada'];

            // Obtener el valor del mes de la fecha de entrada anterior
            $mesAnterior = date("m", strtotime($fechaHoraEntradaAnterior));
        } else {
            echo "No se encontraron registros anteriores para este empleado.";
        }
    } else {
        echo "Error al ejecutar la consulta: " . $conexion->error;
    }

    $horasTotal = $horas_total + $tiempo_formato_24h;

    if ($mes > $mesAnterior) {
        $horasTotal = $tiempo_formato_24h;
        $sql = "INSERT INTO `bombero_hora` (`id_bombero`, `fecha_hora_entrada`, `fecha_hora_salida`, `horas`, `horas_total`) VALUES ('$id_bombero', '$horasdia', '$fechaHoraSalida', '$horaTrabajadas', '$horasTotal')";

        if ($conexion->query($sql) === TRUE) {
            echo '<div class="alert alert-success">Hora registrada corectamente</div>';
            header("location: ../views/index.php");
            exit;
        } else {
            echo '<div class="alert alert-danger">Error al registrar alumno</div>';
        }

    } else {
        $sql = "INSERT INTO `bombero_hora` (`id_bombero`, `fecha_hora_entrada`, `fecha_hora_salida`, `horas`, `horas_total`) VALUES ('$id_bombero', '$fechaHoraEntrada', '$fechaHoraSalida', '$horaTrabajadas', '$horasTotal')";

        if ($conexion->query($sql) === TRUE) {
            echo '<div class="alert alert-success">Hora registrada corectamente</div>';
            header("location: ../views/index.php");
            exit;
        } else {
            echo '<div class="alert alert-danger">Error al registrar Bombero</div>';
        }
    }
}
?>
