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

    

    $consulta = mysqli_query($conexionSISTEMAESCOLAR, "UPDATE Alumno SET matriculaAlumno = '$matriculaAlumno', nombreAlumno = '$nombreAlumno', primerApellido = '$primerApellido',  segundoApellido = '$segundoApellido', claveSexo = '$claveSexo', fechaNacimiento = '$fechaNacimiento', curp = '$curp', idCodigoPostal = '$idCodigoPostal', calle = '$calle', numeroInterior = '$numeroInterior', numeroExterior = '$numeroExterior', telefonoCelular = '$telefonoCelular', telefonoEmergencia = '$telefonoEmergencia', correoElectronico = '$correoElectronico', claveCarrera = '$claveCarrera', claveSangre = '$claveSangre', nombreTutor = '$nombreTutor', telefonoTutor = '$telefonoTutor', correoTutor = '$correoTutor', claveParentesco = '$claveParentesco'  WHERE matriculaAlumno = '$matriculaAlumno'");

    if($consulta){
        echo '
            <script>
                alert("Se han actualizado sus datos correctamente");
                window.location = "Alumnos.php";
            </script>
        ';// header("Location: Alumnos.php");
    }else{
        echo 'error'.mysqli_error($conexionSISTEMAESCOLAR);
    }
}
?>