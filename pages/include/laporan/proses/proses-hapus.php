<?php
require_once "../../../../proses/koneksi/koneksi.php";

$id = $_GET["id"];
$kode = $_GET["kode"];

$delete = mysqli_query($koneksi, "DELETE FROM tb_transaksi WHERE kode_transaksi = '$kode'");
$delete_kembalian = mysqli_query($koneksi, "DELETE FROM tb_kembalian WHERE id = '$id'");

if ($delete) {
	echo "<script>
					alert('Berhasil Menghapus Laporan');
					document.location.href= '../../../?page=laporan';
				</script>";
} else {
	echo "<script>
					alert('Gagal Menghapus Laporan');
					document.location.href= '../../../?page=laporan';
				</script>";
}
