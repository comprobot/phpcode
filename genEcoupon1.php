<?php include('cserver.php') ?>
<?php
require('fpdf.php');
include "phpqrcode.php";    

if (isset($_GET['redeem_code'])) {
	
  if (empty($_GET['redeem_code'])) {
  	header('location: user_login.php');
  }
  
$redeem_code = $_GET['redeem_code'];

$random = mt_rand(1,100);

$target_dir = dirname(__FILE__) ."/pic/";
$target_file = $target_dir . "tempcode".$random1.".png";
	
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




$target_file_text = $target_dir . "tempcodefont".$random.".png";
$target_file_text_below = $target_dir . "tempcodebelow".$random.".png";
$target_file_text_time = $target_dir . "tempcodetime".$random.".png";
$target_file_photo_image = $target_dir . $user['item_photo_path'];


$font = "./m.ttf";

//$text = "中國心中國人";
$text = $user['item_shop_name'];
$text1 = $user['item_name'];

$text_item_shop_name = $user['item_shop_name'];
$text_item_shop_address = $user['item_shop_address'];
$text_item_shop_phone = $user['item_shop_phone'];
$text_item_redem_time = $user['item_redem_time'];
$text_item_last_time = $user['item_last_redem'];



$my_img = imagecreate( 320, 80 );                             //width & height
$background  = imagecolorallocate( $my_img, 212,   236,   252 );
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
imagettftext($my_below, 12, 0, 0, 24, $black, $font, $text_item_shop_name);
imagettftext($my_below, 12, 0, 0, 48, $black, $font, $text_item_shop_phone);
imagettftext($my_below, 12, 0, 0, 72, $black, $font, $text_item_shop_address);
imagettftext($my_below, 12, 0, 0, 96, $black, $font, $text_item_redem_time);
imagepng( $my_below,$target_file_text_below);



//time_tag
$my_time = imagecreate( 120, 40 );                             //width & height
$background  = imagecolorallocate( $my_time, 212,   236,   252);
$text_colour = imagecolorallocate( $my_time, 0, 0, 255 );
$black = imagecolorallocate($my_time, 0, 0, 0);
imagettftext($my_time, 18, 0, 0, 24, $black, $font, $text_item_last_time);
imagepng( $my_time,$target_file_text_time );









$pdf->Image($target_file,142,118,52,52);


//above 
$pdf->Image($target_file_text,15,60,80,20);


$pdf->Image($target_file_text_below,34,107,85,30);

$pdf->Image($target_file_text_time,24,86,28,8);

$pdf->Image($target_file_photo_image,142,60,54,40);







	
	

/*
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,40,'Hello World!');
*/


$pdf->Output();

}

?>

