<?php
require_once "../../../../proses/koneksi/koneksi.php";

$nama = htmlspecialchars($_POST["nama"]);
$email = htmlspecialchars(mysqli_escape_string($koneksi, $_POST["email"]));
$password = htmlspecialchars(mysqli_escape_string($koneksi, $_POST["password"]));

$password = password_hash($password, PASSWORD_DEFAULT);

$insert = mysqli_query($koneksi, "INSERT INTO users (nama, email, password, level) VALUES ('$nama', '$email', '$password', 'A')");

if ($insert) {
	echo "<script>
					alert('Berhasil Menambahkan Data Admin');
					document.location.href= '../../../?page=data-admin';
				</script>";
} else {
	echo "<script>
					alert('Gagal Menambahkan Data Admin');
					document.location.href= '../../../?page=data-admin';
				</script>";
}
