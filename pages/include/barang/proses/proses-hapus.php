<?php
require_once "../../../../proses/koneksi/koneksi.php";

$id = $_GET["id"];
$barang = query("SELECT * FROM tb_barang WHERE id = $id");
$kodeBarang = $barang[0]["kode_barang"];
unlink("../../../assets/barcode/" . $kodeBarang . ".jpg");
$delete = mysqli_query($koneksi, "DELETE FROM tb_barang WHERE id = '$id'");
if ($delete) {
	echo "<script>
					alert('Berhasil Menghapus Barang');
					document.location.href= '../../../?page=barang';
				</script>";
} else {
	echo "<script>
					alert('Gagal Menghapus Barang');
					document.location.href= '../../../?page=barang';
				</script>";
}
