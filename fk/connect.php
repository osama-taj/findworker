<?php

	$dsn = 'mysql:host=localhost;dbname=new_findwrkernew';
	$user = 'root';
	$pass = '';

	$option = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
	);

	try {
		$con = new PDO($dsn, $user, $pass, $option);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}

	catch(PDOException $e) {
		?>
		 <h1 style="
    text-align: center;
    color: #E91E63;
    padding: 30px;
">   error to conect to database </h1>
	<code style="
    font-size: 20px;
"> <b style="
    color: #f10;
    font-size: 29px;
">ERROR: </b>
		<?=$e->getMessage()?>
		</code>
		<?php
		exit();
	}






