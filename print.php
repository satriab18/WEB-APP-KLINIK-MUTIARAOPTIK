<?php 
	session_start();
	if (!isset($_SESSION["user"])) {
  		header("Location: index.php");
  		exit;
	}
	require 'assets/php/functions.php';

	$id = $_GET["id"];
	$sales = $_SESSION["user"];


	$pasien = mysqli_query($conn, "SELECT * FROM pasien WHERE id ='$id'");

	$psn= mysqli_fetch_array($pasien);



	$hari = date("l", strtotime($psn["tgl_pembelian"]));
	
	if($hari == "Monday"){
		$hari = "Senin";
	}elseif($hari == "Tuesday"){
		$hari = "Selasa";
	}elseif($hari == "Wednesday"){
		$hari = "Rabu";
	}elseif($hari == "Thursday"){
		$hari = "Kamis";
	}elseif($hari == "Friday"){
		$hari = "Jum'at";
	}elseif($hari == "Saturday"){
		$hari = "Sabtu";
	}elseif($hari == "Sunday"){
		$hari = "Minggu";  
	}

	date_default_timezone_set("Asia/Jakarta");
 ?>


<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
	<title>INVOICE PASIEN - <?=$psn['nama_pasien']; ?></title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">  
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
		<style type="text/css" media="print">
		.print {
			display:none;

		}
 		@media print {
			.print {display:block;}
			.btn-print {display:none;}
		}
		@page { 
        	size: landscape;
    	}
    	.body { 
        writing-mode: tb-rl;
        width: 14.8cm;
        height: 21cm;
        margin: 30mm 45mm 30mm 45mm;
    	}

		</style>
</head>
<body>

	<h1 class="display-1" 
			 style="position:fixed;
 					bottom:300px;
					left:180px;
 					opacity:0.1;
 					z-index:99;
 					color:black;">
					MUTIARA OPTIK</h1>

	<div class="content-fluid">
		<div class="row">
		<div class="col-4">
			<br>
			<h3 class=""><strong>MUTIARA OPTIK</strong></h3 >
	<p>Indramayu, Jawa Barat
		<br>Jl. Lemah Abang Jl. Jenderal A Yani No.1, Lemahmekar, Kec. Indramayu</p>
	<h6>Telp. <br>
	 	FAX.</h6>
		</div>
		<div class="col-5">
		</div>
		<div class="col-3">
				
	
	<img src="assets/img/mo_logo.png" alt="" width="250px" style="margin-bottom: -100px;">
		</div>
	</div>
	<hr>

		<h2 class="text-center">DETAIL INVOICE</h5>
			<br>
	<div class="row">
		<div class="col-1">
			
		</div>

		<div class="col-3">
			<p>Nama Customer : <?= strtoupper($psn['nama_pasien']); ?></p>
			<p>No HP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= strtoupper($psn['no_hp']); ?></p>
		</div>

		<div class="col-3">
			
		</div>

		<div class="col-4">
			<p>Tanggal Dicetak : <?= date("d-m-Y");?>, Jam : <?= date("H:i:s");?></p>
			<p>Tanggal Pembelian : <?= $hari ?>, <?= $tgl = date("d-m-Y", strtotime($psn["tgl_pembelian"]));?></p>
			<p>Nama Sales :  <?= strtoupper($sales); ?></p>
		</div>
	</div>
	<hr>
		<div class="row" style="padding: 0 25px;">

			<table class="table table-bordered table-stripped">
				<thead class="thead-light">
					<tr>
						<th width="5%">NO</th>
						<th width="45%">Jenis Lensa</th>
						<th width="30%">Keterangan</th>
						<th width="10%">Total Pembelian</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; ?>
					<tr>
						<th scope="row" style="text-align: center;"> <?=$i; ?></th>
						<td><?= $psn['jenis_lensa']?></td>
 						<td><?= $psn['keterangan']?></td>
 						<td><b>Rp.</b> <?= $psn['total_pembelian']?></td>
					</tr>
				</tbody>
			</table>
	</div>
	<hr>
<button type="submit" class="btn btn-success btn-print"  onclick="javascript:window.print()">Print</button>
	</div>
</body>
</html>