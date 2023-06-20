<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta for="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
    <script>
        function ConfirmacionEliminar(){
            var respuesta = confirm("¿Estas seguro de eliminar al estudiante?");
            if (respuesta == true){
                return true;
            }else{
                return false;
            }
        }
    </script>
</head>
<body>    
    <section class="ver" id="ver">
        <?php
            include '../Menu/Menu.php'; 
            $matriculaAlumno = $_GET['matriculaAlumno'];
            //Consultas que obtienes los datos de las tablas relacionadas
            $consultaAlumno = mysqli_query($conexionSISTEMAESCOLAR, "SELECT * FROM Alumno, Carrera, TiposSangre, Sexo, CodigosPostales, Municipios, Estados, Parentesco
                WHERE matriculaAlumno = '$matriculaAlumno'
                AND Alumno.claveCarrera=Carrera.claveCarrera 
                AND Alumno.claveSangre=TiposSangre.claveSangre 
                AND Alumno.claveSexo=Sexo.claveSexo 
                AND Alumno.idCodigoPostal=CodigosPostales.idCodigoPostal 
                AND CodigosPostales.idMunicipio=Municipios.idMunicipio 
                AND Municipios.idEstado=Estados.idEstado
                AND Alumno.claveParentesco=Parentesco.claveParentesco");

            $filaDatosAlumno = $consultaAlumno->fetch_assoc();
        ?>
        <h1 class="heading"> Visualización de datos de un<span> Alumno </span></h1>        
        <form action="" method = "" class="formularioCRUD">
            <div class="botones">
                <div class="left">
                    <a href="Alumnos.php" class="btn"><i class="fa-solid fa-circle-chevron-left"></i>  Regresar</a>
                </div>
                <div class="right">
                    <a class="btnModificarCRUD" href="UpdateForm.php?matriculaAlumno=<?php echo $filaDatosAlumno['matriculaAlumno'] ?>"><i class="fa-solid fa-pen-to-square"></i>Modificar datos</a>
                    <a class="btnEliminarCRUD" href="Delete.php?matriculaAlumno=<?php echo $filaDatosAlumno['matriculaAlumno'] ?>" onclick="return ConfirmacionEliminar()"><i class="fa-solid fa-trash-can"></i> Eliminar alumno</a>
                </div>
            </div>
            <div class="formularioResponsivo">
                <div class="perfil">
                    <img src="
                        <?php
                            echo 'PerfilesAlumnos/'.$matriculaAlumno.'.png';
                        ?>
                    " alt="Foto de perfil de '<?php echo $matriculaAlumno ?>' ">
                </div> 
                <div class="grid">
                    <div class="box">
                        <h1>Datos <span>personales</span></h1>
                        <h3>Matrícula:<label for="matriculaAlumno" class="labelDatos"><?php echo $filaDatosAlumno['matriculaAlumno'] ?></label></h3>
                        <h3>Nombre:<label for="nombreAlumno" class="labelDatos"><?php echo $filaDatosAlumno['nombreAlumno'] ?></label></h3>
                        <h3>Primer Apellido:<label for="primerApellido" class="labelDatos"><?php echo $filaDatosAlumno['primerApellido'] ?></label></h3>
                        <h3>Segundo Apellido:<label for="segundoApellido" class="labelDatos">
                                <?php if($filaDatosAlumno['segundoApellido']==null) {
                                    echo '--------';
                                }else{ 
                                    echo $filaDatosAlumno['segundoApellido'];
                                }?>
                        </label></h3>
                        <h3>Sexo: <label for="claveSexo" class="labelDatos"><?php echo $filaDatosAlumno['sexo'] ?></label></h3>   
                        <h3>CURP: <label for="curp" class="labelDatos"><?php echo $filaDatosAlumno['curp'] ?></label></h3>
                        <h3>Fecha de nacimiento: <label for="fechaNacimiento" class="labelDatos"><?php echo $filaDatosAlumno['fechaNacimiento'] ?></label></h3>
                    </div>

                    <div class="box">            
                        <h1>Datos de <span>dirección</span></h1>
                        <h3>Selecciona estado: <label for="cbx_estado" id="cbx_estado" class="labelDatos"><?php echo $filaDatosAlumno['estado'] ?></label></h3>
                        <h3>Municipio:<label for="cbx_municipio" id="cbx_municipio" class="labelDatos"><?php echo $filaDatosAlumno['municipio'] ?></label></h3>
                        <h3>Colonia:<label for="cbx_localidad" id="cbx_localidad" class="labelDatos"><?php echo $filaDatosAlumno['colonia'] ?></label></h3>
                        <h3>Calle: <label for="calle" class="labelDatos"><?php echo $filaDatosAlumno['calle'] ?></label></h3>
                        <h3>Número Interior: <label for="numeroInterior" class="labelDatos"><?php echo $filaDatosAlumno['numeroInterior'] ?></label></h3>
                        <h3>Número Exterior: <label for="numeroExterior" class="labelDatos"><?php echo $filaDatosAlumno['numeroExterior'] ?></label></h3>
                    </div>

                    <div class="box">
                        <h1>Datos <span>académicos</span></h1>
                        <h3>Carrera: <label for="claveCarrera" id="claveCarrera" class="labelDatos"><?php echo $filaDatosAlumno['nombreCarrera'] ?></label></h3>
                    </div>

                    <div class="box">
                        <h1>Datos <span>médicos</span></h1>
                        <h3>
                            Tipo de sangre: <label for="claveSangre" id="claveSangre" class="labelDatos"><?php echo $filaDatosAlumno['tipoSangre'] ?></label></h3>
                    </div>
                    
                    <div class="box">
                        <h1>Datos de <span>contacto</span></h1>
                        <h3>Teléfono Celular: <label for="telefonoCelular" class="labelDatos"><?php echo $filaDatosAlumno['telefonoCelular'] ?></label></h3>
                        <h3>Teléfono de emergencia: <label for="telefonoEmergencia" class="labelDatos"><?php echo $filaDatosAlumno['telefonoEmergencia'] ?></label></h3>
                        <h3>Correo electrónico: <label for="correoElectronico" class="labelDatos"><?php echo $filaDatosAlumno['correoElectronico'] ?></label></h3>                
                    </div>
                    <div class="box">
                        <h1>Datos de <span>tutor</span></h1>
                        <h3>Nombre del tutor: <label for="nombreTutor" class="labelDatos"><?php echo $filaDatosAlumno['nombreTutor'] ?></label></h3>
                        <h3>Teléfono celular: <label for="telefonoTutor" class="labelDatos"><?php echo $filaDatosAlumno['telefonoTutor'] ?></label></h3>
                        <h3>Correo Electrónico: <label for="correoTutor" class="labelDatos"><?php echo $filaDatosAlumno['correoTutor'] ?></label></h3>
                        <h3>Parentesco: <label for="parentesco" class="labelDatos"><?php echo $filaDatosAlumno['parentesco'] ?></label></h3>
                    </div>
                </div>
            </div>
        </form>           
    </section>
    
</body>
</html>