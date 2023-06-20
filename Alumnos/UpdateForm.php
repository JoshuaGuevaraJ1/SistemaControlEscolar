<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>

    <script language="javascript" src="../JS/jquery-3.1.1.min.js"></script>
    <script language="javascript">
			$(document).ready(function(){
				$("#cbx_estado").change(function () {

					$('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#cbx_estado option:selected").each(function () {
						idEstado = $(this).val();
						$.post("getMunicipio.php", { idEstado: idEstado }, function(data){
							$("#cbx_municipio").html(data);
						});            
					});
				})
			});

			$(document).ready(function(){
				$("#cbx_municipio").change(function () {
					$("#cbx_municipio option:selected").each(function () {
						idMunicipio = $(this).val();
						$.post("getLocalidad.php", { idMunicipio: idMunicipio }, function(data){
							$("#cbx_localidad").html(data);
						});            
					});
				})
			});
            function ConfirmacionEliminar(){
            var respuesta = confirm("¿Estas seguro de eliminar al estudiante?");
            if (respuesta == true){
                return true;
            }else{
                return false;
            }
        }
		</script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
        <script>
            $('.phone_with_ddd').mask('(000) 000-00-00');
        </script>
</head>
<body>    
    <section class="modificarAlumno" id="modificarAlumno">
        <?php
            include '../Menu/Menu.php'; 
            $matriculaAlumno = $_GET['matriculaAlumno'];
            //Obtiene los datos del alumno haciendo producto cartesiando con demás tablas para que muestre correctamente su dato de las tablas relacionadas
            $consultaAlumno = mysqli_query($conexionSISTEMAESCOLAR, "SELECT * FROM Alumno, Carrera, TiposSangre, Sexo, CodigosPostales, Municipios, Estados
                WHERE matriculaAlumno = '$matriculaAlumno'
                AND Alumno.claveCarrera=Carrera.claveCarrera 
                AND Alumno.claveSangre=TiposSangre.claveSangre 
                AND Alumno.claveSexo=Sexo.claveSexo 
                AND Alumno.idCodigoPostal=CodigosPostales.idCodigoPostal 
                AND CodigosPostales.idMunicipio=Municipios.idMunicipio 
                AND Municipios.idEstado=Estados.idEstado");

            // Asocia los datos de carrera, direccion, alumno, sexo y tipo de sangre-->datos que tiene registrados el alumno
            $filaDatosAlumno = $consultaAlumno->fetch_assoc();

            //Obtiene los datos de las tablas para que se muestren todos
            $estados = mysqli_query($conexionSISTEMAESCOLAR, "SELECT idEstado, estado FROM Estados ORDER BY Estado");
            $tiposSangre =  mysqli_query($conexionSISTEMAESCOLAR, "SELECT claveSangre, tipoSangre FROM  TiposSangre");
            $carreras = mysqli_query($conexionSISTEMAESCOLAR, "SELECT claveCarrera, nombreCarrera FROM  Carrera ORDER BY nombreCarrera");
            $sexos = mysqli_query($conexionSISTEMAESCOLAR, "SELECT claveSexo, sexo FROM  Sexo");
            $parentesco = mysqli_query($conexionSISTEMAESCOLAR, "SELECT claveParentesco, parentesco FROM  Parentesco");
        ?>
        <h1 class="heading"> Modificar datos de un<span> Alumno </span></h1>        
        <form action="updateAlumno.php" method = "POST" class="formularioCRUD">
            <div class="botones">
                <div class="left">
                    <a href="Alumnos.php" class="btn"><i class="fa-solid fa-circle-chevron-left"></i>  Regresar</a>
                </div>
                <div class="right">
                    <a class="btnEliminarCRUD" href="Delete.php?id=<?php echo $filaDatosAlumno['matriculaAlumno'] ?>" onclick="return ConfirmacionEliminar()"><i class="fa-solid fa-trash-can"></i> Eliminar alumno</a>
                    <button class="btnModificarCRUD"><i class="fa-solid fa-pen-to-square"></i> Actualizar datos de <?php echo $filaDatosAlumno['matriculaAlumno'] ?></button>
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
                        <h3>Matrícula: <input type="text" name="matriculaAlumno" class="inputBox" value="<?php echo $filaDatosAlumno['matriculaAlumno'] ?>" readonly></h3>
                        <h3>Nombre: <input type="text" name="nombreAlumno" class="inputBox" value="<?php echo $filaDatosAlumno['nombreAlumno'] ?>" required></h3>
                        <h3>Primer Apellido: <input type="text" name="primerApellido" class="inputBox" value="<?php echo $filaDatosAlumno['primerApellido'] ?>" required></h3>
                        <h3>Segundo Apellido: <input type="text" name="segundoApellido" class="inputBox" value="<?php echo $filaDatosAlumno['segundoApellido'] ?>"></h3>
                        <h3>Sexo:
                            <select name="claveSexo" id="claveSexo" class="inputBox" required>
                                <?php while($filaSexos = $sexos->fetch_assoc()) { 
                                    if($filaSexos['claveSexo']==$filaDatosAlumno['claveSexo']){?>
                                        <option value="<?php echo $filaSexos['claveSexo']; ?>" selected="selected"><?php echo $filaSexos['sexo']; ?></option>
                                    <?php }else{ ?>
                                        <option value="<?php echo $filaSexos['claveSexo']; ?>"><?php echo $filaSexos['sexo']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>   
                        </h3>   
                        <h3>CURP: <input type="text" name="curp" class="inputBox" style="text-transform: uppercase" value="<?php echo $filaDatosAlumno['curp'] ?>" required minlength="18" maxlength="18" size="18"></h3>
                        <h3>Fecha de nacimiento: <input type="date" name="fechaNacimiento" class="inputBox" required value="<?php echo $filaDatosAlumno['fechaNacimiento'] ?>"></h3>
                    </div>

                    <div class="box">            
                        <h1>Datos de <span>dirección</span></h1>
                        <h3>
                            Selecciona estado: 
                            <select name="cbx_estado" id="cbx_estado" class="inputBox" required>
                                
                                <?php while($filaEstados = $estados->fetch_assoc()) { 
                                    if($filaEstados['idEstado']==$filaDatosAlumno['idEstado']){?>
                                        <option value="<?php echo $filaEstados['idEstado']; ?>" selected="selected"><?php echo $filaEstados['estado']; ?></option>
                                    <?php }else{ ?>
                                        <option value="<?php echo $filaEstados['idEstado']; ?>"><?php echo $filaEstados['estado']; ?></option>
                                    <?php } ?>
                                    
                                <?php } ?>
                                
                            </select>  
                        </h3> 

                        <br />
                        <h3>Municipio: <select name="cbx_municipio" id="cbx_municipio" class="inputBox" required>
                            <option value="<?php echo $filaDatosAlumno['idMunicipio'] ?>"><?php echo $filaDatosAlumno['municipio'] ?></option>
                        </select></h3>
                        <br />
                        <h3>Colonia: <select name="cbx_localidad" id="cbx_localidad" class="inputBox" required>
                            <option value="<?php echo $filaDatosAlumno['idCodigoPostal'] ?>"><?php echo $filaDatosAlumno['colonia'] ?></option>
                        </select></h3>
                        <h3>Calle: <input type="text" name="calle" class="inputBox" value="<?php echo $filaDatosAlumno['calle'] ?>" required></h3>
                        <h3>Número Interior: <input type="text" name="numeroInterior" class="inputBox" value="<?php echo $filaDatosAlumno['numeroInterior'] ?>" required></h3>
                        <h3>Número Exterior: <input type="text" name="numeroExterior" class="inputBox" value="<?php echo $filaDatosAlumno['numeroExterior'] ?>" required></h3>
                    </div>

                    <div class="box">
                        <h1>Datos <span>académicos</span></h1>
                        <h3>
                            Carrera:
                            <select name="claveCarrera" id="claveCarrera"  class="inputBox" required>                        
                                <?php while($filaCarreras = $carreras->fetch_assoc()) {
                                    if($filaCarreras['claveCarrera']==$filaDatosAlumno['claveCarrera']){?>
                                        <option value="<?php echo $filaCarreras['claveCarrera'] ?>" selected="selected"><?php echo $filaCarreras['nombreCarrera'] ?></option>
                                    <?php }else{ ?>
                                        <option value="<?php echo $filaCarreras['claveCarrera'] ?>"><?php echo $filaCarreras['nombreCarrera'] ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </h3>
                    </div>

                    <div class="box">
                        <h1>Datos <span>médicos</span></h1>
                        <h3>
                            Tipo de sangre:
                            <select name="claveSangre" id="claveSangre" class="inputBox">                                                
                                <?php while($filaTiposSangre = $tiposSangre->fetch_assoc()) {                             
                                    if($filaTiposSangre['claveSangre']==$filaDatosAlumno['claveSangre']){?>
                                        <option value="<?php echo $filaTiposSangre['claveSangre']; ?>" selected="selected"><?php echo $filaTiposSangre['tipoSangre']; ?></option>
                                    <?php }else{ ?>
                                        <option value="<?php echo $filaTiposSangre['claveSangre']; ?>"><?php echo $filaTiposSangre['tipoSangre']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </h3>
                    </div>
                    
                    <div class="box">
                        <h1>Datos de <span>contacto</span></h1>
                        <h3>Teléfono Celular: <input type="text" name="telefonoCelular" class="inputBox phone_with_ddd" value="<?php echo $filaDatosAlumno['telefonoCelular'] ?>" required minlength="15" maxlength="15" size="15"></h3>
                        <h3>Teléfono de emergencia: <input type="text" name="telefonoEmergencia" class="inputBox phone_with_ddd" value="<?php echo $filaDatosAlumno['telefonoEmergencia'] ?>" required minlength="15" maxlength="15" size="15"></h3>
                        <h3>Correo electrónico: <input type="text" name="correoElectronico" class="inputBox" value="<?php echo $filaDatosAlumno['correoElectronico'] ?>" required></h3>                
                    </div>

                    <div class="box">
                        <h1>Datos de <span>tutor</span></h1>
                        <h3>Nombre del tutor: <input type="text" name="nombreTutor" class="inputBox" value="<?php echo $filaDatosAlumno['nombreTutor'] ?>" required></h3>
                        <h3>Teléfono celular: <input type="text" name="telefonoTutor" class="inputBox phone_with_ddd" value="<?php echo $filaDatosAlumno['telefonoTutor'] ?>" required></h3>
                        <h3>Correo Electrónico: <input type="text" name="correoTutor" class="inputBox" value="<?php echo $filaDatosAlumno['correoTutor'] ?>" required></h3>
                        <h3>Parentesco: 
                            <select  name="claveParentesco"  id="claveParentesco" class="inputBox" required>                                
                                <?php while($filaParentesco = $parentesco->fetch_assoc()) { 
                                    if($filaParentesco['claveParentesco']==$filaDatosAlumno['claveParentesco']){?>
                                        <option value="<?php echo $filaParentesco['claveParentesco']; ?>" selected><?php echo $filaParentesco['parentesco']; ?></option>
                                    <?php }else{ ?>
                                        <option value="<?php echo $filaParentesco['claveParentesco']; ?>"><?php echo $filaParentesco['parentesco']; ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </h3>
                    </div>
                </div>
            </div>
        </form>   
    </section>
    
</body>
</html>