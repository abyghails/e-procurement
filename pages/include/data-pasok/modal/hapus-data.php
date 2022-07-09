<div class="modal fade" id="modalHapus<?= $item["id"]; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
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
				$id = $item["id"];
				$result = query("SELECT * FROM tb_pasok WHERE id = $id");
				?>
				Apakah anda ingin menghapus data pasok <b class="text-warning"><?= $result[0]["nama_pemasok"]; ?></b> ?
			</div>
			<div class="modal-footer">
				<button class="btn btn-white" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-danger" href="include/data-pasok/proses/proses-hapus.php?id=<?= $id; ?>">Hapus</a>
			</div>
		</div>
	</div>
</div>