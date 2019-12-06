<?php
include "connect.php";
session_start();
if (empty($_SESSION['username'])) {
  header('location: login.php?pesan=belum_login');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="tampilan">
      <div class="w-100">
        <h2 class="mb-5">Tampilan</h2>
        <table class="table">
          <thead class="table-dark">
            <td>No</td>
            <td>Waktu Gempa</td>
            <td>Lintang</td>
            <td>Bujur</td>
            <td>Magnitudo (SR)</td>
            <td>Kedalaman</td>
            <td>Wilayah</td>
            <td></td>
          </thead>
          <tbody>
            <?php
            $query = "SELECT * FROM gempa";
            $result = mysqli_query($link,$query);
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
              ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['tanggal']." ". $row['waktu']; ?></td>
                <td><?= $row['lat'] ?></td>
                <td><?= $row['lon'] ?></td>
                <td><?= $row['mag'] ?></td>
                <td><?= $row['dep'] ?></td>
                <td><?= $row['region'] ?></td>
                <td>
                  <a class="btn btn-success" href="edit.php?id=<?= $row['id_kasir'] ?>">Edit</a>
                  <a class="btn btn-danger" href="delete.php?id=<?= $row['id_kasir'] ?>">Delete</a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </section>


</body>
</html>