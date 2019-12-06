<?php
include "connect.php";
session_start();
$newest = "SELECT * FROM gempa ORDER BY tanggal desc, waktu desc LIMIT 50";
$title="Terkini";
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
                <a class="nav-item nav-link active" href="">Terkini</a>
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
    <div class="jumbotron jumbotron-fluid text-light p-0">
        <div class="container mx-md-5 pt-5">
            <img src="images/icon.png" width="50px" class="float-left mt-2">
            <h1 class="display-4">Gempa Terkini</h1>
            <p>Daftar 50 gempa bumi terkini di Indonesia</p>
            <img src="images/50.png" class="float-right" width="200px">
        </div>
    </div>
    <main class="container">
        <div class="row my-3">
            <div class="col-6 mx-auto text-center">
                <h2 class="text-dark">Gempa Terkini</h2>
                <hr class="bg-secondary">
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-secondary" data-toggle="table" data-pagination="true">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" data-field="waktu">Waktu</th>
                        <th scope="col" data-field="lokasi">Lokasi</th>
                        <th scope="col" data-field="magnitudo">Magnitudo</th>
                        <th scope="col" data-field="kedalaman">Kedalaman</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($link, $newest);
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php 
                                $tgl = date("d M Y", strtotime($row['tanggal']));
                                echo $tgl . " " . $row['waktu'] . " WIB"; ?> </td>
                            <td><?= $row['region']; ?> </td>
                            <td><?= $row['mag']." SR"; ?> </td>
                            <td><?= $row['dep']." Km"; ?> </td>
                            <td>
                            <a class="btn btn-info mb-1" href="detail.php?id=<?= $row['id'];?>" target="_blank" role="button">Detail</a>
                            <?php 
                                if(isset($_SESSION['level']) && $_SESSION['level']=='admin')
                                {
                            ?>
                            <a class="btn btn-danger mb-1" href="process.php?hapusdata=<?= $row['id']; ?>&from=terkini" onclick="return confirm('Yakin ingin hapus gempa <?= $row['region']; ?> tanggal <?= $tgl; ?>?')" role="button">Delete</a>
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
</body>

</html>