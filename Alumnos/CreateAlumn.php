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
    
    $matriculaAlumno = $_POST['matriculaAlumno'];
    $nombreAlumno = $_POST['nombreAlumno'];
    $primerApellido = $_POST['primerApellido'];
    $segundoApellido = $_POST['segundoApellido'];
    $claveSexo = $_POST['claveSexo'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $curp  = $_POST['curp'];
    $idCodigoPostal = $_POST['cbx_localidad'];
    $calle  = $_POST['calle'];
    $numeroInterior  = $_POST['numeroInterior'];
    $numeroExterior = $_POST['numeroExterior'];
    $telefonoCelular  = $_POST['telefonoCelular'];
    $telefonoEmergencia = $_POST['telefonoEmergencia'];
    $correoElectronico = $_POST['correoElectronico'];
    $claveCarrera = $_POST['claveCarrera'];
    $claveSangre = $_POST['claveSangre'];
    $nombreTutor = $_POST['nombreTutor'];
    $telefonoTutor = $_POST['telefonoTutor'];
    $correoTutor = $_POST['correoTutor'];
    $claveParentesco = $_POST['claveParentesco'];
    

    $consulta = mysqli_query($conexionSISTEMAESCOLAR, "INSERT INTO Alumno VALUES ('$matriculaAlumno','$nombreAlumno','$primerApellido','$segundoApellido','$claveSexo','$fechaNacimiento','$curp','$idCodigoPostal','$calle','$numeroInterior','$numeroExterior','$telefonoCelular','$telefonoEmergencia','$correoElectronico','$claveCarrera','$claveSangre','$nombreTutor','$telefonoTutor','$correoTutor','$claveParentesco')");
    if($consulta){
        echo '
            <script>
                alert("Se ha registrado correctamente");
                window.location = "Alumnos.php";
            </script>
        ';
        // header("Location: Alumnos.php");
    }else{
        echo "Error";
    }
?>