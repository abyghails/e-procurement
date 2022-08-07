<?php
if ($_SESSION["login"] !== "login") {
	header("location: ../index.php");
} else if ($_SESSION["level"] !== 'A' && $_SESSION["level"] !== 'P') {
	header("location: ?page=home");
};
require_once "../proses/koneksi/koneksi.php";
$items = query("SELECT * FROM kategori ORDER BY nama_kategori ASC");
?>
<div class="container-fluid">
	<div class="row">
		<!-- Area Chart -->
		<div class="col-xl-12 col-lg-7">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<button type="button" data-toggle="modal" data-target="#modalTambahKategori" class="btn btn-success mb-4">Tambah Data</button>
					<div class="table-responsive">
						<table class="table table-bordered" id="tabel-kategori">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Kategori</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach ($items as $item) { ?>
									<tr>
										<td><?= $i++; ?></td>
										<td><?= $item["nama_kategori"]; ?></td>
										<td>
											<a href="?page=edit-kategori&id=<?= $item["id"]; ?>" class="btn btn-sm btn-primary">Edit</a>
											<button type="button" data-toggle="modal" data-target="#modalHapus<?= $item["id"]; ?>" class="btn btn-sm btn-danger">Delete</button>
										</td>
									</tr>
									<?php include "include/kategori/modal/hapus-data.php"; ?>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include "include/kategori/modal/tambah-data.php"; ?>
<script>
	$(document).ready(function() {
		$("#tabel-kategori").DataTable();
	});
</script>