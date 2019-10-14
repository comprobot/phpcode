<?php include('cserver.php') ?>
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


$pdf->Image($target_file_1,0,0,210,297);



$target_file_text = $target_dir . "tempcodefont.png";

$font = "m.ttf";


//$text = "中國心明天心";

$text = iconv("GB2312", "UTF-8", "回忆经典");
$text = "Chinese heart";

$my_img = imagecreate( 320, 80 );                             //width & height
$background  = imagecolorallocate( $my_img, 255,   255,   255 );
$text_colour = imagecolorallocate( $my_img, 0, 0, 255 );


//$white = imagecolorallocate($my_img, 255, 255, 255);

$black = imagecolorallocate($my_img, 0, 0, 0);


imagettftext($im, 20, 0, 0, 0, $black, $font, $text);
imagepng( $my_img,$target_file_text );



$pdf->Image($target_file,142,118,52,52);

$pdf->Image($target_file_text,15,60,80,20);










	
	

/*
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,40,'Hello World!');
*/


$pdf->Output();

}

?>

