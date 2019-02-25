<?php
function checkUploadedPhoto() {
    $target_dir = dirname(__FILE__) ."/uploads/";
    echo $target_dir;
    $target_file = $target_dir . basename($_FILES["myphoto"]["name"]);

    if(isset($_FILES['myphoto']) AND $_FILES['myphoto']['error'] == 0) {
        // Check size
        if($_FILES['myphoto']['size'] <= 1000000) {
            // Get extension name
            $fileInfo = pathinfo($_FILES['myphoto']['name']);
            $upload_extension = $fileInfo['extension'];
            $allowed_extensions = array('jpg', 'jpeg', 'gif', 'png','txt');

            // Check if the file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
            }

            // Check if the file has a correct, expected extension
            if(in_array($upload_extension, $allowed_extensions)) {
                if(move_uploaded_file($_FILES['myphoto']['tmp_name'], $target_file)) {
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
    echo "Error code: " .$_FILES['myphoto']['error'] ."<br/>";
    return false;
}

if(checkUploadedPhoto()) {
    //header("Location: index.php");
	echo "upload success";
}
else {
    echo "upload error";
}
?>
