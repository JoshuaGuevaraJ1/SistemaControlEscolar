<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir tipo de sangre</title>
</head>
<body>        
    <section class="nuevoTipoSangre" id="nuevoTipoSangre">
        <?php
            include '../Menu/Menu.php';                              
        ?>        
        <h1 class="heading"> Añadir un<span> Tipo de sangre </span></h1>
        
        <div class="botones">
            <div class="left">
                <a href="TipoSangre.php" class="btn">Regresar</a>
            </div>                
        </div>
        <div>
            <form action="crearTipoSangre.php" method = "GET" class="formularioCRUD">
                <div class="grid">
                    <div class="box">
                        <h2>Clave del tipo de sangre</h2>
                        <input type="text" name="claveSangre" class="inputBox"><br>
                        <h2>Tipo de sangre</h2>
                        <input type="text" name="tipoSangre" class="inputBox"><br>
                        <div class="botonLogin">
                            <button class="btn">Añadir tipo de sangre</button>
                        </div>
                    </div>
                </div>
            </form> 
        </div>        
    </section>
</body>
</html>