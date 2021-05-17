<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
$anggota = query("SELECT * FROM anggota");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
	$anggota = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>

<a href="logout.php">Logout</a>

<h1>Daftar Anggota</h1>

<a href="tambah.php">Tambah data anggota</a>
<br><br>

<form action="" method="post">

	<input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off">
	<button type="submit" name="cari">Cari!</button>
	
</form>

<br>
<table border="1" cellpadding="10" cellspacing="0">

	<tr>
	
		<th>Set</th>
        <th>No_Anggota</th>
        <th>Nama</th>
		<th>No_KTP</th>
		<th>Tanggal_Lahir</th>
		<th>Jenis_Kelamin</th>
		<th>No_HP</th>
        <th>Alamat</th>
        <th>Email</th>
	</tr>

	<?php foreach( $anggota as $row ) : ?>
	<tr>
		<td>
			<a href="ubah.php?No_Anggota=<?= $row["No_Anggota"]; ?>">ubah</a> |
			<a href="hapus.php?No_Anggota=<?= $row["No_Anggota"]; ?>" onclick="return confirm('yakin?');">hapus</a>
		</td>

		<td><?= $row["No_Anggota"]; ?></td>
		<td><?= $row["Nama"]; ?></td>
        <td><?= $row["No_KTP"]; ?></td>
        <td><?= $row["Tanggal_Lahir"]; ?></td>
        <td><?= $row["Jenis_Kelamin"]; ?></td>
        <td><?= $row["No_HP"]; ?></td>
        <td><?= $row["Alamat"]; ?></td>
		<td><?= $row["Email"]; ?></td>
		
	</tr>
	<?php endforeach; ?>
	
</table>

</body>
</html>