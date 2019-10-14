<?php
require('fpdf.php');
include "phpqrcode.php";    

if (isset($_GET['redeem_code'])) {
	
  if (empty($_GET['redeem_code'])) {
  	header('location: user_login.php');
  }

$target_dir = dirname(__FILE__) ."/pic/";
$target_file = $target_dir . "tempcode.png";
	
$target_dir_1 = dirname(__FILE__) ."/pic/";
$target_file_1 = $target_dir . "E.jpg";
	
	

$value = 'http://157.230.145.40/ops/redemption_claim.php?redeem_code='.$_GET['redeem_code']; //二维码内容   
$errorCorrectionLevel = 'L';//容错级别   
$matrixPointSize = 6;//生成图片大小   
//生成二维码图片   
QRcode::png($value, $target_file, $errorCorrectionLevel, $matrixPointSize, 2); 


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'E coupon redeemption code below for scanning');


$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,30,'Redeem code='.$_GET['redeem_code']);


$pdf->Image($target_file_1,0,0,200,300);
	
	
	

/*
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,40,'Hello World!');
*/


$pdf->Output();

}

?>
