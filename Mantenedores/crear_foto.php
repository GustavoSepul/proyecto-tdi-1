<?php
require_once "_init.php";
authUser('encargado');
require('conexion_p.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="shortcut icon" href="../img/municipalidad1.png" />
    <meta charset="UTF-8">
    <title>Ingresar fotos</title>
    <?php
    bootstrapHead();
    ?>
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container-fluid">
        <?php require('navbar_encargado.php'); ?>
        <div class="container px-5 my-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 rounded-3 shadow-lg">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <div class="h1 fw-light">Nueva foto</div>
                                <p class="mb-4 text-muted">Ingresa los datos en este formulario para poder crear la nueva foto</p>
                            </div>
                            <form action="ingresar_foto.php" method="post">
                                <!-- Nombre de la foto -->
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="Titulo" type="text" placeholder="Titulo de la foto" />
                                    <label for="Titulo">Titulo</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="Ruta" type="text" placeholder="Nombre de la foto" />
                                    <label for="Ruta">Nombre</label>
                                </div>
                                <!-- Boton -->
                                <div class="d-grid">
                                    <button class="btn btn-dark btn-lg" id="submitButton" type="submit">Ingresar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    bootstrapBody();
    kitFontBody();
    require('Footer.html');
    ?>
</body>

</html>