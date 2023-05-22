<?php

require '../function/functions.php';

$id = $_GET["id"];

if (hapusInstansi($id) > 0) {
    echo "
            <script>
            alert('admin berhasil dihapus');
            document.location.href = 'agency.php';
            </script>
        ";
} else {
    echo "
            <script>
            alert('admin gagal dihapus');
            document.location.href = 'agency.php';
            </script>
        ";
}
