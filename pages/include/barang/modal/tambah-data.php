<div class="modal fade" id="modalTambahBarang" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalTambahBarangLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTambahBarangLabel">Masukkan Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="include/barang/proses/proses-tambah.php" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="kode_barang">Kode Barang</label>
						<input type="text" name="kode_barang" class="form-control" required autocomplete="off">
					</div>
					<div class="form-group">
						<label for="nama_barang">Nama Barang</label>
						<input type="text" name="nama_barang" class="form-control" required autocomplete="off">
					</div>
					<div class="form-group">
						<label for="kategori">Kategori</label>
						<select name="kategori" id="kategori" class="form-control">
							<option value="pilih" selected>-pilih-</option>
							<?php
							$kategori = query("SELECT * FROM kategori ORDER BY nama_kategori ASC");
							foreach ($kategori as $item) :
							?>
								<option value="<?= $item['id']; ?>"><?= $item["nama_kategori"]; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="jumlah">Jumlah</label>
						<input type="number" name="jumlah" class="form-control" required autocomplete="off">
					</div>
					<div class="form-group">
						<label for="harga">Harga</label>
						<input type="number" name="harga" class="form-control" required autocomplete="off">
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