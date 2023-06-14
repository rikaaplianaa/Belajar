<?php 

include "../koneksi.php";

$id_materi = $_GET["id"];

$hapus = mysqli_query($conn, "DELETE FROM tbl_materi WHERE id_materi = '$id_materi'");

header("Location: materi.php");