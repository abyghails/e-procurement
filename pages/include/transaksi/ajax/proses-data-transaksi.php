<?php
session_start();
require_once "../../../../proses/koneksi/koneksi.php";

$kode_barang = $_POST["kode_barang"];
$nama_barang = $_POST["nama_barang"];
$harga_barang = $_POST["harga_barang"];
$jumlah_barang = $_POST["jumlah"];
$kode_transaksi = $_POST["kode_trans"];
$user_id = $_SESSION["id"];

// ambil data barang
$dataBarang = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE kode_barang = '$kode_barang'");
$resultBarang = mysqli_fetch_assoc($dataBarang);
$barang_id = $resultBarang["id"];

$totalHarga = $jumlah_barang * $harga_barang;

if ($dataBarang && $jumlah_barang) {
	$insert = mysqli_query($koneksi, "INSERT INTO tb_sementara (kode_transaksi, barang_id, jumlah_beli, total_harga, tanggal_beli, user_id) VALUES ('$kode_transaksi', '$barang_id', '$jumlah_barang', '$totalHarga', CURRENT_TIMESTAMP(), '$user_id')");
}
