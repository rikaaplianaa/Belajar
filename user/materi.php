<?php
session_start();

include "../koneksi.php";

$id_kelas = $_SESSION["id_kelas"];

$result_materi = mysqli_query($conn, "SELECT M.*, K.nm_kelas FROM tbl_materi M, tbl_kelas K WHERE M.id_kelas = K.id_kelas AND M.id_kelas = '$id_kelas'");
$jml_materi = mysqli_num_rows($result_materi);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>E-Learning | Home</title>
</head>

<body>

    <?php include "header.php" ?>

    <div class="container mt-3">
                    <div class="col-lg">
                        <h2>Data Materi</h2>
                        <p>Berikut data materi yang berhasil di input...!</p>
                        <?php if ($jml_materi == 0) { ?>
                            <div class="alert alert-warning" role="alert">
                                Maaf, data masih kosong...!
                            </div>
                        <?php } else { ?>
                            <table class="table table-bordered table-hover">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col">Action</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Materi</th>
                                        <th scope="col">Tgl Input</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row_materi = mysqli_fetch_assoc($result_materi)) { ?>
                                        <tr>
                                            <th>
                                                <a href="absen.php?id=<?php echo $row_materi["id_materi"] ?>" class="btn btn-sm btn-warning">Absen</a>
                                            </th>
                                            <td><?php echo $row_materi["nm_kelas"] ?></td>
                                            <td><?php echo $row_materi["judul"] ?></td>
                                            <td><?php echo $row_materi["materi"] ?></td>
                                            <td><?php echo $row_materi["tgl_input"] ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <?php include "footer.php" ?>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>