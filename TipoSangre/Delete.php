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

    include('../Conexiones/ConexionSISTEMAESCOLAR.php');
    $clave = $_GET['id'];

    $consulta = mysqli_query($conexionSISTEMAESCOLAR, "DELETE FROM TiposSangre WHERE claveSangre = '$clave'");
    if($consulta){
        Header("Location: TipoSangre.php");
    }else{
        echo $clave;
    }

?>