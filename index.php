<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
	<link rel="stylesheet" href="libraries/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="libraries/fontawesome/css/all.min.css" />
	<link rel="stylesheet" href="styles/main.css" />

	<title>E-Procurement - Login</title>
</head>

<body id="body-login">
	<section class="section-login">
		<div class="container">
			<div class="row justify-content-center align-content-center mt-5">
				<div class="col-sm-5">
					<div class="card card-login shadow p-4">
						<div class="card-body">
							<h4 class="text-center mb-4">Selamat Datang</h4>
							<form action="proses/proses-login.php" method="post">
								<div class="mb-3">
									<input type="text" class="form-control" name="email" placeholder="Masukkan Email" autocomplete="off" />
								</div>
								<div class="mb-3">
									<input type="password" class="form-control" name="password" placeholder="Masukkan Password" autocomplete="off" />
								</div>
								<div class="justify-content-center">
									<button type="submit" name="submit" class="btn btn-login btn-primary d-inline-block w-100">
										Login
									</button>
								</div>
								<div class="dropdown-divider mt-3 mb-5"></div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script src="libraries/jquery/jquery-3.4.1.min.js"></script>
	<!-- <script src="libraries/bootstrap/js/bootstrap.bundle.min.js"></script> -->
	<script src="libraries/bootstrap/js/bootstrap.min.js"></script>
	<script src="libraries/fontawesome/js/all.min.js"></script>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script>
		AOS.init();
	</script>
	<script src="script/main.js"></script>
</body>

</html>