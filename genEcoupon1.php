<?php include('cserver.php') ?>
<?php
require('fpdf.php');
include "phpqrcode.php";    

if (isset($_GET['redeem_code'])) {
	
  if (empty($_GET['redeem_code'])) {
  	header('location: user_login.php');
  }
  
$redeem_code = $_GET['redeem_code'];


$target_dir = dirname(__FILE__) ."/pic/";
$target_file = $target_dir . "tempcode.png";
	
$target_dir_1 = dirname(__FILE__) ."/pic/";
$target_file_1 = $target_dir . "E.jpg";
	
	

$value = 'http://157.230.145.40/ops/redemption_claim.php?redeem_code='.$_GET['redeem_code']; //二维码内容   
$errorCorrectionLevel = 'L';//容错级别   
$matrixPointSize = 6;//生成图片大小   
//生成二维码图片   
QRcode::png($value, $target_file, $errorCorrectionLevel, $matrixPointSize, 2); 

$user_check_query = "select * from customer_item c , item_shop i where c.item_id = i.item_id and c.item_redeem_code = '$redeem_code'";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);
  	

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'E coupon redeemption code below for scanning');


$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,30,'Redeem code='.$_GET['redeem_code']);


$pdf->Image($target_file_1,0,0,210,297);



$target_file_text = $target_dir . "tempcodefont.png";
$target_file_text_below = $target_dir . "tempcodebelow.png";

$font = "./m.ttf";

//$text = "中國心中國人";
$text = $user['item_shop_name'];
$text1 = $user['item_name'];

$text_item_shop_name = $user['item_shop_name'];
$text_item_shop_address = $user['item_shop_address'];
$text_item_shop_phone = $user['item_shop_phone'];
$text_item_redem_time = $user['item_redem_time'];
$text_item_last_time = $user['item_last_time'];



$my_img = imagecreate( 320, 80 );                             //width & height
$background  = imagecolorallocate( $my_img, 255,   255,   255 );
$text_colour = imagecolorallocate( $my_img, 0, 0, 255 );
$black = imagecolorallocate($my_img, 0, 0, 0);
imagettftext($my_img, 24, 0, 0, 30, $black, $font, $text);
imagettftext($my_img, 24, 0, 0, 70, $black, $font, $text1);
imagepng( $my_img,$target_file_text );


// 34 ,107 =>  85, 25

$my_below = imagecreate( 360, 120 );                             //width & height
$background  = imagecolorallocate( $my_below, 255,   255,   255 );
$text_colour = imagecolorallocate( $my_below, 0, 0, 255 );
$black = imagecolorallocate($my_below, 0, 0, 0);
imagettftext($my_below, 12, 0, 0, 20, $black, $font, $text_item_shop_name);
imagettftext($my_below, 12, 0, 0, 50, $black, $font, $text_item_shop_phone);
imagettftext($my_below, 12, 0, 0, 80, $black, $font, $text_item_shop_address);
imagettftext($my_below, 12, 0, 0, 110, $black, $font, $text_item_redem_time);
imagepng( $my_below,$target_file_text_below);






$pdf->Image($target_file,142,118,52,52);


//above 
$pdf->Image($target_file_text,15,60,80,20);


$pdf->Image($target_file_text_below,34,107,85,30);







	
	

/*
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,40,'Hello World!');
*/


$pdf->Output();

}

?>

