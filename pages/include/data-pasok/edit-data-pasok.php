<?php
if ($_SESSION["login"] !== "login") {
	header("location: ../index.php");
} else if ($_SESSION["level"] !== 'A') {
	header("location: ?page=home");
}
require_once "../proses/koneksi/koneksi.php";

$id = $_GET["id"];
$dataPasok = query("SELECT * FROM tb_pasok WHERE id = $id");
$barang_id = $dataPasok[0]["barang_pasok_id"];
$dataBarang = query("SELECT * FROM tb_barang WHERE id = $barang_id")
?>
<div class="container-fluid">
	<div class="row justify-content-center">
		<!-- Area Chart -->
		<div class="col-xl-12 col-sm-7">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
					<a href="?page=barang" class="text-warning"><ins>Back</ins></a>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<form action="include/data-pasok/proses/proses-edit.php" method="POST">
						<input type="hidden" name="id" value="<?= $dataPasok[0]["id"]; ?>">
						<input type="hidden" name="barang_id" value="<?= $dataBarang[0]["id"]; ?>">
						<div class="form-group">
							<label for="nama_barang">Nama Barang</label>
							<input type="text" name="nama_barang" class="form-control" value="<?= $dataBarang[0]['nama_barang']; ?>" disabled>
						</div>
						<div class="form-group">
							<label for="jumlah_pasok">Jumlah</label>
							<input type="text" name="jumlah_pasok" class="form-control" value="<?= $dataPasok[0]['jumlah_pasok']; ?>" required>
						</div>
						<div class="form-group">
							<label for="nama_pemasok">Nama Pemasok</label>
							<input type="text" name="nama_pemasok" class="form-control" value="<?= $dataPasok[0]['nama_pemasok']; ?>" required>
						</div>
						<div class="form-group">
							<label for="tanggal_pasok">Waktu Pasok</label>
							<input type="date" name="tanggal_pasok" class="form-control" value="<?= $dataPasok[0]['tanggal_pasok']; ?>" required>
						</div>
						<button type="submit" name="submit" class="btn btn-warning">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>