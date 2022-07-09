<?php
session_start();
ob_start();
if ($_SESSION["login"] !== "login") {
	header("location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include "layouts/style.php"; ?>
	<title>Dashboard</title>
</head>

<body id="page-top">
	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- sidebar -->
		<?php include "layouts/sidebar.php"; ?>

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">
			<!-- Main Content -->
			<div id="content">
				<!-- Topbar -->
				<?php include "layouts/top-navbar.php"; ?>
				<!-- End of Topbar -->

				<?php
				if (isset($_GET["page"])) {
					$page = $_GET["page"];
					switch ($page) {
						case 'home':
							include "include/dashboard/dashboard.php";
							break;

							// data admin
						case 'data-admin':
							include "include/data-admin/data-admin.php";
							break;

						case 'edit-data-admin':
							include "include/data-admin/edit-data-admin.php";
							break;

							// data pelaksana
						case 'data-pelaksana':
							include "include/data-pelaksana/data-pelaksana.php";
							break;

						case 'edit-data-pelaksana':
							include "include/data-pelaksana/edit-data-pelaksana.php";
							break;

							// data direksi
						case 'data-direksi':
							include "include/data-direksi/data-direksi.php";
							break;

						case 'edit-data-direksi':
							include "include/data-direksi/edit-data-direksi.php";
							break;

							// kategori
						case 'kategori':
							include "include/kategori/kategori.php";
							break;

						case 'edit-kategori':
							include "include/kategori/edit-kategori.php";
							break;

							// barang
						case 'barang':
							include "include/barang/barang.php";
							break;

						case 'edit-barang':
							include "include/barang/edit-barang.php";
							break;

							// data pasok
						case 'data-pasok':
							include "include/data-pasok/data-pasok.php";
							break;

						case 'edit-data-pasok':
							include "include/data-pasok/edit-data-pasok.php";
							break;

							// transaksi
						case 'transaksi':
							include "include/transaksi/transaksi.php";
							break;

							// laporan
						case 'laporan':
							include "include/laporan/laporan.php";
							break;

						case 'detail-laporan':
							include "include/laporan/detail-laporan.php";
							break;

							// kelola profile
						case 'profile':
							include "include/profile/profile.php";
							break;

						default:
							echo "<center><h3>Maaf. Halaman tidak Di temukan";
							break;
					}
				} else {
					include "include/dashboard/dashboard.php";
				}
				?>
			</div>
			<!-- End of Main Content -->
			<!-- Footer -->
			<?php include "layouts/footer.php"; ?>
			<!-- End of Footer -->
		</div>
		<!-- End of Content Wrapper -->
	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">x</span>
					</button>
				</div>
				<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="../proses/logout.php">Logout</a>
				</div>
			</div>
		</div>
	</div>

	<?php ob_end_flush(); ?>
</body>

<!-- script -->
<?php include "layouts/script.php"; ?>

</html>