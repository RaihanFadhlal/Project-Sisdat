<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
$iuran = query("SELECT * FROM iuran");

if( isset($_POST["cariIuran"]) ) {
	$iuran = cariIuran($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>

<a href="logout.php">Logout</a>

<h1>Data Iuran</h1>

<a href="tambahIuran.php">Tambah data iuran</a>
<br><br>

<form action="" method="post">

	<input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off">
	<button type="submit" name="cariIuran">Cari!</button>
	
</form>

<br>
<table border="1" cellpadding="10" cellspacing="0">

	<tr>
        <th>No_Iuran</th>
        <th>No_Anggota</th>
		<th>Iuran_Wajib</th>
		<th>Iuran_Pokok</th>
		<th>Iuran_Sukarela</th>
		<th>Tanggal_Bayar</th>
	</tr>

	<?php foreach( $iuran as $row ) : ?>
	<tr>
		<td><?= $row["No_Iuran"]; ?></td>
		<td><?= $row["No_Anggota"]; ?></td>
        <td><?= $row["Iuran_Wajib"]; ?></td>
        <td><?= $row["Iuran_Pokok"]; ?></td>
        <td><?= $row["Iuran_Sukarela"]; ?></td>
        <td><?= $row["Tanggal_Bayar"]; ?></td>
	</tr>
	
    <?php endforeach; ?>
	
</table>

<br>

<a href="anggota.php">Tabel Anggota</a>
<br><br>
<a href="pinjaman.php">Tabel Pinjaman</a>
<br><br>
<a href="angsuran.php">Tabel Angsuran</a>

</body>

</html>