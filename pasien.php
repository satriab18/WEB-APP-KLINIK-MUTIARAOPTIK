<?php 
session_start();
require 'assets/php/functions.php';

if (!isset($_SESSION["user"])) {
	header("Location: index.php");
	exit;
}
	$jumlahDataPerHalaman = 5;
	$jumlahData = count(query( "SELECT * FROM pasien"));
	$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
	$halamanAktif = (isset($_GET['page']) )? $_GET['page'] : 1;
	$awaldata = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;



	$pasien = query("SELECT * FROM pasien LIMIT $awaldata,$jumlahDataPerHalaman");

	if (isset($_POST['cari'])) {
		$pasien = cari($_POST["keyword"]);
	}

 ?>

 <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> - Data Pasien</title>

    
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
 		<br>
    		<div class="card" style="width: 80rem;
    		-webkit-box-shadow: 11px 6px 10px 6px rgba(0,0,0,0.19);
    		-moz-box-shadow: 11px 6px 10px 6px rgba(0,0,0,0.19);
    		box-shadow: 11px 6px 10px 6px rgba(0,0,0,0.19);margin:auto;">
    	<br>
    	<div class="row">
    		<div class="col">
    	<h5 style="padding-left: 50px;">Selamat Datang, <b> <?= $_SESSION["user"]; ?></b> </h5>
    		</div>
    		<div class="col text-right" style="padding-right: 50px;">
    			   		<?php if($_SESSION["user"] == "admin"): ?>
    			<a class="btn btn-warning btn-sm" href="auth.php" role="button">User Control</a>
			<?php endif; ?>
    			 <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal">
   				 Logout
  				</button>
  					 	<br>	
	 		<div class="text-right" style="padding-top: 15px;">
	 			<a class="btn btn-success btn-sm" href="add.php" target="">Tambah Pasien</a>
	 			<a class="btn btn-info btn-sm" href="export.php" target="_blank">Export to Excel</a>
	 		</div> 
    		</div>
    	</div>
    	<br>

    	<div class="row">
    		<div class="col" style="padding-left: 55rem;">
    			<form action="" method="post" class="form-inline" >
    				<div class="form-group" style="padding-right: 6px;">
    					<div class="input-group">
    					<div class="input-group-prepend">
    					<div class="input-group-text"><img src="assets/glyph/search.svg" alt="">
    					</div>
    					</div>
    			<input type="text" name="keyword" id="keyword" class="form-control" autofocus autocomplete="off" placeholder="Cari Pasien..(Nama/No HP)"></input> 
    					</div>
    					</div>
    			<button class="btn btn-primary" type="submit" name="cari" id="tombol-cari">Cari</button>
    		</form>

    		</div>
    		<br>
    		<br>
    	</div>
    	<div class="row" id="content" style="margin: 5px 25px;">
    	<table class="table table-bordered">
    		<thead class="thead-dark">
 			<tr>
 				<th>No</th>
 				<th>Nama Pasien</th>
 				<th>Jenis Lensa</th>
 				<th>Tanggal Pembelian</th>
 				<th>Total Pembelian</th>
 				<th>No HP</th>
 				<th>Keterangan</th>
 				<th style="text-align: center;">Opsi</th>
 			</tr>
 			</thead>
 			<tbody>
 				<?php if (empty($pasien)):?>
 					<tr>
 						<td colspan="7">
 							<h1 align="center">Pasien tidak Ditemukan!</h1>
 						</td>
 					</tr>
 				<?php else: ?>
 			<?php $i=1; ?>
 			<?php foreach ($pasien as $psn) :?>
 				<tr>
 					<th scope="row" style="text-align: center;"><?= $i;?>.</th >
 					<td><?= $psn['nama_pasien']?></td>
 					<td><?= $psn['jenis_lensa']?></td>
 					<td><?= $tgl = date("d-m-Y", strtotime($psn["tgl_pembelian"]));?></td>
 					<td>Rp. <?=$psn['total_pembelian']?></td>
 					<td><?= $psn['no_hp']?></td>
 					<td><?= $psn['keterangan']?></td>
 					<td style="text-align: center;">
 						<a class="btn btn-info btn-sm" href="print.php?id=<?=$psn['id']?>" target="_blank">Invoice</a>
 						<a class="btn btn-success btn-sm" href="ubah.php?id=<?=$psn['id']?>">Ubah</a>
 						<a class="btn btn-danger btn-sm" href="hapus.php?id=<?=$psn['id']?>" onclick="return confirm('Ingin hapus pasien?'">Hapus</a>
 					</td>
	 			</tr>
	 			<?php $i++; ?>
	 		<?php endforeach ?>
	 	<?php endif ?>
	 			</tbody>
	 	</table>


	 <div class="mx-auto">
	 	<?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
	 	<?php if($i == $halamanAktif) : ?>
	 			<a href="?page=<?=$i?>" class="btn btn-group btn-primary disabled" tabindex="-1" role="button" aria-disabled="true"><?=$i?></a>
    	<?php else : ?>
    			<a href="?page=<?=$i?>" class="btn btn-group btn-outline-primary" tabindex="0" role="button"><?=$i?></a>
		<?php endif; ?>
	 	<?php endfor; ?>
	 	</div>
	 	<br>
		</div>





    			<!-- The Modal -->
 	 <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title">Logging Out</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <p>Yakin ingin Log Out?</p>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <a href="logout.php"><button type="button" class="btn btn-danger">Log Out</button></a>  
          <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
        </div>
        
      </div>
    </div>
  </div>

  <script src="script.js">
  </script>
  </body>


</html>