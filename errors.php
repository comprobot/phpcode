<?php
   $username = mysqli_real_escape_string($db, $_POST['username']);
   echo $username
?>

<?php  if (count($errors) > 0) : ?>  
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>  
<?php  endif ?>
