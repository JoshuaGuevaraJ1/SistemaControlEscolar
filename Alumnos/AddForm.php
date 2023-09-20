<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar nuevo alumno</title>
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
		</script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
        <script>
            $('.phone_with_ddd').mask('(000) 000-00-00');
        </script>
</head>
<body>       
    <section class="registrarAlumno" id="registrarAlumno">
        <?php        
            include '../Menu/Menu.php';      
            $consulta = mysqli_query($conexionSISTEMAESCOLAR, "SELECT idEstado, Estado FROM Estados ORDER BY Estado");  //Consulta para leer los estados
            $consultaTipoSangre = mysqli_query($conexionSISTEMAESCOLAR, "SELECT claveSangre, tipoSangre FROM  TiposSangre");
            $consultaCarrera = mysqli_query($conexionSISTEMAESCOLAR, "SELECT claveCarrera, nombreCarrera FROM  Carrera ORDER BY nombreCarrera");
            $consultaSexo = mysqli_query($conexionSISTEMAESCOLAR, "SELECT claveSexo, sexo FROM  Sexo");
            $consultaParentesco = mysqli_query($conexionSISTEMAESCOLAR, "SELECT claveParentesco, parentesco FROM  Parentesco");
        ?>

        <h1 class="heading"> Registrar un<span> nuevo alumno </span></h1>
        <form action="CreateAlumn.php" method = "POST" class="formularioCRUD">  
            <div class="botones">
                <div class="left">
                    <a href="Alumnos.php" class="btn"><i class="fa-solid fa-circle-chevron-left"></i>  Regresar</a>
                </div>  
                <div class="right">
                    <button class="btn"><i class="fa-solid fa-floppy-disk"></i>   Añadir nuevo registro</button>
                </div>              
            </div>
            <div class="formularioResponsivo">
                <div class="grid">
                    <div class="box">
                        <h1>Datos <span>personales</span></h1>
                        <h3>Matrícula: <input type="text" name="matriculaAlumno" class="inputBox" required minlength="8" maxlength="9" size="10"></h3>
                        <h3>Nombre: <input type="text" name="nombreAlumno" class="inputBox" required></h3>
                        <h3>Primer Apellido: <input type="text" name="primerApellido" class="inputBox" required></h3>
                        <h3>Segundo Apellido: <input type="text" name="segundoApellido" class="inputBox"></h3>
                        <h3>Sexo:
                            <select name="claveSexo" id="claveSexo" class="inputBox" required>
                                <option value="0" selected disabled>Selecciona tu sexo</option>
                                <?php while($filaSexo = $consultaSexo->fetch_assoc()) { ?>
                                    <option value="<?php echo $filaSexo['claveSexo']; ?>"><?php echo $filaSexo['sexo']; ?></option>
                                <?php } ?>
                            </select>   
                        </h3>             
                        <h3>CURP: <input type="text" name="curp" class="inputBox" style="text-transform: uppercase" required minlength="18" maxlength="18" size="18"></h3>
                        <h3>Fecha de nacimiento: <input type="date" name="fechaNacimiento" class="inputBox" required></h3>
                    </div>

                    <div class="box">            
                        <h1>Datos de <span>dirección</span></h1>
                        <h3>
                            Selecciona estado: 
                            <select name="cbx_estado" id="cbx_estado" class="inputBox" required>
                                <option value="0" selected disabled>Seleccionar Estado</option>
                                <?php while($fila = $consulta->fetch_assoc()) { ?>
                                    <option value="<?php echo $fila['idEstado']; ?>"><?php echo $fila['Estado']; ?></option>
                                <?php } ?>
                            </select>  
                        </h3>
                        <br />
                        <h3>Municipio: <select name="cbx_municipio" id="cbx_municipio" class="inputBox" required></select></h3>
                        <br />
                        <h3>Colonia: <select name="cbx_localidad" id="cbx_localidad" class="inputBox" required></select></h3>
                        <h3>Calle: <input type="text" name="calle" class="inputBox" required></h3>
                        <h3>Número Interior: <input type="text" name="numeroInterior" class="inputBox" required></h3>
                        <h3>Número Exterior: <input type="text" name="numeroExterior" class="inputBox" required></h3>
                    </div>

                    <div class="box">
                        <h1>Datos <span>académicos</span></h1>
                        <h3>
                            Carrera:
                            <select name="claveCarrera" id="claveCarrera" class="inputBox" required>
                                <option value="0" selected disabled>Seleccione la carrera</option>
                                <?php while($filaCarreras = $consultaCarrera->fetch_assoc()) { ?>
                                    <option name="claveCarrera" value="<?php echo $filaCarreras['claveCarrera']; ?>"><?php echo $filaCarreras['nombreCarrera']; ?></option>
                                <?php } ?>
                                
                            </select>
                        </h3>
                    </div>

                    <div class="box">
                        <h1>Datos <span>médicos</span></h1>
                        <h3>
                            Tipo de sangre:
                            <select  name="claveSangre"  id="claveSangre" class="inputBox" required>
                                <option value="0" selected disabled>Seleccione el tipo de sangre</option>
                                <?php while($filaTipoSangre = $consultaTipoSangre->fetch_assoc()) { ?>
                                    <option value="<?php echo $filaTipoSangre['claveSangre']; ?>"><?php echo $filaTipoSangre['tipoSangre']; ?></option>
                                <?php } ?>
                            </select>
                        </h3>
                    </div>
                    <div class="box">
                        <h1>Datos de <span>contacto</span></h1>
                        <h3>Teléfono Celular: <input type="text" name="telefonoCelular" class="inputBox phone_with_ddd" required minlength="15" maxlength="15" size="15"></h3>
                        <h3>Teléfono de emergencia: <input type="text" name="telefonoEmergencia" class="inputBox phone_with_ddd" required minlength="15" maxlength="15" size="15"></h3>
                        <h3>Correo electrónico: <input type="text" name="correoElectronico" class="inputBox" required></h3>                
                    </div>
                    <div class="box">
                        <h1>Datos de <span>tutor</span></h1>
                        <h3>Nombre del tutor: <input type="text" name="nombreTutor" class="inputBox" required></h3>
                        <h3>Teléfono celular: <input type="tel" name="telefonoTutor" class="inputBox phone_with_ddd" required minlength="15" maxlength="15" size="15"></h3>
                        <h3>Correo Electrónico: <input type="email" name="correoTutor" class="inputBox" required></h3>
                        <h3>Parentesco: 
                            <select  name="claveParentesco"  id="claveParentesco" class="inputBox" required>
                                <option value="0" selected disabled>Seleccione el parentesco del tutor</option>
                                <?php while($filaParentesco = $consultaParentesco->fetch_assoc()) { ?>
                                    <option value="<?php echo $filaParentesco['claveParentesco']; ?>"><?php echo $filaParentesco['parentesco']; ?></option>
                                <?php } ?>
                            </select>
                        </h3>
                    </div>
                </div>
            </div>
        </form>                            
    </section>
        
</body>
</html>