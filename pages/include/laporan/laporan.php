<?php
if ($_SESSION["login"] !== "login") {
	header("location: ../index.php");
} else if ($_SESSION["level"] !== 'A') {
	header("location: ?page=home");
}
require_once "../proses/koneksi/koneksi.php";
$items = query("SELECT * FROM tb_kembalian ORDER BY tanggal_transaksi ASC");
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-12 col-lg-7">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="tabel-laporan">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode Transaksi</th>
									<th>Jumlah Bayar</th>
									<th>Kembalian</th>
									<th>Tanggal</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach ($items as $item) { ?>
									<tr>
										<td><?= $i++; ?></td>
										<td><?= $item["kode_transaksi_kembalian"]; ?></td>
										<td><?= $item["bayar"]; ?></td>
										<td><?= $item["kembalian"]; ?></td>
										<td><?= $item["tanggal_transaksi"]; ?></td>
										<td>
											<a href="?page=detail-laporan&id=<?= $item["id"]; ?>" class="btn btn-sm btn-primary">View</a>
											<button type="button" data-toggle="modal" data-target="#modalHapusLaporan<?= $item["id"]; ?>" class="btn btn-sm btn-danger">Delete</button>
										</td>
									</tr>
									<?php include "include/laporan/modal/hapus-data.php"; ?>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$("#tabel-laporan").DataTable();
	});
</script>