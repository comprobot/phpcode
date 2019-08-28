<?php
require('fpdf.php');
include "qrlib.php";    

$target_dir = dirname(__FILE__) ."/pic/";
$target_file = $target_dir . "temp.png";

$value = 'http://157.230.145.40/ops/adv_user_home.php'; //二维码内容   
$errorCorrectionLevel = 'L';//容错级别   
$matrixPointSize = 6;//生成图片大小   
//生成二维码图片   
QRcode::png($value, $target_file, $errorCorrectionLevel, $matrixPointSize, 2); 


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'E coupon redeemption code below for scanning');


$image1 = "img/output.png";
$pdf->Image($target_file,40,40,100,100);

/*
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,40,'Hello World!');
*/
$pdf->Output();
?>
