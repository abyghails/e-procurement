<?php
if ($_SESSION["login"] !== "login") {
	header("location: ../index.php");
} else if ($_SESSION["level"] !== 'A') {
	header("location: ?page=home");
}
require_once "../proses/koneksi/koneksi.php";

$id = $_GET["id"];
$admin = query("SELECT * FROM users WHERE id = $id");
?>
<div class="container-fluid">
	<div class="row justify-content-center">
		<!-- Area Chart -->
		<div class="col-xl-12 col-sm-7">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
					<a href="?page=data-admin" class="text-warning"><ins>Back</ins></a>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<form action="include/data-admin/proses/proses-edit.php" method="POST">
						<input type="hidden" name="id" value="<?= $admin[0]["id"]; ?>">
						<div class="form-group">
							<label for="nama">Nama Admin</label>
							<input type="text" name="nama" class="form-control" value="<?= $admin[0]['nama']; ?>" required>
						</div>
						<div class="form-group">
							<label for="email">Email Admin</label>
							<input type="email" name="email" class="form-control" value="<?= $admin[0]['email']; ?>" required>
						</div>
						<button type="submit" name="submit" class="btn btn-warning">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>