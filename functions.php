<?php

$db = mysqli_connect("localhost", "root", "", "koperasisp");


function query($query) {
	global $db;
	$result = mysqli_query($db, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}


function tambah($data) {
	global $db;

	$No_Anggota = htmlspecialchars($data["No_Anggota"]);
	$Nama = htmlspecialchars($data["Nama"]);
	$No_KTP = htmlspecialchars($data["No_KTP"]);
	$Tanggal_Lahir = htmlspecialchars($data["Tanggal_Lahir"]);
	$Jenis_Kelamin = htmlspecialchars($data["Jenis_Kelamin"]);
	$No_HP = htmlspecialchars($data["No_HP"]);
	$Alamat = htmlspecialchars($data["Alamat"]);
	$Email = htmlspecialchars($data["Email"]);

	$query = "INSERT INTO anggota
				VALUES
			  ('$No_Anggota', '$Nama', '$No_KTP', '$Tanggal_Lahir', '$Jenis_Kelamin', '$No_HP', '$Alamat', '$Email')
			";
	mysqli_query($db, $query);

	return mysqli_affected_rows($db);
}


function hapus($No_Anggota) {
	global $db;
	mysqli_query($db, "DELETE FROM anggota WHERE No_Anggota = $No_Anggota");
	return mysqli_affected_rows($db);
}


function ubah($data) {
	global $db;

	$No_Anggota = htmlspecialchars($data["No_Anggota"]);
	$Nama = htmlspecialchars($data["Nama"]);
	$No_KTP = htmlspecialchars($data["No_KTP"]);
	$Tanggal_Lahir = htmlspecialchars($data["Tanggal_Lahir"]);
    $Jenis_Kelamin = htmlspecialchars($data["Jenis_Kelamin"]);
	$No_HP = htmlspecialchars($data["No_HP"]);
	$Alamat = htmlspecialchars($data["Alamat"]);
	$Email = htmlspecialchars($data["Email"]);


	$query = "UPDATE anggota SET
				No_Anggota = '$No_Anggota',
				Nama = '$Nama',
				No_KTP = '$No_KTP',
				Tanggal_Lahir = '$Tanggal_Lahir',
				Jenis_Kelamin = '$Jenis_Kelamin',
				No_HP = '$No_HP',
				Alamat = '$Alamat',
				Email = '$Email' 

			  WHERE No_Anggota = $No_Anggota
			";

	mysqli_query($db, $query);

	return mysqli_affected_rows($db);	
}


function cari($keyword) {
	$query = "SELECT * FROM anggota
				WHERE
			  Nama LIKE '%$keyword%' OR
			  No_Anggota LIKE '%$keyword%' OR
			  No_KTP LIKE '%$keyword%' OR
			  Tanggal_Lahir LIKE '%$keyword%' OR
			  Jenis_Kelamin LIKE '%$keyword%' OR
			  No_HP LIKE '%$keyword%' OR
			  Alamat LIKE '%$keyword%' OR
			  Email LIKE '%$keyword%'
			";
	return query($query);
}


function registrasi($data) {
	global $db;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($db, $data["password"]);
	$password2 = mysqli_real_escape_string($db, $data["password2"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($db, "SELECT username FROM user WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
		return false;
	}


	// cek konfirmasi password
	if( $password !== $password2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($db, "INSERT INTO user VALUES('', '$username', '$password')");

	return mysqli_affected_rows($db);

}
?>