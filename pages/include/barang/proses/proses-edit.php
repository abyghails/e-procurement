<?php
require_once "../../../../proses/koneksi/koneksi.php";

$id = $_POST["id"];
$kode_barang = htmlspecialchars($_POST["kode_barang"]);
$nama_barang = htmlspecialchars($_POST["nama_barang"]);
$kategori = htmlspecialchars($_POST["kategori"]);
$jumlah = htmlspecialchars($_POST["jumlah_barang"]);
$harga = htmlspecialchars($_POST["harga_barang"]);

$update = mysqli_query($koneksi, "UPDATE tb_barang SET kode_barang = '$kode_barang', nama_barang = '$nama_barang', kategori_id = '$kategori', jumlah_barang = '$jumlah', harga_barang = '$harga' WHERE id = '$id'");

if ($update) {
	echo "<script>
					alert('Berhasil Mengubah Barang');
					document.location.href= '../../../?page=barang';
				</script>";
} else {
	echo "<script>
					alert('Gagal Mengubah Barang');
					document.location.href= '../../../?page=barang';
				</script>";
}
