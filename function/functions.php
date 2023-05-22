<?php
$conn = mysqli_connect("localhost", "root", "", "dbdinaspendidikan");


function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;
    date_default_timezone_set('Asia/Jakarta');

    $nama = strtolower(htmlspecialchars($data["nama"]));
    $jk = htmlspecialchars($data["jk"]);
    $instansi = htmlspecialchars($data["instansi"]);
    $dariinstansi = htmlspecialchars($data["drInstansi"]);
    $tggl = date("Y-m-d");
    $jam = date("H:i");
    $keperluan = strval(htmlspecialchars($data["keperluan"]));


    $query = "INSERT INTO datapengunjung
                    VALUES
                 ('', '$nama', '$jk', '$instansi','$dariinstansi', '$tggl', '$jam', '$keperluan')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubahDtPengunjung($data)
{
    global $conn;

    $id = $data["id"];

    $nama = htmlspecialchars($data["nama"]);
    $jk = htmlspecialchars($data["jk"]);
    $instansi = htmlspecialchars($data["instansi"]);
    $dariinstansi = htmlspecialchars($data["drInstansi"]);

    $tggl = strtotime($data["tgl"]);
    $newTggl = date("Y-m-d", $tggl);

    $jam = strtotime($data["jam"]);
    $newJam = date("H:i", $jam);
    $keperluan = strval(htmlspecialchars($data["keperluan"]));

    // var_dump($newTggl, $newJam);
    // die;


    $query = "UPDATE datapengunjung SET
                    nama = '$nama',
                    jk = '$jk', 
                    instansi = '$instansi',
                    dariInstansi = '$dariinstansi',
                    tanggal =  '$newTggl',
                    jam = '$newJam',
                    keperluan = '$keperluan' 
                    WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusVisitor($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM datapengunjung WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function tambahInstansi($data)
{
    global $conn;

    $nama = htmlspecialchars($data["namaInstansi"]);

    $query = "INSERT INTO dtinstansi
                    VALUES
                 ('', '$nama')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusInstansi($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM dtinstansi WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubahinstansi($data)
{
    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($data["namaInstansi"]);


    $query = "UPDATE dtinstansi SET
                    namaInstansi = '$nama' 
                    WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function daftar($data)
{

    global $conn;

    // $username = strtolower(stripslashes($data["username"]));
    $nama = $data["nama"];
    $username = $data["username"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);


    $result = mysqli_query($conn, "SELECT username FROM dtadmin WHERE username = '$username' ");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                    alert('username telah terdaftar');
                  </script>";
        return false;
    }

    if ($password !== $password2) {
        echo "<script>
                    alert('password tidak sesuai');
                  </script>";
        return false;
    }

    // $password = md5($password);

    mysqli_query($conn, "INSERT INTO dtadmin VALUES('','$nama', '$username', '$password')");

    return mysqli_affected_rows($conn);
}

function hapusadmin($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM dtadmin WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubahadmin($data)
{
    global $conn;

    $id = $data["id"];
    $nama = $data["nama"];
    $username = $data["username"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    if ($password !== $password2) {
        echo "<script>
                    alert('password tidak sesuai');
                  </script>";
        return false;
    }

    $query = "UPDATE dtadmin SET
                    nama = '$nama',
                    username = '$username',
                    password = '$password' 
                    WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
