<?php            
    include '../Conexiones/ConexionSISTEMAESCOLAR.php'; 
    
    $claveSangre = $_GET["claveSangre"];
    $tipoSangre = $_GET["tipoSangre"];

    $consulta = mysqli_query($conexionSISTEMAESCOLAR, "INSERT INTO TiposSangre VALUES ('$claveSangre','$tipoSangre')");
    if($consulta){
        header("Location: TipoSangre.php");
    }else{
        echo "Error";
    }
?>