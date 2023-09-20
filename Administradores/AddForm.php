<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar nuevo alumno</title>
    <script language="javascript" src="../JS/jquery-3.1.1.min.js"></script>
   
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
        ?>

        <h1 class="heading"> Registrar un<span> nuevo administrador </span></h1>
        <form action="CreateAdmin.php" method = "POST" class="formularioCRUD">  
            <div class="botones">
                <div class="left">
                    <a href="Administradores.php" class="btn"><i class="fa-solid fa-circle-chevron-left"></i>  Regresar</a>
                </div>  
                <div class="right">
                    <button class="btn"><i class="fa-solid fa-floppy-disk"></i>   Añadir nuevo registro</button>
                </div>              
            </div>
            <div class="formularioResponsivo">
                <div class="grid">
                    <div class="box">
                        <h1>Datos <span>personales</span></h1>
                        <h3>Matrícula: <input type="text" name="claveUsuario" class="inputBox" required minlength="8" maxlength="9" size="10"></h3>
                        <h3>Nombre: <input type="text" name="nombreUsuario" class="inputBox" required></h3>
                        <h3>Primer Apellido: <input type="text" name="primerApellido" class="inputBox" required></h3>
                        <h3>Segundo Apellido: <input type="text" name="segundoApellido" class="inputBox"></h3>
                    </div>

                    <div class="box">
                        <h1>Datos de <span>contacto</span></h1>
                        <h3>Teléfono Celular: <input type="text" name="telefonoUsuario" class="inputBox phone_with_ddd" required minlength="15" maxlength="15" size="15"></h3>
                    </div>

                    <div class="box">
                        <h1>Datos de <span>sesión</span></h1>
                        <h3>Correo electrónico: <input type="email" name="correoElectronico" class="inputBox" required></h3>
                        <h3>Contraseña: <input type="password" name="passwordUsuario" class="inputBox" required></h3>
                    </div>
                </div>
            </div>
        </form>                            
    </section>
        
</body>
</html>