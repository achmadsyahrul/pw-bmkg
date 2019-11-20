<?php
include "connect.php";
$querytop5 = "SELECT * FROM gempa WHERE mag > 5 ORDER BY tanggal desc LIMIT 5";
$newest = "SELECT * FROM gempa ORDER BY tanggal desc, waktu desc LIMIT 1";
// select * from gempa where (tanggal between '2019-10-15' AND '2019-10-20') AND (mag > 5) AND dep = 10;
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="images/icon.png">
    <title>Beranda</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Our CSS -->
    <link rel="stylesheet" href="styles/style.css">
    <!-- Leaflet CSS & Script -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
    <!-- Font Awesome -->
    <script src='https://kit.fontawesome.com/1692d39af4.js'></script>
</head>

<body onload="startTime()">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <p id="date" class="text-light my-auto"></p>
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
      aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link active" href="#">Beranda</a>
                <a class="nav-item nav-link" href="#">Terkini</a>
                <a class="nav-item nav-link" href="#">Data Gempa</a>
                <a class="btn btn-outline-primary ml-3" href="login.php" role="button">Login</a>
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
                        <button class="btn filter" onclick="filterSelection('recent')">Gempa Terkini</button>
                        <button class="btn" onclick="filterSelection('search')">Cari Gempa</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-12">
                <!-- The filterable elements. Note that some have multiple class names (this can be used if they belong to multiple categories) -->
                <div class="filtercontainer">
                    <div class="filterDiv recent">
                        <div class="container my-2">
                            <?php
                            $gempaterkini = mysqli_query($link, $newest);
                            $data = mysqli_fetch_assoc($gempaterkini);
                            ?>
                            <h4>Gempa Terkini</h4>
                            <p>Informasi gempa terbaru yang terjadi di Indonesia</p>
                            <div class="row">
                                <div class="col-lg-3 mt-4">
                                    <img src="<?= $data['foto']; ?>" height="100px">
                                </div>
                                <div class="col-lg-9">
                                    <div class="row mt-4">
                                        <div class="col-6">
                                            <p>Lokasi : <b><?= $data['region']; ?></b></p>
                                            <p>Tanggal : <b><?= $data['tanggal']; ?></b></p>
                                            <p>Pukul : <b><?= $data['waktu']; ?> WIB</b></p>
                                        </div>
                                        <div class="col-6">
                                            <p>Koordinat : <b>( <?= $data['lat']; ?> , <?= $data['lon']; ?> )</b></p>
                                            <p>Magnitudo : <b><?= $data['mag']; ?></b></p>
                                            <p>Kedalaman : <b><?= $data['dep']; ?> KM</b></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info float-right">Selengkapnya <i class='fas fa-arrow-right'></i></button>
                        </div>
                    </div>
                    <div class="filterDiv search">
                        <div class="container my-2">
                            <h4>Cari Gempa</h4>
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tanggal Awal</label>
                                            <input type="date" class="form-control" id="start-date" placeholder="Tanggal awal">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Waktu Awal</label>
                                            <input type="time" class="form-control" id="first-date" step="1" placeholder="Waktu awal">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tanggal Akhir</label>
                                            <input type="date" class="form-control" id="finish-date" placeholder="Tanggal akhir">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Waktu Akhir</label>
                                            <input type="time" class="form-control" id="finish-date" step="1" placeholder="Waktu akhir">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-right">Submit</button>
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
                            <th scope="col">Lokasi</th>
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
                                <td><a id="<?= "marker" . $r['id']; ?>" href="#top5"><?= $r['region']; ?></a></td>
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
    <!-- Contact -->
    <section id="contact" class="bg-dark pt-0 pb-5 mt-5">
        <svg preserveAspectRatio="none" height="75" width="100%" viewBox="0 0 100 125">
            <path d="M0 0 L50 100 L100 0 Z" fill="white" stroke="white"></path>
        </svg>
        <div class="container">
            <div class="row my-4">
                <div class="col text-center mt-5">
                    <h1 class="text-white">Contact Us</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <form method="post" action="process.php">
                        <div class="form-group">
                            <label class="text-white">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label class="text-white">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label class="text-white">Message</label>
                            <textarea class="form-control" id="message" name="message" required placeholder="Your message"></textarea>
                        </div>
                        <button name="msg" type="submit" class="btn btn-outline-light float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Content -->
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
            var marker<?= $t['id']; ?> = L.marker([<?= $t['lat']; ?>, <?= $t['lon']; ?>], {
                icon: titikGempa,
                title: "<?= "marker" . $t['id']; ?>"
            }).addTo(mymap).bindPopup("<b><?= $t['region']; ?></b><br>Magnitudo = <?= $t['mag']; ?>.");
            markers.push(marker<?= $t['id']; ?>);
        <?php
        endforeach;
        ?>

        function markerFunction(id) {
            for (var i in markers) {
                var markerID = markers[i].options.title;
                if (markerID == id) {
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
            document.getElementById("<?= "marker" . $p['id']; ?>").onclick = clicko;
        <?php endforeach; ?>
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
