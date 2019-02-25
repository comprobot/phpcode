<?php
function checkUploadedVideo() {
    $target_dir = dirname(__FILE__) ."/video/";
    echo $target_dir;
    $target_file = $target_dir . basename($_FILES["myvideo"]["name"]);

    if(isset($_FILES['myvideo']) AND $_FILES['myvideo']['error'] == 0) {
        // Check size
        if($_FILES['myvideo']['size'] <= 1000000000000) {
            // Get extension name
            $fileInfo = pathinfo($_FILES['myvideo']['name']);
            $upload_extension = $fileInfo['extension'];
            $allowed_extensions = array('mp4', 'mp3', 'gif', 'png','txt');

            // Check if the file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
            }

            // Check if the file has a correct, expected extension
            if(in_array($upload_extension, $allowed_extensions)) {
                if(move_uploaded_file($_FILES['myvideo']['tmp_name'], $target_file)) {
                    return true;
                }
            }
            else
                echo "error3";
        }
        else
            echo "error2";
    }
    else
        echo "error1";

    echo "<pre>". print_r($_FILES) ."</pre>";
    echo "Error code: " .$_FILES['myvideo']['error'] ."<br/>";
    return false;
}

if(checkUploadedVideo()) {
    //header("Location: index.php");
	echo "upload success";
}
else {
    echo "upload error";
}
?>
