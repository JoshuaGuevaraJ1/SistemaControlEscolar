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
    include '../Conexiones/ConexionSISTEMAESCOLAR.php';    

    $claveSangre = $_GET['claveSangre'];
    $tipoSangre = $_GET['tipoSangre'];

    $consulta = mysqli_query($conexionSISTEMAESCOLAR, "UPDATE TiposSangre SET claveSangre = '$claveSangre', tipoSangre = '$tipoSangre' WHERE claveSangre = '$claveSangre'");

    if($consulta){
        header("Location: TipoSangre.php");
    }else{
        echo "Error";
    }
?>