<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
$angsuran = query("SELECT * FROM angsuran");

if( isset($_POST["cariAngsuran"]) ) {
	$angsuran = cariAngsuran($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>

<a href="logout.php">Logout</a>

<h1>Data Angsuran</h1>

<a href="tambahAngsuran.php">Tambah data angsuran</a>
<br><br>

<form action="" method="post">

	<input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off">
	<button type="submit" name="cariAngsuran">Cari!</button>
	
</form>

<br>
<table border="1" cellpadding="10" cellspacing="0">

	<tr>
        <th>No_Angsuran</th>
        <th>No_Pinjaman</th>
		<th>Tanggal_Bayar</th>
		<th>Cicilan_Pokok</th>
		<th>Cicilan_Margin</th>
        <th>Angsuran_Ke</th>
		
	</tr>

	<?php foreach( $angsuran as $row ) : ?>
	<tr>
		<td><?= $row["No_Angsuran"]; ?></td>
		<td><?= $row["No_Pinjaman"]; ?></td>
        <td><?= $row["Tanggal_Bayar"]; ?></td>
        <td><?= $row["Cicilan_Pokok"]; ?></td>
        <td><?= $row["Cicilan_Margin"]; ?></td>
        <td><?= $row["Angsuran_Ke"]; ?></td>
	</tr>
	
    <?php endforeach; ?>
	
</table>

<br>

<a href="anggota.php">Tabel Anggota</a>
<br><br>
<a href="pinjaman.php">Tabel Pinjaman</a>
<br><br>
<a href="iuran.php">Tabel Iuran</a>

</body>

</html>
