<?php require_once "../proses/koneksi/koneksi.php"; ?>
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
	<!-- Sidebar Toggle (Topbar) -->
	<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
		<i class="fa fa-bars"></i>
	</button>
	<!-- Topbar Search -->
	<div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
		<span>
			<?php
			date_default_timezone_set('Asia/Jakarta');
			$day = date("l, d F Y ");
			echo $day
			?>
		</span>
	</div>

	<!-- Topbar Navbar -->
	<ul class="navbar-nav ml-auto">

		<div class="topbar-divider d-none d-sm-block"></div>

		<!-- Nav Item - User Information -->
		<li class="nav-item dropdown no-arrow">
			<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<?php
				$user_id = $_SESSION["id"];
				$account = query("SELECT * FROM users WHERE id = $user_id");
				$profileName = $account[0]["nama"];
				?>
				<span class="mr-2 d-inline text-gray-600 small"><?= $profileName; ?></span>
			</a>
			<!-- Dropdown - User Information -->
			<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
				<a class="dropdown-item" href="?page=profile">
					<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
					Change Password
				</a>

				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
					<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
					Logout
				</a>
			</div>
		</li>
	</ul>
</nav>