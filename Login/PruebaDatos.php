<?php  
    
    session_start();
    
    include '../Conexiones/conexionSEGURIDAD.php';
    $usuario = $_GET['usuario'];
    $password = $_GET['password'];

    $consultaSQL = "SELECT * FROM Usuarios WHERE claveUsuario = '$usuario' and passwordUsuario = md5('$password')";
    $validarLogin = mysqli_query($conexionSEGURIDAD, $consultaSQL);

    if(mysqli_num_rows($validarLogin) > 0) {
        $_SESSION['usuario'] = $usuario;
        header("location: ../Inicio/Inicio.php");
        exit;
    }else{
        echo '
            <script>   
            alert("Usuario no existe, por favor verifique los datos introducidos");                
            window.location = "Index.php"; 
            </script>
        ';
        exit;
    }
?>
