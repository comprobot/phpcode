<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
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
	<script>
	$.validator.setDefaults({
		submitHandler: function() {
			alert("submitted!");
		}
	});
	
	
	</script>
	
	<!--<script src="js/registration.js"></script>	-->
<script>

$(document).ready(function() {
	$('#uploadVideoForm').submit(function() {
	
	  //event.preventDefault();
	
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
});
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
            <?php  if (isset($_SESSION['username'])) : ?>
			<div class="form-row">
			     <div class="name">Welcome, <strong><?php echo $_SESSION['username']; ?></strong></div>
 			</div>			
			
			
			
			<form method="POST" action="home.php" id="uploadVideoForm" name="uploadVideoForm" enctype="multipart/form-data">
			<?php include('errors.php'); ?>
			
			<div class="form-row">
			     <div class="row row-space"><strong>Upload your promote video to the server </strong></div>				 
				 
 			</div>			
			
			
			<div class="form-row">
			
			<?php 
			$videouser = $_SESSION['username'];
			$query = "SELECT approved FROM  advs_video WHERE username = '$videouser' and approved = 'T'";
			$resultsofyou = mysqli_query($db, $query); 			
			if (mysqli_num_rows($resultsofyou) == 1) {
			?>
			
				<div class="row row-space"><strong>Your video is approved </strong></div>				 
				
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
			
			
			
			
			
			
			
			</form>
			<div class="form-row">
				<div class="name"> <a href="home.php?logout='1'" style="color: red;">logout</a></div>
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
