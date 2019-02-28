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
    <title>Adverstiser Registration</title>

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
			//alert("submitted!");
		}
	});
	
	
	</script>
	
	<!--<script src="js/registration.js"></script>	-->
<script>

$(document).ready(function() {
	$("#register").click(function() {
	
	
	
	$("#signupForm").validate({
	
	       rules: {				
				last_name: "required",
				first_name: "required",
				
				username: {
					required: true,
					minlength: 2
				},
				password: {
					required: true,
					minlength: 8
				},
				cpassword: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
				
				area_code: "required",
				
				phone: "required",
				
				
				email: {
					required: true,
					email: true
				}
			},
			
			
			messages: {
				first_name: "Please enter your firstname",
				last_name: "Please enter your lastname",

				
				username: {
					required: "Please enter a username",
					minlength: "Your username must consist of at least 2 characters"
				},
				
				password: {
					required: "Please enter a password",
					minlength: "Your password must consist of at least 8 characters"
				},
				
				cpassword: {
					required: "Please enter a confirm password",
					minlength: "Your username must consist of at least 8 characters",
					equalTo: "Please enter the same password as left"
				},
				area_code: "Please enter area code",
				
				phone: "Please your phone number",
				
				email: "Please enter a valid email address"
				
			}
		});
	
	
	
	
	


var username = $("#username").val();
var first_name = $("#first_name").val();
var last_name = $("#last_name").val();

var area_code = $("#area_code").val();
var phone = $("#phone").val();
var email = $("#email").val();
var password = $("#password").val();
var cpassword = $("#cpassword").val();

var title = $("[name=title]:checked").val();

//alert(title);

console.log(username+" "+first_name+" "+last_name+" "+area_code+" "+phone+" "+email+" "+password+" "+cpassword+title);

if (username == '' || first_name == '' || password == '' || cpassword == '' ||  last_name == ''  ||  area_code == '' ||  phone == '' ||  email == '' ) {
//alert("Please fill all fields...!!!!!!");
} else if ((password.length) < 8) {
//alert("Password should at least 8 character in length...!!!!!!");
} else if (!(password).match(cpassword)) {
//alert("Your passwords don't match. Try again?");
} else {
	
$.post("index.php", {
username: username,
email: email,
first_name: first_name,
last_name: last_name,
area_code: area_code,
phone: phone,
title: title,
cpassword: cpassword,
password: password
}, function(data) {
if (data == 'You have Successfully Registered.....') {
//$("form")[0].reset();
}
//alert(data);
});



}
});
});
</script>	
	
<script>
<?php  if ($title == 'm') : ?>  
    $("#titlemr").checked =true;
<?php  endif ?>
<?php  if ($title == 's') : ?>  
    $("#titlems").checked =true;
<?php  endif ?>
</script>
	
	
	
	
	
	
	
	
</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Adverstiser Registration Form</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="#" id="signupForm" name="signupForm">
					    <?php include('errors.php'); ?>
						<div class="form-row">
                            <div class="name">Username</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="username" id='username' value="<?php echo $username; ?>" required> <label for="username" class="error"></label>
                                </div>
                            </div>
                        </div>					
						<!--
						<div class="form-row">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="password" name="password">
                                </div>
                            </div>
                        </div>
						-->

						<div class="form-row m-b-55">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="password" name="password" id='password' value="<?php echo $password; ?>"><label for="password" class="error"></label>
                                            <label class="label--desc">Password</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="password" name="cpassword" id='cpassword' value="<?php echo $cpassword; ?>" ><label for="cpassword" class="error"></label>
                                            <label class="label--desc">Confirm password`</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>						
					
					
					
                        <div class="form-row m-b-55">
                            <div class="name">Name</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="first_name" id='first_name'  value="<?php echo $first_name; ?>" required> <label for="first_name" class="error"></label>
                                            <label class="label--desc">first name</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="last_name" id='last_name' value="<?php echo $last_name; ?>" required> <label for="last_name" class="error"></label>
                                            <label class="label--desc">last name</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<!--
                        <div class="form-row">
                            <div class="name">Company</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="company">
                                </div>
                            </div>
                        </div>
						-->
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email" id='email' value="<?php echo $email; ?>" > <label for="email" class="error"></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">Phone</div>
                            <div class="value">
                                <div class="row row-refine">
                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="area_code" id='area_code' value="<?php echo $area_code; ?>" > <label for="area_code" class="error"></label>
                                            <label class="label--desc">Area Code</label>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="phone" id='phone' value="<?php echo $phone; ?>" ><label for="phone" class="error"></label>
                                            <label class="label--desc">Phone Number</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<!--
                        <div class="form-row">
                            <div class="name">Subject</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="subject">
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option>Subject 1</option>
                                            <option>Subject 2</option>
                                            <option>Subject 3</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
						-->
                        <div class="form-row p-t-20">
                            <label class="label label--block">Title:</label>
                            <div class="p-t-15">
                                <label class="radio-container m-r-55">Mr.
									<input type="radio" checked="checked" name="title" id='titlemr' value='m'>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">Ms.
                                    <input type="radio" name="title" id='titlems' value='s'>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
						
						
						
						
                        <div>
                            <!--<button class="btn btn--radius-2 btn--red" name="register" id="register"  type="submit">Register</button>-->
							<button class="btn btn--radius-2 btn--red" name="register" id="register" >Register</button>
                        </div>
                    </form>
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
