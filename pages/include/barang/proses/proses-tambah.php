<?php
require_once "../../../../proses/koneksi/koneksi.php";

$kode_barang = htmlspecialchars($_POST["kode_barang"]);
$nama_barang = htmlspecialchars($_POST["nama_barang"]);
$kategori = htmlspecialchars($_POST["kategori"]);
$jumlah = htmlspecialchars($_POST["jumlah"]);
$harga = htmlspecialchars($_POST["harga"]);

$insert = mysqli_query($koneksi, "INSERT INTO tb_barang  VALUES ('', '$kode_barang', '$nama_barang', '$kategori', '$jumlah', '$harga')");

if ($insert) {
	echo "<script>
					alert('Berhasil Menambahkan Barang');
					document.location.href= '../../../?page=barang';
				</script>";
} else {
	echo "<script>
					alert('Gagal Menambahkan Barang');
					document.location.href= '../../../?page=barang';
				</script>";
}
