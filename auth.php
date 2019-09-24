<?php 

session_start();


if ($_SESSION["user"] !== "admin") {
  header("Location: index.php");
  exit;
}

require 'assets/php/functions.php';

	if ( isset($_POST["ok"]) ) {	

		$pin = $_POST["pin"];

		$result = mysqli_query($conn, "SELECT * FROM user WHERE pin = '$pin'");
 	
		if (mysqli_num_rows($result) === 1) {

			$row = mysqli_fetch_assoc($result);

		if ($pin === $row["pin"]){

				header("Location: register.php");
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
 			<div class="row" >

    		<div class="card" style="width: 18rem;
    		-webkit-box-shadow: 11px 6px 10px 6px rgba(0,0,0,0.19);
    		-moz-box-shadow: 11px 6px 10px 6px rgba(0,0,0,0.19);
    		box-shadow: 11px 6px 10px 6px rgba(0,0,0,0.19);margin: auto;">

    			<img class="card-img-top" src="assets/img/mo_logo.png" style="width: 250px;padding-left: 20px;">

    		<div class="card-body">
     		 <form action="" method="post">
  				<div class="form-group">

            <input type="password" class="form-control" id="pin" name="pin" placeholder="Admin PIN" maxlength="6">
          </div>

  				<div style="margin-left: 180px;">
  					<button type="submit" class="btn btn-primary" name="ok">Submit</button>
  				</div>
  					<br>
  					<?php if(isset($error)): ?>
					<p style="color: red;font-style: italic; text-align: center;">PIN SALAH</p>
					<?php endif; ?>

			</form>
			</div>
    		</div>
   		</div>

    		</div>
    </div>
  </body>
</html>