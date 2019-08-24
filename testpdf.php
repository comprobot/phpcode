<?php
require('fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World!');

$image1 = "pic/output.jpg";

$pdf->Image('pic/'.$image1,40,60,100,100);

$pdf->Output();
?>
