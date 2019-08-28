<?php   
  if (empty($_GET['redeem_code'])) {
  	header("location: user_login.php");
	
	
  }
?>
<?php include('cserver.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Redemption Claim</title>
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
		
		
		    <div id="points">請廣告商在下方輸入密碼，兌換禮物</div>	
			
			<form action="redemption_claim.php">
				密碼: <input type="password" name="password_adv" id="password_adv" > <input type="submit"  value="輸入">
			</form>
			
			<div id="points">用戶禮物兌換碼：<?php echo $_GET['redeem_code']; ?> </div>	
			<?php include('errors.php'); ?>
				
            </div>
        </div>
       <div id="footer_container">
            <div id="bottom_menu">
                <div><a href="home.html"><img src="img/btn_home.png" /></a></div>
                <div><a href="account.html"><img src="img/btn_account.png" /></a></div>
                <div><a href="guide_1.html"><img src="img/btn_scan.png" /></a></div>
            </div>
        </div>
    </body>
</html>
