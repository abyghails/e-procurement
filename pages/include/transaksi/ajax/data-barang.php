<?php
require_once "../../../../proses/koneksi/koneksi.php";
$kode_barang = $_GET["kode"];
$query = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE kode_barang = '$kode_barang'");
$dataBarang = mysqli_fetch_array($query);

$data = [
	"nama_barang" => $dataBarang["nama_barang"],
	"harga_barang" => $dataBarang["harga_barang"]
];
echo json_encode($data);
