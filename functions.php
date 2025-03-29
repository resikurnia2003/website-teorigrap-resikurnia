<?php 

$db = mysqli_connect("localhost", "root", "", "kurir_app"); //koneksi ke database

// READ
function query($query) {
	global $db; //variabel scope (global)
	$result = mysqli_query($db, $query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

// CREATE
function transaksi($data){
	global $db;
	$resi = htmlspecialchars($data["resi"]);
	$status_barang = htmlspecialchars($data["status_barang"]);
	$nama_barang = htmlspecialchars($data["nama_barang"]);

	$nama_penerima = htmlspecialchars($data["nama_penerima"]);
	$alamat_penerima = htmlspecialchars($data["alamat_penerima"]);
	$nohp_penerima = htmlspecialchars($data["nohp_penerima"]);

	$nama_pengirim = htmlspecialchars($data["nama_pengirim"]);
	$nohp_pengirim = htmlspecialchars($data["nohp_pengirim"]);

	$nama_kurir = htmlspecialchars($data["nama_kurir"]);
	$nohp_kurir = htmlspecialchars($data["nohp_kurir"]);

	$query = "INSERT INTO transaksi 
				VALUES 
			  ('$resi','$nama_barang','$status_barang',
			  '$nama_penerima','$alamat_penerima','$nohp_penerima',
			  '$nama_pengirim', '$nohp_pengirim',
			  '$nama_kurir', '$nohp_kurir')";

	mysqli_query($db, $query);
	return mysqli_affected_rows($db);
}

// DELETE
function hapus($id){
	global $db;
	mysqli_query($db, "DELETE FROM transaksi WHERE resi = $id");
	return mysqli_affected_rows($db);
}

// UBAH/DELETE
function ubah($data){
	global $db;
	$resi = htmlspecialchars($data["resi"]);
	$status_barang = htmlspecialchars($data["status_barang"]);
	$nama_barang = htmlspecialchars($data["nama_barang"]);

	$nama_penerima = htmlspecialchars($data["nama_penerima"]);
	$alamat_penerima = htmlspecialchars($data["alamat_penerima"]);
	$nohp_penerima = htmlspecialchars($data["nohp_penerima"]);

	$nama_pengirim = htmlspecialchars($data["nama_pengirim"]);
	$nohp_pengirim = htmlspecialchars($data["nohp_pengirim"]);

	$nama_kurir = htmlspecialchars($data["nama_kurir"]);
	$nohp_kurir = htmlspecialchars($data["nohp_kurir"]);

	$query = "UPDATE transaksi SET
				resi = '$resi',
				nama_barang = '$nama_barang',
				status_barang = '$status_barang',

				nama_penerima = '$nama_penerima',
				alamat_penerima = '$alamat_penerima',
				nohp_penerima = '$nohp_penerima',

				nama_pengirim = '$nama_pengirim',
				nohp_pengirim = '$nohp_pengirim',

				nama_kurir = '$nama_kurir',
				nohp_kurir = '$nohp_kurir'

				WHERE resi = $resi ";

	mysqli_query($db, $query);
	return mysqli_affected_rows($db);
}

function register($data){
	global $db;
	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($db, $data["password"]); 
	$password2 = mysqli_real_escape_string($db, $data["password2"]);

	//cek kemiripan username
	$result = mysqli_query($db, "SELECT username FROM users WHERE username = '$username'");
	
	if (mysqli_fetch_assoc($result)) {
		echo "<script>
				alert('username sudah terdaftar');
			</script>";
		return false;
	}

	//cek konfirmasi password
	if ($password !== $password2) {
		echo "<script>
				alert('password tidak sesuai');
			</script>";
		return false;
	}

	//enkripsi
	// $password = md5($password); // jangan pake md5
	$password = password_hash($password, PASSWORD_DEFAULT);
	mysqli_query($db, "INSERT INTO users VALUES('','$username','$password')");

	return mysqli_affected_rows($db); // if > 0
}

function cari($keyword) {
	$query = "SELECT * FROM transaksi WHERE 
	resi LIKE '$keyword%'
	";
	return query($query); // filter function query() sesuai $query
}

?>