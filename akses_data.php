<?php
include "connect.php";
session_start();
if (isset($_POST['submit'])) {
    foreach ($_POST as $key => $value) {
        ${$key} = $value;
    }
    if(isset($_GET['periode'])){
        $start_date = date('Y-m-d', strtotime($periode));
        $finish_date = date('Y-m-d');
        $filter = "SELECT * FROM gempa WHERE tanggal BETWEEN '$start_date' AND '$finish_date'";
    }
    else{
        if(empty($magmin)){
            $result=mysqli_query($link, "SELECT min(mag) FROM gempa");
            $temp = mysqli_fetch_assoc($result);
            $magmin = $temp['min(mag)'];
        }
        if(empty($magmax)){
            $result=mysqli_query($link, "SELECT max(mag) FROM gempa");
            $temp = mysqli_fetch_assoc($result);
            $magmax = $temp['max(mag)'];
        }
        if(empty($depmin)){
            $result=mysqli_query($link, "SELECT min(dep) FROM gempa");
            $temp = mysqli_fetch_assoc($result);
            $depmin = $temp['min(dep)'];
        }
        if(empty($depmax)){
            $result=mysqli_query($link, "SELECT max(dep) FROM gempa");
            $temp = mysqli_fetch_assoc($result);
            $depmax = $temp['max(dep)'];
        }
        if(empty($finish_date)){
            $finish_date = date('Y-m-d');
        }
        $magmin = intval($magmin);
        $magmax = intval($magmax)+1;
        $depmin = intval($depmin);
        $depmax = intval($depmax)+1;
        $start_time = $start_time . ':00';
        $finish_time = $finish_time . ':00';
        $s1 = date_create($start_date);
        date_add($s1, date_interval_create_from_date_string('1 days'));
        $s1 = date_format($s1, 'Y-m-d');
        $f1 = date_create($finish_date);
        date_add($f1, date_interval_create_from_date_string('-1 days'));
        $f1 = date_format($f1, 'Y-m-d');
        if($mountain=='All'){
            $filter = "SELECT * FROM gempa WHERE ((tanggal = '$start_date' AND waktu BETWEEN '$start_time' AND '23:59:59') OR (tanggal BETWEEN '$s1' AND '$f1') OR (tanggal = '$finish_date' AND waktu BETWEEN '00:00:00' AND '$finish_time')) AND (mag BETWEEN '$magmin' AND '$magmax') AND (dep BETWEEN '$depmin' AND '$depmax') AND region LIKE '%$region%' AND (mountain = 'Yes' || mountain = 'No') ORDER BY tanggal desc, waktu desc";
        }
        else{
            $filter = "SELECT * FROM gempa WHERE ((tanggal = '$start_date' AND waktu BETWEEN '$start_time' AND '23:59:59') OR (tanggal BETWEEN '$s1' AND '$f1') OR (tanggal = '$finish_date' AND waktu BETWEEN '00:00:00' AND '$finish_time')) AND (mag BETWEEN '$magmin' AND '$magmax') AND (dep BETWEEN '$depmin' AND '$depmax') AND region LIKE '%$region%' AND mountain = '$mountain' ORDER BY tanggal desc, waktu desc";
        }
    }
}
$title="Gempa Terkini";
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
                <a class="nav-item nav-link active" href="">Akses Data</a>
                <?php
                    if(isset($_SESSION['level']) && $_SESSION['level']=='admin'){?>
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
    <div class="jumbotron jumbotron-fluid text-light p-0">
        <div class="container mx-md-5 pt-5">
            <img src="images/icon.png" width="50px" class="float-left mt-2">
            <h1 class="display-4">Akses Data</h1>
            <p>Silahkan <a href="login.php"><span>Log in</span></a>, dan dapatkan fitur lebih lengkap</p>
            <img src="images/search.png" class="float-right" width="200px">
        </div>
    </div>
    <div class="container my-2">
        <h4>Cari Gempa</h4>
        <?php 
            if(isset($_SESSION['username'])){
        ?>
        <form action="akses_data.php" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal Awal</label>
                        <input type="date" class="form-control" name="start_date" placeholder="Tanggal awal" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Waktu Awal</label>
                        <input type="time" class="form-control" name="start_time" placeholder="Waktu awal" value="00:00:00">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal Akhir</label>
                        <input type="date" class="form-control" name="finish_date" placeholder="Tanggal akhir">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Waktu Akhir</label>
                        <input type="time" class="form-control" name="finish_time" placeholder="Waktu akhir" value="23:59">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Magnitudo Min</label>
                        <input type="number" class="form-control" name="magmin" placeholder="Min" min="1" step="0.01">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Magnitudo Max</label>
                        <input type="number" class="form-control" name="magmax" placeholder="Max" min="1" step="0.01">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kedalaman Min</label>
                        <input type="number" class="form-control" name="depmin" placeholder="Min" min="1" step="1">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kedalaman Max</label>
                        <input type="number" class="form-control" name="depmax" placeholder="Max" min="1" step="1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Sumber Gempa</label><br>
                        <select class="custom-select" name="mountain">
                            <option value="No">Tektonik</option>
                            <option value="Yes">Vulkanik</option>
                            <option value="All">Semua</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group p-0">
                        <label>Region / Wilayah</label>
                        <input type="text" class="form-control" placeholder="Region" name="region">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary float-right" name="submit">Submit</button>
        </form>
        <?php 
            }
            else{
            ?>
            <form action="akses_data.php?periode" method="post" class="pb-5">  
                <div class="form-group">
                    <label>Periode</label>
                    <select class="custom-select" name="periode">
                        <option value="-1 hour">1 jam yang lalu</option>
                        <option value="-2 hour">2 jam yang lalu</option>
                        <option value="-3 hour">3 jam yang lalu</option>
                        <option value="-6 hour">6 jam yang lalu</option>
                        <option value="-12 hour">12 jam yang lalu</option>
                        <option value="-1 days">1 hari yang lalu</option>
                        <option value="-7 days">1 minggu yang lalu</option>
                        <option value="-1 month">1 bulan yang lalu</option>    
                    </select>
                </div>
                <button type="submit" class="btn btn-primary float-right" name="submit">Submit</button>
            </form>
        <?php
            }
        ?>
    </div>
    <main class="container">
        <?php
        if (isset($_POST['submit'])) {
            $result = mysqli_query($link, $filter);
            $check = mysqli_num_rows($result);
            if($check>0){
            ?>
            <div class="row my-3">
                <div class="col-6 mx-auto text-center">
                    <h2 class="text-dark">Hasil Cari Data</h2>
                    <hr class="bg-secondary">
                </div>
            </div>
            <div class="table-responsive">
                <table id="table" class="table table-hover table-secondary" data-toggle="table" data-pagination="true" data-search="true">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" data-field="waktu" data-sortable="true">Waktu</th>
                            <th scope="col" data-field="lokasi">Lokasi</th>
                            <th scope="col" data-field="magnitudo" data-sortable="true">Magnitudo</th>
                            <th scope="col" data-field="kedalaman" data-sortable="true">Kedalaman</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                            <tr>
                                <td><?php 
                                    $tgl = date("d M Y", strtotime($row['tanggal']));
                                    echo $tgl . " " . $row['waktu'] . " WIB"; ?> </td>
                                <td><a id="<?= "gempa" . $row['id']; ?>" href="#map"><?= $row['region']; ?></a> </td>
                                <td><?= $row['mag']." SR"; ?> </td>
                                <td><?= $row['dep']." Km"; ?> </td>
                                <td>
                                    <a class="btn btn-info mb-1" href="detail.php?id=<?= $row['id'];?>" target="_blank" role="button">Detail</a>
                                    <?php 
                                        if(isset($_SESSION['level']) && $_SESSION['level']=='admin')
                                        {
                                    ?>
                                    <a class="btn btn-danger mb-1" href="process.php?hapusdata=<?= $row['id']; ?>&from=akses_data" onclick="return confirm('Yakin ingin hapus gempa <?= $row['region']; ?> tanggal <?= $tgl; ?>?')" role="button">Delete</a>
                                    <?php 
                                        }
                                    ?>
                                    </td>
                            </tr>
                        <?php
                            }
                            ?>
                    </tbody>
                </table>
            </div>
            <?php
            }
            else if($check<1){
            ?>
            <div class="row my-3">
                <div class="col-6 mx-auto text-center">
                    <h2 class="text-dark">Data Tidak Ditemukan</h2>
                    <hr class="bg-secondary">
                </div>
            </div>
            <?php 
            }
            ?>
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
        <?php
        }
        ?>
    </main>
    <!-- Footer -->
    <footer class="mt-5" style="background-color: rgb(20, 20, 30);">
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
        <?php
        $titik = mysqli_query($link, $filter);
        foreach ($titik as $t) : ?>
            var gempa<?= $t['id']; ?> = L.marker([<?= $t['lat']; ?>, <?= $t['lon']; ?>], {
                icon: titikGempa,
                title: "<?= "gempa" . $t['id']; ?>"
            }).addTo(mymap).bindPopup("<b><?= $t['region']; ?></b><br>Magnitudo = <?= $t['mag']; ?>.");
            markers.push(gempa<?= $t['id']; ?>);
        <?php
        endforeach;
        ?>

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
        <?php
        $pop = mysqli_query($link, $filter);
        foreach ($pop as $p) : ?>
            document.getElementById("<?= "gempa" . $p['id']; ?>").onclick = clicko;
        <?php endforeach; ?>
    </script>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
</body>

</html>