<?php
require_once "../../../../proses/koneksi/koneksi.php";

$id = $_GET["id"];

$delete = mysqli_query($koneksi, "DELETE FROM users WHERE id = '$id'");

if ($delete) {
	echo "<script>
					alert('Berhasil Menghapus Data Pelaksana');
					document.location.href= '../../../?page=data-pelaksana';
				</script>";
} else {
	echo "<script>
					alert('Gagal Menghapus Data Pelaksana');
					document.location.href= '../../../?page=data-pelaksana';
				</script>";
}
