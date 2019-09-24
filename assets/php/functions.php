<?php 


$conn = mysqli_connect("localhost","root","","mo");


function query($query){
		global $conn;
		$result = mysqli_query($conn, $query);
		$rows = [];
		while ($row = mysqli_fetch_assoc($result)) {
		    $rows[] = $row;
		}
		return $rows;
	}


function register($data){
		global $conn;

		$username = strtolower(stripslashes(htmlspecialchars(($data["username"]))));
		$password = mysqli_real_escape_string($conn, $data["password"]);
		$password2 = mysqli_real_escape_string($conn, $data["password2"]);


		$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

		if (mysqli_fetch_assoc($result)) {
			echo "<script>
          alert('User sudah terdaftar')
          </script>";
			return false;
		}


		if ($password !== $password2) {
			echo "<script>
          alert('Konfirmasi password tidak Sesuai!')
          </script>";	
			return false;
		}

		$password = password_hash($password, PASSWORD_DEFAULT);

		mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password','')");
	
		return mysqli_affected_rows($conn);
	}


	function cpin($data){
		global $conn;
		
		$id = 1;
		$pin = (int)$data["pin"];

		mysqli_query($conn, "UPDATE user SET pin ='$pin'");

		return mysqli_affected_rows($conn);
	}

	function tambah($data){
		global $conn;

		$nama_pasien = htmlspecialchars($data['nama_pasien']);
		$jenis_lensa = htmlspecialchars($data['jenis_lensa']);
		$tgl_pembelian = date('Y-m-d', strtotime($data['tgl_pembelian']));
		$total_pembelian = htmlspecialchars($data['total_pembelian']);
		$no_hp = htmlspecialchars($data['no_hp']);
		$keterangan = htmlspecialchars($data['keterangan']);


		$result = mysqli_query($conn, "SELECT nama_pasien FROM pasien WHERE nama_pasien = '$nama_pasien'");

		if (mysqli_fetch_assoc($result)) {
			echo "<script>
          alert('Pasien sudah terdaftar')
          </script>";
			return false;
		}


		$queryadd = "INSERT INTO pasien
		 VALUES('','$nama_pasien','$jenis_lensa','$tgl_pembelian','$total_pembelian','$no_hp', '$keterangan')";

		 mysqli_query($conn, $queryadd);

		 return mysqli_affected_rows($conn);
	}


	function hapus($id){
		global $conn;

		mysqli_query($conn, "DELETE FROM pasien WHERE id =$id");

		return mysqli_affected_rows($conn);
	}

	function ubah($data){
		global $conn;

		$id = $data['id'];
		$nama_pasien = htmlspecialchars($data['nama_pasien']);
		$jenis_lensa = htmlspecialchars($data['jenis_lensa']);
		$tgl_pembelian = date('Y-m-d', strtotime($data['tgl_pembelian']));
		$total_pembelian = htmlspecialchars($data['total_pembelian']);
		$no_hp = htmlspecialchars($data['no_hp']);
		$keterangan = htmlspecialchars($data['keterangan']);

		$queryedit = "UPDATE Pasien
						SET
						nama_pasien = '$nama_pasien',
						jenis_lensa = '$jenis_lensa',
						tgl_pembelian = '$tgl_pembelian',
						total_pembelian = '$total_pembelian',
						no_hp = '$no_hp',
						keterangan = '$keterangan'
					WHERE id = '$id'";

		mysqli_query($conn, $queryedit);
		return mysqli_affected_rows($conn);

	}

	function cari($keyword){
		global $conn;

		$query = "SELECT * FROM pasien WHERE
			nama_pasien LIKE '%$keyword' OR
			no_hp LIKE '%$keyword' OR
			keterangan LIKE '%$keyword'";

		return query($query);
	}

 ?>

