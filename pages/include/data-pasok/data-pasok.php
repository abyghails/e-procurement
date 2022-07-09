<?php
if ($_SESSION["login"] !== "login") {
	header("location: ../index.php");
} else if ($_SESSION["level"] !== 'A') {
	header("location: ?page=home");
}
require_once "../proses/koneksi/koneksi.php";
$items = query("SELECT * FROM tb_barang INNER JOIN tb_pasok ON tb_pasok.barang_pasok_id = tb_barang.id ORDER BY nama_barang ASC");
?>
<div class="container-fluid">
	<div class="row">
		<!-- Area Chart -->
		<div class="col-xl-12 col-lg-7">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Data Pasok</h6>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<div class="d-flex flex-row align-items-center justify-content-between">
						<button type="button" data-toggle="modal" data-target="#modalTambahPasok" class="btn btn-success mb-4">Tambah Data</button>
					</div>
					<div class="table-responsive">
						<table class="table table-bordered" id="tabel-data-pasok">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Barang</th>
									<th>Jumlah Pasok</th>
									<th>Nama Pemasok</th>
									<th>Waktu Pasok</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach ($items as $item) { ?>
									<tr>
										<td><?= $i++; ?></td>
										<td><?= $item["nama_barang"]; ?></td>
										<td><?= $item["jumlah_pasok"]; ?></td>
										<td><?= $item["nama_pemasok"]; ?></td>
										<td><?= $item["tanggal_pasok"]; ?></td>
										<td>
											<a href="?page=edit-data-pasok&id=<?= $item["id"]; ?>" class="btn btn-sm btn-primary">Edit</a>
											<button type="button" data-toggle="modal" data-target="#modalHapus<?= $item["id"]; ?>" class="btn btn-sm btn-danger">Delete</button>
										</td>
									</tr>
									<?php include "include/data-pasok/modal/hapus-data.php"; ?>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include "include/data-pasok/modal/tambah-data.php"; ?>
<script>
	$(document).ready(function() {
		$("#tabel-data-pasok").DataTable();
	});
</script>