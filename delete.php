<?php

include 'config/database.php';
include 'config/function.php';

//mengambil id ptk yang dipilih pengguna
$id_ptk = (int)$_GET['id_ptk'];

if (hapus($id_ptk) > 0) {
    echo "<script>
    alert('Data PTK Berhasil Dihapus')
    document.location.href = 'index.php';
    </script>";
} else {
    echo "<script>
    alert('Data PTK Gagal Dihapus')
    document.location.href = 'index.php';
    </script>";
}