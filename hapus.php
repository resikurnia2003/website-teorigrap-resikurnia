<?php 

session_start();

if (!isset($_SESSION["login"])) {
	header("Location : index.php");
	exit;
}


require '../controller/functions.php';

// HAPUS
$id = $_GET["resi"];
if (hapus($id) > 0) {
	echo "<script>
			alert('data berhasil dihapus');
			document.location.href = 'index.php';
		</script>";
}else{
	echo "<script>
			alert('data gagal dihapus');
			document.location.href = 'index.php';
		</script>";
}


?>