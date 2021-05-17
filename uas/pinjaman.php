<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
$pinjaman = query("SELECT * FROM pinjaman");

if( isset($_POST["cariPinjaman"]) ) {
	$pinjaman = cariPinjaman($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>

<a href="logout.php">Logout</a>

<h1>Data Pinjaman</h1>

<a href="tambahPinjaman.php">Tambah data Pinjaman</a>
<br><br>

<form action="" method="post">

	<input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off">
	<button type="submit" name="cariPinjaman">Cari!</button>
	
</form>

<br>
<table border="1" cellpadding="10" cellspacing="0">

	<tr>
        <th>No_Pinjaman</th>
        <th>No_Anggota</th>
        <th>Besar_Pinjaman</th>
		<th>Lama_Pinjaman (Bulan)</th>
		<th>Cicilan_Pokok</th>
		<th>Cicilan_Margin</th>
		<th>Tanggal_Pencairan</th>
        <th>Status_Pinjaman</th>
	</tr>

	<?php foreach( $pinjaman as $row ) : ?>

	<tr>
		<td><?= $row["No_Pinjaman"]; ?></td>
        <td><?= $row["No_Anggota"]; ?></td>
		<td><?= $row["Besar_Pinjaman"]; ?></td>
        <td><?= $row["Lama_Pinjaman"]; ?></td>
        <td><?= $row["Cicilan_Pokok"]; ?></td>
        <td><?= $row["Cicilan_Margin"]; ?></td>
        <td><?= $row["Tanggal_Pencairan"]; ?></td>
        <td><?= $row["Status_Pinjaman"]; ?></td>
	</tr>

	<?php endforeach; ?>
	
</table>

<br>

<a href="anggota.php">Tabel Anggota</a>
<br><br>
<a href="iuran.php">Tabel Iuran</a>
<br><br>
<a href="angsuran.php">Tabel Angsuran</a>

</body>

</html>