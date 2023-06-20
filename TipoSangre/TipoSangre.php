<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos de Sangre</title> 
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
    <section class="tipoSangre" id="tipoSangre">
        <?php
            include '../Menu/Menu.php';
            $consulta = mysqli_query($conexionSISTEMAESCOLAR, "SELECT claveSangre, tipoSangre FROM TiposSangre");       
        ?>
        <h1 class="heading"> Tipo de<span> Sangre </span></h1>
        <div class="botones">                         
            <div class="right">
                <a href="Create.php" class="btn">
                    <i class="fas fa-plus" style="font-size: 1em;"></i>  Añadir</a>
            </div>           
            
        </div>
        <div class="tablaCRUD">
            <table>
                <thead>
                    <tr>
                        <th>Clave de identificación</th>
                        <th>Tipo de Sangre</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="linea" style="background-color: #fc4007; box-shadow: .4rem .4rem 1rem #f76b1d">
                        <th colspan="4"></th>
                    </tr>
                    <?php while ($fila = $consulta->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $fila['claveSangre']?></td>
                        <td><?php echo $fila['tipoSangre']?></td>                        
                        <td>
                            <a href="Modificar.php?id=<?php echo $fila['claveSangre'] ?>" class="btnModificar"><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                        <td>
                            <a href="Delete.php?id=<?php echo $fila['claveSangre'] ?>" class="btnEliminar" onclick="return ConfirmacionEliminar()"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </section>    
    
</body>
</html>