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
}else{
    include '../Conexiones/conexionSEGURIDAD.php';    

    $claveUsuario = $_POST['claveUsuario'];
    $nombreUsuario = $_POST['nombreUsuario'];
    $primerApellido = $_POST['primerApellido'];
    $segundoApellido = $_POST['segundoApellido'];    
    $telefonoUsuario = $_POST['telefonoUsuario'];
    $correoElectronico = $_POST['correoElectronico'];
    $passwordUsuario = $_POST['passwordUsuario'];

    $consulta = mysqli_query($conexionSEGURIDAD, "UPDATE Usuarios SET claveUsuario = '$claveUsuario', nombreUsuario = '$nombreUsuario', primerApellido = '$primerApellido',  segundoApellido = '$segundoApellido', correoElectronico = '$correoElectronico', telefonoUsuario = '$telefonoUsuario', passwordUsuario = md5('$passwordUsuario')  WHERE claveUsuario = '$claveUsuario'");

    if($consulta){
        echo '
            <script>
                alert("Se han actualizado sus datos correctamente");
                window.location = "Administradores.php";
            </script>
        ';// header("Location: Alumnos.php");
    }else{
        echo 'error'.mysqli_error($conexionSEGURIDAD);
    }
}
?>