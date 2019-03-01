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
	$('#loginForm').submit(function() {
	
	  event.preventDefault();
	
	$("#loginForm").validate({
	 rules: {				
				username: {
					required: true,
					minlength: 2
				},
				password: {
					required: true,
					minlength: 8
				}
			},
			
			
			messages: {
				username: {
					required: "Please enter a username",
					minlength: "Your username must consist of at least 2 characters"
				},
				
				password: {
					required: "Please enter a password",
					minlength: "Your password must consist of at least 8 characters"
				}
			}
		});
	
	
	
	
	


var username = $("#username").val();
var password = $("#password").val();


if (username == '' ||  password == '') {
//alert("Please fill all fields...!!!!!!");
} else if ((password.length) < 8) {
//alert("Password should at least 8 character in length...!!!!!!");
} else if (!(password).match(cpassword)) {
//alert("Your passwords don't match. Try again?");
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
                    <h2 class="title">Adverstiser Login page</h2>
                </div>				
				     <form method="POST" action="login.php" id="loginform" name="loginForm">
					    <?php include('errors.php'); ?>
						<div class="form-row">
                            <div class="name">Username</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="username" id='username' value="<?php echo $username; ?>" required> <label for="username" class="error"></label>
                                </div>
                            </div>
                        </div>					
						<div class="form-row m-b-55">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="row row-space">                                    
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="password" name="password" id='password' value="<?php echo $password; ?>" required ><label for="password" class="error"></label>
                                            <label class="label--desc">Password</label>
                                        </div>                                    
                                </div>
                            </div>
                        </div>
                        <div>
                            <!--<button class="btn btn--radius-2 btn--red" name="register" id="register"  type="submit">Register</button>-->
							<button class="btn btn--radius-2 btn--red" name="login_user" id="login_user" type="submit">Login</button>
                        </div>						
				    </form>
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