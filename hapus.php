<?php 
session_start();

require 'assets/php/functions.php';
$id = $_GET['id'];


if (!isset($_SESSION["user"])) {
	header("Location: index.php");
	exit;
}

if (hapus($id)>0) {
	echo "<script>
		alert('Pasien berhasil dihapus !');
		document.location.href ='pasien.php'
		</script>";		
	}else {
		echo "<script>
		alert('Pasien gagal dihapus !');
		document.location.href ='pasien.php'
		</script>";
	}



 ?>