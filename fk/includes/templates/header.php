
<!DOCTYPE html>
<html lang="ar">
	<head>
	<title> findworker</title>
  
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		
	<link href="assets/css/mdb.min.css" rel="stylesheet">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" >
  <link rel="stylesheet" type="text/css" href="assets/css/summernote.min.css">
  <link id="onyx-css" href="<?php echo $css ?>style.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
      
	</head>
	<body>
  
	<header style="background-color: #2b2b3d;">
<nav class="navbar navbar-expand-lg navbar-dark " >
  <div class="container-fluid">
    <a class="navbar-brand" href=""  style="font-size: 23px;">findworker</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">main page</a>
        </li>
        
        <li class="nav-item">
        <?php
        if(isset($_SESSION['ID'])){
          echo ' <a class="nav-link active" aria-current="page" 
          href="profile.php?id='.$_SESSION['ID'].'">personal page</a>';
        }
        ?>
        </li>

        <li class="nav-item">
        <?php
        //$s =$_SESSION['admin'];
        if(isset($_SESSION['ID'])){
            if($_SESSION['admin']==1 ){
          echo ' <a class="nav-link active" aria-current="page" 
          href="dachpord.php">Dachpord.</a>';}
        }
        ?>
        </li>
        
      </ul>
      <div class="d-flex">
	 
	 <?php 
		if(isset($_SESSION['ID'])){
			echo '<a href="logout.php" class="btn btn-outline-danger  " type="submit" >log out </a>';
		}else {
			echo '<a href="login.php" class="btn btn-outline-success   " type="submit">log in </a>';
		}
	 ?>
       
      </div>
    </div>
  </div>
</nav>
  <!-- Navbar -->
</header>