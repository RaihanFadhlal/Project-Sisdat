<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

// ambil data di URL
$No_Anggota = $_GET["No_Anggota"];

// query data Anggota berdasarkan No_Anggota
$a = query("SELECT * FROM Anggota WHERE No_Anggota = $No_Anggota")[0];


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'anggota.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'anggota.php';
			</script>
		";
	}


}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ubah data Anggota</title>
</head>
<body>
	<h1>Ubah data Anggota</h1>

	<form action="" method="post" enctype="multipart/form-data">

		<ul>
			<li>
				<label for="No_Anggota">No_Anggota : </label>
				<input type="text" name="No_Anggota" No_Anggota="No_Anggota" required value="<?= $a["No_Anggota"]; ?>">
			</li>
			<li>
				<label for="Nama">Nama : </label>
				<input type="text" name="Nama" No_Anggota="Nama" value="<?= $a["Nama"]; ?>">
			</li>
            <li>
                <label for="No_KTP">No_KTP : </label>
				<input type="text" name="No_KTP" No_Anggota="No_KTP" value="<?= $a["No_KTP"]; ?>">
            </li>
            <li>
				<label for="Tanggal_Lahir">Tanggal_Lahir :</label>
				<input type="date" name="Tanggal_Lahir" No_Anggota="Tanggal_Lahir" value="<?= $a["Tanggal_Lahir"]; ?>">
			</li>
            <li>
				<label for="Jenis_Kelamin">Jenis_Kelamin :</label>
				<input type="text" name="Jenis_Kelamin" No_Anggota="Jenis_Kelamin" value="<?= $a["Jenis_Kelamin"]; ?>">
			</li>
            <li>
                <label for="No_HP">No_HP : </label>
				<input type="text" name="No_HP" No_Anggota="No_HP" value="<?= $a["No_HP"]; ?>">
            </li>
            <li>
				<label for="Alamat">Alamat :</label>
				<input type="text" name="Alamat" No_Anggota="Alamat" value="<?= $a["Alamat"]; ?>">
			</li>
			<li>
				<label for="Email">Email :</label>
				<input type="text" name="Email" No_Anggota="Email" value="<?= $a["Email"]; ?>">
			</li>
			<li>
				<button type="submit" name="submit">Ubah Data!</button>
			</li>
		</ul>

	</form>


</body>
</html>