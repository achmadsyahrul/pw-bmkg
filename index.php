<?php
include "connect.php";
session_start();
$querytop5 = "SELECT * FROM gempa WHERE mag > 5 ORDER BY tanggal desc LIMIT 5";
$newest = "SELECT * FROM gempa ORDER BY tanggal desc, waktu desc LIMIT 1";
$title = "Beranda";
include_once "header.php";
?>

<body onload="startTime()">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <p id="date" class="text-light my-auto"></p>
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
      aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link active" href="">Beranda</a>
                <a class="nav-item nav-link" href="terkini.php">Terkini</a>
                <a class="nav-item nav-link" href="akses_data.php">Akses Data</a>
                <?php
                    if(isset($_SESSION['level']) && $_SESSION['level']=='admin'){?>
                        <a class="nav-item nav-link" href="add.php">Tambah</a>
                    <?php
                    }
                    if(empty($_SESSION['username'])){
                        ?>
                        <a class="btn btn-outline-primary ml-3" href="login.php" role="button">Login</a>
                        <?php
                    }
                    else{
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
            <h1 class="display-4">BMKG</h1>
            <p>Spesialis <span>gempa bumi</span>, namun jangan percaya kami</p>
            <img src="images/pulse.gif" class="float-right" width="200px">
        </div>
    </div>
    <div class="news mx-auto bg-light text-dark">
        <div class="row text-center m-2">
            <div class="col-12">
                <!-- Control buttons -->
                <div class="row">
                    <div id="myBtnContainer" class="col-xl-7 col-lg-8 col-md-11 mx-auto">
                        <button class="btn filter" onclick="filterSelection('info')">Gempa Terkini</button>
                        <button class="btn" onclick="filterSelection('search')">Cari Gempa</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-12">
                <!-- The filterable elements. Note that some have multiple class names (this can be used if they belong to multiple categories) -->
                <div class="filtercontainer">
                    <div class="filterDiv info">
                        <div class="container my-2">
                            <?php
                            $gempaterkini = mysqli_query($link, $newest);
                            $data = mysqli_fetch_assoc($gempaterkini);
                            ?>
                            <h4>Gempa Terkini</h4>
                            <p>Informasi gempa terbaru yang terjadi di Indonesia</p>
                            <div class="row">
                                <div class="col-lg-3 mt-4">
                                    <img src="<?= $data['foto']; ?>" width="100%">
                                </div>
                                <div class="col-lg-9">
                                    <div class="row mt-4">
                                        <div class="col-6">
                                            <p>Lokasi : <b><?= $data['region']; ?></b></p>
                                            <p>Tanggal : <b><?php
                                                $tgl = date("d M Y", strtotime($data['tanggal']));
                                                echo $tgl;
                                            ?></b></p>
                                            <p>Pukul : <b><?= $data['waktu']; ?> WIB</b></p>
                                        </div>
                                        <div class="col-6">
                                            <p>Koordinat : <b>( <?= $data['lat']; ?> , <?= $data['lon']; ?> )</b></p>
                                            <p>Magnitudo : <b><?= $data['mag']." SR"; ?></b></p>
                                            <p>Kedalaman : <b><?= $data['dep']; ?> KM</b></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="terkini.php" role="button" class="btn btn-info float-right">Selengkapnya <i class='fas fa-arrow-right'></i></a>
                        </div>
                    </div>
                    <div class="filterDiv search">
                        <div class="container my-2">
                            <h4>Cari Gempa</h4>
                            <form action="akses_data.php?periode" method="post">  
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="top5" class="mx-5 my-5 pb-5">
        <h3>Lima Gempa Besar Terakhir di Indonesia</h3>
        <p>Gempa dengan M > 5.0</p>
        <!--The div element for the map -->
        <div class="row">
            <div class="col-xl-7 col-lg-8 mb-5">
                <div id="map"></div>
            </div>
            <div class="col-xl-5 col-lg-4">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Wilayah</th>
                            <th scope="col">Magnitudo</th>
                            <th scope="col">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = mysqli_query($link, $querytop5);
                        foreach ($result as $r) :
                            ?>
                            <tr>
                                <td><a id="<?= "gempa" . $r['id']; ?>" href="#top5"><?= $r['region']; ?></a></td>
                                <td><?= $r['mag']; ?></td>
                                <td><?= $r['tanggal']; ?></td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer style="background-color: rgb(20, 20, 30);">
        <div class="container">
            <div class="row align-items-end">
                <div class="col text-white text-center py-3 mt-2">
                    <p class="my-0">BMKG Fiktif &copy2019</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Akhir Footer -->

    <!-- Our JavaScript -->
    <script src="js/data-filter.js"></script>
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
        $titik = mysqli_query($link, $querytop5);
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
        $pop = mysqli_query($link, $querytop5);
        foreach ($pop as $p) : ?>
            document.getElementById("<?= "gempa" . $p['id']; ?>").onclick = clicko;
        <?php endforeach; ?>
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
