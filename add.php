<?php 

session_start();

if (!isset($_SESSION["user"])) {
  header("Location: index.php");
  exit;
}

require 'assets/php/functions.php';

  if (isset($_POST['tambah'])) {
    if (tambah($_POST) > 0) {
      $info = true;
    }else {
      $info2 = true;
    } 
  }

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tambah Pasien</title>

    
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">  
    <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="assets/css/bootstrap-datepicker.min.css" />
<script src="assets/js/bootstrap-datepicker.min.js"></script>

  <script>
    $(function() {
      $("#tgl_pembelian").datepicker();
    });
  </script>

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


        <h1 class="display-4" style="margin: 15px;text-align: center;"> Tambah Pasien</h1>

    		<div class="card-body">

          <div class="row" style="margin-left: 200px;">
     		 <form action="" method="post" >
          <br>
  				<div class="form-group" style="margin-left: 80px;">

    				<input type="text" class="form-control" id="nama_pasien" name="nama_pasien" placeholder="Nama Pasien" style="width: 300px;" required>
            <br>
    				<input type="text" class="form-control" id="jenis_lensa" name="jenis_lensa" placeholder="Jenis Lensa" style="width: 300px;" required>
          <br>
           <input type="text" id="tgl_pembelian" name="tgl_pembelian" class="form-control" placeholder="Tanggal Pembelian" required>
           <br>
          <div class="input-group">
            <div class="input-group-prepend">
             <div class="input-group-text"><b>Rp.</b></div>
            </div>
               <input type="text" class="form-control" id="total_pembelian" name="total_pembelian" placeholder="Total Pembelian" required>
          </div>
          <br>
            <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No HP" required>
            <br>
            <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder="Keterangan"></textarea>
  				</div>
  				<div style="margin-left: 180px;">

  					<button type="submit" class="btn btn-primary" name="tambah" >Tambah User</button>
             <a class="btn btn-danger" href="pasien.php" role="button">Kembali</a>
  				</div>
          <br>
          <?php if(isset($info)): ?>
          <p style="color: red;font-style: italic; text-align: center;">Pasien Berhasil ditambahkan!</p>
          <?php endif; ?>
          <?php if(isset($info2)): ?>
          <p style="color: red;font-style: italic; text-align: center;">Pasien Gagal diubah!</p>
          <?php endif; ?>
        </form>

        </div>
    </div>
  </div>
  </div>  
  </body>
</html>