<?php
session_start();
require_once "../../../../proses/koneksi/koneksi.php";

$kode_transaksi = $_POST["trans_kode"];
$bayar = $_POST["bayar"];
$harga = $_POST["harga"];
$kembalian = $_POST["kembalian"];
$user_id = $_SESSION["id"];

// untuk cek uang yang di masukkan benar
if ($harga > $bayar) {
	echo "<script>
					alert('Tidak Boleh Hutang !!');
					document.location.href= '../../../?page=transaksi';
				</script>";
	return false;
}


// ambil data tb_sementara dan insert ke dalam tb_transaksi 
$sementara = mysqli_query($koneksi, "SELECT * FROM tb_sementara WHERE kode_transaksi = '$kode_transaksi'");
while ($hasilSementara = mysqli_fetch_assoc($sementara)) {

	$barang_id = $hasilSementara["barang_id"];
	$jumlah_beli = $hasilSementara["jumlah_beli"];
	$total_harga = $hasilSementara["total_harga"];
	$tanggal_beli = $hasilSementara["tanggal_beli"];

	// kurangi jumlah barang
	$dataBarangMentah = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE id = '$barang_id'");
	$dataBarang = mysqli_fetch_assoc($dataBarangMentah);
	$jumlahBarang = $dataBarang["jumlah_barang"];
	$sisa = $jumlahBarang - $jumlah_beli;

	if ($sisa >= 0) {
		// update barang
		$updateBarang = mysqli_query($koneksi, "UPDATE tb_barang SET jumlah_barang = '$sisa' WHERE id = '$barang_id'");

		// insert transaksi
		$insertTransaksi = mysqli_query($koneksi, "INSERT INTO tb_transaksi VALUES ('', '$kode_transaksi', '$barang_id', '$jumlah_beli', '$total_harga', '$tanggal_beli', '$user_id')");
	} else {
		echo "<script>
					alert('Stok Barang Habis !!');
					document.location.href= '../../../?page=transaksi';
				</script>";
		return false;
	}
}

// delete tb_sementara
$deleteSementara = mysqli_query($koneksi, "DELETE FROM tb_sementara WHERE kode_transaksi = '$kode_transaksi'");

// insert ke tb_kembalian
$insertKembalian = mysqli_query($koneksi, "INSERT INTO tb_kembalian VALUES ('', '$kode_transaksi', '$bayar', '$kembalian', CURRENT_TIMESTAMP())");

if ($insertKembalian) {
	echo "<script>
					alert('Transaksi Berhasil !!');
					document.location.href= '../../../?page=laporan';
				</script>";
} else {
	echo "<script>
					alert('Transaksi Gagal !!');
					document.location.href= '../../../?page=laporan';
				</script>";
}
