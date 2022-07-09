<?php
require_once "../../../../proses/koneksi/koneksi.php";

$id = $_GET["id"];

$delete = mysqli_query($koneksi, "DELETE FROM tb_pasok WHERE id = '$id'");

if ($delete) {
	echo "<script>
					alert('Berhasil Menghapus Data Pasok');
					document.location.href= '../../../?page=data-pasok';
				</script>";
} else {
	echo "<script>
					alert('Gagal Menghapus Data Pasok');
					document.location.href= '../../../?page=data-pasok';
				</script>";
}
