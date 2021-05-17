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

function tambahAnggota($data) {
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

function tambahIuran($data) {
	global $db;

	$No_Iuran = htmlspecialchars($data["No_Iuran"]);
	$No_Anggota = htmlspecialchars($data["No_Anggota"]);
	$Iuran_Wajib = htmlspecialchars($data["Iuran_Wajib"]);
	$Iuran_Pokok = htmlspecialchars($data["Iuran_Pokok"]);
	$Iuran_Sukarela = htmlspecialchars($data["Iuran_Sukarela"]);
	$Tanggal_Bayar = htmlspecialchars($data["Tanggal_Bayar"]);

	$query = "INSERT INTO iuran
				VALUES
			  ('$No_Iuran', '$No_Anggota', '$Iuran_Wajib', '$Iuran_Pokok', '$Iuran_Sukarela', '$Tanggal_Bayar')
			";
	mysqli_query($db, $query);

	return mysqli_affected_rows($db);
}

function tambahPinjaman($data) {
	global $db;

	$No_Pinjaman = htmlspecialchars($data["No_Pinjaman"]);
	$No_Anggota = htmlspecialchars($data["No_Anggota"]);
	$Besar_Pinjaman = htmlspecialchars($data["Besar_Pinjaman"]);
	$Lama_Pinjaman = htmlspecialchars($data["Lama_Pinjaman"]);
	$Cicilan_Pokok = htmlspecialchars($data["Cicilan_Pokok"]);
	$Cicilan_Margin= htmlspecialchars($data["Cicilan_Margin"]);
	$Tanggal_Pencairan = htmlspecialchars($data["Tanggal_Pencairan"]);
	$Status_Pinjaman = htmlspecialchars($data["Status_Pinjaman"]);

	$query = "INSERT INTO pinjaman
				VALUES
			  ('$No_Pinjaman', '$No_Anggota', '$Besar_Pinjaman', '$Lama_Pinjaman', '$Cicilan_Pokok', 
			  '$Cicilan_Margin', '$Tanggal_Pencairan', '$Status_Pinjaman')
			";
	mysqli_query($db, $query);

	return mysqli_affected_rows($db);
}

function tambahAngsuran($data) {
	global $db;
	$No_Angsuran = htmlspecialchars($data["No_Angsuran"]);
	$No_Pinjaman = htmlspecialchars($data["No_Pinjaman"]);
	$Tanggal_Bayar = htmlspecialchars($data["Tanggal_Bayar"]);
	$Cicilan_Pokok = htmlspecialchars($data["Cicilan_Pokok"]);
	$Cicilan_Margin= htmlspecialchars($data["Cicilan_Margin"]);
	$Angsuran_Ke = htmlspecialchars($data["Angsuran_Ke"]);

	$query = "INSERT INTO angsuran
				VALUES
			  ('$No_Angsuran', '$No_Pinjaman', '$Tanggal_Bayar', '$Cicilan_Pokok', 
			   '$Cicilan_Margin', '$Angsuran_Ke')
			";
	mysqli_query($db, $query);

	return mysqli_affected_rows($db);
}

function hapusAnggota($No_Anggota) {
	global $db;
	mysqli_query($db, "DELETE FROM anggota WHERE No_Anggota = $No_Anggota");
	return mysqli_affected_rows($db);
}

function ubahAnggota($data) {
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

function cariAnggota($keyword) {
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

function cariIuran($keyword) {
	$query = "SELECT * FROM iuran
				WHERE
			  No_Iuran LIKE '%$keyword%' OR
			  No_Anggota LIKE '%$keyword%' OR
			  Iuran_Wajib LIKE '%$keyword%' OR
			  Iuran_Pokok LIKE '%$keyword%' OR
			  Iuran_Sukarela LIKE '%$keyword%' OR
			  Tanggal_Bayar LIKE '%$keyword%'
			";
	return query($query);
}

function cariPinjaman($keyword) {
	$query = "SELECT * FROM pinjaman
				WHERE
			  No_Pinjaman LIKE '%$keyword%' OR
			  No_Anggota LIKE '%$keyword%' OR
			  Besar_Pinjaman LIKE '%$keyword%' OR
			  Lama_Pinjaman LIKE '%$keyword%' OR
			  Cicilan_Pokok LIKE '%$keyword%' OR
			  Cicilan_Margin LIKE '%$keyword%' OR
			  Tanggal_Pencairan LIKE '%$keyword%' OR
			  Status_Pinjaman LIKE '%$keyword%'
			";
	return query($query);
}

function cariAngsuran($keyword) {
	$query = "SELECT * FROM angsuran
				WHERE
			  No_Pinjaman LIKE '%$keyword%' OR
			  No_Angsuran LIKE '%$keyword%' OR
			  Cicilan_Pokok LIKE '%$keyword%' OR
			  Cicilan_Margin LIKE '%$keyword%' OR
			  Tanggal_Bayar LIKE '%$keyword%' OR
			  Angsuran_Ke LIKE '%$keyword%'
			";
	return query($query);
}

function registrasi($data) {
	global $db;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($db, $data["password"]);
	$password2 = mysqli_real_escape_string($db, $data["password2"]);

	$result = mysqli_query($db, "SELECT username FROM user WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
		return false;
	}

	if( $password !== $password2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
		return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);

	mysqli_query($db, "INSERT INTO user VALUES('', '$username', '$password')");

	return mysqli_affected_rows($db);

}
?>