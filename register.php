<?php
    session_start();
    if(isset($_SESSION['username'])){
        header('location: index.php');
	}
	$title = "Daftar Akun";
	include_once "header.php";
?>

<body onload="startTime()" class="bg-navy">
	<nav class="navbar navbar-dark bg-dark">
		<p id="date" class="text-light my-auto"></p>
		<div class="navbar-nav ml-auto">
			<a class="nav-item nav-link" href="index.php"><i class="fa fa-home"></i> Home</a>
		</div>
	</nav>
	<?php
	if (isset($_GET['pesan'])) {
		if ($_GET['pesan'] == "min") { ?>
			<div class="row my-3 text-center mx-auto">
				<div class="col-3 mx-auto">
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						Password minimal 6 karakter.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			</div>
		<?php
			} else if ($_GET['pesan'] == "confirm") { ?>
			<div class="row my-3 text-center mx-auto">
				<div class="col-3 mx-auto">
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						Password tidak sesuai.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			</div>
		<?php
			} else if ($_GET['pesan'] == "terdaftar") { ?>
				<div class="row my-3 text-center mx-auto">
					<div class="col-3 mx-auto">
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							Pendaftaran gagal. Username sudah terdaftar.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
				</div>
		<?php
			} else if ($_GET['pesan'] == "file_size") { ?>
				<div class="row my-3 text-center mx-auto">
					<div class="col-3 mx-auto">
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							Size foto terlalu besar.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
				</div>
		<?php
			}else if ($_GET['pesan'] == "file_type") { ?>
				<div class="row my-3 text-center mx-auto">
					<div class="col-3 mx-auto">
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							Foto profil gagal diupload karena bukan image.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
				</div>
		<?php
			}
	}
	?>
	<div class="container my-5">
		<div class="row">
			<div class="col-sm-6 col-md-4 mx-auto bg-light p-4 login">
				<h3 class="text-center text-info pb-3 mb-3 border-bottom">REGISTER</h3>
				<form action="process.php?log=daftar" method="post" enctype="multipart/form-data">
					<div class="form-group p-0">
						<input type="text" class="form-control form-control-lg mb-3" placeholder="Nama" name="name" autofocus required>
					</div>
					<div class="form-group p-0">
						<input type="text" class="form-control form-control-lg mb-3" placeholder="Username" name="username" required>
					</div>
					<div class="form-group p-0">
						<input type="password" class="form-control form-control-lg mb-3" placeholder="Password" name="password" required>
					</div>
					<div class="form-group p-0">
						<input type="password" class="form-control form-control-lg mb-3" placeholder="Confirm Password" name="confirm" required>
					</div>
					<div class="form-group p-0">
						<label>Foto Diri (maksimal 500 kb) : </label>
						<input type="file" name="photo" id="photo" accept="image/*">
					</div>
					<input type="submit" class="btn btn-info btn-lg btn-block" name="submit">
					<hr>
					<div class="text-center">
						Sudah punya akun? <a href="login.php">Login disini.</a><br>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Footer -->
	<footer style="background-color: rgb(20, 20, 30);">
		<div class="container">
			<div class="row align-items-end">
				<div class="col text-white text-center py-2">
					<p class="my-0">BMKG Fiktif &copy2019</p>
				</div>
			</div>
		</div>
	</footer>
	<!-- Akhir Footer -->
	<script src="js/date.js"></script>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
