<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: adv_user_login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: adv_user_login.php");
  }
?>
<?php include('aserver.php') ?>

<html>
<!DOCTYPE html>
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Adverstiser Home page</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>	-->
	<script src="js/jquery.js"></script>
	<script src="js/jquery.validate.js"></script>
	<script src="js/additional-methods.js"></script>
	<script src="js/messages_zh_TW.js"></script>
	<link rel="stylesheet" href="src/style.css">
    <link rel="stylesheet" href="src/jquery.horizontalmenu.css">
    <script src="src/jquery.horizontalmenu.js"></script>
	
	
	<script>
	$.validator.setDefaults({
		submitHandler: function() {
			alert("submitted!");
		}
	});
	
	
	</script>
	
	<!--<script src="js/registration.js"></script>	-->
<script>

		
	(function ($) {
  $.UrlParam = function (name) {
    //宣告正規表達式
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
    /*
     * window.location.search 獲取URL ?之後的參數(包含問號)
     * substr(1) 獲取第一個字以後的字串(就是去除掉?號)
     * match(reg) 用正規表達式檢查是否符合要查詢的參數
    */
    var r = window.location.search.substr(1).match(reg);
    //如果取出的參數存在則取出參數的值否則回穿null
    if (r != null) return unescape(r[2]); return null;
  }
})(jQuery);

$(function () {
  
  $('#tab_list').horizontalmenu({
                                itemClick: function (item) {
                                $('#tab_list_content .ah-tab-content').removeAttr('data-ah-tab-active');
                                
                                
                                $('#tab_list_content .ah-tab-content:eq(' + $(item).index() + ')').attr('data-ah-tab-active', 'true');
                                
                                
                                
                                return false; //if this finction return true then will be executed http request
                                }
                                });
  
  
  //$('#sp1').attr('data-ah-tab-active', 'true');
  
  var param = $.UrlParam("tag");
if (param=="customeraccess")
{
	$('#tab_list_content .ah-tab-content').removeAttr('data-ah-tab-active');	 
	$('#customeraccess').attr('data-ah-tab-active', 'true');
}
if (param=="customerpayment")
{
	$('#tab_list_content .ah-tab-content').removeAttr('data-ah-tab-active');	 
	$('#customerpayment').attr('data-ah-tab-active', 'true');
	
}
if (param=="advvideo")
{
	$('#tab_list_content .ah-tab-content').removeAttr('data-ah-tab-active');	 
	$('#advvideo').attr('data-ah-tab-active', 'true');
	
}

if (param=="paymenthistory")
{
	$('#tab_list_content .ah-tab-content').removeAttr('data-ah-tab-active');	 
	$('#paymenthistory').attr('data-ah-tab-active', 'true');
	
}


if (param=="itemshop")
{
	$('#tab_list_content .ah-tab-content').removeAttr('data-ah-tab-active');	 
	$('#itemshop').attr('data-ah-tab-active', 'true');
	
}

if (param=="additem")
{
	$('#tab_list_content .ah-tab-content').removeAttr('data-ah-tab-active');	 
	$('#itemshop').attr('data-ah-tab-active', 'true');
	
}


//id="advvideo"
	
	
  
  
  });


