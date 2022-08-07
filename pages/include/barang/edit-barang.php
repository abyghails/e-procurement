<?php
if ($_SESSION["login"] !== "login") {
	header("location: ../index.php");
} else if ($_SESSION["level"] !== 'A' && $_SESSION["level"] !== 'P') {
	header("location: ?page=home");
};
require_once "../proses/koneksi/koneksi.php";

$id = $_GET["id"];
$barang = query("SELECT * FROM tb_barang WHERE id = $id");
$kategori_id = $barang[0]["kategori_id"];
$kategori = query("SELECT * FROM kategori");
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
					<form action="include/barang/proses/proses-edit.php" method="POST">
						<input type="hidden" name="id" value="<?= $barang[0]["id"]; ?>">
						<div class="form-group">
							<label for="kode_barang">Kode Barang</label>
							<input type="text" name="kode_barang" class="form-control" value="<?= $barang[0]['kode_barang']; ?>" required>
						</div>
						<div class="form-group">
							<label for="nama_barang">Nama Barang</label>
							<input type="text" name="nama_barang" class="form-control" value="<?= $barang[0]['nama_barang']; ?>" required>
						</div>
						<div class="form-group">
							<label for="kategori">Kategori</label>
							<select name="kategori" id="kategori" class="form-control">
								<?php foreach ($kategori as $a) { ?>
									<option value="<?= $a['id']; ?>" <?= $a['id'] == $kategori_id ? "selected" : "" ?>><?= $a["nama_kategori"]; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label for="jumlah_barang">Jumlah Barang</label>
							<input type="text" name="jumlah_barang" class="form-control" value="<?= $barang[0]['jumlah_barang']; ?>" required>
						</div>
						<div class="form-group">
							<label for="harga_barang">Harga Satuan</label>
							<input type="text" name="harga_barang" class="form-control" value="<?= $barang[0]['harga_barang']; ?>" required>
						</div>
						<button type="submit" name="submit" class="btn btn-warning">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>