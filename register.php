<?php 

session_start();

if ($_SESSION["user"] !== "admin") {
  header("Location: index.php");
  exit;
}

require 'assets/php/functions.php';

  if (isset($_POST["register"])) {

      if (register($_POST) > 0) {
        echo "<script>
          alert('User berhasil ditambahkan!')
          </script>";
      }
      else{
        echo mysqli_error($conn);
      }
  }

  if (isset($_POST["ok"])) {

    $pin = $_POST["pin"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE pin = '$pin'");

    if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
    }
  }
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>User Control</title>

    
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">  
    <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  </head> 
  <body style="background: rgb(18,38,169);
background: linear-gradient(90deg, rgba(18,38,169,1) 0%, rgba(33,197,190,1) 100%);">
  

  	<div class="container-fluid">
      <br>
      <br>
    		<div class="card" style="width: 60rem;
    		-webkit-box-shadow: 11px 6px 10px 6px rgba(0,0,0,0.19);
    		-moz-box-shadow: 11px 6px 10px 6px rgba(0,0,0,0.19);
    		box-shadow: 11px 6px 10px 6px rgba(0,0,0,0.19); margin: auto;">


        <h1 class="display-4" style="margin: 15px;text-align: center;"> User Control</h1>

    		<div class="card-body">

          <div class="row" style="margin-left: 200px;">
     		 <form action="" method="post" >
          <h5 style="margin-left: 180px;">Tambah User</h5>
          <br>
  				<div class="form-group" style="margin-left: 80px;">

    				<input type="Username" class="form-control" id="username" name="username" placeholder="Username" style="width: 300px;">
            <p style="color: #9E9E9E"><small>*maksimal user 13 huruf*</small></p>

    				<input type="password" class="form-control" id="password" name="password" placeholder="Password" style="width: 300px;">
          <br>
            <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password" style="width: 300px;">
  				</div>
  				<div style="margin-left: 180px;">
  					<button type="submit" class="btn btn-primary" name="register" >Tambah User</button>
             <a class="btn btn-danger" href="pasien.php" role="button">Kembali</a>
  				</div>
        </form>

        </div>
    </div>
  </div>
  </div>  
  </body>
</html>