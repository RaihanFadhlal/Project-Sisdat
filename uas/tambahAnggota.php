<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

if( isset($_POST["submit"]) ) {
	
	if( tambahAnggota($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'anggota.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'anggota.php';
			</script>
		";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah data Anggota</title>
</head>
<body>
	<h1>Tambah data Anggota</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="No_Anggota">No_Anggota : </label>
				<input type="text" name="No_Anggota" No_Anggota="No_Anggota" required>
			</li>
			<li>
				<label for="Nama">Nama : </label>
				<input type="text" name="Nama" No_Anggota="Nama">
			</li>
            <li>
				<label for="No_KTP">No_KTP : </label>
				<input type="text" name="No_KTP" No_Anggota="No_KTP">
			</li>
			<li>
				<label for="Tanggal_Lahir">Tanggal_Lahir :</label>
				<input type="date" name="Tanggal_Lahir" No_Anggota="Tanggal_Lahir">
			</li>
            <li>
				<label for="Jenis_Kelamin">Jenis_Kelamin : </label>
				<input type="text" name="Jenis_Kelamin" No_Anggota="Jenis_Kelamin">
			</li>
            <li>
				<label for="No_HP">No_HP : </label>
				<input type="text" name="No_HP" No_Anggota="No_HP">
			</li>
            <li>
				<label for="Alamat">Alamat : </label>
				<input type="text" name="Alamat" No_Anggota="Alamat">
			</li>
            <li>
				<label for="Email">Email :</label>
				<input type="text" name="Email" No_Anggota="Email">
			</li>
            
			<li>
				<button type="submit" name="submit">Tambah Data!</button>
			</li>
		</ul>

	</form>

</body>

</html>