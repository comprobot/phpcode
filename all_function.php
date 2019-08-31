<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: sadminlogin.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: sadminlogin.php");
  }
?>
<?php include('sserver.php') ?>

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
    <title>Super user home page</title>

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

if (param=="advuser")
{
	$('#tab_list_content .ah-tab-content').removeAttr('data-ah-tab-active');	 
	$('#advuser').attr('data-ah-tab-active', 'true');
}

if (param=="storeuser")
{
	$('#tab_list_content .ah-tab-content').removeAttr('data-ah-tab-active');	 
	$('#storeuser').attr('data-ah-tab-active', 'true');
	
}

if (param=="advvideo")
{
	$('#tab_list_content .ah-tab-content').removeAttr('data-ah-tab-active');	 
	$('#advvideo').attr('data-ah-tab-active', 'true');
	
}
	
if (param=="systemsetting")
{
	$('#tab_list_content .ah-tab-content').removeAttr('data-ah-tab-active');	 
	$('#systemsetting').attr('data-ah-tab-active', 'true');
	
}

if (param=="customerpayment")
{
	$('#tab_list_content .ah-tab-content').removeAttr('data-ah-tab-active');	 
	$('#customerpayment').attr('data-ah-tab-active', 'true');
	
}

if (param=="itemshop")
{
	$('#tab_list_content .ah-tab-content').removeAttr('data-ah-tab-active');	 
	$('#itemshop').attr('data-ah-tab-active', 'true');
	
}



//id="advvideo"
	
	
  
  
  });


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
	

	
	
$(document).ready(function() {

	$('#uploadVideoFormSadmin').submit(function() {
	
	  //event.preventDefault();
	
	$("#uploadVideoFormSadmin").validate({
	 rules: {

				adv_username: {
					required: true,
					minlength: 2
				},
				qrcode_str: {
					required: true,
					minlength: 2
				}
			},
			
			
			messages: {
				
				adv_username: {
					required: "Please enter a String for advusername",
					minlength: "Your string for adv username must consist of at least 2 characters"
				},
				
				qrcode_str: {
					required: "Please enter a String for qr code",
					minlength: "Your string for qr code must consist of at least 2 characters"
				}
			}
		});
	
	
	
	



var qrcode_str = $("#qrcode_str").val();
var adv_username =$("#adv_username").val();		
		
		
		
if (qrcode_str == '') {
//alert("Please fill all fields...!!!!!!");
} else {
	
}
}
					  
					  
);



	$('#updateSystemSetting').submit(function() {
	
	  //event.preventDefault();
	
	$("#updateSystemSetting").validate({
	 rules: {

				adv_pool_ratio: {
					required: true,
					minlength: 1
				},
				adv_access_point: {
					required: true,
					minlength: 1
				}
			},
			
			
			messages: {
				
				adv_pool_ratio: {
					required: "Please enter adv pool ratio",
					minlength: "Adv pool radio must consist of at least 1 number"
				},
				
				adv_access_point: {
					required: "Please enter adv access point",
					minlength: "Adv access point must consist of at least 2 characters"
				}
			}
		});
	
	
	
	



var qrcode_str = $("#adv_pool_ratio").val();
var adv_username =$("#adv_access_point").val();		
		
		
		
if (qrcode_str == '') {
//alert("Please fill all fields...!!!!!!");
} else {
	
}
}
					  
					  
);







});


</script>	
  
  


	<!--<script src="js/registration.js"></script>	-->

	
