<?php

    session_start();
    if(isset($_SESSION['usuario'])){
        header("location: ../Inicio/Inicio.php");
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Escolar</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../CSS/style.css">

</head>
<body>        
    <div style="padding:2rem">
        <?php include '../Baner/Banner.php'; ?>
    </div>
    <div class="login">         
        <div class="imagenLogin">
            <!-- <img src="../images/log1.png" >    -->
            <video src="../images/login1.mp4" muted type="video/mp4" autoplay loop></video>
        </div>   
        
        <div class= "formulario">
            <form action="PruebaDatos.php" method = "GET">    
                <h1>Usuario</h1>
                <input type="text" name="usuario" class="inputBox" required minlength="8" maxlength="9" size="10"><br>
                <h1>Contraseña</h1>
                <input type="password" name="password" class="inputBox"><br>
                <div class="botonLogin">
                    <button class="botonPersonalizado estiloBoton"><span>Iniciar</span><span>Iniciar sesión</span></button>
                </div>
            </form>
        </div>
    </div>    
</body>
</html>
