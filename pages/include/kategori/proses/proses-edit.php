<?php
require_once "../../../../proses/koneksi/koneksi.php";

$id = $_POST["id"];
$nama_kategori = htmlspecialchars($_POST["nama_kategori"]);
$update = mysqli_query($koneksi, "UPDATE kategori SET nama_kategori = '$nama_kategori' WHERE id = '$id'");

if ($update) {
	echo "<script>
					alert('Berhasil Mengubah Kategori');
					document.location.href= '../../../?page=kategori';
				</script>";
} else {
	echo "<script>
					alert('Gagal Mengubah Kategori');
					document.location.href= '../../../?page=kategori';
				</script>";
}
