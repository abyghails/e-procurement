<?php
require_once "koneksi/koneksi.php";

$nama = htmlspecialchars($_POST["nama"]);
$email = mysqli_escape_string($koneksi, $_POST["email"]);
$password = mysqli_escape_string($koneksi, $_POST['password']);
$password = password_hash($password, PASSWORD_DEFAULT);

$insert = mysqli_query($koneksi, "INSERT INTO users (nama, email, password, created_at) VALUES ('$nama', '$email', '$password', CURRENT_TIMESTAMP())");
if ($insert) {
	header("location:../index.php");
} else {
	header("location: ../register.php");
}
