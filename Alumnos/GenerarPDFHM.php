<?php

    require ('..\Clases\fpdf\fpdf.php');

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont("Arial","",30);

    $pdf->SetY(10);
    $pdf->SetX(5);
    $pdf->Cell(10,10,"Hola Mundo ");
    $pdf->Output();
?>
