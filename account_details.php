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
<?php include('cserver.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Account Details</title>
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
                    <a href="account.php"><img src="img/back.png" srcset="img/back-2x.png 2x, img/back-3x.png 3x, img/back-4x.png 4x"/></a>
                </div>
                <div id="logo">
                    <a href="home.php"><img src="img/logo.png" srcset="img/logo-2x.png 2x, img/logo-3x.png 3x, img/logo-4x.png 4x"/></a>
                </div>
                <div id="next">
                </div>
            </div>
            <div class="sperator"></div>
        </div>
        <div id="page">
            <div id="account_details_header">
                <div id="account_details_header_title">帳戶資料</div>
                <div id="account_details_header_edit"><a href="account_edit.php"><img src="img/icon_edit.png" /></a></div>
            </div>
            <div id="account_details_content">
                <table>
			<?php  if (isset($_SESSION['username'])) : ?>
			<?php 
			
			$username = $_SESSION['username'];			
			$results = mysqli_query($db, "SELECT * FROM  customers WHERE username='$username'"); 
			
			?>
            
			<?php while ($row = mysqli_fetch_array($results)) { ?>
			        <tr>
                        <td class="table_label">名字</td>
                        <td><?php echo $row['fname']; ?></td>
                    </tr>
                    <tr>
                        <td>姓氏</td>
                        <td><?php echo $row['lname']; ?></td>
                    </tr>
                    <tr>
                        <td>稱謂</td>
                        <td>
						<?php if  ($row['title'] == "mr" ) {?>												
					 	 先生
						<?php } ?>			
						<?php if  ($row['title'] == "mrs" ) {?>												
					 	 女士
						<?php } ?>			
						<?php if  ($row['title'] == "ms" ) {?>												
					 	 小姐
						<?php } ?>			
						
						</td>
                    </tr>
                    <tr>
                        <td>電郵</td>
                        <td><?php echo $row['email']; ?></td>
                    </tr>
                    <tr>
                        <td>電話</td>
                        <td><?php echo $row['telephone']; ?></td>
                    </tr>
                    <tr>
                        <td>年齡</td>
                        <td><?php echo $row['age']; ?></td>
                    </tr>
			<?php } ?>
			<?php endif ?>
			<?php include('errors.php'); ?>								
                </table>
            </div>
        </div>
        <div id="footer_container">
            <div id="bottom_menu">
                <div><a href="home.php"><img src="img/btn_home.png" /></a></div>
                <div><a href="account.php"><img src="img/btn_account.png" /></a></div>
                <div><a href="guide_1.html"><img src="img/btn_scan.png" /></a></div>
            </div>
        </div>
    </body>
</html>
