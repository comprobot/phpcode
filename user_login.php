<?php include('cserver.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
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
                    <a href="home.php"><img src="img/back.png" srcset="img/back-2x.png 2x, img/back-3x.png 3x, img/back-4x.png 4x"/></a>
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
      		<?php include('errors.php'); ?>
            <div id="login_header">登入</div>
            <div id="content">
               <form method="post" action="user_login.php" data-ajax="false"  id="loginform" name="loginForm">			
                <div class="row">
                    <label class="label">用戶名稱*</label>
                    <div class="row_flex">
                        <input name="username" type="text" placeholder="用戶名稱" />
                    </div>
                </div>
                <div class="row">
                    <label class="label">密碼*</label>
                    <div class="row_flex">
                        <input name="password" type="text" placeholder="密碼" />
                    </div>
                </div>
                <div class="setting_spacer"></div>
                <div class="row">
                    <div class="row_flex row_center">
                        <button type="submit" class="btn_blue"  name="customer_login_user" id="customer_login_user" >登入</button>
                    </div>
                </div>
				</form>
            </div>
        </div>
    </body>
</html>
