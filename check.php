<?php
session_start();
$db = mysqli_connect('localhost', 'ops', '60503176', 'ops');
if(isset($_GET['username'])){
                $username = mysqli_real_escape_string($db, $_POST['username']);
				        if (empty($username)) { 
					        echo 'empty';
				        }
				
                $sql = $db->query("SELECT * FROM users WHERE username  = '$username'");
                if($sql->rowCount() > 0){
                     echo 'user exist, please choose another';
                }else{
                    echo 'available';
                }

}
?php>
