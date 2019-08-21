<?php include('cserver.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://www.fivegold.hk/qrjetso_ui/style.css"/>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap" rel="stylesheet">        
    </head>
    <body>
        <div id="header">
            <div id="logo_bar">
                <div id="back">
                    <a href="home.html"><img src="http://www.fivegold.hk/qrjetso_ui/img/back.png" srcset="http://www.fivegold.hk/qrjetso_ui/img/back-2x.png 2x, http://www.fivegold.hk/qrjetso_ui/img/back-3x.png 3x, http://www.fivegold.hk/qrjetso_ui/img/back-4x.png 4x"/></a>
                </div>
                <div id="logo">
                    <a href="home.html"><img src="http://www.fivegold.hk/qrjetso_ui/img/logo.png" srcset="http://www.fivegold.hk/qrjetso_ui/img/logo-2x.png 2x, http://www.fivegold.hk/qrjetso_ui/img/logo-3x.png 3x, http://www.fivegold.hk/qrjetso_ui/img/logo-4x.png 4x"/></a>
                </div>
                <div id="next">
                </div>
            </div>
            <div class="sperator"></div>
        </div>
	
	    <div id="page">
                <div data-role="main" class="ui-content">
                    <form method="post" action="user_login.php" data-ajax="false"  id="loginform" name="loginForm">
                        <label for="name">用戶名稱 : <span>*</span></label>
                        <input type="text" name="username" id="username" placeholder="Name">
                            
                        <label for="password">密碼 : <span>*</span></label>
                         <input type="password" name="password" id="password" placeholder="password">
                                    
                         <input type="submit" name="customer_login_user" id="customer_login_user" value="登入">
                    </form>
					<?php include('errors.php'); ?>
					
                </div>
                
        <div id="footer_container">
            <div class="sperator"></div>
            <div id="bottom_menu">
                <div><a href="home.html"><img src="http://www.fivegold.hk/qrjetso_ui/img/btn_home.png" /></a></div>
                <div><a href="home.html"><img src="http://www.fivegold.hk/qrjetso_ui/img/btn_search.png" /></a></div>
                <div><a href="registration_1.html"><img src="http://www.fivegold.hk/qrjetso_ui/img/btn_inbox.png" /></a></div>
                <div><a href="account.html"><img src="http://www.fivegold.hk/qrjetso_ui/img/btn_account.png" /></a></div>
                <div><a href="home.html"><img src="http://www.fivegold.hk/qrjetso_ui/img/btn_scan.png" /></a></div>
            </div>
        </div>		
    </body>
</html>