</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">All function Home page</h2>
                </div>
                <div class="card-body">         
            <?php  if (isset($_SESSION['username'])) : ?>
			<div class="form-row">
			     <div class="name">Welcome, <strong><?php echo $_SESSION['username']; ?></strong></div>
 			</div>			

			<div id="tab_list" class="ah-tab-wrapper">
                <div class="ah-tab">
                    <a class="ah-tab-item" data-ah-tab-active="true" href="">Upload Adv video</a>
                    <a class="ah-tab-item" href="">Approve Adv video</a>
                    <a class="ah-tab-item" href="">View/Edit Adv user</a>
                    <a class="ah-tab-item" href="">View/Edit Store user</a>					
                    <a class="ah-tab-item" href="">Edit and Veify payments </a>
                    <a class="ah-tab-item" href="">System settings</a>
					<a class="ah-tab-item" href="">Item shop approval</a>
                    <a class="ah-tab-item" href="">About company</a>
                </div>
            </div>						
			

		<div id="tab_list_content" class="ah-tab-content-wrapper">	
			<div class="ah-tab-content" data-ah-tab-active="true">
	
	
			<div class="form-row">
			<form method="POST" action="all_function.php" id="uploadVideoFormSadmin" name="uploadVideoFormSadmin" enctype="multipart/form-data">
			<?php include('errors.php'); ?>
			
			<div class="row row-space">
			 <strong><input type="file" name="myvideo"/></strong></div>
			</div>
<!--
			<div class="form-row">
			<div class="row row-space"><strong>Qr code message:</strong> </div>
			<div class="value">
			<div class="input-group">
			<input class="input--style-5" name="qrcode_str" id='qrcode_str' value="<?php echo $qrcode_str; ?>" > <label for="qrcode_str" class="error"></label>
			</div>
			</div>
			</div>
