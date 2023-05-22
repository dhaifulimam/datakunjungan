<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../login/login.php");
    exit;
}

$nama = $_SESSION["login"];

require '../function/functions.php';

date_default_timezone_set('Asia/Jakarta');

$month = date("%Y-%m-01");


$ins = mysqli_query($conn, "SELECT * FROM dtinstansi");
$ins = mysqli_num_rows($ins);

$visit = mysqli_query($conn, "SELECT * from datapengunjung WHERE tanggal = CURDATE()");
$visit = mysqli_num_rows($visit);

$visitMonth = mysqli_query($conn, "SELECT * from datapengunjung WHERE MONTH(tanggal) = MONTH(now())");
$visitMonth = mysqli_num_rows($visitMonth);
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/Admin.css">

    <title>Admin</title>
</head>

<body>
    <div class="main-container d-flex">
        <div class="sidebar" id="side-nav">
            <div class="header-box px-2 pb-1 pt-2 d-flex">
                <img class="imgAdmin my-auto pt-2" src="icon/software-engineer.png" alt="">
                <h1 class="h1">Wellcome <?= $nama; ?></h1>
                <!-- <button class="btn d-md-none d-block close-btn px-1 py-0"><img class="icon hamburger" src="icon/hamburger.svg"></button> -->
            </div>
            <hr class="lineColor mx-3">
            <ul class="list-unstyled items">
                <li class="active"><a class="py-2 px-3 d-block" href="index.php"><img class="icon" src="icon/dasboard.svg" alt=""> dashboard</a></li>
                <li class=""><a class="py-2 px-3 d-block" href="dataAdmin.php"><img class="icon" src="icon/admin.png" alt=""> data admin</a></li>
                <li class=""><a class="py-2 px-3 d-block" href="newAdmin.php"><img class="icon" src="icon/tambah.svg" alt=""> tambah admin</a></li>
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
                    <h1 class="titleContent">dashboard</h1>
                </div>
                <div class="row info justify-content-center mx-auto">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg notification">
                                <img src="icon/pengunjung1.svg" alt="">
                                <h3>Jumlah Pengunjung hari ini</h3>
                                <h2><?= $visit; ?></h2>
                            </div>
                            <div class="col-lg notification">
                                <img src="icon/pengunjung2.svg" alt="">
                                <h3>Jumlah Pengunjung bulan ini</h3>
                                <h2><?= $visitMonth; ?></h2>
                            </div>
                            <div class="col-lg notification">
                                <img src="icon/instansi.svg" alt="">
                                <h3>jumlah bidang instansi</h3>
                                <h2><?= $ins; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="graphic">

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