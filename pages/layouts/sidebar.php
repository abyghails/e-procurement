		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-shopping-cart"></i>
				</div>
				<div class="sidebar-brand-text mx-3">PROCURMENT</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item active">
				<a class="nav-link" href="index.php">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Interface
			</div>

			<!-- Nav Item - Pages Collapse Menu -->
			<!-- <li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
					<i class="fas fa-fw fa-cog"></i>
					<span>Components</span>
				</a>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Custom Components:</h6>
						<a class="collapse-item" href="buttons.html">Buttons</a>
						<a class="collapse-item" href="cards.html">Cards</a>
					</div>
				</div>
			</li> -->
			<?php if ($_SESSION["level"] == "A" || $_SESSION["level"] == "P") { ?>
				<!-- Nav Item - menu -->
				<li class="nav-item">
					<a class="nav-link" href="?page=data-admin">
						<i class="fas fa-fw fa-user"></i>
						<span>Data Admin</span></a>
				</li>

				<!-- Nav Item - menu -->
				<li class="nav-item">
					<a class="nav-link" href="?page=data-pelaksana">
						<i class="fas fa-fw fa-users"></i>
						<span>Data Pelaksana</span></a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="?page=data-direksi">
						<i class="fas fa-fw fa-users"></i>
						<span>Data Direksi</span></a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="?page=kategori">
						<i class="fas fa-fw fa-book"></i>
						<span>Kategori</span></a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="?page=barang">
						<i class="fas fa-fw fa-database"></i>
						<span>Barang</span></a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="?page=data-pasok">
						<i class="fas fa-fw fa-briefcase"></i>
						<span>Data Pasok</span></a>
				</li>
			<?php } ?>

			<li class="nav-item">
				<a class="nav-link" href="?page=transaksi">
					<i class="fas fa-fw fa-shopping-basket"></i>
					<span>Transaksi</span></a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="?page=laporan">
					<i class="fas fa-fw fa-file"></i>
					<span>Laporan</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->