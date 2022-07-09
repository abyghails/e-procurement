<?php
require_once "../../../../proses/koneksi/koneksi.php";

$nama_barang = htmlspecialchars($_POST["nama_barang"]);
$nama_pemasok = htmlspecialchars($_POST["nama_pemasok"]);
$jumlah_pasok = htmlspecialchars($_POST["jumlah_pasok"]);
$tanggal_pasok = htmlspecialchars($_POST["tanggal_pasok"]);

$insert = mysqli_query($koneksi, "INSERT INTO tb_pasok  VALUES ('', '$nama_barang', '$jumlah_pasok', '$nama_pemasok', '$tanggal_pasok')");

if ($insert) {
	echo "<script>
					alert('Berhasil Menambahkan Data Pasok');
					document.location.href= '../../../?page=data-pasok';
				</script>";
} else {
	echo "<script>
					alert('Gagal Menambahkan Data Pasok');
					document.location.href= '../../../?page=data-pasok';
				</script>";
}
