<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>

    <!-- CSS con modo oscuro y animaciones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <!-- Diseño CSS -->
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="../CSS/style.css"> 

</head>
<body>
    <div class="bannerInicio">
        <?php
            include '../Menu/Menu.php';
            include '../Conexiones/conexionSEGURIDAD.php';
        ?>
    </div>    
    <section class="inicio" id="inicio">        
        <div class="contenido">
            <h3><?php echo $nombreUsuario ?></h3>
            <p>Bienvenido al Sistema de Control Escolar</p>
        </div>
        <div class="redesSociales">
            <a href="#" class="fa-brands fa-facebook-f"></a>
            <a href="#" class="fa-brands fa-twitter"></a>
            <a href="#" class="fa-brands fa-instagram"></a>
            <a href="#" class="fa-brands fa-linkedin"></a>
            <a href="#" class="fa-brands fa-pinterest"></a>
        </div>

    </section>    
</body>
</html>