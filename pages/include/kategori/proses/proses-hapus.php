<?php
require_once "../../../../proses/koneksi/koneksi.php";

$id = $_GET["id"];

$delete = mysqli_query($koneksi, "DELETE FROM kategori WHERE id = '$id'");

if ($delete) {
	echo "<script>
					alert('Berhasil Menghapus Kategori');
					document.location.href= '../../../?page=kategori';
				</script>";
} else {
	echo "<script>
					alert('Gagal Menghapus Kategori');
					document.location.href= '../../../?page=kategori';
				</script>";
}
