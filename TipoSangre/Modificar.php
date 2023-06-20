<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
</head>
<body>    
    <section class="modificarTipoSangre" id="modificarTipoSangre">
        <?php
            include '../Menu/Menu.php'; 
            $id = $_GET['id'];
            $consulta = mysqli_query($conexionSISTEMAESCOLAR, "SELECT * FROM TiposSangre WHERE claveSangre = '$id'");       
            $fila = $consulta->fetch_assoc();
        ?>
        <h1 class="heading"> Modificar un<span> Tipo de sangre </span></h1>        
        <div class="botones">
            <div class="left">
                <a href="TipoSangre.php" class="btn">Regresar</a>
            </div>                
        </div>
        <div class="formularioCRUD">
            <form action="updateTipoSangre.php" method = "GET">   
                <div class="box">
                    <h2>Clave del tipo de sangre</h2>
                    <input type="text" name="claveSangre" class="inputBox" value="<?php echo $fila['claveSangre'] ?>"><br>
                    <h2>Tipo de sangre</h2>
                    <input type="text" name="tipoSangre" class="inputBox" value="<?php echo $fila['tipoSangre'] ?>"
                        required minlength="2" maxlength="3" size="3"><br>
                    <div class="botonLogin">
                        <button class="btn">Actualizar tipo de sangre</button>
                    </div>
                </div> 
                
            </form>
        </div>
    </section>
    
</body>
</html>