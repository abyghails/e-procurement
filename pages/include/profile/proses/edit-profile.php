<?php
session_start();
require_once "../../../../proses/koneksi/koneksi.php";

$id = $_SESSION["id"];
// password lama
$password_old = htmlspecialchars(mysqli_escape_string($koneksi, $_POST["password"]));
$data = query("SELECT * FROM users WHERE id = $id");
$password_old = password_verify($password_old, $data[0]["password"]);
if ($password_old) {
	$new_password = htmlspecialchars(mysqli_escape_string($koneksi, $_POST["new_password"]));
	$new_password2 = htmlspecialchars(mysqli_escape_string($koneksi, $_POST["new_password2"]));

	if ($new_password == $new_password2) {
		$new_password = password_hash($new_password,  PASSWORD_DEFAULT);
		$update = mysqli_query($koneksi, "UPDATE users SET password = '$new_password' WHERE id = '$id'");

		if ($update) {
			echo "<script>
						alert('Berhasil Update Password!!');
						document.location.href= '../../../?page=home';
					</script>";
		} else {
			echo "<script>
						alert('Gagal Update Password!!');
						document.location.href= '../../../?page=profile';
					</script>";
			return false;
		}
	} else {
		echo "<script>
						alert('Cek kembali kecocokan password baru!!');
						document.location.href= '../../../?page=profile';
					</script>";
		return false;
	}
} else {
	echo "<script>
					alert('Password yang lama tidak cocok!!');
					document.location.href= '../../../?page=profile';
				</script>";
	return false;
}