$(document).ready(function() {
	$('#uploadVideoForm').submit(function() {
	
	  //event.preventDefault();
	  
	  /*
	
	$("#uploadVideoForm").validate({
	 rules: {				
				qrcode_str: {
					required: true,
					minlength: 2
				}
			},
			
			
			messages: {
				qrcode_str: {
					required: "Please enter a String for qr code",
					minlength: "Your string for qr code must consist of at least 2 characters"
				},
			}
		});
	

var qrcode_str = $("#qrcode_str").val();
if (qrcode_str == '') {
//alert("Please fill all fields...!!!!!!");
} else {
	
}

*/
});




$('#uploadItemForm').submit(function() {
	
	  //event.preventDefault();
	
	$("#uploadItemForm").validate({
	 rules: {				
				item_name: {
					required: true,
					minlength: 2
				},
				item_description: {
					required: true,
					minlength: 2
				},
				item_price: {
					required: true,
					minlength: 2
				}
				
				
			},
			
			
			messages: {
				item_str: {
					required: "Please enter a String for Item name",
					minlength: "Your string for item name must consist of at least 2 characters"
				},
				item_price: {
					required: "Please enter a String for Item price",
					minlength: "Your string for item price must consist of at least 2 characters"
				},
				item_description: {
					required: "Please enter a String for Item description",
					minlength: "Your string for item description must consist of at least 2 characters"
				}
			}
		});
	

var item_name = $("#item_name").val();
if (item_name == '') {
//alert("Please fill all fields...!!!!!!");
} else {
	
}

var item_price = $("#item_price").val();
if (item_name == '') {
//alert("Please fill all fields...!!!!!!");
} else {
	
}

var item_name = $("#item_name").val();
if (item_name == '') {
//alert("Please fill all fields...!!!!!!");
} else {
	
}

}



);








});
</script>	


	
</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Adverstiser Home page</h2>
                </div>
                <div class="card-body">  

           <div class="content">

				
            <?php  if (isset($_SESSION['username'])) : ?>
			<div class="form-row">
			     <div class="name">Welcome, <strong><?php echo $_SESSION['username']; ?></strong></div>
 			</div>			
			
			<div id="tab_list" class="ah-tab-wrapper">
                <div class="ah-tab">
                    <a class="ah-tab-item" data-ah-tab-active="true" href="">Upload Adv video</a>
                    <a class="ah-tab-item" href="">View Customer access </a>
                    <a class="ah-tab-item" href="">Package payment</a> 
	                <a class="ah-tab-item" href="">Payment history</a> 
					<a class="ah-tab-item" href="">Items on shop </a> 
				    <a class="ah-tab-item" href="">Add item on shop </a> 
				
                </div>
            </div>		
			
			
			
			
			
			
   		   <div id="tab_list_content" class="ah-tab-content-wrapper">	
			<div class="ah-tab-content" data-ah-tab-active="true" id="advvideo">
			<form method="POST" action="adv_user_home.php" id="uploadVideoForm" name="uploadVideoForm" enctype="multipart/form-data">
			<?php include('errors.php'); ?>
			<div class="form-row">
			     <div class="row row-space"><strong>Upload your promote video to the server </strong></div>				 
 			</div>			
						<div class="form-row">
			<?php 
			$videouser = $_SESSION['username'];
			$query = "SELECT approved FROM  advs_video WHERE username = '$videouser' and approved = 'T'";
			$resultsofyou = mysqli_query($db, $query); 			
			$rowc = mysqli_fetch_assoc($resultsofyou);		    			
			if (mysqli_num_rows($resultsofyou) == 1) {
			?>
			
				<div class="row row-space"><strong>Your video is approved </strong></div>				 
				
			<?php
			}
			?>  

			
			<?php 
			$videouser = $_SESSION['username'];
			$query = "SELECT approved FROM  advs_video WHERE username = '$videouser' and approved = 'P'";
			$resultsofyou = mysqli_query($db, $query); 			
			if (mysqli_num_rows($resultsofyou) == 1) {
			?>
				<div class="row row-space"><strong>Your video is Pending for approval </strong></div>				 
			<?php
			}
			?>
			
			
			<?php 
			$videouser = $_SESSION['username'];
			$query = "SELECT approved FROM  advs_video WHERE username = '$videouser' and approved = 'F'";
			$resultsofyou = mysqli_query($db, $query); 			
			if (mysqli_num_rows($resultsofyou) == 1) {
			?>
				<div class="row row-space"><strong>Your video is rejected </strong></div>				 
			<?php
			}
			?>
			
			</div>			
			
			<div class="form-row">			
			<div class="row row-space">                  
			  <strong><input type="file" name="myvideo"/></strong></div> 				  
            </div>			    						
			
			<button class="btn btn--radius-2 btn--red" name="upload_video" id="upload_video" type="submit">Submit Video</button>
			
			<br/>
			<input type='hidden' name='username' id='username' value='<?php echo $_SESSION['username']; ?>' />
			<br/>
			<br/>
			</form>
			</div>
			
			<div class="ah-tab-content" id="customeraccess" >
			 			<?php 
			$videouser = $_SESSION['username'];
			$query = "SELECT cc.title as title, cc.age as age,ca.tm as tm  FROM  customer_access ca, customers cc   WHERE ca.advid = '$videouser' and ca.customerid = cc.username" ;
			$results = mysqli_query($db, $query); 			
			if (mysqli_num_rows($results) >= 1) {
			?>
			 
 			
			<table border="1">
			<thead>
				<tr>
					<th>title</th>
					<th>age</th>					
					<th>time</th>			
				</tr>
			</thead>
	
			<?php while ($row = mysqli_fetch_array($results)) { ?>
				<tr>
					<td><?php echo $row['title']; ?></td>					
					<td><?php echo $row['age']; ?></td>	
					<td><?php echo $row['tm']; ?></td>						
			</tr>
			<?php } ?>
			</table>
			 
			<?php
			}
			?>
			 
	
			 
			</div>
			<div class="ah-tab-content" id="customerpayment">