-->
			<div class="form-row">
			<div class="row row-space"><strong>Adv username:</strong> </div>
			<div class="value">
			<div class="input-group">
			<input class="input--style-5" name="adv_username" id='adv_username' value="<?php echo $adv_username; ?>" > <label for="qrcode_str" class="error"></label>
			</div>
			</div>
			</div>
			
			<button class="btn btn--radius-2 btn--red" name="upload_video" id="upload_video" type="submit">Submit Video</button>

			<br/>
			<input type='hidden' name='username' id='username' value='<?php echo $_SESSION['username']; ?>' />
			<br/>
			<br/>
			</form>

			</div>
			
			
			
			<div class="ah-tab-content" id="advvideo">
			
			<?php $results = mysqli_query($db, "SELECT * FROM  advs_video"); ?>
			<table border="1">
			<thead>
				<tr>
					<th>Username</th>
					<th>Videolink</th>
					<th>QRcode</th>
					<th>Time</th>
					<th>Status</th>
					<th colspan="3">Action</th>
				</tr>
			</thead>
	
			<?php while ($row = mysqli_fetch_array($results)) { ?>
				<tr>
					<td><?php echo $row['username']; ?></td>
					<td><a href="http://157.230.145.40/ops/video/<?php echo $row['filename'];?>"><?php echo $row['filename'];?></a></td>
					<td><?php echo $row['qrcode']; ?></td>					
					<td><?php echo $row['tm']; ?></td>					
					<td><?php 
					if ($row['approved']=='T')
					{						
				       echo "Approved"; 
					}else if ($row['approved']=='F')
					{
						echo "Not Approved"; 
					}else if ($row['approved']=='P')
					{
						echo "Pending"; 
					}
					
					?></td>					
					
					
				<td>
					<a href="sserver.php?videoid=<?php echo $row['id']; ?>&approvel=T&adminuser=<?php echo $_SESSION['username']?>" class="edit_btn" >Approve</a>
				</td>
				<td>
					<a href="sserver.php?videoid=<?php echo $row['id']; ?>&approvel=F&adminuser=<?php echo $_SESSION['username']?>" class="del_btn">Reject</a>
				</td>
				<td>
					<a href="sserver.php?videoid=<?php echo $row['id']; ?>&delete_adv_video=delete_adv_video&adminuser=<?php echo $_SESSION['username']?>" class="del_btn">Delete</a>
				</td>					
					
					
			</tr>
			<?php } ?>
			</table>
			</div>
			
			
			<div class="ah-tab-content" id="advuser">			
			<div class="form-row">
			     <div class="row row-space"><strong>View and Edit adv users </strong></div>				 
 			</div>			
			
			<?php $results = mysqli_query($db, "SELECT * FROM  adv_users"); ?>
			<table border="1">
			<thead>
				<tr>
					<th>Username</th>
					<th>industry</th>
					<th>package</th>
					<th>email</th>
					<th>phone</th>
					<th>Action</th>
				</tr>
			</thead>
	
			<?php while ($row = mysqli_fetch_array($results)) { ?>
				<tr>
					<td><?php echo $row['username']; ?></td>
					<td><?php echo $row['industry']; ?></td>
					<td><?php echo $row['package']; ?></td>					
					<td><?php echo $row['email']; ?></td>					
					<td><?php echo $row['phone']; ?></td>		
				<td>
					<a href="sserver.php?username=<?php echo $row['username']; ?>&delete_adv_users=delete_adv_users&adminuser=<?php echo $_SESSION['username']?>" class="edit_btn" >Delete</a>
				</td>				
			</tr>
			<?php } ?>
			</table>
			
			
			</div>
						
			
			
			<div id="storeuser" class="ah-tab-content">
  			<?php $results = mysqli_query($db, "SELECT * FROM  store_users"); ?>
			<table border="1">
			<thead>
				<tr>
					<th>Username</th>
					<th>email</th>
					<th>phone</th>
					<th>store name</th>
					<th>store address</th>
					<th>target user</th>
					<th>industry</th>
					<th>Action</th>
				</tr>
			</thead>
	
			<?php while ($row = mysqli_fetch_array($results)) { ?>
				<tr>
					<td><?php echo $row['username']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><?php echo $row['phone']; ?></td>					
					<td><?php echo $row['store_name']; ?></td>					
					<td><?php echo $row['store_address']; ?></td>		
					<td><?php echo $row['target_user']; ?></td>					
					<td><?php echo $row['industry']; ?></td>		
				<td>
					<a href="sserver.php?username=<?php echo $row['username']; ?>&delete_store_users=delete_store_users&adminuser=<?php echo $_SESSION['username']?>" class="edit_btn" >Delete</a>
				</td>				
			</tr>
			<?php } ?>
			</table>
			</div>
			
			
			
			
			
			<div class="ah-tab-content" id="customerpayment">
			 <div class="form-row">
			     <div class="row row-space"><strong>Edit and Veify payments </strong></div>				 
 			</div>			
			
			<?php $results = mysqli_query($db, "SELECT * FROM  customer_payment"); ?>
			<table border="1">
			<thead>
				<tr>
					<th>Username</th>
					<th>Package type</th>
					<th>Price</th>
					<th>Paid</th>
					<th>Verfied</th>
					<th>Time</th>					
					<th>Delete</th>
					<th>Veify payment</th>
				</tr>
			</thead>
	
			<?php while ($row = mysqli_fetch_array($results)) { ?>
				<tr>
					<td><?php echo $row['customerid']; ?></td>
					<td><?php echo $row['item']; ?></td>
					<td><?php echo $row['price']; ?></td>
					<td><?php echo $row['paid']; ?></td>
					<td><?php echo $row['verified']; ?></td>
					<td><?php echo $row['tm']; ?></td>					
					
				<td>
					<a href="sserver.php?customerid=<?php echo $row['customerid']; ?>&delete_customer_payment=delete_customer_payment&adminuser=<?php echo $_SESSION['username']?>" class="edit_btn" >Delete</a>
				</td>				
				<td>
					<a href="sserver.php?customerid=<?php echo $row['customerid']; ?>&check=T&veify_customer_payment=veify_customer_payment&adminuser=<?php echo $_SESSION['username']?>" class="edit_btn" >Verify</a>
				</td>				
				
			</tr>
			<?php } ?>
			</table>
			
			</div>
			
			
			
			
			
			<div class="ah-tab-content" id="systemsetting">			 
              <?php $results = mysqli_query($db, "SELECT * FROM  system_settings"); ?>
			  
			    <div class="form-row">
			     <form method="POST" action="all_function.php" id="updateSystemSetting" name="updateSystemSetting">
			     <?php include('errors.php'); ?>
			        <?php $row = mysqli_fetch_array($results) ?>
					
					
					<div class="form-row">
					<div class="row row-space"><strong>Adv user pool ratio :</strong> </div>
					<div class="value">
					<div class="input-group">
					<input class="input--style-5" name="adv_pool_ratio" id='adv_pool_ratio' value="<?php echo $row[0]; ?>" > <label for="adv_pool_ratio" class="error"></label>
					</div>
					</div>
					</div>

					<div class="form-row">
					<div class="row row-space"><strong>Adv access point:</strong> </div>
					<br/>
					<div class="value">
					<div class="input-group">
					<input class="input--style-5" name="adv_access_point" id='adv_access_point' value="<?php echo $row[1];?>" > <label for="adv_access_point" class="error"></label>
					</div>
					</div>
					</div>
			
					<button class="btn btn--radius-2 btn--red" name="update_system_info" id="update_system_info" type="submit">Update setting</button>

					<br/>
					<input type='hidden' name='username' id='username' value='<?php echo $_SESSION['username']; ?>' />
					<br/>
					<br/>
				  </form>
			  
			  
			</div>

			
			</div>


			
			
			<div class="ah-tab-content" id="itemshop" >
			<?php 			
			$query = "SELECT * FROM  item_shop " ;
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
					<th colspan="3">>Action</th>
				</tr>
			</thead>
	
			<?php while ($row = mysqli_fetch_array($results)) { ?>
				<tr>
					<td><?php echo $row['item_id']; ?></td>					
					<td><?php echo $row['item_name']; ?></td>					
					<td><?php echo $row['item_description']; ?></td>					
					<td><?php echo $row['item_price']; ?></td>										
					
					<td><?php if ($row['item_status'] == 'N')
							  {
							  	echo "Approved";
							  } else if ($row['item_status'] == 'P'){								  
								 echo "Pending"; 
							  } else if ($row['item_status'] == 'F'){
								 echo "Rejected"; 
							  }								  
						?>
					</td>
					<td><?php echo $row['item_quantity']; ?></td>						
					<td><img width="100" height="100" src="http://157.230.145.40/ops/pic/<?php echo $row['item_photo_path']; ?>"   ></td>											
					<td><?php echo $row['tm']; ?></td>											
					<td>
						<a href="sserver.php?item_id=<?php echo $row['item_id']; ?>&approvel_item=N&adminuser=<?php echo $_SESSION['username']?>" class="edit_btn" >Approve</a>
					</td>
					<td>
						<a href="sserver.php?item_id=<?php echo $row['item_id']; ?>&approvel_item=F&adminuser=<?php echo $_SESSION['username']?>" class="del_btn">Reject</a>
					</td>
					<td>
						<a href="sserver.php?item_id=<?php echo $row['item_id']; ?>&delete_item=delete_item&adminuser=<?php echo $_SESSION['username']?>" class="del_btn">Delete</a>
					</td>					
			</tr>
					
			</tr>
			<?php } ?>
			</table>
			 
			<?php
			}
			?>
			
			</div>
			
			
			
			
			<!--
			
			<div class="form-row">			
			
			<div class="row row-space">                  
			  <strong><input type="file" name="myvideo"/></strong></div> 				  
            </div>			    			
			
			<div class="form-row">
              <div class="row row-space"><strong>Qr code message:</strong> </div>
                <div class="value">
                  <div class="input-group">
                     <input class="input--style-5" name="qrcode_str" id='qrcode_str' value="<?php echo $qrcode_str; ?>" > <label for="qrcode_str" class="error"></label>
                  </div>
               </div>
            </div>
			
			
			<button class="btn btn--radius-2 btn--red" name="upload_video" id="upload_video" type="submit">Submit Video</button>
			
			<br/>
			<input type='hidden' name='username' id='username' value='<?php echo $_SESSION['username']; ?>' />
			<br/>
			<br/>
			-->
			
			
			
			</form>
			<div class="form-row">
				<div class="name"> <a href="all_function.php?logout='1'" style="color: red;">logout</a></div>
			</div>			
			
			
			<?php endif ?>
            
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
