<?php
if ($_SESSION["login"] !== "login") {
	header("location: ../index.php");
} else if ($_SESSION["level"] !== 'A') {
	header("location: ?page=home");
}
require_once "../proses/koneksi/koneksi.php";
$items = query("SELECT * FROM kategori INNER JOIN tb_barang ON tb_barang.kategori_id = kategori.id ORDER BY kode_barang ASC");
?>
<div class="container-fluid">
	<div class="row">
		<!-- Area Chart -->
		<div class="col-xl-12 col-lg-7">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<div class="d-flex flex-row align-items-center justify-content-between">
						<button type="button" data-toggle="modal" data-target="#modalTambahBarang" class="btn btn-success mb-4">Tambah Data</button>
						<a href="include/barang/cetak/cetak.php" class="btn btn-warning mb-4">Cetak Harga</a>
					</div>
					<div class="table-responsive">
						<table class="table table-bordered" id="tabel-barang">
							<thead>
								<tr>
									<th>No</th>
									<th>Barcode</th>
									<th>Kode Barang</th>
									<th>Nama Barang</th>
									<th>Kategori</th>
									<th>Jumlah</th>
									<th>Harga</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php
								require_once "assets/vendor/autoload.php";
								$no = 0;
								$redColor = [255, 0, 0];
								$generator = new Picqer\Barcode\BarcodeGeneratorJPG();
								?>
								<?php foreach ($items as $item) {
									$no++; ?>
									<tr>
										<td><?= $i++; ?></td>
										<td>
											<?php
											file_put_contents("assets/barcode/" . $item["kode_barang"] . ".jpg", $generator->getBarcode($item["kode_barang"], $generator::TYPE_CODE_39));
											?>
											<img src="assets/barcode/<?= $item["kode_barang"] ?>.jpg" class="img-fluid" style="width:190px; height:80px">
										</td>
										<td><?= $item["kode_barang"]; ?></td>
										<td><?= $item["nama_barang"]; ?></td>
										<td>
											<?php
											$kategori_id = $item["kategori_id"];
											$kategoriName = query("SELECT * FROM kategori WHERE id = '$kategori_id'");
											foreach ($kategoriName as $data) {
											?>
												<?= $data["nama_kategori"]; ?>
											<?php } ?>
										</td>
										<td><?= $item["jumlah_barang"]; ?></td>
										<td><?= $item["harga_barang"]; ?></td>
										<td width="120">
											<a href="?page=edit-barang&id=<?= $item["id"]; ?>" class="btn btn-sm btn-primary d-inline-block">Edit</a>
											<button type="button" data-toggle="modal" data-target="#modalHapus<?= $item["id"]; ?>" class="btn btn-sm btn-danger d-inline-block">Delete</button>
										</td>
									</tr>
									<?php include "include/barang/modal/hapus-data.php"; ?>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include "include/barang/modal/tambah-data.php"; ?>
<script>
	$(document).ready(function() {
		$("#tabel-barang").DataTable();
	});
</script>