<?php

require '../function/functions.php';

$id = $_GET["id"];

if (hapusVisitor($id) > 0) {
    echo "
            <script>
            alert('data berhasil dihapus');
            document.location.href = 'visitor.php';
            </script>
        ";
} else {
    echo "
            <script>
            alert('data gagal dihapus');
            document.location.href = 'visitor.php';
            </script>
        ";
}
