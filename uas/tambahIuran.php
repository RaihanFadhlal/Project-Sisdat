<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

if( isset($_POST["submit"]) ) {
	
	if( tambahIuran($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'iuran.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'iuran.php';
			</script>
		";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah data Iuran</title>
</head>
<body>
	<h1>Tambah data Iuran</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="No_Iuran">No_Iuran : </label>
				<input type="text" name="No_Iuran" No_Iuran="No_Iuran" required>
			</li>
			<li>
				<label for="No_Anggota">No_Anggota : </label>
				<input type="text" name="No_Anggota" No_Iuran="No_Anggota">
			</li>
            <li>
				<label for="Iuran_Wajib">Iuran_Wajib : </label>
				<input type="currency" name="Iuran_Wajib" No_Iuran="Iuran_Wajib">
			</li>
            <li>
				<label for="Iuran_Pokok">Iuran_Pokok : </label>
				<input type="currency" name="Iuran_Pokok" No_Iuran="Iuran_Pokok">
			</li>
            <li>
				<label for="Iuran_Sukarela">Iuran_Sukarela : </label>
				<input type="currency" name="Iuran_Sukarela" No_Iuran="Iuran_Sukarela">
			</li>
			<li>
				<label for="Tanggal_Bayar">Tanggal_Bayar :</label>
				<input type="date" name="Tanggal_Bayar" No_Iuran="Tanggal_Bayar">
			</li>
            
			<li>
				<button type="submit" name="submit">Tambah Data!</button>
			</li>
		</ul>

	</form>

</body>

</html>