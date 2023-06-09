<?php

function select($query) {

    //memanggil koneksi database
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambah($post) {

    global $conn;

    $nama = strip_tags($post['nama']);
    $jenkel = strip_tags($post['jenkel']);
    $status = strip_tags($post['status']);
    $jabatan = strip_tags($post['jabatan']);
    $gambar = upload_file();

    //cek upload file gambar
    if (!$gambar) {
        return false;
    }

    //query tambah data
    $query = "INSERT INTO ptkguntur VALUES (
        null,
        '$nama',
        '$jenkel',
        '$status',
        '$jabatan',
        '$gambar',
        '$nuptk',
        '$nip',
        '$pangkat',
        '$golongan',
        '$pentir',
        '$penins',
        '$penjur',
        '$penlus',
        '$gelar',
        '$nik',
        '$nkk',
        '$norek',
        '$npwp',
        '$bpjskes',
        '$bpjstk',
        '$tplahir',
        '$tglahir',
        '$agama',
        '$alamat',
        '$email',
        '$telp'
    )";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//fungsi upload file
function upload_file() {

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek file yang diupload
    $ekstensifileValid = ['jpg', 'jpeg', 'png'];
    $ekstensifile = explode('.', $namaFile);
    $ekstensifile = strtolower(end($ekstensifile));

    //cek ekstensi file
    if(!in_array($ekstensifile, $ekstensifileValid)) {

        echo "<script>
        alert('Ekstensi file harus bertipe jpg, jpeg, png')
        document.location.href = 'create.php';
        </script>";
        die();
    }

    //cek ukuran file 1 MB
    if($ukuranFile > 1048000) {

        echo "<script>
        alert('Ukuran File Max 1 MB')
        document.location.href = 'create.php';
        </script>";
        die();
    }

    // //generate nama file baru
    // $namaFileBaru = uniqid();
    // $namaFileBaru = '.';
    // $namaFileBaru = $ekstensifile;

    //direktori file ke folder local
    move_uploaded_file($tmpName, 'assets/img/pasfoto/' . $namaFile);
    return $namaFile;
}


//membuat fungsi hapus data PTK
function hapus($id_ptk) {
    
    global $conn;

    //query menhgapus data
    $query = "DELETE FROM ptkguntur WHERE id_ptk = $id_ptk";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//membuat fungsi edit ptk
function update($post) {

    global $conn, $gambar;

    $id_ptk = strip_tags($post['id_ptk']);
    $nama = strip_tags($post['nama']);
    $jenkel = strip_tags($post['jenkel']);
    $status = strip_tags($post['status']);
    $jabatan = strip_tags($post['jabatan']);
    $nuptk = strip_tags($post['nuptk']);
    $nip = strip_tags($post['nip']);
    $pangkat = strip_tags($post['pangkat']);
    $golongan = strip_tags($post['golongan']);
    $pentir = strip_tags($post['pentir']);
    $penins = strip_tags($post['penins']);
    $penjur = strip_tags($post['penjur']);
    $penlus = strip_tags($post['penlus']);
    $gelar = strip_tags($post['gelar']);
    $nik = strip_tags($post['nik']);
    $nkk = strip_tags($post['nkk']);
    $norek = strip_tags($post['norek']);
    $npwp = strip_tags($post['npwp']);
    $bpjskes = strip_tags($post['bpjskes']);
    $bpjstk = strip_tags($post['bpjstk']);
    $tplahir = strip_tags($post['tplahir']);
    $tglahir = strip_tags($post['tglahir']);
    $agama = strip_tags($post['agama']);
    $alamat = strip_tags($post['alamat']);
    $email = strip_tags($post['email']);
    $telp = strip_tags($post['telp']);
    $gambarLama = strip_tags($post['gambarLama']);

    //cek upload foto baru atau tidak
    if ($_FILES['gambar']['error'] == 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload_file();
    }

    //query update data
    $query = "UPDATE ptkguntur SET
        
        jabatan = '$jabatan',
        nuptk = '$nuptk',
        nip = '$nip',
        pangkat = '$pangkat',
        golongan = '$golongan',
        pentir = '$pentir',
        penins = '$penins',
        penjur = '$penjur',
        penlus = '$penlus',
        gelar = '$gelar',
        nik = '$nik',
        nkk = '$nkk',
        norek = '$norek',
        npwp = '$npwp',
        bpjskes = '$bpjskes',
        bpjstk = '$bpjstk',
        tplahir = '$tplahir',
        tglahir = '$tglahir',
        agama = '$agama',
        alamat = '$alamat',
        email = '$email',
        telp = '$telp',
        gambar = '$gambar'
    WHERE id_ptk = $id_ptk";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function registrasi($post) {

    global $conn;

    $nama = strip_tags($post['nama']);
    $username = strip_tags($post['username']);
    $email = strip_tags($post['email']);
    $password = strip_tags($post['password']);
    $level_akses = strip_tags($post['level_akses']);

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //query tambah data
    $query = "INSERT INTO akun VALUES ('', '$nama', '$username', '$email', '$password', '$level_akses')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function hapus_akun($id_akun) {

    global $conn;

    //query
    $query = "DELETE FROM akun WHERE id_akun = $id_akun";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function update_akun($post) {

    global $conn;

    $id_akun = strip_tags($post['id_akun']);
    $nama = strip_tags($post['nama']);
    $username = strip_tags($post['username']);
    $email = strip_tags($post['email']);
    $password = strip_tags($post['password']);
    $level_akses = strip_tags($post['level_akses']);

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //query ubah data
    $query = "UPDATE akun SET nama = '$nama', username = '$username', email = '$email', password = '$password', level_akses = '$level_akses' WHERE id_akun = $id_akun";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}