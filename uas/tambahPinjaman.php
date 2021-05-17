<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

if( isset($_POST["submit"]) ) {
	
	if( tambahPinjaman($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'pinjaman.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'pinjaman.php';
			</script>
		";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah data Pinjaman</title>
</head>
<body>
	<h1>Tambah data Pinjaman</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
            <li>
				<label for="No_Pinjaman">No_Pinjaman : </label>
				<input type="text" name="No_Pinjaman" No_Pinjaman="No_Pinjaman" required>
			</li>
			<li>
				<label for="No_Anggota">No_Anggota : </label>
				<input type="text" name="No_Anggota" No_Pinjaman="No_Anggota" required>
			</li>
			<li>
				<label for="Besar_Pinjaman">Besar_Pinjaman : </label>
				<input type="currency" name="Besar_Pinjaman" No_Pinjaman="Besar_Pinjaman">
			</li>
            <li>
				<label for="Lama_Pinjaman">Lama_Pinjaman(Bulan) : </label>
				<input type="text" name="Lama_Pinjaman" No_Pinjaman="Lama_Pinjaman">
			</li>
            <li>
				<label for="Cicilan_Pokok">Cicilan_Pokok : </label>
				<input type="currency" name="Cicilan_Pokok" No_Pinjaman="Cicilan_Pokok">
			</li>
            <li>
				<label for="Cicilan_Margin">Cicilan_Margin : </label>
				<input type="currency" name="Cicilan_Margin" No_Pinjaman="Cicilan_Margin">
			</li>
			<li>
				<label for="Tanggal_Pencairan">Tanggal_Pencairan :</label>
				<input type="date" name="Tanggal_Pencairan" No_Pinjaman="Tanggal_Pencairan">
			</li>
            <li>
				<label for="Status_Pinjaman">Status_Pinjaman : </label>
				<input type="text" name="Status_Pinjaman" No_Pinjaman="Status_Pinjaman">
			</li>
			<li>
				<button type="submit" name="submit">Tambah Data!</button>
			</li>
		</ul>

	</form>

</body>

</html>