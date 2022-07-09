<?php
require_once "../proses/koneksi/koneksi.php";
?>
<div class="container-fluid">
	<!-- Content Row -->
	<div class="row">
		<!-- Earnings (Monthly) Card Example -->
		<?php $countBarang = query("SELECT COUNT(id) AS totalBarang FROM tb_barang"); ?>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
								Jumlah Barang</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countBarang[0]["totalBarang"]; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-calendar fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<?php $countPasok = query("SELECT COUNT(id) AS totalPasok FROM tb_pasok"); ?>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
								Jumlah Pasok</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countPasok[0]["totalPasok"]; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php $countTransaksi = query("SELECT COUNT(id) AS totalTransaksi FROM tb_kembalian"); ?>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-dark shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
								Jumlah Transaksi</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countTransaksi[0]['totalTransaksi']; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>


		<!-- Pending Requests Card Example -->
		<?php $countKasir = query("SELECT COUNT(id) AS totalKasir FROM users WHERE level = 'A'"); ?>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
								Jumlah Kasir</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countKasir[0]["totalKasir"]; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-comments fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Content Row -->
	<div class="row">
		<!-- Area Chart -->
		<div class="col-xl-12 col-lg-7">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Data - data Transaksi</h6>
				</div>
				<!-- Card Body -->
				<?php
				$i = 1;
				$dataTransaksi = query("SELECT * FROM tb_kembalian ORDER BY kode_transaksi_kembalian ASC");
				?>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="tabel-transaksi-dashboard">
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
								<?php foreach ($dataTransaksi as $cool) { ?>
									<tr>
										<td><?= $i++; ?></td>
										<td><?= $cool["kode_transaksi_kembalian"]; ?></td>
										<td><?= $cool["bayar"]; ?></td>
										<td><?= $cool["kembalian"]; ?></td>
										<td><?= $cool["tanggal_transaksi"]; ?></td>
										<td>
											<a href="?page=detail-laporan&id=<?= $cool["id"]; ?>" class="btn btn-primary">View</a>
											<?php if ($_SESSION["level"] == "A") { ?>
												<button type="button" data-toggle="modal" data-target="#modalHapusLaporan<?= $cool["id"]; ?>" class="btn btn-danger">Delete</button>
											<?php } ?>
										</td>
									</tr>
									<?php include "include/dashboard/modal/hapus-data.php"; ?>
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
		$("#tabel-transaksi-dashboard").DataTable();
	});
</script>