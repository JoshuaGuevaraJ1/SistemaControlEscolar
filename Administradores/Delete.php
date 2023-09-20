<?php
    session_start();

    if(!isset($_SESSION['usuario'])){
        echo '
            <script>
                alert("Por favor, debes iniciar sesión");
                window.location = "../Login/Prueba.php";
            </script>
        ';        
        session_destroy();
        die();
    }

    include('../Conexiones/conexionSEGURIDAD.php');
    $claveUsuario = $_GET['claveUsuario'];
    
    $consulta = mysqli_query($conexionSEGURIDAD, "DELETE FROM Usuarios WHERE claveUsuario = '$claveUsuario'");
    if($consulta){
        echo '
            <script>
                alert("Se ha eliminado correctamente");
                window.location = "Administradores.php";
            </script>
        ';
        // Header("Location: Alumnos.php");
    }
?>