<?php
	session_start();

	include 'connect.php';
//	date_default_timezone_set('Asia/Aden');// +3




	// Routes

	$tpl 	= 'includes/templates/'; // Template Directory
	$lang 	= 'includes/languages/'; // Language Directory
	$func	= 'includes/functions/'; // Functions Directory

	$css 	= 'assets/css/'; // Css Directory
	$js 	=  'assets/js/'; // Js Directory
	$image 	= 'assets/imges/'; // images Directory

	$workimg_dir = "uploads/workimg/";
    $profile_dir = "uploads/profile/";

	// Include The Important Files

	include $func . 'functions.php';

	if(!isset($no_header)){
		include $tpl . 'header.php';

	}
	
	

	$title = 'findworker';
	



	
	?>
	<!-- JQuery -->
	<script src="<?php echo $js ?>jquery-3.5.1.min.js"></script>
	<!-- Main JS file -->
	<script src="<?php echo $js ?>bootstrap.bundle.min.js"></script>

	<script src="<?php echo $js ?>mdb.min.js"></script>
	<script src="<?php echo $js ?>mixitup.min.js"></script>
	<script src="<?php echo $js ?>main.js"></script>
