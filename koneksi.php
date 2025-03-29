<?php
$host = "localhost";  
$user = "root";       
$pass = "";         
$dbname = "kurir_app"; 

// Membuat koneksi ke MySQL
$conn = new mysqli($nama_barang, $status_barang, $nama_penerima, $alamat_penerima, $nohp_penerima, $nama_pengirim, $nohp_pengirim, $nama_kurir, $nohp_kurir);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

?>
