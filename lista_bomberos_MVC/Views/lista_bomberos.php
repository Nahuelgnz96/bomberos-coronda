<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/listabombero.css?v=2.1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2df137ad92.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <script>
function eliminarBombero(id) {
        Swal.fire({
            title: '¿Quieres elimarlo?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, borrar!'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
                window.location.href = '../Controller/eliminar_bombero.php?id=' + id;
                
            }
            })
                }
</script>
    
</head>
<body class="container-fluid">
    
    <nav class="navbar navbar-expand-lg bg-body-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../../calcular_horas_MVC/Views/index.php">
                <img src="../../img/logo.png"  class="card-img-top" alt="..." style="width: 5rem;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link text-dark" aria-current="page" href="../../calcular_horas_MVC/Views/index.php">Inicio</a>
                <a class="nav-link text-dark" href="lista_bomberos.php">Lista de Bomberos</a>
                
            </div>
            </div>
        </div>
    </nav>
    <div class="contenedor-fluid">
        <div class="caja">
                <h1><span id="texto">LISTA DE BOMBEROS</span></h1>
            </div>
            <div class="container-fluid">
                <table >
                    <thead>
                        
                        <tr>
                        
                            <th scope="col-1"></th>
                            <th scope="col-1">NOMBRE</th>
                            <th scope="col-1">APELLIDO</th>
                            <th scope="col-1">DNI</th>
                            <th scope="col-1">FECHA DE NACIMIENTO</th>
                            <th scope="col-1">TELEFONO</th>
                            <th scope="col-1">DIRECCION</th>
                            <th scope="col-4">CORREO</th>
                            <th scope="col-1" style="width: 225px;">ACCION</th>
                        </tr>
                    </thead>
                    <tbody >
                        <script>
                         function expandirTexto(elemento) {
                                elemento.classList.toggle("expandir");
                                }

                        </script>
                        <?php
                        
                            include "../Model/conexion_bd.php";
                            $sql=$conexion->query(" select usuario.id, usuario.foto, usuario.nombre, usuario.apellido, usuario.dni, usuario.fecha_nac, usuario.telefono, usuario.direccion, usuario.correo from usuario");
                            
                            while ($datos = $sql->fetch_object()) { ?>
                                <tr class="text-center">      
                                
                                    <td>
                                        <?php if (!empty($datos->foto)) { ?>
                                            <img src="../../img/<?= $datos->foto ?>" alt="Foto de perfil" style="width: 100px;">
                                        <?php } else { ?>
                                            <span>Sin imagen</span>
                                        <?php } ?>
                                    </td>
                                
                                    <th onclick="expandirTexto(this)" class="expandir-columna"><?=$datos->nombre?></th>
                                    <th onclick="expandirTexto(this)" class="expandir-columna"><?=$datos->apellido?></th>
                                    <th onclick="expandirTexto(this)" class="expandir-columna"><?=$datos->dni?></th>
                                    <th onclick="expandirTexto(this)" class="expandir-columna"><?=$datos->fecha_nac?></th>
                                    <th onclick="expandirTexto(this)" class="expandir-columna"><?=$datos->telefono?></th>
                                    <th onclick="expandirTexto(this)" class="expandir-columna"><?=$datos->direccion?></th>
                                    <th onclick="expandirTexto(this)" class="expandir-columna"><?=$datos->correo?></th>
                                    <th>
                                        <a href="../Controller/c_agregar_bombero.php" class="btn btn-small btn-info"><i class="fa-solid fa-user-plus"></i></a>
                                        <a href="v_modificar_bombero.php?id=<?= $datos->id ?>" class="btn btn-small btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a onclick="eliminarBombero(<?= $datos->id ?>)"  class="btn btn-small btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    </th>
                                    
                                </tr>
                        <?php }
                        ?>
                        
                        
                    </tbody>
                </table>
            </div>
            
    </div>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
        
</body>
</html>