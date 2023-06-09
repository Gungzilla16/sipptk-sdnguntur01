<?php
    

include './config/database.php';
include './config/function.php';

//mengambil id ptk get dari url
$id_ptk = (int)$_GET['id_ptk'];

//menampilkan data ptk
$ptk = select("SELECT * FROM ptkguntur WHERE id_ptk = $id_ptk")[0];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title>Sistem Informasi Pendataan Pendidik dan Tenaga Kependidikan SDN Guntur 01</title>
  </head>

<div class="container mt-3">
        <h3 class="fw-5">Data <?= $ptk['nama']; ?></h3>
        <hr>
        <table>
                <tr>
                        <td> <a href="assets/img/pasfoto/<?= $ptk['gambar']; ?>">
                                <img class="img-thumbnail" src="./assets/img/pasfoto/<?= $ptk['gambar']; ?>" alt=".jpeg" style="height: 200px;"></a>
                        </td>
                </tr>
        </table>
        <div class="accordion mt-2" id="accordionExample">
                <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Data Pegawai
                        </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                <table class="table mt-3">

                                        <tr>
                                                <td>Nama</td>
                                                <td>: <?= $ptk["nama"]; ?></td>
                                        </tr>
                                        <tr>
                                                <td>NUPTK</td>
                                                <td>: <?= $ptk["nuptk"]; ?></td>
                                        </tr>
                                        <tr>
                                                <td>NIP</td>
                                                <td>: <?= $ptk["nip"]; ?></td>
                                        </tr>
                                        <tr>
                                                <td>Status Pegawai</td>
                                                <td>: <?= $ptk["status"]; ?></td>
                                        </tr>
                                        <tr>
                                                <td>Jabatan</td>
                                                <td>: <?= $ptk["jabatan"]; ?></td>
                                        </tr>
                                        <tr>
                                                <td>Pangkat</td>
                                                <td>: <?= $ptk["pangkat"]; ?></td>
                                        </tr>
                                        <tr>
                                                <td>Golongan</td>
                                                <td>: <?= $ptk["golongan"]; ?></td>
                                        </tr>
                                        <tr>
                                                <td>Pendidikan Terakhir</td>
                                                <td>: <?= $ptk["pentir"]; ?></td>
                                        </tr>
                                        <tr>
                                                <td>Instansi Pendidikan</td>
                                                <td>: <?= $ptk["penins"]; ?></td>
                                        </tr>
                                        <tr>
                                                <td>Jurusan Pendidikan</td>
                                                <td>: <?= $ptk["penjur"]; ?></td>
                                        </tr>
                                        <tr>
                                                <td>Tahun Lulus</td>
                                                <td>: <?= $ptk["penlus"]; ?></td>
                                        </tr>
                                        <tr>
                                                <td>Gelar Pendidikan</td>
                                                <td>: <?= $ptk["gelar"]; ?></td>
                                        </tr> 

                                </table>
                                </div>
                        </div>
                </div>
                <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Data Pribadi
                                </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                <table class="table mt-3">

                                        <tr>
                                                <td>Nomor NIK</td>
                                                <td>: <?= $ptk["nik"]; ?></td>
                                        </tr>
                                        <tr>
                                                <td>Nomor KK</td>
                                                <td>: <?= $ptk["nkk"]; ?></td>
                                        </tr>
                                        <tr>
                                                <td>Nomor Rekening DKI</td>
                                                <td>: <?= $ptk["norek"]; ?></td>
                                        </tr>
                                        <tr>
                                                <td>Nomor NPWP</td>
                                                <td>: <?= $ptk["npwp"]; ?></td>
                                        </tr>
                                        <tr>
                                                <td>Nomor BPJS Kesehatan</td>
                                                <td>: <?= $ptk["bpjskes"]; ?></td>
                                        </tr>
                                        <tr>
                                                <td>Nomor BPJS Ketenagakerjaan</td>
                                                <td>: <?= $ptk["bpjstk"]; ?></td>
                                        </tr>
                                        <tr>
                                                <td>Tempat Lahir</td>
                                                <td>: <?= $ptk["tplahir"]; ?></td>
                                        </tr>
                                        <tr>
                                                <td>Tanggal Lahir</td>
                                                <td>: <?= $ptk["tglahir"]; ?></td>
                                        </tr>
                                        <tr>
                                                <td>Agama</td>
                                                <td>: <?= $ptk["agama"]; ?></td>
                                        </tr>
                                        <tr>
                                                <td>Alamat</td>
                                                <td>: <?= $ptk["alamat"]; ?></td>
                                        </tr>
                                </table>
                                </div>
                        </div>
                </div>
                <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Data Kontak
                                </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                <table class="table mt-3">

                                        <tr>
                                                <td>Alamat Email</td>
                                                <td>: <?= $ptk["email"]; ?></td>
                                        </tr>
                                        <tr>
                                                <td>Nomor Handphone</td>
                                                <td>: <?= $ptk["telp"]; ?></td>
                                        </tr>
                                        
                                </table>
                                </div>
                        </div>
                </div>
        </div>
        
        <div class="mt-2">
                <a href="index.php" class="btn btn-secondary btn-sm" style="float: right;">Kembali</a>
        </div>
</div>

<?php include './layout/footer.php'; ?>