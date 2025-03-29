<?php 
session_start();

if (!isset($_SESSION["login"])) {
	header("Location : index.php");
	exit;
}

require '../controller/functions.php';
$transaksi = query("SELECT * FROM transaksi");

if (isset($_POST["submit"])) {
	//cek berhasil atau tidak
	if (transaksi($_POST) > 0) {
		echo "<script>
			alert('data berhasil ditambah');
			document.location.href = 'index.php';
		</script>";
	}else {
		echo "<script>
			alert('data gagal ditambah');
			document.location.href = 'index.php';
		</script>";
	}
}

if (isset($_GET['cari'])) {
	$transaksi = cari($_GET['keyword']);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<link rel="stylesheet" href="../bootstrap.min.css">
	<style>
		#brand,#logout {color: white;}
		ul li{ list-style: none; display: inline; }
		.data_table{margin-top: 15px;margin-bottom: 15px;}
		#transaksi {margin-bottom: 100px;}
	</style>
</head>
<body class="container-fulid">

<nav class="nav navbar navbar-inverse">
		  <div class="container">	
			<ul>
				<h3 id="brand">Administrator</h3>
				<li><a href="index.php" class="btn btn-link">Home</a></li>
				<li><a href="registrasi.php" class="btn btn-link">New Account</a></li>
				<li><a class="btn btn-link" href="../logout.php" onclick="return confirm('Yakin?');">Logout</a></li>
			</ul>
		  </div>
</nav>

<div class="container" id="tambah-data">
	<form class="form-group" action="" method="post">
	<h1 class="text-center">Tambah Data</h1>
	<table class="table table-bordered" align="center" cellpadding="10" cellspacing="0">
		<tr class="active">
			<th>Barang</th>
			<th>Penerima</th>
			<th>Pengirim</th>
			<th>Kurir</th>
		</tr>
		<tr>
			<td>
				
				<input type="number" name="resi" class="form-control data_table" required placeholder="Kode Resi">
	
				<input type="text" name="nama_barang" class="form-control data_table" required placeholder="Nama Barang">
				
				<input type="text" name="status_barang" class="form-control data_table" required placeholder="Status Barang">

			</td>
			<td>
				<!-- penerima -->
				<input type="text" name="nama_penerima" class="form-control data_table" required placeholder="Nama Penerima">

				<input type="text" name="alamat_penerima" class="form-control data_table" required placeholder="Alamat Penerima">

				<input type="number" name="nohp_penerima" class="form-control data_table" required placeholder="No.hp Penerima">
			</td>
			<td>
				<!-- pengirim -->
				<input type="text" name="nama_pengirim" class="form-control data_table" required placeholder="Nama Pengirim">

				<input type="number" name="nohp_pengirim" class="form-control data_table" required placeholder="No.hp Pengirim">
			
			</td>
			<td>
				<!-- kurir -->
				<input type="text" name="nama_kurir" class="form-control data_table" required placeholder="Nama Kurir">

				<input type="number" name="nohp_kurir" class="form-control data_table" required placeholder="No.hp Kurir">
			</td>
		</tr>
		<tr>
			<td colspan="4" class="text-center">
				<button type="submit" name="submit" class="btn btn-success">Tambah Data</button> 
			</td>
		</tr>
	
	</table>
	</form>
</div>


<div class="container" id="transaksi">
<h1 class="text-center">Transaksi</h1>

<form method="get">

	<div class="col-md-3">
		<input type="text" class="form-control" name="keyword"
		placeholder="Masukan Kode Resi">
	</div>
	<div>
		<button type="submit" name="cari" class="btn btn-primary col-md-1">Cek Resi</button>
	</div>

</form><br><br><br>

<table class="table table-hover container" align="center" cellpadding="10" cellspacing="0">
	<tr class="active">
		<th>No</th>
		<th algin="center">No Resi</th>
		<th algin="center">Status Barang</th>
		<th algin="center">Nama Barang</th>
		
		<th algin="center">Nama Penerima</th>
		<th algin="center">Alamat Penerima</th>
		<th algin="center">No.Hp Penerima</th>
		
		<th algin="center">Nama Pengirim</th>
		<th algin="center">No.Hp Pengirim</th>

		<th algin="center">Nama Kurir</th>
		<th algin="center">No.Hp Kurir</th>
		<th>Ubah</a></th>
		<th>Hapus</a></th>
	</tr>

	<?php $i=1; ?>
	<?php foreach ($transaksi as $row):  ?> 
	<tr>
		<td><?= $i; ?></td>
		<td><?= $row["resi"]; ?></td>
		<td><?= $row["status_barang"]; ?></td>
		<td><?= $row["nama_barang"]; ?></td>

		<td><?= $row["nama_penerima"]; ?></td>
		<td><?= $row["alamat_penerima"]; ?></td>
		<td><?= $row["nohp_penerima"]; ?></td>

		<td><?= $row["nama_pengirim"]; ?></td>
		<td><?= $row["nohp_pengirim"]; ?></td>
		
		<td><?= $row["nama_kurir"]; ?></td>
		<td><?= $row["nohp_kurir"]; ?></td>

		<td><a class="btn btn-warning" href="ubah.php?id= <?= $row["resi"]; ?>">Ubah</a></td>
		<td><a class="btn btn-danger" href="hapus.php?resi= <?= $row["resi"]; ?>" onclick="return confirm('Yakin?');">Hapus</a></td> 
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>
</table>
</div>

</body>
</html>