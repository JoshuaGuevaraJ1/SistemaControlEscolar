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
    include '../Conexiones/conexionSEGURIDAD.php'; 
    
    $claveUsuario = $_POST['claveUsuario'];
    $nombreUsuario = $_POST['nombreUsuario'];
    $primerApellido = $_POST['primerApellido'];
    $segundoApellido = $_POST['segundoApellido'];    
    $telefonoUsuario = $_POST['telefonoUsuario'];
    $correoElectronico = $_POST['correoElectronico'];
    $passwordUsuario = $_POST['passwordUsuario'];
    

    $consulta = mysqli_query($conexionSEGURIDAD, "INSERT INTO Usuarios VALUES ('$claveUsuario','$nombreUsuario','$primerApellido','$segundoApellido','$telefonoUsuario','$correoElectronico',md5('$passwordUsuario'))");
    if($consulta){
        echo '
            <script>
                alert("Se ha registrado correctamente");
                window.location = "Administradores.php";
            </script>
        ';
        // header("Location: Alumnos.php");
    }else{
        echo "Error".mysqli_error($conexionSEGURIDAD);;
    }
?>