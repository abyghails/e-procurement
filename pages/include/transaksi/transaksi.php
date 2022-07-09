<?php
if ($_SESSION["login"] !== "login") {
	header("location: ../index.php");
} else if ($_SESSION["level"] !== 'A' && $_SESSION["level"] !== "P") {
	header("location: ?page=home");
}
require_once "../proses/koneksi/koneksi.php";
$items = query("SELECT * FROM kategori ORDER BY nama_kategori ASC");
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-12 col-lg-7">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Input Transaksi</h6>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<?php
					$trans = query("SELECT MAX(kode_transaksi) AS kodeBesar FROM tb_transaksi");
					$kodeBar = $trans[0]["kodeBesar"];

					$urut = (int) substr($kodeBar, 3, 3);
					$urut++;

					$huruf = "TR";
					$kodeBar = $huruf . sprintf("%03s", $urut);
					?>
					<span class="text-primary d-block mb-2">Kode Transaksi : <?= $kodeBar; ?>
					</span>
					<form action="" id="form-data-barang">
						<div class="form-group row">
							<div class="col-sm-12">
								<input type="hidden" class="d-none" id="kode-trans" name="kode_trans" value="<?= $kodeBar; ?>">
								<label for="kode_barang">Masukan Kode Barang (Scan/Manual)</label>
								<input type="text" name="kode_barang" id="kode_barang" onkeyup="otomatis()" class="form-control" required>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-4">
								<label for="nama_barang">Nama Barang</label>
								<input type="text" name="nama_barang" id="nama_barang" class="form-control" disabled>
							</div>
							<div class="col-md-4">
								<label for="harga_barang">Harga Barang</label>
								<input type="text" name="harga_barang" id="harga_barang" class="form-control" disabled>
							</div>
							<div class="col-md-4">
								<label for="jumlah">Jumlah</label>
								<input type="number" name="jumlah" id="jumlah" class="form-control" autocomplete="off" required>
							</div>
						</div>
						<div class="d-flex justify-content-center">
							<button type="button" id="submit-barang" class="btn btn-success">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<script>
			$(document).ready(function() {
				$("#submit-barang").click(function() {
					let kode_barang = $("#kode_barang").val();
					let kode_trans = $("#kode-trans").val();
					let nama_barang = $("#nama_barang").val();
					let harga_barang = $("#harga_barang").val();
					let jumlah = $("#jumlah").val();
					if (kode_barang !== "" && jumlah !== "") {
						$.ajax({
							type: "POST",
							url: "include/transaksi/ajax/proses-data-transaksi.php",
							data: "kode_trans=" + kode_trans + "&kode_barang=" + kode_barang + "&nama_barang=" + nama_barang + "&harga_barang=" + harga_barang + "&jumlah=" + jumlah,
							success: function(data) {
								location.reload();
							}
						});
					} else {
						alert("Form Tidak Boleh Kosong");
					}
				});
			});
		</script>

		<div class="col-md-8">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
				</div>
				<?php
				$dataSementara = query("SELECT * FROM tb_barang INNER JOIN tb_sementara ON tb_sementara.barang_id = tb_barang.id ORDER BY tanggal_beli DESC");
				$countData = query("SELECT SUM(total_harga) AS harga FROM tb_sementara");
				?>
				<!-- Card Body -->
				<div class="card-body">
					<div class="table-responsive table-data-transaksi-pay">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Barang</th>
									<th>Jumlah</th>
									<th>Harga</th>
									<th>Total</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($dataSementara as $a) { ?>
									<tr>
										<td><?= $a["nama_barang"]; ?></td>
										<td><?= $a["jumlah_beli"]; ?></td>
										<td><?= $a["harga_barang"]; ?></td>
										<td><?= $a["total_harga"]; ?></td>
										<td>
											<button type="button" id="delete-button" barang-id="<?= $a['id']; ?>" class="btn btn-danger btn-sm">delete</button>
										</td>
									</tr>
								<?php } ?>
								<tr>
									<td colspan="3" class="text-right">Total Harga :</td>
									<td><?= $countData[0]["harga"]; ?></td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<script>
			$(document).ready(function() {
				$("body").on("click", "#delete-button", function() {
					var id = $(this).attr("barang-id");
					$.ajax({
						type: "POST",
						url: "include/transaksi/proses/proses-hapus.php",
						data: "id=" + id,
						success: function(data) {
							location.reload();
						}
					});
				});
			});
		</script>

		<div class="col-md-4">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Pembayaran</h6>
				</div>
				<!-- Card Body -->
				<form action="include/transaksi/proses/proses-sukses-transaksi.php" method="POST">
					<div class="card-body">
						<div class="form-group">
							<input type="hidden" name="trans_kode" value="<?= $kodeBar; ?>">
							<input type="hidden" name="harga" id="harga" value="<?= $countData[0]['harga']; ?>">
							<label for="bayar">Bayar</label>
							<input type="number" name="bayar" id="bayar" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="kembalian">Kembalian</label>
							<input type="text" name="kembalian" id="kembalian" class="form-control" readonly>
						</div>
						<button type="submit" class="btn btn-success">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<!-- hitung kembalian -->
<input type="hidden" name="harga" id="harga" value="<?= $countData[0]['harga']; ?>">
<script>
	$(document).ready(function() {
		$("#bayar").keyup(function() {
			let bayar = $("#bayar").val();
			let harga = $("#harga").val();
			let kembalian = bayar - harga;
			if (!isNaN(kembalian)) {
				if (kembalian < 0) {
					$("#kembalian").val("0");
				} else {
					$("#kembalian").val(kembalian);
				}
			}
		});
	});
</script>


<!-- data-barang -->
<script>
	function otomatis() {
		$(document).ready(function() {
			var kode_barang = $("#kode_barang").val();
			$.ajax({
				dataType: "json",
				url: 'include/transaksi/ajax/data-barang.php',
				data: "kode=" + kode_barang,
				success: function(response) {
					var json = response;
					var obj = JSON.parse(JSON.stringify(json));
					$('#nama_barang').val(obj.nama_barang);
					$('#harga_barang').val(obj.harga_barang);
				},
			});
		});
	}
</script>