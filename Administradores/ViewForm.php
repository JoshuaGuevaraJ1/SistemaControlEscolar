<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta for="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
    <script>
            $('.phone_with_ddd').mask('(000) 000-00-00');
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
            $claveUsuario = $_GET['claveUsuario'];
            //Consultas que obtienes los datos de las tablas relacionadas
            $consultaAdmin = mysqli_query($conexionSEGURIDAD, "SELECT * FROM Usuarios WHERE claveUsuario = '$claveUsuario'");

            $filaDatosAdmin = $consultaAdmin->fetch_assoc();
        ?>
        <h1 class="heading"> Visualización de datos de un<span> Administrador </span></h1>        
        <form action="" method = "" class="formularioCRUD">
            <div class="botones">
                <div class="left">
                    <a href="Administradores.php" class="btn"><i class="fa-solid fa-circle-chevron-left"></i>  Regresar</a>
                </div>
                <div class="right">
                    <a class="btnModificarCRUD" href="UpdateForm.php?claveUsuario=<?php echo $filaDatosAdmin['claveUsuario'] ?>"><i class="fa-solid fa-pen-to-square"></i>Modificar datos</a>
                    <a class="btnEliminarCRUD" href="Delete.php?claveUsuario=<?php echo $filaDatosAdmin['claveUsuario'] ?>" onclick="return ConfirmacionEliminar()"><i class="fa-solid fa-trash-can"></i> Eliminar administrador</a>
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
                        <h3>Matrícula:<label for="claveUsuario" class="labelDatos"><?php echo $filaDatosAdmin['claveUsuario'] ?></label></h3>
                        <h3>Nombre:<label for="nombreUsuario" class="labelDatos"><?php echo $filaDatosAdmin['nombreUsuario'] ?></label></h3>
                        <h3>Primer Apellido:<label for="primerApellido" class="labelDatos"><?php echo $filaDatosAdmin['primerApellido'] ?></label></h3>
                        <h3>Segundo Apellido:<label for="segundoApellido" class="labelDatos">
                                <?php if($filaDatosAdmin['segundoApellido']==null) {
                                    echo '--------';
                                }else{ 
                                    echo $filaDatosAdmin['segundoApellido'];
                                }?>
                        </label></h3>
                    </div>
                    
                    <div class="box">
                        <h1>Datos de <span>contacto</span></h1>
                        <h3>Teléfono Celular: <label for="telefonoUsuario" class="labelDatos phone_with_ddd"><?php echo $filaDatosAdmin['telefonoUsuario'] ?></label></h3>
                    </div>
                    <div class="box">
                        <h1>Datos de <span>sesión</span></h1>
                        <h3>Correo electrónico: <label for="correoElectronico" class="labelDatos"><?php echo $filaDatosAdmin['correoElectronico'] ?></label></h3>                
                        <h3>Contraseña: <label for="passwordUsuario" class="labelDatos">********</label></h3>
                    </div>
                </div>
            </div>
        </form>           
    </section>
    
</body>
</html>