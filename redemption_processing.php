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
        <title>Redemption Processing</title>
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
            <div id="tab_header">
                <ul>
                    <li>
                        <a href="redemption_user.php">可兌換</a>
                    </li>
                    <li class="active">
                        <a href="redemption_processing.php">換領記錄</a>
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
                <div id="records" class="tab-pane">
                    <div id="records-header">
                        <ul>
                            <li class="processing_active">
                                <a href="#">處理中</a>
                            </li>
                            <li>
                                <a href="redemption_completed.php">已兌換</a>
                            </li>
                        </ul>
                        <div class="tab_header_shadow"></div>
                    </div>
					
					<script>
					function confirmFunction(p)
					{
						var answer = window.confirm("確定兌換")
						if (answer) {
						//some code
						  
                            location.href="http://157.230.145.40/ops/redemption_user.php?buyitem=buyitem&item_id="+p+"&userid=<?php echo $_SESSION['username']; ?>";						  						  
						   
						}
						else {
						//some code
						
						}
					
					}
					
					</script>	
					
                    <div id="records-list">
					<?php 
						$videouser = $_SESSION['username'];
						$query = "SELECT * FROM  item_shop i , customer_item c  WHERE c.user_id = '$videouser' and c.item_id = i.item_id and c.item_status = 'B' " ;
						$results = mysqli_query($db, $query); 			
						if (mysqli_num_rows($results) >= 1) {
						?>
						<?php while ($row = mysqli_fetch_array($results)) { ?>		
					
                        <div class="records-list-processing-row">
                            <div class="records-list-processing-row-image"><img src="http://157.230.145.40/ops/pic/<?php echo $row['item_photo_path']; ?>"   /></div>
                            <div class="records-list-processing-row-content">
                                <div class="records-list-processing-row-header">
                                    <div class="records-list-processing-row-name"><?php echo $row['item_name']; ?></div>
                                    <div class="records-list-processing-row-id">換領編號：<?php echo $row['item_redeem_code']; ?></div>
                                </div>
                                <div class="records-list-processing-row-details">
                                    <table>
                                        <tr>
                                            <td>交易狀態：</td>
                                            <td>待取</td>											
                                        </tr>
                                        <tr>
                                            <td>兌換日期：</td>
                                            <td><?php echo $row['tm']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>使用積分：</td>
                                            <td><?php echo $row['item_price']; ?>分</td>
                                        </tr>
										<tr>
                                            <td>Redemption</td>
                                            <td><a href="http://157.230.145.40/ops/genEcoupon.php?redeem_code=<?php echo $row['item_redeem_code']; ?>" >[下載換領劵]</a></td>
                                        </tr>
										
                                    </table>
                                </div>
                            </div>
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
            <div id="bottom_menu">
                <div><a href="home.php"><img src="img/btn_home.png" /></a></div>
                <div><a href="account.php"><img src="img/btn_account.png" /></a></div>
                <div><a href="guide_1.html"><img src="img/btn_scan.png" /></a></div>
            </div>
        </div>
    </body>
</html>
