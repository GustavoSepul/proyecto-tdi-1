<?php require('../auth_encargado.php') ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/perfil_persona.css">
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container-fluid">
        <?php 
        require('navbar_encargado.html');
        require('conexion_p.php'); 

        $user = $_SESSION['usuario'];
        $consulta = "SELECT * FROM encargado WHERE Rut_encargado = '$user'";
        $resultado = mysqli_query($conexion, $consulta);
        $row = mysqli_fetch_assoc($resultado);
        $rut = $row['Rut_encargado'];
        $nombre = $row['Nombre_encargado'];
        $numero = $row['Numero_encargado'];
        $correo = $row['Correo_encargado'];
        $clave = $row['Clave_encargado'];
        
        $consulta2 = "SELECT Id_municipalidad,Nombre_dep FROM departamento WHERE Rut_encargado = '$rut'";
        $resultado2 = mysqli_query($conexion, $consulta2);
        $row = mysqli_fetch_assoc($resultado2);
        $Idmuni = $row['Id_municipalidad'];
        $depa = $row['Nombre_dep'];

        $consulta3 = "SELECT Nombre_municipalidad FROM municipalidad WHERE Id_municipalidad = '$Idmuni'";
        $resultado3 = mysqli_query($conexion, $consulta3);
        $row = mysqli_fetch_assoc($resultado3);
        $muni = $row['Nombre_municipalidad'];
        
        ?>

        <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
            <div class="card p-4">
                <div class=" image d-flex flex-column justify-content-center align-items-center"> 
                    
                        <img class="rounded-circle" src="https://thumbs.dreamstime.com/b/omita-el-icono-del-perfil-avatar-placeholder-gris-de-la-foto-99724602.jpg" height="150" width="150" />
                    
                    <span class="name mt-3"> <?php echo $nombre ?> </span> 
                    <span class="idd"> <?php echo $rut ?> </span>
                    <a href="editar_perfil_encargado.php" class="link"><div class=" d-flex mt-2"> <button class="btn1 btn-dark ">Editar perfil</button> </div>  </a>                          
                    <div class="text mt-3"> <span>Correo: <?php echo $correo ?></span> 
                    <div class="text mt-3"> <span>Numero: <?php echo $numero ?></span> 
                    <div class="text mt-3"> <span>Municipalidad: <?php echo $muni ?></span> 
                    <div class="text mt-3"> <span>Departamento: <?php echo $depa ?></span> 
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</html>