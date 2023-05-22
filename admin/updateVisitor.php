<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../login/login.php");
    exit;
}

$id = $_GET["id"];

require '../function/functions.php';

$data = query("SELECT * FROM datapengunjung WHERE id = $id")[0];
$ins = query("SELECT * FROM dtinstansi");

if (isset($_POST["submit"])) {

    if (ubahDtPengunjung($_POST) > 0) {
        echo "
              <script>
                  alert('data berhasil diubah');
                  document.location.href = 'visitor.php';
              </script>
          ";
    } else {
        echo "
              <script>
                  alert('data gagal diubah');
                  document.location.href = 'visitor.php';
              </script>
          ";
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

    <link rel="stylesheet" href="css/updateVisit.css">

    <title>Ubah Admin</title>
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
                <li class="active"><a class="py-2 px-3 d-block" href="visitor.php"><img class="icon" src="icon/dataPengunjung.svg" alt=""> data pengunjung</a></li>
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
                    <h1 class="titleContent">Ubah Admin</h1>
                </div>
                <div class="formAdm">
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $data["id"]; ?>">
                        <input type="hidden" name="jam" value="<?= $data["jam"]; ?>">
                        <input type="hidden" name="tgl" value="<?= $data["tanggal"]; ?>">
                        <div class="form-group">
                            <label for="nama">nama lengkap</label>
                            <input type="text" name="nama" class="form-control" id="nama" autocomplete="off" value="<?= $data["nama"]; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>jenis kelamin</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jk" id="flexRadioDefault1" value="L" <?php echo ($data["jk"] == 'L') ?  "checked" : "";  ?>>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    laki-laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jk" id="flexRadioDefault2" value="P" <?= ($data["jk"] == 'P') ?  "checked" : "";  ?>>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    perempuan
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>instansi yang di tuju</label>
                            <div class="input-group">
                                <label class="input-group-text" for="inputGroupSelect01">pilih salah satu </label>
                                <select class="form-select" id="inputGroupSelect01" name="instansi">
                                    <?php $a = $data["instansi"]; ?>
                                    <?php foreach ($ins as $dt) : ?>
                                        <option value="<?= $dt["namaInstansi"]; ?>" <?= ($dt["namaInstansi"] == $data["instansi"]) ?  "selected" : "";  ?>><?= $dt["namaInstansi"]; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="drInstansi">dari Instansi</label>
                            <input type="text" name="drInstansi" class="form-control" id="drInstansi" autocomplete="off" value="<?= $data["dariInstansi"]; ?>" required>
                        </div>
                        <div class=" form-group">
                            <label for="keperluan">keperluan</label>
                            <input type="text" name="keperluan" class="form-control" id="keperluan" autocomplete="off" value="<?= $data["keperluan"]; ?>" required>
                        </div>
                        <div class="row d-flex justify-content-center mt-4">
                            <button type="submit" name="submit" class="btn btn-success btnAdd">ubah data</button>
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