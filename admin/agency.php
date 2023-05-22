<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../login/login.php");
    exit;
}

$id = $_SESSION["login"];

require '../function/functions.php';

$data = query("SELECT * FROM dtinstansi");


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/agency.css">

    <title>Data Instansi</title>
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
                <li class=""><a class="py-2 px-3 d-block" href="newAdmin.php"><img class="icon" src="icon/tambah.svg" alt=""> tambah admin</a></li>
                <li class=""><a class="py-2 px-3 d-block" href="visitor.php"><img class="icon" src="icon/dataPengunjung.svg" alt=""> data pengunjung</a></li>
                <li class="active"><a class="py-2 px-3 d-block" href="agency.php"><img class="icon" src="icon/tambah.svg" alt=""> bidang instansi</a></li>
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
                    <h1 class="titleContent">Data instansi</h1>
                </div>
                <div class="dtTabel">
                    <div class="btnNew d-flex justify-content-end mb-2"><button class="btn btn-primary btnNewAdm "><a href="addAgency.php">Tambah Instansi</a></button></div>
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Instansi</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($data as $dt) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $dt["namaInstansi"]; ?></td>
                                    <td><a class="btn btn-warning" href="updateAgency.php?id=<?= $dt["id"]; ?>">ubah</a>
                                        <a class="btn btn-danger" href="deleteAgency.php?id=<?= $dt["id"]; ?>">hapus</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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