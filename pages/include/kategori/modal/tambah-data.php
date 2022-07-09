<div class="modal fade" id="modalTambahKategori" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalTambahKategoriLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTambahKategoriLabel">Masukkan Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="include/kategori/proses/proses-tambah.php" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="nama_kategori">Kategori</label>
						<input type="text" name="nama_kategori" class="form-control" required autocomplete="off">
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