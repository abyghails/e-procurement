<?php
if ($_SESSION["login"] !== "login") {
	header("location: ../index.php");
} else if ($_SESSION["level"] !== 'A' && $_SESSION["level"] !== 'P') {
	header("location: ?page=home");
};
require_once "../proses/koneksi/koneksi.php";

$id = $_GET["id"];
$tbKembalian = query("SELECT * FROM tb_kembalian WHERE id = $id");
$kode_transaksi = $tbKembalian[0]["kode_transaksi_kembalian"];

// ambil data transaksi
$transaksiData = query("SELECT * FROM tb_barang INNER JOIN tb_transaksi ON tb_transaksi.barang_id = tb_barang.id WHERE kode_transaksi = '$kode_transaksi'");

// data user
$user_id = $transaksiData[0]["user_id"];
$userData = query("SELECT * FROM users WHERE id = $user_id");

// data untuk total
$counting = query("SELECT SUM(total_harga) AS jumlah FROM tb_transaksi WHERE kode_transaksi = '$kode_transaksi'");
?>
<div class="container-fluid">
	<div class="row justify-content-center">
		<!-- Area Chart -->
		<div class="col-xl-12">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Detail Transaksi</h6>
					<a href="?page=laporan" class="text-warning"><ins>Back</ins></a>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<div class="row mb-4">
						<div class="col-md-8">
							<table>
								<tr class="text-primary">
									<td width="22%">Kode Transaksi</td>
									<td width="1%">:</td>
									<td><?= $kode_transaksi; ?></td>
								</tr>
								<tr class="text-primary">
									<td width="22%">Tanggal</td>
									<td width="1%">:</td>
									<td><?= $tbKembalian[0]["tanggal_transaksi"]; ?></td>
								</tr>
							</table>
						</div>
						<div class="col-md-4">
							<table>
								<tr class="text-primary">
									<td width="22%">Kasir</td>
									<td width="1%">:</td>
									<td><?= $userData[0]["nama"]; ?></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="table-responsive table-detail-transaksi">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>Barang</th>
											<th>Jumlah</th>
											<th>Harga</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($transaksiData as $cool) {
										?>
											<tr>
												<td><?= $cool["nama_barang"]; ?></td>
												<td><?= $cool["jumlah_beli"]; ?></td>
												<td><?= $cool["harga_barang"]; ?></td>
												<td><?= $cool["total_harga"]; ?></td>
											</tr>
										<?php } ?>
										<tr>
											<td colspan="3" class="text-right">Total Harga :</td>
											<td><?= $counting[0]["jumlah"]; ?></td>
										</tr>
										<tr>
											<td colspan="3" class="text-right">Bayar :</td>
											<td><?= $tbKembalian[0]["bayar"]; ?></td>
										</tr>
										<tr>
											<td colspan="3" class="text-right">Kembalian :</td>
											<td><?= $tbKembalian[0]["kembalian"]; ?></td>
										</tr>
									</tbody>
								</table>
							</div>

							<a href="include/laporan/cetak/cetak.php?id=<?= $id; ?>" class="btn btn-primary">Cetak Nota</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>