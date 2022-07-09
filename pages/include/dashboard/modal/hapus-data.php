<div class="modal fade" id="modalHapusLaporan<?= $cool["id"]; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalHapusLaporanLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>
			</div>
			<div class="modal-body">
				<?php
				$id = $cool["id"];
				$result = query("SELECT * FROM tb_kembalian WHERE id = $id");
				?>
				Apakah anda ingin menghapus transaksi <b class="text-warning"><?= $result[0]["kode_transaksi_kembalian"]; ?></b> ?
			</div>
			<div class="modal-footer">
				<button class="btn btn-white" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-danger" href="include/laporan/proses/proses-hapus.php?id=<?= $id; ?>&kode=<?= $result[0]["kode_transaksi_kembalian"]; ?>">Hapus</a>
			</div>
		</div>
	</div>
</div>