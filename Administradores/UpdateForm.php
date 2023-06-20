<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>

    <script language="javascript" src="../JS/jquery-3.1.1.min.js"></script>
    <script language="javascript">
            function ConfirmacionEliminar(){
            var respuesta = confirm("¿Estas seguro de eliminar al administrador?");
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
            $claveUsuario = $_GET['claveUsuario'];
            //Obtiene los datos del alumno haciendo producto cartesiando con demás tablas para que muestre correctamente su dato de las tablas relacionadas
            $consultaAdmin = mysqli_query($conexionSEGURIDAD, "SELECT * FROM Usuarios WHERE claveUsuario = '$claveUsuario'");

            // Asocia los datos de carrera, direccion, alumno, sexo y tipo de sangre-->datos que tiene registrados el alumno
            $filaDatosAdmin = $consultaAdmin->fetch_assoc();
        ?>
        <h1 class="heading"> Modificar datos de un<span> Administrador </span></h1>        
        <form action="updateAdmin.php" method = "POST" class="formularioCRUD">
            <div class="botones">
                <div class="left">
                    <a href="Administradores.php" class="btn"><i class="fa-solid fa-circle-chevron-left"></i>  Regresar</a>
                </div>
                <div class="right">
                    <a class="btnEliminarCRUD" href="Delete.php?id=<?php echo $filaDatosAdmin['claveUsuario'] ?>" onclick="return ConfirmacionEliminar()"><i class="fa-solid fa-trash-can"></i> Eliminar <?php echo $filaDatosAdmin['claveUsuario'] ?> </a>
                    <button class="btnModificarCRUD"><i class="fa-solid fa-pen-to-square"></i> Actualizar datos de <?php echo $filaDatosAdmin['claveUsuario'] ?></button>
                </div>
            </div>
            <div class="formularioResponsivo">
                <div class="perfil">
                    <img src="
                        <?php
                            echo '../images/perfiles/'.$claveUsuario.'.png';
                        ?>
                    " alt="Foto de perfil de '<?php echo $claveUsuario ?>' ">
                </div>
                <div class="grid">
                    <div class="box">
                        <h1>Datos <span>personales</span></h1>
                        <h3>Matrícula: <input type="text" name="claveUsuario" class="inputBox" value="<?php echo $filaDatosAdmin['claveUsuario'] ?>" readonly></h3>
                        <h3>Nombre: <input type="text" name="nombreUsuario" class="inputBox" value="<?php echo $filaDatosAdmin['nombreUsuario'] ?>" required></h3>
                        <h3>Primer Apellido: <input type="text" name="primerApellido" class="inputBox" value="<?php echo $filaDatosAdmin['primerApellido'] ?>" required></h3>
                        <h3>Segundo Apellido: <input type="text" name="segundoApellido" class="inputBox" value="<?php echo $filaDatosAdmin['segundoApellido'] ?>"></h3>
                    </div>

                    <div class="box">
                        <h1>Datos de <span>contacto</span></h1>
                        <h3>Teléfono Celular: <input type="text" name="telefonoUsuario" class="inputBox phone_with_ddd" value="<?php echo $filaDatosAdmin['telefonoUsuario'] ?>" required minlength="15" maxlength="15" size="15"></h3>
                    </div>

                    <div class="box">
                        <h1>Datos de <span>sesión</span></h1>
                        <h3>Correo Electrónico: <input type="text" name="correoElectronico" class="inputBox" value="<?php echo $filaDatosAdmin['correoElectronico'] ?>" required></h3>
                        <h3>Contraseña: <input type="password" name="passwordUsuario" class="inputBox" value="" required></h3>
                    
                    </div>
                </div>
            </div>
        </form>   
    </section>
    
</body>
</html>