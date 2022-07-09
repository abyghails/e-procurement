<?php
require_once "../../../../proses/koneksi/koneksi.php";

$id = $_GET["id"];

$delete = mysqli_query($koneksi, "DELETE FROM users WHERE id = '$id'");

if ($delete) {
	echo "<script>
					alert('Berhasil Menghapus Data Direksi');
					document.location.href= '../../../?page=data-direksi';
				</script>";
} else {
	echo "<script>
					alert('Gagal Menghapus Data Direksi');
					document.location.href= '../../../?page=data-direksi';
				</script>";
}
