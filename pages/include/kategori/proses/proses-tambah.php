<?php
require_once "../../../../proses/koneksi/koneksi.php";

$nama_kategori = htmlspecialchars($_POST["nama_kategori"]);

$insert = mysqli_query($koneksi, "INSERT INTO kategori  VALUES ('', '$nama_kategori')");

if ($insert) {
	echo "<script>
					alert('Berhasil Menambahkan Kategori');
					document.location.href= '../../../?page=kategori';
				</script>";
} else {
	echo "<script>
					alert('Gagal Menambahkan Kategori');
					document.location.href= '../../../?page=kategori';
				</script>";
}
