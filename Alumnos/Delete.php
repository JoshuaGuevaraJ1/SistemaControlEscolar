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
    $matricula = $_GET['matriculaAlumno'];
    
    $consulta = mysqli_query($conexionSISTEMAESCOLAR, "DELETE FROM Alumno WHERE matriculaAlumno = '$matricula'");
    if($consulta){
        echo '
            <script>
                alert("Se ha eliminado correctamente");
                window.location = "Alumnos.php";
            </script>
        ';
        // Header("Location: Alumnos.php");
    }
?>