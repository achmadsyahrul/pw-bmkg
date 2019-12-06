<?php
session_start();
if (empty($_SESSION['username'])) {
	header('location: login.php?pesan=belum_login');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="images/icon.png">
    <title>Data Baru</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Our CSS -->
    <link rel="stylesheet" href="styles/style.css">
    <!-- arcgis CSS -->
    <link rel="stylesheet" href="https://js.arcgis.com/4.13/esri/themes/light/main.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-4 mx-auto bg-light p-4 login">
				<h3 class="text-center text-info pb-3 mb-3 border-bottom">DATA BARU</h3>
				<form action="cek_admin.php?log=in" method="post">
					<div class="form-group p-0">
						<label>Tanggal</label><br>
						<input type="date" class="form-control form-control-lg mb-3" placeholder="tanggal" name="tanggal" required="" autofocus>
					</div>
					<div class="form-group p-0">
						<label>Waktu</label><br>
						<input type="time" class="form-control form-control-lg mb-3" placeholder="jam" name="jam" required="" autofocus step="1">
					</div>
					<div class="form-group p-0">
						<input type="text" class="form-control form-control-lg mb-3" placeholder="latitude" name="lat" required="" autofocus>
					</div>
					<div class="form-group p-0">
						<input type="text" class="form-control form-control-lg mb-3" placeholder="longitude" name="lon" required="" autofocus>
					</div>
					<div class="form-group p-0">
						<input type="text" class="form-control form-control-lg mb-3" placeholder="depth" name="dep" required="" autofocus>
					</div>
					<div class="form-group p-0">
						<input type="text" class="form-control form-control-lg mb-3" placeholder="magnitude" name="mag" required="" autofocus>
					</div>
					<div class="form-group p-0">
						<input type="text" class="form-control form-control-lg mb-3" placeholder="depth" name="dep" required="" autofocus>
					</div>
					<div class="form-group p-0">
						<label>Sumber Gempa</label><br>
						<input type="radio" name="moun" value="Yes" autofocus> Vulkanik <br>
						<input type="radio" name="moun" value="No" autofocus> Tektonik <br>
					</div>
					<div class="form-group p-0">
						<input type="text" class="form-control form-control-lg mb-3" placeholder="region" name="region" required="" autofocus>
					</div>
					<div class="form-group p-0">
				    	<label for="exampleFormControlInput1">Foto Lokasi (maksimal 500 kb) : </label>
				    	<input type="file" name="photo" id="photo">
				  	</div>
					<input type="submit" class="btn btn-info btn-lg btn-block" name="submit">
					<hr>
				</form>
			</div>
		</div>
	</div>
	
	
	
	
	<input type="submit" name="submit" autofocus>
</body>
</html>