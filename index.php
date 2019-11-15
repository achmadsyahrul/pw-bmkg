<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="images/icon.png">
    <title>BMKG</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Our CSS -->
    <link rel="stylesheet" href="styles/style.css">
    <!-- arcgis CSS -->
    <link rel="stylesheet" href="https://js.arcgis.com/4.13/esri/themes/light/main.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Script -->
    <script src="https://js.arcgis.com/4.13/"></script>
</head>

<body onload="startTime()">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <p id="date" class="text-light my-auto"></p>
        <button class="navbar-toggler collapsible ml-auto" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="#">Features</a>
            <a class="nav-item nav-link" href="#">Pricing</a>
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
                        <button class="btn filter" onclick="filterSelection('recent')"> Gempa Terkini</button>
                        <button class="btn" onclick="filterSelection('felt')"> Gempa Dirasakan</button>
                        <button class="btn" onclick="filterSelection('search')"> Cari Gempa</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-12">
                <!-- The filterable elements. Note that some have multiple class names (this can be used if they belong to multiple categories) -->
                <div class="filtercontainer">
                    <div class="filterDiv recent">
                        Ini Gempa Terkini
                    </div>
                    <div class="filterDiv felt">
                        Ini Gempa yang Dirasakan
                    </div>
                    <div class="filterDiv search">
                        Cari gempa
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-md-5 my-5">
        <h3>Gempa Besar Minggu Ini</h3>
        <p>Gempa dengan M > 5.0 dalam 7 hari terakhir</p>
        <!--The div element for the map -->
        <div class="row">
            <div class="col-xl-8 col-lg-9 mb-5">
                <div id="viewDiv"></div>
            </div>
            <div class="col-xl-4 col-lg-3">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Lorem ipsum dolor sit amet</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Lorem ipsum dolor sit amet</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Our JavaScript -->
    <script src="js/map.js"></script>
    <script src="js/data-filter.js"></script>
    <script src="js/collapsible.js"></script>
    <script src="js/date.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>