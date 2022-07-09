<?php
require_once "../../../../proses/koneksi/koneksi.php";

$id = $_POST["id"];
$nama = htmlspecialchars($_POST["nama"]);
$email = htmlspecialchars(mysqli_escape_string($koneksi, $_POST["email"]));

$update = mysqli_query($koneksi, "UPDATE users SET nama = '$nama', email = '$email' WHERE id = '$id'");

if ($update) {
	echo "<script>
					alert('Berhasil Mengubah Data Direksi');
					document.location.href= '../../../?page=data-direksi';
				</script>";
} else {
	echo "<script>
					alert('Gagal Mengubah Data Direksi');
					document.location.href= '../../../?page=data-direksi';
				</script>";
}
