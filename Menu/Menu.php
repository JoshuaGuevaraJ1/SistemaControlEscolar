<?php

    session_start();

    if(!isset($_SESSION['usuarioj'])){
        echo '
            <script>
                alert("Por favor, debes iniciar sesión");
                window.location = "../Login/Index.php";
            </script>
        ';        
        session_destroy();
        die();
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu de navegación</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css"> -->
    <link rel="stylesheet" href="../assets/fontawesome-free-6.1.1-web/css/all.css">
    <link rel="icon" href="../images/favicon.png" type="image/png">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <?php
        include '../Conexiones/conexionSEGURIDAD.php';
        include '../Conexiones/conexionSISTEMAESCOLAR.php'; 
        
        $consulta = mysqli_query($conexionSEGURIDAD, "SELECT claveUsuario, nombreUsuario, primerApellido, segundoApellido FROM Usuarios");
        while ($fila = mysqli_fetch_array($consulta)):                        
            if ($fila['claveUsuario'] == $_SESSION['usuario']){
                $clave = $fila['claveUsuario'];
                $nombre = $fila['nombreUsuario'];
                $primerApellido = $fila['primerApellido'];
                $segundoApellido = $fila['segundoApellido'];
                $fotoPerfil = "../images/perfiles/".$clave.".png";
                $nombreUsuario = $nombre." ".$primerApellido." ".$segundoApellido."";                
            }
        endwhile;                    
    ?>

    <header class="header">

        <div class="perfil">
            <img src="
                <?php
                    echo $fotoPerfil;
                ?>
            " alt="">
            
            <h3><?php echo $nombreUsuario ?></h3>
            <p>TecNM Campus Apizaco</p>
        </div>
        
        <div>
            <nav class="nav">
                <ul>

                    <li class="opcionMenu">
                        <div class="botonOpciones">                            
                            <a href="../Inicio/Inicio.php" class="enlaceOpcion">
                                <i class="fa-solid fa-house"></i>
                                Inicio
                            </a>
                        </div>
                    </li>

                    <li class="opcionMenu opcionMenu--click">
                        <div class="botonOpciones list__button--click">                            
                            <a href="#" class="enlaceOpcion">
                                <i class="fa-solid fa-layer-group"></i>
                                Usuarios
                            </a>
                            <i class="fa-solid fa-angle-right flechaDesplazable"></i>                            
                        </div>

                        <ul class="mostrarOpcionesDesplazables">
                            <li class="opcionDesplazable">                                
                                <a href="../Alumnos/Alumnos.php" class="enlaceOpcion enlaceOpcion--inside">
                                    <i class="fa-solid fa-user-group"></i>
                                    Alumnos
                                </a>
                            </li>

                            <li class="opcionDesplazable">                                
                                <a href="../Administradores/Administradores.php" class="enlaceOpcion enlaceOpcion--inside">
                                    <i class="fa-solid fa-chalkboard-user"></i>
                                    Administradores
                                </a>
                            </li>

                            <li class="opcionDesplazable">
                                <a href="../TipoSangre/TipoSangre.php" class="enlaceOpcion enlaceOpcion--inside">
                                    <i class="fa-solid fa-droplet"></i>
                                    Tipos de Sangre
                                </a>
                            </li>
    
                        </ul>

                    </li>

                    <li class="opcionMenu">
                        <div class="botonOpciones">
                            <a href="https://mail.practicaseguridadredes.com/mail/index.php" class="enlaceOpcion">
                                <i class="fa-solid fa-mail-bulk"></i>
                                Mi Correo
                            </a>
                        </div>
                    </li>

                    <li class="opcionMenu">
                        <div class="botonOpciones">
                            <a href="http://nas.practicaseguridadredes.com/nextcloud/index.php" class="enlaceOpcion">
                                <i class="fa-solid fa-cloud"></i>
                                Mi Nube NextCloud
                            </a>
                        </div>
                    </li>

                    <li class="opcionMenu">
                        <div class="botonOpciones">
                            <a href="http://192.168.47.131/zabbix/index.php" class="enlaceOpcion">
                                <i class="fa-solid fa-network-wired"></i>
                                Monitor de Red
                            </a>
                        </div>
                    </li>

                    <li class="opcionMenu">
                        <div class="botonOpciones">
                            <a href="http://phone.practicaseguridadredes.com/admin/config.php" class="enlaceOpcion">
                                <i class="fa-solid fa-phone"></i>
                                Teléfono
                            </a>
                        </div>
                    </li>


                    <li class="opcionMenu opcionMenu--click">
                        <div class="botonOpciones list__button--click"> 
                            <a class="enlaceOpcion">
                                <i class="fa-solid fa-bell" ></i>
                                Notificaciones                            
                            </a>
                            <i class="fa-solid fa-angle-right flechaDesplazable"></i>                            
                        </div>

                        <ul class="mostrarOpcionesDesplazables">
                            <li class="opcionDesplazable">
                                <a href="#" class="enlaceOpcion enlaceOpcion--inside">
                                    <i class="fa-solid fa-circle-exclamation" >   </i>
                                    Importantes                            
                                </a>
                            </li>

                            <li class="opcionDesplazable">
                                <a href="#" class="enlaceOpcion enlaceOpcion--inside">
                                    <i class="fa-solid fa-comment-dots" >   </i>
                                    Generales                                
                                </a>
                            </li>
                        </ul>

                    </li>


                    <li class="opcionMenu">
                        <div class="botonOpciones">                            
                            <a href="#" class="enlaceOpcion">
                                <i class="fa-solid fa-id-badge"></i>
                                Contacto
                            </a>
                        </div>
                    </li>

                    <li class="opcionMenu">
                        <div class="botonOpciones">                            
                            <a href="../CerrarSesion.php" class="enlaceOpcion">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            Cerrar sesión
                            </a>
                        </div>
                    </li>

                </ul>
            </nav>
        </div>

    </header>    
    <!-- header section ends -->

    <?php include '../Baner/Banner.php'; ?>
    
    <div id="menu-btn" class="fa-solid fa-bars"></div>

    <!-- theme toggler  -->
    <!-- <div id="theme-toggler" class="fas fa-moon"></div> -->

    <!-- custom js file link  -->
    <script src="JS/script.js"></script>
    <script src="JS/main.js"></script>

    <script src="../JS/script.js"></script>
    <script src="../JS/main.js"></script>
    
</body>
</html>
