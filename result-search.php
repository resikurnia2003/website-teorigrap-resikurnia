<?php 

session_start();
if (isset($_SESSION["login"])) {
	header("Location: admin/index.php");
	exit;
}

require 'controller/functions.php';

$transaksi = query("SELECT * FROM transaksi");

if (isset($_GET['cari'])) {
	$transaksi = cari($_GET['keyword']);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Hasil Pencarian</title>
	<link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>

<h2 class="text-center">Hasil Pencarian Barang</h2><br>
<div class="container">
	<div class="col-md-6 col-md-offset-3">
	
	<a href="index.php" class="btn btn-default text-center">< Kembali</a> <br><br>
	
	<?php foreach ($transaksi as $row) : ?> 

	<div class="panel panel-primary">
		<div class="panel-heading">Barang</div>
		<div class="panel-body">
			<?= $row["nama_barang"]; ?> <br>
			Kode Resi : <?= $row["resi"]; ?> <br>
			Status : <?= $row["status_barang"]; ?>
		</div> 
	</div>

	<div class="panel panel-primary">
		<div class="panel-heading">Penerima</div>
		<div class="panel-body">
			<?= $row["nama_penerima"]; ?><br>
			<?= $row["alamat_penerima"]; ?><br>
			<?= $row["nohp_penerima"]; ?>
		</div> 
	</div>

	<div class="panel panel-primary">
		<div class="panel-heading">Pengirim</div>
		<div class="panel-body">
			<?= $row["nama_pengirim"]; ?><br>
			<?= $row["nohp_pengirim"]; ?>
		</div> 
	</div>

	<div class="panel panel-primary">
		<div class="panel-heading">Kurir</div>
		<div class="panel-body">
			<?= $row["nama_kurir"]; ?><br>
			<?= $row["nohp_kurir"]; ?>
		</div> 
	</div>

	<?php endforeach; ?>

	</div>
</div>

</body>
</html>