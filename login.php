<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="images/icon.png">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Our CSS -->
    <link rel="stylesheet" href="styles/style.css">
    <!-- Font Awesome -->
    <script src='https://kit.fontawesome.com/1692d39af4.js'></script>
</head>

<body onload="startTime()" class="bg-navy">
    <nav class="navbar navbar-dark bg-dark">
        <p id="date" class="text-light my-auto"></p>
        <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link" href="index.php"><i class="fa fa-home"></i> Home</a>
        </div>
    </nav>
    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "salah") { ?>
            <div class="row my-3 text-center mx-auto">
                <div class="col-3 mx-auto">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Username dan/atau password salah!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php
            } else if ($_GET['pesan'] == "belum_login") { ?>
            <div class="row my-3 text-center mx-auto">
                <div class="col-3 mx-auto">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Harus login dulu!
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
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        Akun Ada sudah terdaftar. Silahkan Login!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php
            } else if ($_GET['pesan'] == "logout") { ?>
            <div class="row my-3 text-center mx-auto">
                <div class="col-3 mx-auto">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Anda sudah logout!
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

                <h3 class="text-center text-info pb-3 mb-3 border-bottom">LOGIN</h3>
                <form action="process.php?log=in" method="post">
                    <div class="form-group p-0">
                        <input type="text" class="form-control form-control-lg mb-3" placeholder="Username" name="username" autofocus required>
                    </div>
                    <div class="form-group p-0">
                        <input type="password" class="form-control form-control-lg mb-3" placeholder="Password" name="password" required>
                    </div>
                    <input type="submit" class="btn btn-info btn-lg btn-block" value="Login">
                    <hr>
                    <div class="text-center">
                        Belum punya akun? <a href="register.php">Daftar disini.</a><br>
                    </div>
                </form>
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
    <script src="js/date.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>