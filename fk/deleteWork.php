<?php
include 'init.php';

if(isset($_SESSION['ID'])){
    $del = $_GET['id'];
    $stmt = $con->prepare("delete from works where work_id = $del");
		$stmt->execute();
        header("Location: profile.php?id=".$_SESSION['ID']."");
        
}























?>