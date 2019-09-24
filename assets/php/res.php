<?php 
require "functions.php";

$keyword = $_GET["keyword"];
$query = "SELECT * FROM pasien WHERE
			nama_pasien LIKE '%$keyword' OR
			no_hp LIKE '%$keyword' OR
			keterangan LIKE '%$keyword'";
$pasien = query($query);

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">  
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</head>
<body>
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
</body>
</html>
   	
