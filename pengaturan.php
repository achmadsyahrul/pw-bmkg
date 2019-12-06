<?php
session_start();
include "connect.php";
$user = $_GET['user'];
$select = "SELECT * FROM user WHERE username='$user'";
$detail = mysqli_query($link, $select);
$check = mysqli_num_rows($detail);
if(empty($_GET['user']) || $check < 1){
    header('location: index.php');
}
$data = mysqli_fetch_assoc($detail);
$title = "Pengaturan";
include_once "header.php";
?>

<body onload="startTime()" class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <p id="date" class="text-light my-auto"></p>
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link" href="index.php">Beranda</a>
                <a class="nav-item nav-link" href="terkini.php">Terkini</a>
                <a class="nav-item nav-link" href="akses_data.php">Akses Data</a>
                <?php
                if (isset($_SESSION['level']) && $_SESSION['level'] == 'admin') { ?>
                    <a class="nav-item nav-link" href="add.php">Tambah</a>
                <?php
                }
                if (empty($_SESSION['username'])) {
                    ?>
                    <a class="btn btn-outline-primary ml-3" href="login.php" role="button">Login</a>
                <?php
                } else {
                    ?>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Akun</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="pengaturan.php?user=<?= $_SESSION['username']; ?>">Pengaturan</a>
                        <a class="dropdown-item" href="process.php?log=out">Logout</a>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    </nav>
    <?php
	if (isset($_GET['pesan'])) {
		if ($_GET['pesan'] == "passbaru") { ?>
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
			} else if ($_GET['pesan'] == "passlama") { ?>
				<div class="row my-3 text-center mx-auto">
					<div class="col-3 mx-auto">
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							Password lama salah.
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
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4 mx-auto">
                <div class="row text-center detail-header">
                    <div class="col-12">
                        <h4 class="my-auto text-dark">
                            Foto Profil
                        </h4>
                    </div>
                </div>
                <div class="row text-center detail-info">
                    <div class="col-12">
                        <img src="<?= $data['foto']; ?>" width="100%">
                    </div>
                </div>
                <a class="btn btn-warning float-right mt-1 mb-3" href="" data-toggle="modal" data-target="#foto" role="button">Edit Foto</a>
            </div>
            <div class="col-md-7 mx-auto">
                <div class="row text-center detail-header">
                    <div id="myBtnContainer" class="col-12">
                        <button class="btn filter" onclick="filterSelection('info')">Detail Informasi</button>
                        <button class="btn" onclick="filterSelection('editnama')">Edit Informasi</button>
                        <button class="btn" onclick="filterSelection('editpass')">Edit Password</button>
                    </div>
                </div>
                <div class="row text-center detail-info">
                    <div class="col-12">
                        <div class="filterDiv info">
                        <table class="table table-hover text-left">
                            <tbody>
                                <tr>
                                    <td>Username</td>
                                    <td>
                                    <?= $data['username']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td><?= $data['nama'];?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td><?= $data['level']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                        <div class="filterDiv editnama">
                            <div class="container my-2">
                            <form action="process.php?editnama=<?= $data['id'] ?>" method="post" class="text-left" enctype="multipart/form-data">
                                <div class="form-group p-0">
                                    <label>Username</label>
                                    <input type="text" class="form-control form-control-md mb-3" name="username" value="<?= $data['username'];?>" placeholder="<?= $data['username']; ?>" autofocus required>
                                </div>
                                <div class="form-group p-0">
                                    <label>Nama</label>
                                    <input type="text" class="form-control form-control-md mb-3" value="<?= $data['nama']; ?>" placeholder="<?= $data['nama']; ?>" name="nama" required>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4 ml-auto">
                                        <input type="submit" class="btn btn-info btn-block" name="submit">
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                        <div class="filterDiv editpass">
                            <div class="container my-2">
                            <form action="process.php?editpass=<?= $data['id'] ?>" method="post" class="text-left" enctype="multipart/form-data">
                                <div class="form-group p-0">
                                    <label>Password Lama</label>
                                    <input type="password" class="form-control form-control-md mb-3" name="passlama" autofocus required>
                                </div>
                                <div class="form-group p-0">
                                    <label>Password Baru</label>
                                    <input type="password" class="form-control form-control-md mb-3" name="passbaru" autofocus>
                                </div>
                                <div class="form-group p-0">
                                    <label>Konfirmasi Password</label>
                                    <input type="password" class="form-control form-control-md mb-3" name="confirm" autofocus>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4 ml-auto">
                                        <input type="submit" class="btn btn-info btn-block" name="submit">
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
    <div class="modal fade" id="foto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalCenterTitle">Edit Foto Informasi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
                    <form action="process.php?editfotoprofil=<?= $data['id'] ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group p-0">
							<label>Foto Diri (maksimal 500 kb) : </label>
                            <input type="file" name="photo" id="photo" accept="image/*">
                            <br>
                            <small>Kosongkan/ langsung submit jika ingin menghapus foto</small>
						</div>
						<hr>
						<div class="row">
							<div class="col-sm-4 ml-auto">
								<input type="submit" class="btn btn-info btn-block" name="submit">
							</div>
						</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer class="fixed-bottom" style="background-color: rgb(20, 20, 30);">
        <div class="container">
            <div class="row align-items-end">
                <div class="col text-white text-center py-3 mt-2">
                    <p class="my-0">BMKG Fiktif &copy2019</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/date.js"></script>
    <script src="js/data-filter.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>