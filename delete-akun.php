<?php

include 'config/database.php';
include 'config/function.php';

//mengambil id ptk yang dipilih pengguna
$id_akun = (int)$_GET['id_akun'];

if (hapus_akun($id_akun) > 0) {
    echo "<script>
    alert('Data Akun Berhasil Dihapus')
    document.location.href = 'akun.php';
    </script>";
} else {
    echo "<script>
    alert('Data Akun Gagal Dihapus')
    document.location.href = 'akun.php';
    </script>";
}