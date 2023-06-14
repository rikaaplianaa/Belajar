<?php
session_start();

include "../koneksi.php";

$npm = $_SESSION["npm"];

$result_absen = mysqli_query($conn, "SELECT A.*, U.nm_user, M.judul FROM tbl_absen A, tbl_user U, tbl_materi M WHERE A.npm = U.npm AND A.id_materi = M.id_materi AND A.npm = '$npm'");
$jml_absen = mysqli_num_rows($result_absen);

?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>E-learning | absen</title>
</head>

<body>

    <?php include "header.php" ?>

    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <div class="row">


                    <div class="col-lg">
                        <h2>Data Absen Anda</h2>
                        <p>Berikut data absen yang berhasil diinput..!</p>
                        <?php if ($jml_absen == 0) { ?>
                            <div class="alert alert-warning" role="alert">
                                Maaf, Data Masih Kosong...!
                            </div>
                        <?php } else { ?>
                            <table class="table table-bordered table-hover">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Status Absen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row_absen = mysqli_fetch_assoc($result_absen)) { ?>
                                        <tr>
                                            <td><?php echo $row_absen["tgl"] ?></td>
                                            <td><?php echo $row_absen["nm_user"] ?></td>
                                            <td><?php echo $row_absen["judul"] ?></td>
                                            <td>
                                                <?php
                                                if ($row_absen["status_absen"] == 1) {
                                                    echo "Hadir";
                                                } else if ($row_absen["status_absen"] == 2) {
                                                    echo "Izin";
                                                } else if ($row_absen["status_absen"] == 3) {
                                                    echo "Sakit";
                                                } else if ($row_absen["status_absen"] == 4) {
                                                    echo "Alfa";
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php include "footer.php" ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>