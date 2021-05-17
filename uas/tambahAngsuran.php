<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

if( isset($_POST["submit"]) ) {
	
	if( tambahAngsuran($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'angsuran.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'angsuran.php';
			</script>
		";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah data Angsuran</title>
</head>
<body>
	<h1>Tambah data Angsuran</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
            <li>
				<label for="No_Angsuran">No_Angsuran : </label>
				<input type="text" name="No_Angsuran" No_Angsuran="No_Angsuran" required>
			</li>
			<li>
				<label for="No_Pinjaman">No_Pinjaman : </label>
				<input type="text" name="No_Pinjaman" No_Angsuran="No_Pinjaman" required>
			</li>
            <li>
				<label for="Tanggal_Bayar">Tanggal_Bayar :</label>
				<input type="date" name="Tanggal_Bayar" No_Angsuran="Tanggal_Bayar">
			</li>
			<li>
				<label for="Cicilan_Pokok">Cicilan_Pokok : </label>
				<input type="currency" name="Cicilan_Pokok" No_Angsuran="Cicilan_Pokok">
			</li>
            <li>
				<label for="Cicilan_Margin">Cicilan_Margin : </label>
				<input type="currency" name="Cicilan_Margin" No_Angsuran="Cicilan_Margin">
			</li>
            <li>
				<label for="Angsuran_Ke">Angsuran_Ke : </label>
				<input type="text" name="Angsuran_Ke" No_Angsuran="Angsuran_Ke">
			</li>
			<li>
				<button type="submit" name="submit">Tambah Data!</button>
			</li>
		</ul>

	</form>

</body>

</html>