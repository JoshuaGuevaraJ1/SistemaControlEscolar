<?php
    include '../Conexiones/conexionSISTEMAESCOLAR.php';
    $salida="";
    $query = "SELECT * FROM Alumno, Carrera, Sexo WHERE Alumno.claveCarrera=Carrera.claveCarrera AND Alumno.claveSexo=Sexo.claveSexo ORDER BY primerApellido ASC";

    if(isset($_POST['consulta'])){
        $q = $conexionSISTEMAESCOLAR->real_escape_string($_POST['consulta']);
        $query ="SELECT * FROM Alumno, Carrera, Sexo 
            WHERE (Alumno.claveCarrera=Carrera.claveCarrera AND Alumno.claveSexo=Sexo.claveSexo) 
            AND (matriculaAlumno LIKE '%".$q."%' OR nombreAlumno LIKE '%".$q."%' 
            OR primerApellido LIKE '%".$q."%' OR segundoApellido LIKE '%".$q."%' 
            OR nombreCarrera LIKE '%".$q."%' OR sexo LIKE '%".$q."%' OR curp LIKE '%".$q."%')";
    }
    $resultado = $conexionSISTEMAESCOLAR->query($query);

    if($resultado->num_rows >0){
        $salida.='<table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Matrícula</th>
                            <th>Primer <br> Apellido</th>
                            <th>Segundo <br> Apellido</th>
                            <th>Nombre</th>
                            <th>Carrera</th>
                            <th>Sexo</th>
                            <th>CURP</th>
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
                <td>'.$fila['matriculaAlumno'].'</td>
                <td>'.$fila['primerApellido'].'</td>
                <td>';
                if($fila['segundoApellido']==null){
                    $salida.='-----';
                }else{
                    $salida.=$fila['segundoApellido'];
                }
                $salida.='</td>
                <td>'.$fila['nombreAlumno'].'</td>
                <td class="redimension">'.$fila['nombreCarrera'].'</td>
                <td>'.$fila['sexo'].'</td>
                <td>'.$fila['curp'].'</td>
                <td>
                    <a href="ViewForm.php?matriculaAlumno='.$fila['matriculaAlumno'].'" class="btnVer"><i class="fa-solid fa-eye"></i></a>                            
                </td>
                <td>
                    <a href="UpdateForm.php?matriculaAlumno='.$fila['matriculaAlumno'].'" class="btnModificar"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>                        
                <td>
                <a href="Delete.php?matriculaAlumno='.$fila['matriculaAlumno'].'" class="btnEliminar" onclick="return ConfirmacionEliminar()"><i class="fa-solid fa-trash-can"></i></a>
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
