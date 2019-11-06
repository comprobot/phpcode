<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: user_login.php');
        if (isset($_GET['logout'])) {
        }
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
        <link rel="stylesheet" href="style.css"/>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap" rel="stylesheet">
<script>
var wAlert = window.alert;
window.alert = function (message) {
    try {
        var iframe = document.createElement("IFRAME");
        iframe.style.display = "none";
        iframe.setAttribute("src", 'data:text/plain,');
        document.documentElement.appendChild(iframe);
        var alertFrame = window.frames[0];
        var iwindow = alertFrame.window;
        if (iwindow == undefined) {
            iwindow = alertFrame.contentWindow;
        }
        iwindow.alert(message);
        iframe.parentNode.removeChild(iframe);
    }
    catch (exc) {
        return wAlert(message);
    }
}
var wConfirm = window.confirm;
window.confirm = function (message) {
    try {
        var iframe = document.createElement("IFRAME");
        iframe.style.display = "none";
        iframe.setAttribute("src", 'data:text/plain,');
        document.documentElement.appendChild(iframe);
        var alertFrame = window.frames[0];
        var iwindow = alertFrame.window;
        if (iwindow == undefined) {
            iwindow = alertFrame.contentWindow;
        }
        var result=iwindow.confirm(message);
        iframe.parentNode.removeChild(iframe);
        return result;
    }
    catch (exc) {
        return wConfirm(message);
    }
} 
</script>
    </head>
    <body>
        <div id="header">
            <div id="logo_bar">
                <div id="back">
                   <a  href="#"  onclick="callHome()" ><img src="img/back.png" srcset="img/back-2x.png 2x, img/back-3x.png 3x, img/back-4x.png 4x"/></a>
                </div>
                <div id="logo">
                     <a  href="#"  onclick="callHome()" ><img src="img/logo.png" srcset="img/logo-2x.png 2x, img/logo-3x.png 3x, img/logo-4x.png 4x"/></a>
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
<?php  if (count($errors) > 0) : ?>
<?php foreach ($errors as $error) : ?>
<script>
alert("<?php echo $error ?>");
</script>
<?php endforeach ?>
<?php  endif ?>



            <div class="tab-content">
                <div id="avaiable" class="tab-pane">
                    <div id="avaiable-header">

<!--
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
                            <a href="redemption_thumbnail.html"><img src="img/btn_thumbnail.png" /></a>
                        </div>
                        <div id="select_list">
                            <img src="img/btn_list.png" />
                        </div>
-->
                    </div>


                    <div id="avaiable-list">

<script>
function confirmFunction(p,d)
{
    //alert(p);
    //alert(d);
    //var passArray = p.split(",");
    //var answer = window.confirm("確定兌換物品 ");
    

    
   var answer = window.confirm("確定兌換物品: "+d+"?");
    if (answer) {
        //some code
        
        //location.href="http://157.230.145.40/ops/redemption_user.php?buyitem=buyitem&item_id="+passArray[0]+"&userid=<?php echo $_SESSION['username']; ?>";
        
         location.href="http://157.230.145.40/ops/redemption_user.php?buyitem=buyitem&item_id="+p+"&userid=<?php echo $_SESSION['username']; ?>";
        
    }
    else {
        //some code
        
    }
    
}

</script>
<?php
    $videouser = $_SESSION['username'];
    $query = "SELECT * FROM  item_shop  WHERE item_status = 'N' and item_quantity > 0" ;
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) >= 1) {
        ?>

<?php while ($row = mysqli_fetch_array($results)) { ?>
<!--
<div class="avaiable-list-row" >
-->


<div class="avaiable-list-row" onclick="confirmFunction('<?php echo $row['item_id']; ?>','<?php echo $row['item_name']; ?>')" >

<div class="avaiable-list-row-image"><img src="http://157.230.145.40/ops/pic/<?php echo $row['item_photo_path']; ?>"   /></div>
<div class="avaiable-list-row-name"><?php echo $row['item_name']; ?></div>
<!--
<div class="avaiable-list-row-name"><a onclick="confirmFunction(<?php echo $row['item_id']; ?>)" href="#">[兌換積分]</a></div>
-->
                            <div class="avaiable-list-row-point"><?php echo $row['item_price']; ?>分</div>
                        </div>
<?php } ?>
<?php
    }
    ?>



                    </div>


                </div>
            </div>
        </div>
<script>
var callShare = function() {
    var shareInfo = JSON.stringify({"title": "标题", "desc": "内容", "shareUrl": "http://www.jianshu.com/p/f896d73c670a",
                                   "shareIco":"http://upload-images.jianshu.io/upload_images/1192353-fd26211d54aea8a9.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240"});
    Toyun.share(shareInfo);
}
var callScan = function() {
    var shareInfo = JSON.stringify({"scan": "scan"});
    Toyun.callScan(shareInfo);
}
var callHome = function() {
    var shareInfo = JSON.stringify({"home": "home"});
    Toyun.callHome(shareInfo);
}
var callAcc = function() {
    var shareInfo = JSON.stringify({"acc": "acc"});
    Toyun.callAcc(shareInfo);
}
var picCallback = function(photos) {
    alert(photos);
}
var shareCallback = function(){
    //alert('success');
}
var validCallback = function(){
    alert('success');
}
</script>



    </body>
</html>
