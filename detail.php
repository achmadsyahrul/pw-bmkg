<?php
session_start();
include "connect.php";
$id = $_GET['id'];
$select = "SELECT * FROM gempa WHERE id='$id'";
$title = "Detail";
$detail = mysqli_query($link, $select);
$check = mysqli_num_rows($detail);
if(empty($_GET['id']) || $check < 1){
    header('location: terkini.php');
}
$data = mysqli_fetch_assoc($detail);
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
		if ($_GET['pesan'] == "file_size") { ?>
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
                            Foto Informasi
                        </h4>
                    </div>
                </div>
                <div class="row text-center detail-info">
                    <div class="col-12">
                        <img src="<?= $data['foto']; ?>" width="100%">
                    </div>
                </div>
                <?php 
                    if(isset($_SESSION['level']) && $_SESSION['level']=='admin'){
                ?>
                <a class="btn btn-warning float-right mt-1 mb-3" href="" data-toggle="modal" data-target="#foto" role="button">Edit Foto</a>
                <?php 
                    }
                ?>
            </div>
            <div class="col-md-7 mx-auto">
                <div class="row text-center detail-header">
                    <div class="col-12">
                        <?php 
                            if(empty($_SESSION['level']) || $_SESSION['level']=='user'){
                        ?>
                        <h4 class="my-auto text-dark">
                            Detail Informasi
                        </h4>
                        <?php 
                            }
                            else if($_SESSION['level']=='admin'){
                        ?>
                        <div class="row">
                            <div id="myBtnContainer" class="col-xl-7 col-lg-8 col-md-11 mx-auto">
                                <button class="btn filter" onclick="filterSelection('info')">Detail Informasi</button>
                                <button class="btn" onclick="filterSelection('edit')">Edit Informasi</button>
                            </div>
                        </div>
                        <?php 
                            }
                        ?>
                    </div>
                </div>
                <div class="row text-center detail-info">
                    <div class="col-12">
                        <?php  
                            if(isset($_SESSION['level']) && $_SESSION['level']=='admin'){
                        ?>
                        <div class="filterDiv info">
                        <?php 
                            }
                        ?>
                        <table class="table table-hover text-left">
                            <tbody>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>
                                        <?php
                                            $tgl = date("d", strtotime($data['tanggal']));
                                            $bulan = date("m", strtotime($data['tanggal']));
                                            $tahun = date("Y", strtotime($data['tanggal']));
                                            if($bulan==1){
                                                $bulan="Januari";
                                            }
                                            if($bulan==2){
                                                $bulan="Februari";
                                            }
                                            if($bulan==3){
                                                $bulan="Maret";
                                            }
                                            if($bulan==4){
                                                $bulan="April";
                                            }
                                            if($bulan==5){
                                                $bulan="Mei";
                                            }
                                            if($bulan==6){
                                                $bulan="Juni";
                                            }
                                            if($bulan==7){
                                                $bulan="Juli";
                                            }
                                            if($bulan==8){
                                                $bulan="Agustus";
                                            }
                                            if($bulan==9){
                                                $bulan="September";
                                            }
                                            if($bulan==10){
                                                $bulan="Oktober";
                                            }
                                            if($bulan==11){
                                                $bulan="November";
                                            }
                                            if($bulan==12){
                                                $bulan="Desember";
                                            }
                                            echo $tgl. " ". $bulan . " ". $tahun;
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Waktu</td>
                                    <td><?= $data['waktu'] . " WIB"; ?></td>
                                </tr>
                                <tr>
                                    <td>Magnitudo</td>
                                    <td><?= $data['mag']; ?></td>
                                </tr>
                                <tr>
                                    <td>Kedalaman</td>
                                    <td><?= $data['dep'] . " Km"; ?></td>
                                </tr>
                                <tr>
                                    <td>Wilayah</td>
                                    <td><a id="<?= "gempa" . $data['id']; ?>" href="#map"><?= $data['region']; ?></td>
                                </tr>
                                <tr>
                                    <td>Latitude / Lintang</td>
                                    <td>
                                        <?php 
                                            if($data['lat']<0) {
                                                $lintang = "LS";
                                                $lat = $data['lat']*-1;
                                            }
                                            else {
                                                $lintang = "LU";
                                                $lat = $data['lat'];
                                            }
                                            echo $lat."<span>&#176;</span> ".$lintang;
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Longitude / Bujur</td>
                                    <td>
                                        <?php 
                                            $bujur = "BT";
                                            echo $data['lon']."<span>&#176;</span> ".$bujur;
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sumber</td>
                                    <td><?php if ($data['mountain'] == 'Yes') echo "Vulkanik";
                                        else echo "Tektonik"; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php 
                            if(isset($_SESSION['level']) && $_SESSION['level']=='admin'){
                        ?>
                        </div>
                        <div class="filterDiv edit">
                            <div class="container my-2">
                            <form action="process.php?editdata=<?= $data['id'] ?>" method="post" class="text-left" enctype="multipart/form-data">
                                <div class="form-group p-0">
                                    <label>Tanggal</label>
                                    <input type="date" class="form-control form-control-md mb-3" name="date" value="<?= $data['tanggal'];?>" autofocus required>
                                </div>
                                <div class="form-group p-0">
                                    <div class="row">
                                        <div class="col-6">
                                            <?php 
                                                $time = date("H:i", strtotime($data['waktu']));
                                                $sec = date("s", strtotime($data['waktu']))
                                            ?>
                                            <label>Jam : Menit</label>
                                            <input type="time" class="form-control form-control-md mb-3" name="time" value="<?= $time; ?>" required>
                                        </div>
                                        <div class="col-6">
                                            <label>: Detik</label>
                                            <input type="number" class="form-control form-control-md mb-3" name="sec" min="0" max="59" value="<?= $sec; ?>" placeholder=":--" onchange="if(parseInt(this.value,10)<10)this.value='0'+this.value;" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group p-0">
                                    <label>Latitude / Lintang</label>
                                    <input type="number" class="form-control form-control-md mb-3" value="<?= $data['lat']; ?>" placeholder="-11 sampai 6" name="lat" min="-11" max="6" step="0.01" required>
                                </div>
                                <div class="form-group p-0">
                                    <label>Longitude / Bujur</label>
                                    <input type="number" class="form-control form-control-md mb-3" value="<?= $data['lon']; ?>" placeholder="95 sampai 141" name="lon" min="95" max="141" step="0.01" required>
                                </div>
                                <div class="form-group p-0">
                                    <label>Depth / Kedalaman</label>
                                    <input type="number" class="form-control form-control-md mb-3" value="<?= $data['dep']; ?>" placeholder="Dalam Km" name="dep" min="10" step="1" required>
                                </div>
                                <div class="form-group p-0">
                                    <label>Magnitudo</label>
                                    <input type="number" class="form-control form-control-md mb-3" value="<?= $data['mag']; ?>" placeholder="Magnitudo" name="mag" min="1" step="0.1" required>
                                </div>
                                <div class="form-group p-0">
                                    <label>Sumber Gempa</label><br>
                                    <select class="custom-select" name="mountain">
                                        <?php 
                                            if($data['mountain']=='No'){
                                        ?>
                                        <option value="No">Tektonik</option>
                                        <option value="Yes">Vulkanik</option>
                                        <?php 
                                            }
                                            else{
                                        ?>
                                        <option value="Yes">Vulkanik</option>
                                        <option value="No">Tektonik</option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group p-0">
                                    <label>Region / Wilayah</label>
                                    <input type="text" class="form-control form-control-md mb-3" value="<?= $data['region']; ?>" placeholder="Region" name="region" required>
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
                        <?php 
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 text-center detail-header">
            <div class="col-12">
            <h4 class="my-auto text-dark">
                Titik Gempa (Map)
            </h4>
            </div>
        </div>
        <div class="row mb-5 py-3 text-center detail-info">
            <div class="col-12">
                <div id="map"> </div>
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
                    <form action="process.php?editfotoinfo=<?= $data['id'] ?>" method="post" enctype="multipart/form-data">
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
    <footer style="background-color: rgb(20, 20, 30);">
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
    <script>
        var mymap = L.map('map').setView([-0.789275, 113.9213257], 4);
        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiYWNobWFkc3lhaHJ1bCIsImEiOiJjazMybzF2bXIwZTkyM2Rubzc5Mnp5ZDIyIn0.M0wr_PNJaulGW_tky6sayw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox.streets',
            accessToken: 'your.mapbox.access.token'
        }).addTo(mymap);
        var titikGempa = L.icon({
            iconUrl: 'images/pulse.gif',
            iconSize: [40, 40], // size of the icon
        });
        var markers = [];
        var gempa<?= $data['id']; ?> = L.marker([<?= $data['lat']; ?>, <?= $data['lon']; ?>], {
            icon: titikGempa,
            title: "<?= "gempa".$data['id']; ?>"
        }).addTo(mymap).bindPopup("<b><?= $data['region']; ?></b><br>Magnitudo = <?= $data['mag']; ?>.");
        markers.push(gempa<?= $data['id']; ?>);

        function markerFunction(id) {
            for (var i in markers) {
                var gempaID = markers[i].options.title;
                if (gempaID == id) {
                    markers[i].openPopup();
                };
            }
        }

        var clicko = function() {
            markerFunction($(this)[0].id);
        };
        document.getElementById("<?= "gempa" . $data['id']; ?>").onclick = clicko;
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>