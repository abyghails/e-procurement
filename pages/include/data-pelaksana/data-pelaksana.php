<?php
if ($_SESSION["login"] !== "login") {
	header("location: ../index.php");
} else if ($_SESSION["level"] !== 'A') {
	header("location: ?page=home");
}
require_once "../proses/koneksi/koneksi.php";
$items = query("SELECT * FROM users WHERE level = 'P'");
?>
<div class="container-fluid">
	<div class="row">
		<!-- Area Chart -->
		<div class="col-xl-12 col-lg-7">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Data Pelaksana</h6>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<button type="button" data-toggle="modal" data-target="#modalTambahPelaksana" class="btn btn-success mb-4">Tambah Data</button>
					<div class="table-responsive">
						<table class="table table-bordered" id="tabel-data-pelaksana">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Email</th>
									<th>Password</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach ($items as $item) { ?>
									<tr>
										<td><?= $i++; ?></td>
										<td><?= $item["nama"]; ?></td>
										<td><?= $item["email"]; ?></td>
										<td>Password tidak ditampilkan</td>
										<td>
											<a href="?page=edit-data-pelaksana&id=<?= $item["id"]; ?>" class="btn btn-sm btn-primary">Edit</a>
											<button type="button" data-toggle="modal" data-target="#modalHapus<?= $item["id"]; ?>" class="btn btn-sm btn-danger">Delete</button>
										</td>
									</tr>
									<?php include "include/data-pelaksana/modal/hapus-data.php"; ?>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include "include/data-pelaksana/modal/tambah-data.php"; ?>
<script>
	$(document).ready(function() {
		$("#tabel-data-pelaksana").DataTable();
	});
</script>