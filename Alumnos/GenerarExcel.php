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
    include '../Clases/PHPExcel/Classes/PHPExcel.php';

    $consultaAlumno = mysqli_query($conexionSISTEMAESCOLAR, "SELECT * FROM Alumno, Carrera, TiposSangre, Sexo, CodigosPostales, Municipios, Estados, Parentesco
        WHERE (Alumno.claveCarrera=Carrera.claveCarrera 
        AND Alumno.claveSangre=TiposSangre.claveSangre 
        AND Alumno.claveSexo=Sexo.claveSexo 
        AND Alumno.idCodigoPostal=CodigosPostales.idCodigoPostal 
        AND CodigosPostales.idMunicipio=Municipios.idMunicipio 
        AND Municipios.idEstado=Estados.idEstado
        AND Alumno.claveParentesco=Parentesco.claveParentesco) ORDER BY primerApellido ASC");

    $fila=2;
    $objPHPExcel  = new PHPExcel();
	
	//Propiedades de Documento
	$objPHPExcel->getProperties()->setCreator("Joshua Guevara Jimenez")->setDescription("Listado de Alumnos");
	
	//Establecemos la pestaña activa y nombre a la pestaña
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle("Alumnos");

    $estiloTituloColumnas = array(
        'font' => array(
        'bold'  => true,
        ),
        'borders' => array(
        'allborders' => array(
        'style' => PHPExcel_Style_Border::BORDER_THIN
        )
        ),
        'alignment' =>  array(
        'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
        )
        );
    $estiloDatosColumnas = array(
            'borders' => array(
            'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN
            )
            ),
            'alignment' =>  array(
            'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
            )
            ); 

	$objPHPExcel->getActiveSheet()->getStyle('A1:U1')->applyFromArray($estiloTituloColumnas);

    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(40);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(40);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(40);
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(40);
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(40);
    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(40);
    $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(40);
    $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(40);
    $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(40);
    $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(40);
    $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(40);
    $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(40);
    $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(40);
    $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(40);
    $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(40);
    $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(40);
    $objPHPExcel->getActiveSheet()->setCellValue('A1','NÚMERO');
    $objPHPExcel->getActiveSheet()->setCellValue('B1','MATRÍCULA');
    $objPHPExcel->getActiveSheet()->setCellValue('C1','NOMBRE COMPLETO');
    $objPHPExcel->getActiveSheet()->setCellValue('D1','SEXO');
    $objPHPExcel->getActiveSheet()->setCellValue('E1','FECHA DE NACIMIENTO');
    $objPHPExcel->getActiveSheet()->setCellValue('F1','CURP');
    $objPHPExcel->getActiveSheet()->setCellValue('G1','CORREO ELECTRÓNICO');
    $objPHPExcel->getActiveSheet()->setCellValue('H1','TIPO DE SANGRE');
    $objPHPExcel->getActiveSheet()->setCellValue('I1','CARRERA');
    $objPHPExcel->getActiveSheet()->setCellValue('J1','CÓDIGO POSTAL');
    $objPHPExcel->getActiveSheet()->setCellValue('K1','LOCALIDAD');
    $objPHPExcel->getActiveSheet()->setCellValue('L1','MUNICIPIO');
    $objPHPExcel->getActiveSheet()->setCellValue('M1','ESTADO');
    $objPHPExcel->getActiveSheet()->setCellValue('N1','NÚMERO INTERIOR');
    $objPHPExcel->getActiveSheet()->setCellValue('O1','NÚMERO EXTERIOR');
    $objPHPExcel->getActiveSheet()->setCellValue('P1','TELÉFONO CELULAR');
    $objPHPExcel->getActiveSheet()->setCellValue('Q1','TELÉFONO DE EMERGENCIA');
    $objPHPExcel->getActiveSheet()->setCellValue('R1','NOMBRE DEL TUTOR');
    $objPHPExcel->getActiveSheet()->setCellValue('S1','PARENTESCO');
    $objPHPExcel->getActiveSheet()->setCellValue('T1','TELÉFONO TUTOR');
    $objPHPExcel->getActiveSheet()->setCellValue('U1','CORREO DEL TUTOR');

    $count=1;
    while($filaDatos=$consultaAlumno->fetch_assoc()){
        $objPHPExcel->getActiveSheet()->getStyle('A'.$fila.':U'.$fila)->applyFromArray($estiloDatosColumnas);
        $objPHPExcel
            ->getActiveSheet()
            ->getStyle('B'.$fila)
            ->getNumberFormat()
            ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
        $objPHPExcel
            ->getActiveSheet()
            ->getStyle('J'.$fila)
            ->getNumberFormat()
            ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT); 
        $objPHPExcel
            ->getActiveSheet()
            ->getStyle('N'.$fila)
            ->getNumberFormat()
            ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT); 
        $objPHPExcel
            ->getActiveSheet()
            ->getStyle('O'.$fila)
            ->getNumberFormat()
            ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT); 
        $objPHPExcel
            ->getActiveSheet()
            ->getStyle('P'.$fila)
            ->getNumberFormat()
            ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
        $objPHPExcel
            ->getActiveSheet()
            ->getStyle('Q'.$fila)
            ->getNumberFormat()
            ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
        $objPHPExcel
            ->getActiveSheet()
            ->getStyle('T'.$fila)
            ->getNumberFormat()
            ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
        $objPHPExcel
            ->getActiveSheet()
            ->getStyle('U'.$fila)
            ->getNumberFormat()
            ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, ''.$count);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, strtoupper($filaDatos['matriculaAlumno']));
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, mb_strtoupper($filaDatos['primerApellido'].' '.$filaDatos['segundoApellido'].' '.$filaDatos['nombreAlumno']));
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, strtoupper($filaDatos['sexo']));
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, strtoupper($filaDatos['fechaNacimiento']));
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, strtoupper($filaDatos['curp']));
        $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, mb_strtolower($filaDatos['correoElectronico']));
        $objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, strtoupper($filaDatos['tipoSangre']));
        $objPHPExcel->getActiveSheet()->setCellValue('I'.$fila, strtoupper($filaDatos['claveCarrera'].'-'.$filaDatos['nombreCarrera']));
        $objPHPExcel->getActiveSheet()->setCellValue('J'.$fila, strtoupper($filaDatos['codigoPostal']));
        $objPHPExcel->getActiveSheet()->setCellValue('K'.$fila, strtoupper($filaDatos['colonia']));
        $objPHPExcel->getActiveSheet()->setCellValue('L'.$fila, strtoupper($filaDatos['municipio']));
        $objPHPExcel->getActiveSheet()->setCellValue('M'.$fila, strtoupper($filaDatos['estado']));
        $objPHPExcel->getActiveSheet()->setCellValue('N'.$fila, strtoupper($filaDatos['numeroInterior']));
        $objPHPExcel->getActiveSheet()->setCellValue('O'.$fila, strtoupper($filaDatos['numeroExterior']));
        $objPHPExcel->getActiveSheet()->setCellValue('P'.$fila, strtoupper($filaDatos['telefonoCelular']));
        $objPHPExcel->getActiveSheet()->setCellValue('Q'.$fila, strtoupper($filaDatos['telefonoEmergencia']));
        $objPHPExcel->getActiveSheet()->setCellValue('R'.$fila, strtoupper($filaDatos['nombreTutor']));
        $objPHPExcel->getActiveSheet()->setCellValue('S'.$fila, strtoupper($filaDatos['parentesco']));
        $objPHPExcel->getActiveSheet()->setCellValue('T'.$fila, strtoupper($filaDatos['telefonoTutor']));
        $objPHPExcel->getActiveSheet()->setCellValue('U'.$fila, mb_strtolower($filaDatos['correoTutor']));
        $fila++;
        $count++;
    }

    $objeto = new DateTime();
    $objeto->setTimezone(new DateTimeZone('America/Mexico_City'));
    $fechaHora = $objeto->format('d-m-Y-G:i:s');

    header("Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header('Content-Disposition: attachment;filename="ListadoAlumnos-'.$fechaHora.'.xlsx"');
    header('Cache-Control: max-age=0');
    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $objWriter->save('php://output');
?>