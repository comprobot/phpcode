<?php

function send_post($url, $post_data) {
 
    $postdata = http_build_query($post_data);
    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-type:application/x-www-form-urlencoded',
            'content' => $postdata,
            'timeout' => 15 * 60 // 超时时间（单位:s）
        )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
 
    return $result;
}




$host = "https://www.paypal.com/cgi-bin/webscr";
$path = "/cgi-bin/webscr";
$data =  $_POST;;
//$data = urlencode($data);


send_post(%host, $data);


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



/*
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

*/
?>
