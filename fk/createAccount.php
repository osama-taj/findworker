<?php
include 'init.php';
?>
<?php
	

	if(isset($_POST['ok'])){

		$name =$_POST['name'];
		$email=$_POST['email'];
		$phone =$_POST['phone'];
		$address =$_POST['address'];
		$describe =$_POST['describe'];
		$username =$_POST['username'];
		$pasword=$_POST['password'];
		$Knowledge=$_POST['Knowledge'];
		
		$sql="INSERT INTO users (	user_name, Email,describetion, addresstion, phone , Knowledge,username, password) 
		VALUES('$name','$email','$describe','$address',$phone,'$Knowledge','$username','$pasword')";
		try{
		$con->exec($sql);
		}
		catch(Exception $e ){
			 echo " try to avoid using char in phone number and  ' or \"  in anther filed";
		}
				
			header('Location: login.php'); 
			exit();


		/*$update = $con->prepare("INSERT INTO users (	user_name, Email,describetion, addresstion, phone , username, password) 
            VALUES('$name','$email','$describe','$address',$phone,'$username','$pasword')");
			 $update->execute();*/

	 	
	}
	
	
	
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>profile edit data and skills - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="" rel="stylesheet">
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


<div class="container">
		<div class="main-body">
			<div class="row">
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
								<img src="assets/imges/def.png"  class="rounded-circle p-1 bg-primary" width="110">
								<div class="mt-3">
									<h4>name</h4>
									<p class="text-secondary mb-1"></p>
									
									
								</div>
							</div>
							<hr class="my-4">
							<label class="">you can put pic for  profile after you make the accont:
							</label>
							
							
						</div>
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
									<input type="text" class="form-control" 
                                    name="name" value="" placeholder="ali ali" required="required">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input  type="email"class="form-control"
                                    name="email" value="" placeholder="ali@gamil.com" required="required">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Phone</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="number" class="form-control"
                                    name="phone" value="" placeholder="777777777">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Address</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control"
                                    name="address" value="" placeholder="YEMENE /sana'a">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Knowledge</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control"
                                    name="Knowledge" value="" placeholder="java / c++">
								</div>
							</div>

							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Describe</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" 
                                    name="describe" value="" placeholder="deckTOp devloper" required="required">
								</div>
							</div>

                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">username</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control"
                                    name="username" value="" placeholder="ali1234" required="required">
								</div>
							</div>

                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">password</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control"
                                    name="password" value="" placeholder="******" required="required">
								</div>
							</div>

							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="submit" class="btn btn-primary px-4" 
									name="ok" id="edit" value="OK">
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