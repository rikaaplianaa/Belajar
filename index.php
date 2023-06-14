<?php
session_start();

include "koneksi.php";

if (isset($_POST["submit"])) {

    $npm = $_POST["npm"];
    $password = $_POST["password"];

    $login = mysqli_query($conn, "SELECT * FROM tbl_user WHERE npm = '$npm' AND password = '$password'");
    $jml_login = mysqli_num_rows($login);

    if ($jml_login == 1) {

        $row_login = mysqli_fetch_assoc($login);
        $_SESSION["nm_user"] = $row_login["nm_user"];
        $_SESSION["nmp"] = $row_login["nmp"];
        $_SESSION["id_kelas"] = $row_login["id_kelas"];
        $_SESSION["level"] = $row_login["level"];
        $_SESSION["id_user"] = $row_login["id_user"];

        if($row_login["level"]==1){
            header("location: admin/index.php");
        } else if($row_login["level"]==2){
            header("location: user/index.php");
        }
        
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>E-Learning</title>
</head>

<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <h1>Login E-Learning</h1>
                <form method="post" target="">
                    <div class="mb-3">
                        <label for="npm" class="form-label">NPM</label>
                        <input type="text" class="form-control" id="npm" name="npm" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Log In</button>
                    <a href="signin.php" class="btn btn-secondary">Sign In</a>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>