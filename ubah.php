<?php 

session_start();

if (!isset($_SESSION["login"])) {
	header("Location : index.php");
	exit;
}


require '../controller/functions.php';

//ambil data di url
$id = $_GET["id"];
//query data mahasiswa berdasarkan id
$kueri = query("SELECT * FROM transaksi WHERE resi = $id")[0];
// var_dump($kueri["nama"]);

if (isset($_POST["submit"])) {
	//cek berhasil atau tidak
	if (ubah($_POST) > 0) {
		echo "<script>
			alert('data berhasil diubah');
			document.location.href = 'index.php';
		</script>";
	}else {
		echo "<script>
			alert('data berhasil diubah');
			document.location.href = 'index.php';
		</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>UBAH DATA</title>
	<link rel="stylesheet" href="../bootstrap.min.css">
</head>
<body class="container">

<div class="col-md-6 col-md-offset-3">
	<form action="" method="post" class="form-group">

		<input type="hidden" name="id" value="<?= $kueri["id"]; ?>">
		
		<h1 class="text-center">Ubah Data</h1>

		<label for="resi">Kode Resi : </label>
		<input class="form-control" type="text" name="resi" id="resi" required value="<?= $kueri["resi"] ?>"><br>
			
		<label for="status_barang">Status Barang : </label>
		<input class="form-control" type="text" name="status_barang" id="status_barang" required value="<?= $kueri["status_barang"] ?>"><br>
			
		<label for="nama_barang">Nama Barang : </label>
		<input class="form-control" type="text" name="nama_barang" id="nama_barang" required value="<?= $kueri["nama_barang"] ?>"><hr>

			
		<label for="nama_penerima">Nama Penerima : </label>
		<input class="form-control" type="text" name="nama_penerima" id="nama_penerima" required value="<?= $kueri["nama_penerima"] ?>"><br>
		
		<label for="alamat_penerima">Alamat Penerima : </label>
		<input class="form-control" type="text" name="alamat_penerima" id="alamat_penerima" required value="<?= $kueri["alamat_penerima"] ?>"><br>
			
		<label for="nohp_penerima">No.Hp Penerima : </label>
		<input class="form-control" type="text" name="nohp_penerima" id="nohp_penerima" required value="<?= $kueri["nohp_penerima"] ?>"><hr>

		<label for="nama_pengirim">Nama Pengirim : </label>
		<input class="form-control" type="text" name="nama_pengirim" id="nama_pengirim" required value="<?= $kueri["nama_pengirim"] ?>"><br>
			
		<label for="nohp_pengirim">No.Hp Pengirim : </label>
		<input class="form-control" type="text" name="nohp_pengirim" id="nohp_pengirim" required value="<?= $kueri["nohp_pengirim"] ?>"><hr>

		<label for="nama_kurir">Nama Kurir : </label>
		<input class="form-control" type="text" name="nama_kurir" id="nama_kurir" required value="<?= $kueri["nama_kurir"] ?>"><br>
			
		<label for="nohp_kurir">No.Hp Kurir : </label>
		<input class="form-control" type="text" name="nohp_kurir" id="nohp_kurir" required value="<?= $kueri["nohp_kurir"] ?>"><hr>

		<button class="btn btn-success" type="submit" name="submit">Ubah Data</button>
		<a href="index.php" class="btn">Kembali</a>
	</form>

</div>	
</body>
</html>