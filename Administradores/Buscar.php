<?php
    include '../Conexiones/conexionSEGURIDAD.php';
    $salida="";
    $query = "SELECT * FROM Usuarios ORDER BY primerApellido ASC";

    if(isset($_POST['consulta'])){
        $q = $conexionSEGURIDAD->real_escape_string($_POST['consulta']);
        $query ="SELECT * FROM Usuarios
            WHERE (claveUsuario LIKE '%".$q."%' OR nombreUsuario LIKE '%".$q."%' 
            OR primerApellido LIKE '%".$q."%' OR segundoApellido LIKE '%".$q."%' 
            OR correoElectronico LIKE '%".$q."%')";
    }
    $resultado = $conexionSEGURIDAD->query($query);

    if($resultado->num_rows >0){
        $salida.='<table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Matrícula</th>
                            <th>Primer <br> Apellido</th>
                            <th>Segundo <br> Apellido</th>
                            <th>Nombre</th>
                            <th>Correo Electronico</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="linea" style="background-color: #0779fc; box-shadow: .4rem .4rem 1rem rgb(29, 123, 247);">
                            <th colspan="20"></th>
                        </tr>';
        $count=1;
        while($fila = $resultado->fetch_assoc()){
            $salida.='
            <tr>
                <td>'.$count.'</td>
                <td>'.$fila['claveUsuario'].'</td>
                <td>'.$fila['primerApellido'].'</td>
                <td>';
                if($fila['segundoApellido']==null){
                    $salida.='-----';
                }else{
                    $salida.=$fila['segundoApellido'];
                }
                $salida.='</td>
                <td>'.$fila['nombreUsuario'].'</td>
                <td>'.$fila['correoElectronico'].'</td>
                <td>
                    <a href="ViewForm.php?claveUsuario='.$fila['claveUsuario'].'" class="btnVer"><i class="fa-solid fa-eye"></i></a>                            
                </td>
                <td>
                    <a href="UpdateForm.php?claveUsuario='.$fila['claveUsuario'].'" class="btnModificar"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>                        
                <td>
                <a href="Delete.php?claveUsuario='.$fila['claveUsuario'].'" class="btnEliminar" onclick="return ConfirmacionEliminar()"><i class="fa-solid fa-trash-can"></i></a>
                </td>
            </tr>';
            $count++;
        }
        $salida.="</tbody></table>";
    }else{
        $salida.="<h1>No existen datos.</h1>";
    }
    echo $salida;
?>