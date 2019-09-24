<?php 

session_start();

require 'assets/php/functions.php';

	if ( isset($_POST["login"]) ) {	

		$username = $_POST["username"];
		$password = $_POST["password"];

		$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
 	
		if (mysqli_num_rows($result) === 1) {

			$row = mysqli_fetch_assoc($result);

		if (password_verify($password, $row["password"])){

				$_SESSION["user"] = $username;

				header("Location: pasien.php");
				exit;
			}
		}
		$error = true;
	}
	
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> - Login</title>

    
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/css/bootstrap.min.css"></script>
  </head> 
  <body style="background: rgb(18,38,169);
background: linear-gradient(90deg, rgba(18,38,169,1) 0%, rgba(33,197,190,1) 100%);">
  

  	<div class="container-fluid">
 		<br>
 		<br>
 		<br>
 			<div class="row ">
 				<div class="col-1">
 				</div>

 				 <div class="col-7">
 				 	<br>
 				 	<br>
 				 	
 				 	<h1 class="display-2" style="color: white;">Sistem Pasien Mutiara Optikal
 				 	</h1>
 				 </div>


  		<div class="col-2">
    		<div class="card" style="width: 18rem;
    		-webkit-box-shadow: 11px 6px 10px 6px rgba(0,0,0,0.19);
    		-moz-box-shadow: 11px 6px 10px 6px rgba(0,0,0,0.19);
    		box-shadow: 11px 6px 10px 6px rgba(0,0,0,0.19);">

    			<img class="card-img-top" src="assets/img/mo_logo.png" style="width: 250px;padding-left: 20px;">

    		<div class="card-body">
     		 <form action="" method="post">
  				<div class="form-group">

    				<input type="Username" class="form-control" id="username" name="username" aria-describedby="usernameHelp" placeholder="Username">
    			<br>

    				<input type="password" class="form-control" id="password" name ="password" placeholder="Password">
  				</div>
  				<div style="margin-left: 180px;">
  					<button type="submit" class="btn btn-primary" name="login">Login</button>
  				</div>
  					<br>
  					<?php if(isset($error)): ?>
					<p style="color: red;font-style: italic; text-align: center;">username / password salah</p>
					<?php endif; ?>

			</form>
			</div>
    		</div>
   		</div>

    		</div>
    </div>
  </body>
</html>