<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: storeuserlogin.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: storeuserlogin.php");
  }
?>
<?php include('server.php') ?>

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
    <title>Store User Home page</title>

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


//id="advvideo"
  
  });
	
	
$(document).ready(function() {
	$('#adddisplay').submit(function() {
	
	  //event.preventDefault();
	
	$("#adddisplay").validate({
		rules: {
			
				serial_number: {
					required: true,
					minlength: 2
				},
				info: {
					required: true,
					minlength: 2
				}
				
			},
			
			
			messages: {
				serial_number: {
					required: "Please enter a serial number",
					minlength: "Your string for serial number must consist of at least 2 characters"
				},
				info: {
					required: "Please enter information for media player",
					minlength: "Your string for information must consist of at least 2 characters"
				}
				
				
				
			}
		});
	
	
	
	
	
var serial_number = $("#serial_number").val();



if (serial_number == '') {
//alert("Please fill all fields...!!!!!!");
} else {
	
}
});
});
</script>	

	
	
	<!--<script src="js/registration.js"></script>	-->

	
</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Store user Home page</h2>
                </div>
                <div class="card-body">         
            <?php  if (isset($_SESSION['username'])) : ?>
			<div class="form-row">
			     <div class="name">Welcome, <strong><?php echo $_SESSION['username']; ?></strong></div>
 			</div>			
			
			<div id="tab_list" class="ah-tab-wrapper">
                <div class="ah-tab">
                    <a class="ah-tab-item" data-ah-tab-active="true" href="">Add media player items</a>
                    <a class="ah-tab-item" href="">View Customer access </a>
                </div>
            </div>		
						
			


			<div id="tab_list_content" class="ah-tab-content-wrapper">	
		   
		   
		   
			<div class="ah-tab-content" data-ah-tab-active="true" id="advvideo">

			
			
			
			<form method="POST" action="storeuserhome.php" id="adddisplay" name="adddisplay" ">
			
                 <div class="form-row">
			        <div class="row row-space"><strong>Add the media player items</strong></div>				 
 			    </div>						
			   <div class="form-row">
                 <div class="name">Serial Number</div>
                    <div class="value">
                       <div class="input-group">
                         <input class="input--style-5" type="text" name="serial_number" id='serial_number' value="<?php echo $serial_number; ?>" required> <label for="serial_number" class="error"></label>
                       </div>
                 </div>
               </div>			
			  <div class="form-row">
                 <div class="name">Information</div>
                    <div class="value">
                       <div class="input-group">
                         <input class="input--style-5" type="text" name="info" id='info' value="<?php echo $info; ?>" required> <label for="info" class="error"></label>
                       </div>
                 </div>
              </div>			
						
			  <div>
            
				<button class="btn btn--radius-2 btn--red" name="add_media_player" id="add_media_player" >Add</button>
              </div>
			 
			
			</form>
			
			<div class="form-row">
				<div class="name"> <br/></div>
			</div>			
						
			
			
			<?php include('errors.php'); ?>
			
			<div class="form-row">
			     <div class="row row-space"><strong>List the media player items</strong></div>				 
 			</div>			
			
			<?php 
			$stser = $_SESSION['username'];
			?>
			
			<?php $results = mysqli_query($db, "SELECT * FROM  store_display where username = '$stser' "); ?>
			<table border="1">
			<thead>
				<tr>
					<th>Serial Number</th>
					<th>Info</th>					
					<th>Action</th>					
				</tr>
			</thead>
	
			<?php while ($row = mysqli_fetch_array($results)) { ?>
				<tr>
					<td><?php echo $row['serial_number']; ?></td>					
					<td><?php echo $row['info']; ?></td>									
					<td>
						<a href="server.php?storeid=<?php echo $row['id']; ?>&delete_media_player=T&user=<?php echo $_SESSION['username']?>" class="edit_btn" >Delete item </a>
					</td>					
			</tr>
			<?php } ?>
			</table>
			</div>
			
			
						
			<div class="ah-tab-content" id="customeraccess" >
			<?php 
			$videouser = $_SESSION['username'];
			$query = "SELECT cc.title as title, cc.age as age,ca.tm as tm,ca.displayid as display_device  FROM  customer_access ca, customers cc   WHERE ca.storeid = '$videouser' and ca.customerid = cc.username" ;
			$results = mysqli_query($db, $query); 			
			if (mysqli_num_rows($results) >= 1) {
			?>
			 
 			
			<table border="1">
			<thead>
				<tr>
					<th>title</th>
					<th>age</th>					
					<th>time</th>			
					<th>device</th>
				</tr>
			</thead>
	
			<?php while ($row = mysqli_fetch_array($results)) { ?>
				<tr>
					<td><?php echo $row['title']; ?></td>					
					<td><?php echo $row['age']; ?></td>	
					<td><?php echo $row['tm']; ?></td>						
					<td><?php echo $row['display_device']; ?></td>						
			</tr>
			<?php } ?>
			</table>
			 
			<?php
			}
			?>
			 
			</div>
			
			
			
			
			<div class="form-row">
				<div class="name"> <a href="storeuserhome.php?logout='1'" style="color: red;">logout</a></div>
			</div>			
			
			<div class="form-row">
				<div class="name"> <br/></div>
			</div>
			



			
			
			
			
			

	




			
						
		</div>
			
			<?php endif ?>
	               
				 </div>
                </div>
            </div>
        </div>
    <!--</div>-->

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
