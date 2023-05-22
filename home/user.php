<?php

require '../function/functions.php';

$data = query("SELECT * FROM dtinstansi");

if (isset($_POST["submit"])) {

    if (tambah($_POST) > 0) {
        echo "<script>
                    alert('data berhasil ditambahkan');
                    document.location.href = 'user.php';
               </script>";
    } else {
        echo "<script>
                    alert('daftar gagal ditambahkan');
                    document.location.href = 'user.php';
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

    <!-- My Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/Input.css">
    <title>Home</title>
</head>

<body>
    <div class="container main">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../logodinascilegon/logo.png" alt="" class="d-inline-block align-text-top">
                    Dinas Pendidikan Dan Kebudayaan Kota Cilegon
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="user.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">profile</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="mainContent mx-auto">
            <div class="title">
                <h1 class="titleContent">input data pengunjung</h1>
            </div>
            <div class="formVisitor">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="nama">nama lengkap</label>
                        <input type="text" name="nama" class="form-control" id="nama" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label>jenis kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jk" id="flexRadioDefault1" value="L" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jk" id="flexRadioDefault2" value="P">
                            <label class="form-check-label" for="flexRadioDefault2">
                                perempuan
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>instansi yang di tuju</label>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">pilih salah satu </label>
                            <select class="form-select" id="inputGroupSelect01" name="instansi">
                                <?php foreach ($data as $dt) : ?>
                                    <option value="<?= $dt["namaInstansi"]; ?>"><?= $dt["namaInstansi"]; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="drInstansi">dari Instansi</label>
                        <input type="text" name="drInstansi" class="form-control" id="drInstansi" autocomplete="off" placeholder="Exp : SMAN 1 Cilegon" required>
                    </div>
                    <div class="form-group">
                        <label for="keperluan">keperluan</label>
                        <input type="text" name="keperluan" class="form-control" id="keperluan" autocomplete="off" placeholder="Exp : Mengambil Surat" required>
                    </div>
                    <div class="row d-flex justify-content-center mt-4">
                        <button type="submit" name="submit" class="btn btn-success btnAdd">tambah Data Tamu</button>
                    </div>
                </form>
            </div>
        </div>



    </div>




    <script src="../bootstrap/js/jquery-3.5.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>