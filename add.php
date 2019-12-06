<?php
session_start();
if (empty($_SESSION['username'])) {
	header('location: login.php?pesan=belum_login');
} else if (isset($_SESSION['level']) && $_SESSION['level'] == 'user') {
	header('location: index.php');
}
$title = "Tambah";
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
			}else if ($_GET['pesan'] == "sukses") { ?>
				<div class="row my-3 text-center mx-auto">
					<div class="col-3 mx-auto">
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							Sukses
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
	<div class="form">
		<div class="row">
			<div class="col-sm-6 col-md-4 mx-auto bg-light p-4 login">

				<h3 class="text-center text-info pb-3 mb-3 border-bottom">Tambah</h3>
				<div class="row">
					<div class="col-md-6">
						<a href="" data-toggle="modal" data-target="#admin">
							<img src="images/admin.png" width="100%" class="d-none d-md-block">
							<h5 class="text-center text-dark">Admin</h5>
						</a>
					</div>
					<div class="col-md-6">
						<a href="" data-toggle="modal" data-target="#gempa">
							<img src="images/icon.png" width="100%" class="d-none d-md-block">
							<h5 class="text-center text-dark">Data Gempa</h5>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer -->
	<footer class="fixed-bottom" style="background-color: rgb(20, 20, 30);">
		<div class="container">
			<div class="row align-items-end">
				<div class="col text-white text-center py-2">
					<p class="my-0">BMKG Fiktif &copy2019</p>
				</div>
			</div>
		</div>
	</footer>
	<!-- Akhir Footer -->

	<!-- Modal Admin -->
	<div class="modal fade" id="admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalCenterTitle">Tambah Admin</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="process.php?add=admin" method="post" enctype="multipart/form-data">
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
						<hr>
						<div class="row">
							<div class="col-sm-4 ml-auto">
								<input type="submit" class="btn btn-info btn-lg btn-block" name="submit">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Admin -->
	<div class="modal fade" id="gempa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Gempa</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="process.php?add=data" method="post" enctype="multipart/form-data">
						<div class="form-group p-0">
							<label>Tanggal</label>
							<input type="date" class="form-control form-control-lg mb-3" name="date" autofocus required>
						</div>
						<div class="form-group p-0">
							<div class="row">
								<div class="col-6">
									<label>Jam : Menit</label>
									<input type="time" class="form-control form-control-lg mb-3" name="time" required>
								</div>
								<div class="col-6">
									<label>: Detik</label>
									<input type="number" class="form-control form-control-lg mb-3" name="sec" min="0" max="59" placeholder=":--" 
									onchange="if(parseInt(this.value,10)<10)this.value='0'+this.value;else if(parseInt(this.value,10)>59)this.value='59';" required>
								</div>
							</div>
						</div>
						<div class="form-group p-0">
							<label>Latitude / Lintang</label>
							<input type="number" class="form-control form-control-lg mb-3" placeholder="-11 sampai 6" name="lat" min="-11" max="6" step="0.01" required>
						</div>
						<div class="form-group p-0">
							<label>Longitude / Bujur</label>
							<input type="number" class="form-control form-control-lg mb-3" placeholder="95 sampai 141" name="lon" min="95" max="141" step="0.01" required>
						</div>
						<div class="form-group p-0">
							<label>Depth / Kedalaman</label>
							<input type="number" class="form-control form-control-lg mb-3" placeholder="Dalam Km" name="dep" min="1" step="1" required>
						</div>
						<div class="form-group p-0">
							<label>Magnitudo</label>
							<input type="number" class="form-control form-control-lg mb-3" placeholder="Magnitudo" name="mag" min="1" step="0.1" required>
						</div>
						<div class="form-group p-0">
							<label>Sumber Gempa</label><br>
							<select class="custom-select" name="mountain">
								<option value="No">Tektonik</option>
								<option value="Yes">Vulkanik</option>
							</select>
						</div>
						<div class="form-group p-0">
							<label>Region / Wilayah</label>
							<input type="text" class="form-control form-control-lg mb-3" placeholder="Region" name="region" required>
						</div>
						<div class="form-group p-0">
							<label>Foto Informasi (maksimal 500 kb) : </label>
							<input type="file" name="photo" id="photo" accept="image/*">
						</div>
						<hr>
						<div class="row">
							<div class="col-sm-4 ml-auto">
								<input type="submit" class="btn btn-info btn-lg btn-block" name="submit">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="js/date.js"></script>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>