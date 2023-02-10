<?php
include 'init.php';
?>
<?php
if(isset($_POST['delete']))
{
	$update = $con->prepare("update users set deletetion =1 where user_id=".$_SESSION['ID']."");
			$update->execute();
			include 'logout.php';
}

?>
<?php
	

	if(isset($_POST['edit'])){

		$name =$_POST['name'];
		$email=$_POST['email'];
		$phone =$_POST['phone'];
		$address =$_POST['address'];
		$describe =$_POST['describe'];
		$username =$_POST['username'];
		$pasword=$_POST['password'];

		//$sql ="update users set 	user_name ='".$name."', 	Email='".$email."',	phone=".$phone.",address='".$address."'
		//describetion='".$describe."',username='".$username."', 	password='".$pasword."' where user_id=".$_SESSION['ID']."";
		
	
		$update = $con->prepare("update users set 
		 user_name ='".$name."',
		 Email='".$email."',
		 phone=".$phone.",
		 describetion='".$describe."',
		 addresstion='".$address."',
		 username='".$username."',
		 password='".$pasword."'
		 where user_id=".$_SESSION['ID']."");
			$update->execute();
	
 	//	if (mysqli_query($con, $sql))
 	//	{
 	//	  echo "Record updated successfully";
 	//	}
 	//	else
 	//		{
   	//		echo "Error updating record: " . mysqli_error($con);
	//		 }
		}
	
	
	
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>profile edit data and skills </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    	body{
   			 background: #f7f7ff;
    		margin-top:20px;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: .25rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
}


.container {
    margin-top: 20px;
}
input.pu {
    margin-bottom: 10px;
}
    </style>
</head>
<body>

<?php
         $all_works = getAllFrom("*", 'users', ' where user_id='.$_SESSION['ID'].'',  NULL, 'user_id');
           foreach( $all_works as $info){}
        ?>

<div class="container">
		<div class="main-body">
			<div class="row">
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
								<img src="<?=$profile_dir. $info['pic']  ?>"  class="rounded-circle p-1 bg-primary" width="110">
								<div class="mt-3">
									<h4><?=$info['user_name']?></h4>
									<p class="text-secondary mb-1"><?=$info['describetion']?></p>
									
									
								</div>
							</div>
							<hr class="my-4">
							<label class="">To change the profile:</label>
							<form method="POST" action="editimg.php"  enctype="multipart/form-data" >
            				<input class="pu" type="file" name="fileToUpload"   required="required">
							<button type="submit" name="submit" class="btn btn-info "  >change</button>
							</form>
							
						</div>
						<form method="post" action="">
					<button type="submit" name="delete" class="btn btn-danger" style="width:100%; margin-top: 16px;">delete accunt </button></form>
					</div>
				</div>

				
				 
				<div class="col-lg-8">
					<div class="card">
					<form method="POST" action="">
						<div class="card-body">
                            
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Full Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" required="required"
                                    name="name" value="<?=$info['user_name']?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="email" class="form-control" required="required"
                                    name="email" value="<?=$info['Email']?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Phone</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="" class="form-control"
                                    name="phone" value=" <?=$info['phone']?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Address</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control"
                                    name="address" value=" <?=$info['addresstion']?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Knowledge</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" required="required"
                                    name="Knowledge" value="<?=$info['Knowledge']?>">
								</div>
							</div>

							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Describe</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" 
                                    name="describe" value="<?=$info['describetion']?>">
								</div>
							</div>

                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">username</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" required="required"
                                    name="username" value="<?=$info['username']?>">
								</div>
							</div>

                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">password</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" required="required"
                                    name="password" value="<?=$info['password']?>">
								</div>
							</div>

							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="submit" class="btn btn-primary px-4" 
									name="edit" id="edit" value="Save Changes">
								</div>
							</div>

                            
						</div>
					</form>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	
	

<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>