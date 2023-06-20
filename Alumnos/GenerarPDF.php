<?php
    session_start();

    if(!isset($_SESSION['usuario'])){
        echo '
            <script>
                alert("Por favor, debes iniciar sesión");
                window.location = "../Login/Index.php";
            </script>
        ';        
        session_destroy();
        die();
    }


    include '../Conexiones/conexionSISTEMAESCOLAR.php';
    $consultaAlumno = mysqli_query($conexionSISTEMAESCOLAR, 
    "SELECT * FROM Alumno, Carrera, Sexo
        WHERE Alumno.claveCarrera=Carrera.claveCarrera
        AND Alumno.claveSexo=Sexo.claveSexo ORDER BY primerApellido ASC");

    ob_start(); //Inicializa la librería de creación de pdf
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            font-family: "DejaVu Sans";
            font-size: 10px;
            align-items: center;
            text-align:center;
            /* margin: 2cm 1cm 1cm 1cm; */
            margin-top: 2cm;
            text-transform: uppercase;
        }

        header {
            position: fixed;
            top: 0px;
            height: 1.7cm;
        }

        .logo img{
            height:1.7cm;
            align-self:left;
            justify-self:left;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        td{
            padding:2px;
        }
        .withoutBorder table, th{
            border: none;
        }
    </style>
</head>
<body>
    <header class="withoutBorder">
        <table>
            <tr>
                <th class="logo"><img src="../images/logoTecNM.png" alt=""></th>
                <th>
                    <h1 style="font-size:9px;">Tecnológico Nacional de México</h1>
                    <h2 style="font-size:8px;">Instituto Tecnológico de Apizaco</h2>
                    <p style="font-size:6px;">Carretera Apizaco Tzompantepec, esquina con Av. Instituto Tecnológico S/N, Conurbado Apizaco - Tzompantepec, Tlaxcala, Mex. C.P. 90300.</p>
                </th>
                <th class="logo"><img src="../images/logoITApizaco.png" alt=""></th>
            </tr>
        </table>
    </header>
    <div style="align-self:center; justify-self:center;">
        <table>
            <thead>
                <tr style="background-color:#000000; color:#ffffff">
                    <th>No.</th>
                    <th>Matrícula</th>
                    <th>Nombre completo</th>
                    <th>Sexo</th>
                    <th>Carrera</th>
                    <th>Correo</th>
                </tr>
            </thead>
            <tbody>
                <?php  $count = 1;
                while ($fila = $consultaAlumno->fetch_assoc()): 
                    if($count%2==0){    ?>
                        <tr style="background-color:#dfdfdf"> 
                    <?php }else{ ?>
                        <tr> <?php }?>
                            <td style="text-align:center;">
                                <?php 
                                    echo $count;
                                    $count = $count +1;
                                ?>
                            </td>
                            <td><?php echo $fila['matriculaAlumno'] ?></td>
                            <td><?php echo $fila['primerApellido'].' '.$fila['segundoApellido'].' '.$fila['nombreAlumno'] ?></td>
                            <td><?php echo $fila['sexo'] ?></td>
                            <td><?php echo $fila['claveCarrera'].'-'.$fila['nombreCarrera'] ?></td>
                            <td style="text-transform: lowercase;"><?php echo $fila['correoElectronico'] ?></td>
                        </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script type="text/php">
        if ( isset($pdf) ) {
            $x = 250;
            $y = 750;
            $text = "Página {PAGE_NUM} de {PAGE_COUNT}";
            $font = $fontMetrics->get_font("helvetica", "bold");
            $size = 10;
            $color = array(0,0,0);
            $word_space = 0.0;  //  default
            $char_space = 0.0;  //  default
            $angle = 0.0;   //  default
            $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
        }
    </script>
    <script type="text/php">
        if ( isset($pdf) ) {
            $x = 445;
            $y = 750;
            $objeto = new DateTime();
            $objeto->setTimezone(new DateTimeZone('America/Mexico_City'));
            $fechaHora = $objeto->format('d-m-Y h:i:s a');
            $text = $fechaHora;
            $font = $fontMetrics->get_font("dejavu", "bold");
            $size = 10;
            $color = array(0,0,0);
            $word_space = 0.0;  //  default
            $char_space = 0.0;  //  default
            $angle = 0.0;   //  default
            $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
        }
    </script>
</body>
</html>
<?php
    $html = ob_get_clean();
    // echo $html;

    require_once '../Clases/dompdf/autoload.inc.php';
    use Dompdf\Dompdf;

    //Esta parte de código obtiene las imágenes para que se puedan mostrar en formato pdf con ayuda de DOMPDF
    $dompdf = new Dompdf();
    $dompdf->set_option("isPhpEnabled", true);
    $dompdf->loadHtml($html);
    
    $objeto = new DateTime();
    $objeto->setTimezone(new DateTimeZone('America/Mexico_City'));
    $fechaHora = $objeto->format('d-m-Y-G:i:s');
    
    $dompdf->setPaper('letter', 'vertical');
    $dompdf->render();
    $dompdf->stream("ListadoAlumnos-".$fechaHora.".pdf", array("Attachment" => false));
?>