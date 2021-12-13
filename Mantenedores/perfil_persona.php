<?php 
    require_once "_init.php";
    authUser('persona');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil</title>
    <?php
    bootstrapHead();
    echoCSSLink("css/prefil_persona.css");
    ?>
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container-fluid">
        <?php 
        require "navbar_persona.php";
        require('conexion_p.php'); 

        $user = $_SESSION['usuario'];
        $consulta = "SELECT * FROM persona WHERE Rut_persona = '$user'";
        $resultado = mysqli_query($conexion, $consulta);
        $row = mysqli_fetch_assoc($resultado);
        $rut = $row['Rut_persona'];
        $municipalidad = $row['Id_municipalidad'];
        $nombre = $row['Nombre_persona'];
        $numero = $row['Numero_persona'];
        $correo = $row['Correo_persona'];
        $clave = $row['Clave_persona'];
        
        $consulta2 = "SELECT Nombre_municipalidad FROM municipalidad WHERE Id_municipalidad = '$municipalidad'";
        $resultado2 = mysqli_query($conexion, $consulta2);
        $row = mysqli_fetch_assoc($resultado2);
        $muni = $row['Nombre_municipalidad'];
        
        ?>

        <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
            <div class="card p-4">
                <div class=" image d-flex flex-column justify-content-center align-items-center"> 
                    
                        <img class="rounded-circle" src="https://thumbs.dreamstime.com/b/omita-el-icono-del-perfil-avatar-placeholder-gris-de-la-foto-99724602.jpg" height="150" width="150" />
                    
                    <span class="name mt-3"> <?php echo $nombre ?> </span> 
                    <span class="idd"> <?php echo $rut ?> </span>
                    <a href=<?php echoRutaComillas("Mantenedores/editar_perfil.php"); ?> class="link"><div class=" d-flex mt-2"> <button class="btn1 btn-dark ">Editar perfil</button> </div>  </a>                          
                    <div class="text mt-3"> <span>Correo: <?php echo $correo ?></span> 
                    <div class="text mt-3"> <span>Numero: <?php echo $numero ?></span> 
                    <div class="text mt-3"> <span>Municipalidad: <?php echo $muni ?></span> 

                </div>
            </div>
        </div>
    </div>
    <?php
        bootstrapBody();
    ?>
</body>
</html>