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
        <title>Redemption List</title>
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
            <div id="tab_header">
                <ul>
                    <li class="active">
                        <a href="#">可兌換</a>
                    </li>
                    <li>
                        <a href="redemption_processing.html">換領記錄</a>
                    </li>
                </ul>
                <div class="tab_header_shadow"></div>
            </div>
			
			<?php  if (isset($_SESSION['username'])) : ?>
			<?php 
			
			$username = $_SESSION['username'];			
			$results = mysqli_query($db, "SELECT point FROM  customers WHERE username='$username'"); 
			
			?>
            
			<?php while ($row = mysqli_fetch_array($results)) { ?>
			<div id="points">現有積分：<?php echo $row['point']; ?> 分</div>	
			<?php } ?>
			
			<?php endif ?>
			<?php include('errors.php'); ?>
			
            <div class="tab-content">
			
			
			
                <div id="avaiable" class="tab-pane">
                    <div id="avaiable-header">
                        <div id="select_type">
                            <select>
                                <option value="類別">類別</option>
                                <option value="類別">類別</option>
                                <option value="類別">類別</option>
                                <option value="類別">類別</option>
                            </select>
                        </div>
                        <div id="select_sort">
                            <select>
                                <option value="排序">排序</option>
                                <option value="排序">排序</option>
                                <option value="排序">排序</option>
                                <option value="排序">排序</option>
                            </select>
                        </div>
                        <div id="select_thumbnail">
                            <a href="redemption_thumbnail.html"><img src="http://www.fivegold.hk/qrjetso_ui/img/btn_thumbnail.png" /></a>
                        </div>
                        <div id="select_list">
                            <img src="http://www.fivegold.hk/qrjetso_ui/img/btn_list.png" />
                        </div>
                    </div>
                    <div id="avaiable-list">					
					
					<script>
					function confirmFunction(p)
					{
						var answer = window.confirm("確定兌換")
						if (answer) {
						//some code
						  
                            location.href="http://157.230.145.40/ops/redemption_user.php?action=buyitem&item_id="+p+"&userid=<?php echo $_SESSION['username']; ?>";						  						  
						   
						}
						else {
						//some code
						
						}
					
					}
					
					</script>					
					<?php 
						$videouser = $_SESSION['username'];
						$query = "SELECT * FROM  item_shop  WHERE item_status = 'N'" ;
						$results = mysqli_query($db, $query); 			
						if (mysqli_num_rows($results) >= 1) {
						?>
			
						<?php while ($row = mysqli_fetch_array($results)) { ?>		
                        <div class="avaiable-list-row">						
                            <div class="avaiable-list-row-image"><img src="http://157.230.145.40/ops/pic/<?php echo $row['item_photo_path']; ?>"   ></div>
                            <div class="avaiable-list-row-name"><?php echo $row['item_name']; ?></div>							
                            <div class="avaiable-list-row-name"><a onclick="confirmFunction(<?php echo $row['item_id']; ?>)" href="#">[兌換積分]</a></div>
							<div class="avaiable-list-row-point"><?php echo $row['item_price']; ?></div>
							
							
							
                        </div>
						<?php } ?>
              		<?php
						}
					?>
                    </div>
                </div>
				
				
				
            </div>
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
