<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="shortcut icon" href="../../img/logo.png" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="../../css/inicio.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2df137ad92.js" crossorigin="anonymous"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Gajraj+One&family=Secular+One&display=swap" rel="stylesheet">
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
            <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
            <div class="navbar-nav border-bottom border-bottom-dark" data-bs-theme="dark">
                <a class="nav-link text-dark " aria-current="page" href="index.php">Inicio</a>
                <a class="nav-link text-dark" href="../../lista_bomberos_MVC/Views/lista_bomberos.php">Lista de Bomberos</a>
                
            </div>
            </div>
        </div>
    </nav>
    
    <div class="container">
        <div class="caja">
            <h1><span id="texto">BOMBEROS CORONDA</span></h1>
        </div>
            <div class="container">
            <table>
                    <thead>
                        
                        <tr>
                        
                        <th scope="col"></th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">APELLIDO</th>
                        <th scope="col">TELEFONO</th>
                        
                        
                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                            include "../Model/conexion_bd.php";
                            $sql=$conexion->query(" select usuario.id, usuario.foto, usuario.nombre, usuario.apellido, usuario.dni, usuario.fecha_nac, usuario.telefono, usuario.direccion, usuario.correo from usuario");
                            
                            while ($datos = $sql->fetch_object()) { ?>
                            
                            
                                <tr>      
                                
                                
                                    <td>
                                        <?php if (!empty($datos->foto)) { ?>
                                            <img src="../../img/<?= $datos->foto ?>" alt="Foto de perfil" style="width: 100px;">
                                        <?php } else { ?>
                                            <span>Sin imagen</span>
                                        <?php } ?>
                                    </td>
                                    <th><?=$datos->nombre?></th>
                                    <th><?=$datos->apellido?></th>
                                    
                                    <th><?=$datos->telefono?></th>
                                    
                                    <td>
                                        <a href="v_agregarhoras.php?id=<?= $datos->id ?>" class="btn btn-primary-rgb" ><i class="fa-solid fa-hourglass-start fa-2xl" style="color: #ffffff;"></i></a>
                                        
                                    </td>
                                    <td>
                                        <a href="horas_x_bombero.php?id=<?= $datos->id ?>" class="btn " ><i class="fa-solid fa-square-poll-horizontal fa-2xl" style="color: #ffffff;"></i></i></a>
                                    </td>
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