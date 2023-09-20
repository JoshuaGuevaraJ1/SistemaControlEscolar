<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administradores</title>
    <!-- link -->
    <script>
        function ConfirmacionEliminar(){
            var respuesta = confirm("¿Estas seguro de eliminar al usuario?");
            if (respuesta == true){
                return true;
            }else{
                return false;
            }
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</head>
<body>
    <section class="alumnos" id="alumnos">
        <?php
            include '../Menu/Menu.php';
            $consulta = mysqli_query($conexionSEGURIDAD, "SELECT * FROM Usuarios");
        ?>
        <h1 class="heading"> Registros de<span> Administradores </span></h1>
        <div class="botones">        
            <div class="left">
                <input type="text" name="cajaBusqueda" id="cajaBusqueda" class="cajaBusqueda" placeholder="Buscar Alumno">
            </div>
            <div class="right">
                <a href="AddForm.php" class="btnAdd" style="margin: 0.2rem 0.2rem">
                    <i class="fa-solid fa-circle-plus" style="font-size: 1em;"></i>  Añadir</a>
            </div>
        </div>
        <label for="" style="font-size:1.2rem; color:#606060;"><i>Deslice de lado a lado o de arriba hacia abajo para mostrar acciones y más.</i></label>
        <div class="tablaCRUD" id="tablaCRUD">
            <!-- El JQUERY Se encaragrá de mostrar los datos -->
        </div>
    </section>

    <script src="../JS/mainSearchAdmin.js"></script>

</body>
</html>