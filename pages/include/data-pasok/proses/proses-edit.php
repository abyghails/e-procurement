<?php
require_once "../../../../proses/koneksi/koneksi.php";

$id = $_POST["id"];
$barang_id = htmlspecialchars($_POST["barang_id"]);
$nama_pemasok = htmlspecialchars($_POST["nama_pemasok"]);
$jumlah_pasok = htmlspecialchars($_POST["jumlah_pasok"]);
$tanggal_pasok = htmlspecialchars($_POST["tanggal_pasok"]);

$update = mysqli_query($koneksi, "UPDATE tb_pasok SET barang_pasok_id = '$barang_id', jumlah_pasok = '$jumlah_pasok', nama_pemasok = '$nama_pemasok', tanggal_pasok = '$tanggal_pasok' WHERE id = '$id'");

if ($update) {
	echo "<script>
					alert('Berhasil Mengubah Data Pasok');
					document.location.href= '../../../?page=data-pasok';
				</script>";
} else {
	echo "<script>
					alert('Gagal Mengubah Data Pasok');
					document.location.href= '../../../?page=data-pasok';
				</script>";
}
