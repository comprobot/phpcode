<?php   
  session_start();
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: user_login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: user_login.php");
  }
?>
<?php include('restap.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Account Edit</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css"/>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap" rel="stylesheet">        
    </head>
    <body>
        <div id="header">
            <div id="logo_bar">
                <div id="back">
                    <a href="home.html"><img src="img/back.png" srcset="img/back-2x.png 2x, img/back-3x.png 3x, img/back-4x.png 4x"/></a>
                </div>
                <div id="logo">
                    <a href="home.html"><img src="img/logo.png" srcset="img/logo-2x.png 2x, img/logo-3x.png 3x, img/logo-4x.png 4x"/></a>
                </div>
                <div id="next">
                </div>
            </div>
            <div class="sperator"></div>
        </div>
        <div id="page">
            <div id="account_details_header">
                <div id="account_details_header_title">編輯帳戶資料</div>
            </div>
            <div id="content">
			
			<?php  if (isset($_SESSION['username'])) : ?>
			<?php 
			
			$username = $_SESSION['username'];			
			$results = mysqli_query($db, "SELECT * FROM  customers WHERE username='$username'"); 
			
			?>
			<?php while ($row = mysqli_fetch_array($results)) { ?>            			
			    <form action="account_edit.php"  METHOD="GET" >
			     <input type="hidden" name="username" id="username" value="<?php echo $_SESSION['username'];	 ?>" />
                <div class="row">
                    <div class="label_required">*必填</div>
                </div>
                <div class="row">
                    <label class="label">姓名*</label>
                    <div class="row_flex">
                        <input name="family_name" type="text" placeholder="姓氏" class="input_left" value="<?php echo $row['lname']; ?>" />
                        <input name="given_name" type="text" placeholder="名字" class="input_right" value="<?php echo $row['fname']; ?>"/>
                    </div>
                </div>
                <div class="row">
                    <label class="label">稱謂*</label>
                    <div class="row_flex radio_group">

						<?php if  ($row['title'] == "mr" ) {?>												
					 	<input type="radio" name="salutation" value="mr" id="mr" checked="checked"/>
                        <label for="mr">先生</label>
                        <input type="radio" name="salutation" value="mrs" id="mrs" />
                        <label for="mrs">太太</label>
                        <input type="radio" name="salutation" value="ms" id="ms" />
                        <label for="ms">小姐</label>
						<?php } ?>			
						<?php if  ($row['title'] == "mrs" ) {?>												
					 	<input type="radio" name="salutation" value="mr" id="mr" />
                        <label for="mr">先生</label>
                        <input type="radio" name="salutation" value="mrs" id="mrs" checked="checked"/>
                        <label for="mrs">太太</label>
                        <input type="radio" name="salutation" value="ms" id="ms" />
                        <label for="ms">小姐</label>						
						<?php } ?>			
						<?php if  ($row['title'] == "ms" ) {?>												
					 	<input type="radio" name="salutation" value="mr" id="mr" />
                        <label for="mr">先生</label>
                        <input type="radio" name="salutation" value="mrs" id="mrs"/>
                        <label for="mrs">太太</label>
                        <input type="radio" name="salutation" value="ms" id="ms"checked="checked" />
                        <label for="ms">小姐</label>												
						<?php } ?>			
						
                    </div>
                </div>
                <div class="row">
                    <label class="label">年齡*</label>
                    <div class="row_flex">
                        <select id="registration_age" name="registration_age">
							<?php if  ($row['age'] == "16-25" ) {?>												
								<option value="16-25" selected >16-25</option>
								<option value="26-35">26-35</option>
								<option value="36-45">36-45</option>
								<option value="46-55">46-55</option>
								<option value="56-65">56-65</option>
								<option value=">65">>65</option>							
							<?php } ?>		
							<?php if  ($row['age'] == "26-35" ) {?>												
								<option value="16-25">16-25</option>
								<option value="26-35" selected>26-35</option>
								<option value="36-45">36-45</option>
								<option value="46-55">46-55</option>
								<option value="56-65">56-65</option>
								<option value=">65">>65</option>							
							<?php } ?>		
						
							<?php if  ($row['age'] == "36-45" ) {?>												
								<option value="16-25">16-25</option>
								<option value="26-35">26-35</option>
								<option value="36-45" selected>36-45</option>
								<option value="46-55">46-55</option>
								<option value="56-65">56-65</option>
								<option value=">65">>65</option>							
							<?php } ?>		
						
							<?php if  ($row['age'] == "46-55" ) {?>												
								<option value="16-25">16-25</option>
								<option value="26-35">26-35</option>
								<option value="36-45">36-45</option>
								<option value="46-55" selected>46-55</option>
								<option value="56-65">56-65</option>
								<option value=">65">>65</option>							
							<?php } ?>		
						
							<?php if  ($row['age'] == "56-65" ) {?>												
								<option value="16-25">16-25</option>
								<option value="26-35">26-35</option>
								<option value="36-45">36-45</option>
								<option value="46-55">46-55</option>
								<option value="56-65" selected>56-65</option>
								<option value=">65">>65</option>							
							<?php } ?>		
						
							<?php if  ($row['age'] == ">65" ) {?>												
								<option value="16-25">16-25</option>
								<option value="26-35">26-35</option>
								<option value="36-45">36-45</option>
								<option value="46-55">46-55</option>
								<option value="56-65">56-65</option>
								<option value=">65" selected> >65</option>							
							<?php } ?>		
						
							
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label class="label">密碼*</label>
                    <div class="row_flex">
                        <input name="password" type="password" placeholder="6 至 12 位英文字母及/或數字" value="<?php echo $row['password']; ?>"/>
                    </div>
                </div>
                <div class="row">
                    <label class="label">再次輸入密碼*</label>
                    <div class="row_flex">
                        <input name="password_retype" type="password" placeholder="確認您的密碼"/>
                    </div>
                </div>
                <div class="setting_spacer"></div>
                <div class="row">
                    <div class="row_flex row_center">
					
                         <button type="submit" class="btn_blue" name="update_customer" id="update_customer" >儲存</button>
						 
					<!--	<button type="button" class="btn_blue" onclick="window.location.href = 'account_details.html'">儲存</button>-->
                    </div>
                </div>
				
				
				
			</form>	
				
			<?php } ?>							
			<?php endif ?>
			<?php include('errors.php'); ?>					
				
            </div>
        </div>        
    </body>
</html>
