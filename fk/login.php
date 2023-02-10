<?php

	$pageTitle = ' log in ';

	

	include 'init.php';

	// Check If User Coming From HTTP Post Request
	if(isset($_POST["submit"])) {

		$username = $_POST['user'];
		$password = $_POST['pass'];

		// Check If The User Exist In Database

		$stmt = $con->prepare("SELECT 	*	FROM 	users	WHERE 	Username = ? 	AND 	Password = ? LIMIT 1");

		$stmt->execute(array($username, $password));
		$row = $stmt->fetch();
		$count = $stmt->rowCount();

		

		if ($count > 0) {
			
			$_SESSION['admin'] = $row['is_admin'];
			$delete =$row['deletetion'];
			$state= $row['is_active'];
			if($_SESSION['admin']==1)
			{	$_SESSION['Username'] = $username; 
				$_SESSION['ID'] = $row['user_id']; 
				header('Location: dachpord.php'); 
				exit();
			}
			else{
				if($delete==1){
					$del=true;
				}
				else{
						if($state==1)
						{
						$s=true;
						}
					else{$_SESSION['Username'] = $username; 
						$_SESSION['ID'] = $row['user_id']; 
						header('Location: index.php'); 
						exit();
					}
				}
			}
		}else {
			$err = true;
		}
	}

?>
<div class="row d-flex justify-content-center" style=" width: 100%; ">

<div class="col-md-3">
<form  style=" margin-top: 20vh; " method="POST">
<?php
		
		if(isset($err)){
      ?>
<div class="alert alert-dismissible fade show alert-warning" role="alert" data-mdb-color="warning">
          <strong>sory!</strong>       username or oassword in not corecct
          <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
        </div>

      <?php
		}
		?>

<?php
		
		if(isset($del)){
      ?>
<div class="alert alert-dismissible fade show alert-warning" role="alert" data-mdb-color="warning">
          <strong>sory!</strong> this accunt was deleted     
          <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
        </div>

      <?php
		}
		?>


<?php
		
		if(isset($s)){
      ?>
<div class="alert alert-dismissible fade show alert-warning" role="alert" data-mdb-color="warning">
          <strong>sory!</strong>  this accunt was stoped because ....  
          <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
        </div>

      <?php
		}
		?>
  <!-- Name input -->
  <div class="form-outline mb-4 in" >
    <input type="text" id="form5Example1" class="form-control" name="user" placeholder=" user name " autocomplete="off" style="background-color: #fff;" />
    <label class="form-label" for="form5Example1"> username</label>
  </div>

  <!-- Email input -->
  <div class="form-outline mb-4 " style="background-color: #fff;">
  <input class="form-control" type="password" name="pass" placeholder=" password" autocomplete="new-password" />
    <label class="form-label" for="form5Example2"> password </label>
  </div>

  <!-- Submit button -->
  <button type="submit"  name="submit"class="btn btn-primary btn-block mb-4">login</button>
  <a href="createAccount.php"  class="create btn btn-success" style="    margin-bottom: 200px;    margin-left: 90px;"> Create acucnte</a>
</form>
</div>
</div>


<?php include $tpl . 'footer.php'; ?>	