<?php

include 'init.php';


$target_dir = "uploads/workimg/";
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
       $works = $_POST["works"];
       $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
          $uploadOk = 1;
          }
           else {
          echo " <div class='alert alert-warning alert-dismissible fade show' role='alert' >sorry , File is not an image.</div>";
          $uploadOk = 0;
          }

    // Check if file already exists
    if (file_exists($target_file)) {
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Sorry, file already exists if you not ,
     change the name of pic and try again</div>";
     $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Sorry, your file is too large.</div>";
    $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>";
    $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Sorry, your file was not uploaded.</div>";
    // if everything is ok, try to upload file 
    }
    else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo"<div class='alert alert-success' role='alert' >you post a new work .</div>";
    $imgname= basename( $_FILES["fileToUpload"]["name"]);
    // Insert record
    $workdata=$_POST["data_of_work"];
    $datapop=date("Y-m-d");
    $worktopping=$_POST["jobtitle"];
    $workdesc=$_POST["describtion"];
    $userID=$_SESSION['ID'];

      $sql="INSERT INTO works (user_id,work_depart_id,work_date,work_pop,work_pic,work_topping,work_describe)
      VALUES  ($userID,$works,'$workdata','$datapop','$imgname','$worktopping','$workdesc')";
      $con->exec($sql);

      header("Location: profile.php?id=".$_SESSION['ID']."");

   /* $stmt = $con->prepare("INSERT INTO works (user_id,work_depart_id,work_date,work_pop,work_pic,work_topping,work_describe)
    VALUES  ($userID,$works,'$workdata','$datapop','$imgname','$worktopping','$workdesc')");
		$stmt->execute();*/

    
    }
}}

?>