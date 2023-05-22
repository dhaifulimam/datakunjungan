<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../login/login.php");
    exit;
}


require '../function/functions.php';

if (isset($_POST["daftar"])) {

    if (daftar($_POST) > 0) {
        echo "<script>
                    alert('daftar berhasil');
                    document.location.href = 'dataAdmin.php';
                  </script>";
    } else {
        echo "<script>
                    alert('daftar gagal');
                    document.location.href = 'dataAdmin.php';
                  </script>";
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/newAdm.css">

    <title>Tambah Admin</title>
</head>

<body>
    <div class="main-container d-flex">
        <div class="sidebar" id="side-nav">
            <div class="header-box px-2 pb-1 pt-2 d-flex">
                <img class="imgAdmin my-auto pt-2" src="icon/software-engineer.png" alt="">
                <h1 class="h1">Wellcome Admin</h1>
                <!-- <button class="btn d-md-none d-block close-btn px-1 py-0"><img class="icon hamburger" src="icon/hamburger.svg"></button> -->
            </div>
            <hr class="lineColor mx-3">
            <ul class="list-unstyled items">
                <li class=""><a class="py-2 px-3 d-block" href="index.php"><img class="icon" src="icon/dasboard.svg" alt=""> dashboard</a></li>
                <li class=""><a class="py-2 px-3 d-block" href="dataAdmin.php"><img class="icon" src="icon/admin.png" alt=""> data admin</a></li>
                <li class="active"><a class="py-2 px-3 d-block" href="newAdmin.php"><img class="icon" src="icon/tambah.svg" alt=""> tambah admin</a></li>
                <li class=""><a class="py-2 px-3 d-block" href="visitor.php"><img class="icon" src="icon/dataPengunjung.svg" alt=""> data pengunjung</a></li>
                <li class=""><a class="py-2 px-3 d-block" href="agency.php"><img class="icon" src="icon/tambah.svg" alt=""> bidang instansi</a></li>
            </ul>
            <hr class="lineColor mx-3">
            <ul class="list-unstyled items">
                <li class=""><a class="py-2 px-3 d-block" href="logout.php"><img class="icon" src="icon/logout.svg" alt=""> logout</a></li>
            </ul>
        </div>
        <div class="content">
            <nav class="navbar navbar-expand-lg navbar-light pt-3  d-md-none">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <img class="imgAdmin mx-4" src="icon/software-engineer.png" alt="">
                        <button id="openBtn" class="btn px-0 py-0 open-btn"> <img class="icon" src="icon/hamburger.svg"></button>
                        <button id="closeBtn" class="btn d-md-none d-block close-btn px-1 py-0 btnVisible"><img class="icon hamburger" src="icon/hamburger.svg"></button>
                    </div>
                </div>
            </nav>
            <div class="mainContent">
                <div class="title">
                    <h1 class="titleContent">Tambah Admin</h1>
                </div>
                <div class="formAdm">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="nama">nama lengkap</label>
                            <input type="text" name="nama" class="form-control" id="nama" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="username">username</label>
                            <input type="text" name="username" class="form-control" id="username" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="password">password</label>
                            <input type="password" name="password" class="form-control" id="password" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="password2">Konfirmasi password</label>
                            <input type="password" name="password2" class="form-control" id="password2" autocomplete="off" required>
                        </div>
                        <div class="row d-flex mx-auto btnAdd">
                            <button type="submit" name="daftar" class="btn btn-success add">tambah Admin</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="../bootstrap/js/jquery-3.5.1.min.js"></script>
    <script src="js/admin.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>