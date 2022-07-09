<div class="modal fade" id="modalTambahPasok" data-backdrop="static" data-keyboard="false" aria-labelledby="modalTambahPasokLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTambahPasokLabel">Masukkan Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="include/data-pasok/proses/proses-tambah.php" method="post">
				<div class="modal-body">
					<div class="form-group row">
						<div class="col-sm-6">
							<label for="nama_barang" style="margin-bottom: 13px;">Nama Barang</label>
							<select name="nama_barang" id="nama_barang" class="js-example-basic-single" required>
								<option></option>
								<?php
								$barang = query("SELECT * FROM tb_barang ORDER BY nama_barang ASC");
								foreach ($barang as $row) {
								?>
									<option value="<?= $row['id']; ?>"><?= $row["nama_barang"]; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-sm-6">
							<label for="jumlah_pasok">Jumlah</label>
							<input type="number" name="jumlah_pasok" class="form-control" required autocomplete="off">
						</div>
					</div>
					<div class="form-group">
						<label for="nama_pemasok">Nama Pemasok</label>
						<input type="text" name="nama_pemasok" class="form-control" required autocomplete="off">
					</div>
					<div class="form-group">
						<label for="tanggal_pasok">Tanggal Pasok</label>
						<input type="date" name="tanggal_pasok" class="form-control" required autocomplete="off">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
					<button type="submit" name="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('.js-example-basic-single').select2({
			placeholder: "-pilih-",
			width: "100%",
			allowClear: true
		});
	});
</script>