<?php
session_start();
require_once "koneksi/koneksi.php";

$email = mysqli_escape_string($koneksi, $_POST["email"]);
$password = mysqli_escape_string($koneksi, $_POST["password"]);

$dataCek = mysqli_query($koneksi, "SELECT * FROM users WHERE email = '$email'");

if (mysqli_num_rows($dataCek) === 1) {
	$result = mysqli_fetch_assoc($dataCek);
	if (password_verify($password, $result["password"])) {
		$id = $result["id"];
		$nama = $result["nama"];
		$email = $result["email"];
		$level = $result["level"];

		$_SESSION["id"] = $id;
		$_SESSION["nama"] = $nama;
		$_SESSION["email"] = $email;
		$_SESSION["level"] = $level;
		$_SESSION["login"] = "login";

		header("location: ../pages/index.php");
	} else {
		header("location: ../index.php");
		echo "Username atau Password salah";
		return false;
	}
} else {
	session_unset();
	session_destroy();
	echo "<script>
					alert('Kamu belum terdaftar');
					document.location.href= '../index.php';
				</script>";
}
