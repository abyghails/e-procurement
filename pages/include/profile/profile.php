<?php
if ($_SESSION["login"] !== "login") {
	header("location: ../index.php");
}
require_once "../proses/koneksi/koneksi.php";
$id = $_SESSION["id"];
$userData = query("SELECT * FROM users WHERE id = '$id'");
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-12 col-lg-7">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
					<a href="?page=home" class="text-warning"><ins>Home</ins></a>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<div class="container">
						<div class="row">
							<div class="col-md-11">
								<form action="include/profile/proses/edit-profile.php" method="POST">
									<div class="form-group row">
										<label for="current-pass" class="col-sm-4 col-form-label text-right">Current Password</label>
										<div class="col-sm-8">
											<input type="password" name="password" id="password" class="form-control" required>
										</div>
									</div>
									<div class="form-group row">
										<label for="new-pass" class="col-sm-4 col-form-label text-right">New Password</label>
										<div class="col-sm-8">
											<input type="password" name="new_password" id="new_password" class="form-control" required>
										</div>
									</div>
									<div class="form-group row">
										<label for="confirm-pass" class="col-sm-4 col-form-label text-right">New Confirm Password</label>
										<div class="col-sm-8">
											<input type="password" name="new_password2" id="new_password2" class="form-control" required>
											<div id="info-feedback" class="invalid-feedback">
												Password Tidak Cocok
											</div>
											<div class="valid-feedback">
												Oke!!! Cocok!
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-sm-4 col-form-label text-right"></label>
										<div class="col-sm-8">
											<button class="btn btn-primary">Update Password</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- config UI form -->
<script>
	$(document).ready(function() {
		$("#new_password2").keyup(function() {
			let pass1 = $("#new_password").val();
			let pass2 = $("#new_password2").val();
			if (pass1 !== pass2) {
				$("#new_password2").addClass("is-invalid");
				$("#new_password2").removeClass("is-valid");
			} else {
				$("#new_password2").removeClass("is-invalid");
				$("#new_password2").addClass("is-valid");
			}
		});
	});
</script>