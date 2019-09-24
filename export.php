<?php 
session_start();

require 'assets/php/functions.php';

	if (!isset($_SESSION["user"])) {
	header("Location: index.php");
	exit;
	}

	$pasien = query("SELECT * FROM pasien");


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Export Excel</title>
 	    <style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
 </head>
 <body>
 	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data-Pasien_Mutiara-Optik.xls");
	?>
 	<br>
 	<center><h3>DATA PASIEN MUTIARA OPTIK</h3></center>
 	<br>
 	<table border="1">
    		<thead>
 			<tr>
 				<th>No</th>
 				<th>Nama Pasien</th>
 				<th>Jenis Lensa</th>
 				<th>Tanggal Pembelian</th>
 				<th>Total Pembelian</th>
 				<th>No HP</th>
 				<th>Keterangan</th>
 			</tr>
 			</thead>
 			<tbody>
 			<?php $i=1; ?>
 			<?php foreach ($pasien as $psn) :?>
 				<tr>
 					<th style="text-align: center;"><?= $i;?>.</th >
 					<td><?= $psn['nama_pasien']?></td>
 					<td><?= $psn['jenis_lensa']?></td>
 					<td><?= $tgl = date("d-m-Y", strtotime($psn["tgl_pembelian"]));?></td>
 					<td>Rp. <?=$psn['total_pembelian']?></td>
 					<td><?= $psn['no_hp']?></td>
 					<td><?= $psn['keterangan']?></td>
	 			</tr>
	 			<?php $i++; ?>
	 		<?php endforeach ?>
	 			</tbody>
	 	</table>
 
 </body>
 </html>