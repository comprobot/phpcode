<?php
require('fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'E coupon redeemption code below');


$image1 = "img/output.png";
$pdf->Image($image,40,40,100,100);

/*
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,40,'Hello World!');
*/
$pdf->Output();
?>
