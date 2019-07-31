<?php
$host = "https://www.paypal.com";
$path = "/cgi-bin/webscr";
$data =  $_POST;;
//$data = urlencode($data);



$product_list = filter_input(INPUT_POST, 'cart_list');
// Convert JSON to array
$product_list_array = json_decode($product_list);

$result_html = '';
if($product_list_array) {
    foreach($product_list_array as $p){
        foreach($p as $key=>$value) {
            //var_dump($key, $value);
      	
			$result_html .= $key.": ".$value."<br />";
			
			
			
			
			
			
			
			
			
        }
        //$result_html .= '------------------------------------------<br />';
    }
} else {	
	//$result_html .= "<strong>Cart is Empty</strong>";
}




header("POST $path HTTP/1.1\\r\
" );
header("Host: $host\\r\
" );
header("Content-type: application/x-www-form-urlencoded\\r\
" );
header("Content-length: " . strlen($data) . "\\r\
" );
header("Connection: close\\r\
\\r\
" );
header($data);
?>
