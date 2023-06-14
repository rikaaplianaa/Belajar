<?php
session_start();

include "../koneksi.php";
?>
<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>E-learning | Home</title>
</head>

<body>

  <?php include "header.php" ?>

  <div class="container mt-3">
    <div class="row">
      <div class="col">
        <h1>Selamat Datang di E-learning</h1>
        <hr>
        <div class="row">
          <?php
          $result_mhs = mysqli_query($conn, "SELECT * FROM tbl_user");
          $jml_mhs = mysqli_num_rows($result_mhs);
          ?>
          <div class="col-sm-3">
            <div class="card bg-info">
              <div class="card-body">
                <h5 class="card-title"><?php echo $jml_mhs ?></h5>
                <p class="card-text">Mahasiswa</p>
                <a href="#" class="btn btn-light">Go somewhere</a>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <?php
            $result_kelas = mysqli_query($conn, "SELECT * FROM tbl_kelas");
            $jml_kelas = mysqli_num_rows($result_kelas);
            ?>
            <div class="card bg-warning">
              <div class="card-body">
                <h5 class="card-title"><?php echo $jml_kelas ?></h5>
                <p class="card-text">Kelas</p>
                <a href="#" class="btn btn-light">Go somewhere</a>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <?php
            $result_materi = mysqli_query($conn, "SELECT * FROM tbl_materi");
            $jml_materi = mysqli_num_rows($result_materi);
            ?>
            <div class="card bg-success">
              <div class="card-body">
                <h5 class="card-title"><?php echo $jml_materi ?></h5>
                <p class="card-text">Materi</p>
                <a href="#" class="btn btn-light">Go somewhere</a>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <?php
            $result_absen = mysqli_query($conn, "SELECT * FROM tbl_absen");
            $jml_absen = mysqli_num_rows($result_absen);
            ?>
            <div class="card bg-danger">
              <div class="card-body">
                <h5 class="card-title"><?php echo $jml_absen ?></h5>
                <p class="card-text">Absen</p>
                <a href="#" class="btn btn-light">Go somewhere</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include "footer.php" ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>