<!--<iframe src="paypal.html?username=<?php echo $_SESSION['username']; ?>" width="100%" height="600" frameborder="0" scrolling="yes"></iframe>
			 -->
			 <object data="paypal.html?username=<?php echo $_SESSION['username']; ?>" width="100%" height="600" frameborder="0" scrolling="yes">
					<embed src="paypal.html?username=<?php echo $_SESSION['username']; ?>" width="100%" height="600" frameborder="0" scrolling="yes"> </embed>
					Error: Embedded data could not be displayed.
			 </object>
			 
			 
			 
			</div>

			<div class="ah-tab-content" id="paymenthistory" >
			<?php 
			$videouser = $_SESSION['username'];
			$query = "SELECT * FROM  customer_payment  WHERE customerid = '$videouser'" ;
			$results = mysqli_query($db, $query); 			
			if (mysqli_num_rows($results) >= 1) {
			?>
			 
 			
			<table border="1">
			<thead>
				<tr>
					<th>Date</th>
					<th>Package type</th>
					<th>Price</th>
					<th>Purchased</th>					
					<th>Verified</th>			
				</tr>
			</thead>
	
			<?php while ($row = mysqli_fetch_array($results)) { ?>
				<tr>
					<td><?php echo $row['tm']; ?></td>					
					<td><?php echo $row['item']; ?></td>					
					<td><?php echo $row['price']; ?></td>					
					<td><?php echo $row['paid']; ?></td>	
					<td><?php echo $row['verified']; ?></td>						
			</tr>
			<?php } ?>
			</table>
			 
			<?php
			}
			?>
			 
			</div>
			
			
			
			<div class="ah-tab-content" id="itemshop" >
			<?php 
			$videouser = $_SESSION['username'];
			$query = "SELECT * FROM  item_shop  WHERE adv_id = '$videouser'" ;
			$results = mysqli_query($db, $query); 			
			if (mysqli_num_rows($results) >= 1) {
			?>
			 
 			
			<table border="1">
			<thead>
				<tr>
					<th>Item ID</th>
					<th>Item Name</th>
					<th>Item Description</th>
					<th>Item Price</th>								
					<th>Item status</th>					
					<th>Item quantity</th>					
					<th>Item Photo name</th>								
					<th>Update time</th>			
				</tr>
			</thead>
	
			<?php while ($row = mysqli_fetch_array($results)) { ?>
				<tr>
					<td><?php echo $row['item_id']; ?></td>					
					<td><?php echo $row['item_name']; ?></td>					
					<td><?php echo $row['item_description']; ?></td>					
					<td><?php echo $row['item_price']; ?></td>										
					<td><?php echo $row['item_status']; ?></td>						
					<td><?php echo $row['item_quantity']; ?></td>						
					<td><img width="100" height="100" src="http://157.230.145.40/ops/pic/<?php echo $row['item_photo_path']; ?>"   ></td>											
					<td><?php echo $row['tm']; ?></td>											
			</tr>
			<?php } ?>
			</table>
			 
			<?php
			}
			?>
			
			</div>
			
			
			
			
		 <!--<div id="tab_list_content" class="ah-tab-content-wrapper">	-->
			<div class="ah-tab-content" id="additem">
			<form method="POST" action="adv_user_home.php" id="uploadItemForm" name="uploadItemForm" enctype="multipart/form-data">
			<?php include('errors.php'); ?>
			<div class="form-row">
			     <div class="row row-space"><strong>Upload your items to the server </strong></div>				 
 			</div>			
			<div >
			<div class="form-row">			
			  <div class="row row-space">                  
			  <strong><input type="file" name="myphoto"/></strong>
			  </div> 				  
            </div>			    			

			<p></p>

			
			<div class="form-row">
              <div class="row row-space"><strong>Item Name:</strong> </div>
                <div class="value">
                  <div class="input-group">
                     <input class="input--style-5" name="item_name" id='item_name' value="<?php echo $item_name; ?>" > <label for="item_name" class="error"></label>
                  </div>
               </div>
            </div>
			

			<div class="form-row">
              <div class="row row-space"><strong>Item Quantity:</strong> </div>
                <div class="value">
				
				
                  <div class="input-group">
				  
				  
				  
	   			      <input class="input--style-5"   type="number" name="item_quantity"  id='item_quantity'  min="1" max="100" value="<?php echo $item_quantity; ?>" >    
					  
					  
                     <label for="item_quantity" class="error"></label>
                  </div>
				  
				  
				  
               </div>
            </div>

			
			<div class="form-row">
              <div class="row row-space"><strong>Item Description:</strong> </div>
                <div class="value">
                  <div class="input-group">
                     <input class="input--style-5" name="item_description" id='item_description' value="<?php echo $item_description; ?>" > <label for="item_description" class="error"></label>
                  </div>
               </div>
            </div>
			
			<div class="form-row">
              <div class="row row-space"><strong>Item Price:</strong> </div>
                <div class="value">
                  <div class="input-group">
                     <input class="input--style-5" name="item_price" id='item_price' value="<?php echo $item_price; ?>" > <label for="item_price" class="error"></label>
                  </div>
               </div>
            </div>
			
			<p></p>			
			
			
			<button class="btn btn--radius-2 btn--red" name="upload_item" id="upload_item" type="submit">Submit item</button>
			
			<br/>
			<input type='hidden' name='username' id='username' value='<?php echo $_SESSION['username']; ?>' />
			<br/>
			<br/>
			</form>
			</div>
				
			</div>
			
			
			
			
			<div class="form-row">
				<div class="name"> <a href="adv_user_home.php?logout='1'" style="color: red;">logout</a></div>
			</div>			
			
			
			<?php endif ?>
			
            </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <!--<script src="vendor/jquery/jquery.min.js"></script>-->
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>


</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
