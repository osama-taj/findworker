<?php

include 'init.php';


$target_dir = "uploads/profile/";
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
       
       $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
            
          $uploadOk = 1;
          }
           else {
          echo '
          <div class="alert alert-warning alert-dismissible fade show" style="text-align: center;">
    <strong>Warning!</strong> sorry , File is not an image</div>';
          $uploadOk = 0;
          }

    // Check if file already exists
    if (file_exists($target_file)) {
    echo '<div class="alert alert-warning alert-dismissible fade show" style="text-align: center;">Sorry, file already exists if you not , change the name of pic and try again</div>';
     $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo '<div class="alert alert-warning alert-dismissible fade show" style="text-align: center;" >Sorry, your file is too large.</div>';
    $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo '<div class="alert alert-warning alert-dismissible fade show" style="text-align: center;">Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>';
    $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    echo '<div class="alert alert-warning alert-dismissible fade show" style="text-align: center;" >Sorry, your file was not uploaded.</div>';
    // if everything is ok, try to upload file 
    }
    else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo"<h1>you put pic of your accunt  .</h1>";
    $imgname= basename( $_FILES["fileToUpload"]["name"]);
    // Insert record
    $userID=$_SESSION['ID'];

    $stmt = $con->prepare("update users set  pic ='".$imgname."'
    where user_id=".$_SESSION['ID']."");
		$stmt->execute();
    header("Location: profile.php?id=".$_SESSION['ID']."");

    
    }
}}

?>