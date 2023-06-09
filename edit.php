<?php

include 'config/database.php';
include 'config/function.php';

if(isset($_POST['ubah'])) {
  if (update($_POST) > 0) {
    echo "<script>
          alert('Data PTK Berhasil Diubah');
          document.location.href = 'index.php'; 
          </script>";
  } else {
    echo "<script>
          alert('Data PTK Gagal Diubah');
          document.location.href = 'index.php'; 
          </script>";
  }
}    

//ambil id ptk berdasar get url
$id_ptk = (int)$_GET['id_ptk'];

//query ambil data ptk dari database
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

    <title>Sistem Informasi Pendataan Pendidik dan Tenaga Kependidikan SDN Guntur 01</title>
  </head>

<div class="container mt-5">
    <h2>Ubah Data Pendidik dan Tenaga Kepependidikan</h2>
    <hr>

<form action="" method="post" enctype="multipart/form-data">
  <h5>Data Kepegawaian</h5>
  <input type="hidden" name="id_ptk" value="<?= $ptk["id_ptk"]; ?>">
  <input type="hidden" name="gambarLama" value="<?= $ptk['gambar']; ?>">
  <div class="mb-3">
    <label for="nama" class="form-label">Nama Pegawai</label>
    <input type="text" class="form-control" id="nama" name="nama" value="<?= $ptk['nama']; ?>" required>
  </div>
  
  <div class="row">
    <div class="mb-3 col-6">
      <label for="jenkel" class="form-label">Jenis Kelamin</label>
      <select class="form-select" id="jenkel" name="jenkel" required>
        <?php $jenkel = $ptk['jenkel']; ?>
        <option value="Laki-laki" <?= $jenkel == "Laki-laki" ? 'selcted' : null ?>>Laki-laki</option>
        <option value="Perempuan" <?= $jenkel == "Perempuan" ? 'selcted' : null ?>>Perempuan</option>
      </select>
    </div>
    <div class="mb-3 col-6">
    <label for="status" class="form-label">Status Pegawai</label>
      <select class="form-select" id="status" name="status" required>
        <?php $status = $ptk['status']; ?>
        <option value="PNS" <?= $status == "PNS" ? 'selcted' : null ?>>PNS</option>
        <option value="PPPK" <?= $status == "PPPK" ? 'selcted' : null ?>>PPPK</option>
        <option value="KKI" <?= $status == "KKI" ? 'selcted' : null ?>>KKI</option>
        <option value="Honorer" <?= $status == "Honorer" ? 'selcted' : null ?>>Honorer</option>
      </select>
    </div>
  </div>

  <div class="mb-3">
    <label for="jabatan" class="form-label">Jabatan</label>
    <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $ptk['jabatan']; ?>" required>
  </div>

  <div class="row">
    <div class="mb-3 col-6">
    <label for="nuptk" class="form-label">NUPTK</label>
    <input type="text" class="form-control" id="nuptk" name="nuptk" value="<?= $ptk['nuptk']; ?>" required>
    </div>
    <div class="mb-3 col-6">
    <label for="nip" class="form-label">NIP</label>
    <input type="text" class="form-control" id="nip" name="nip" value="<?= $ptk['nip']; ?>" required>
    </div>
  </div>

  <div class="row">
    <div class="mb-3 col-6">
    <label for="pangkat" class="form-label">Pangkat</label>
    <input type="text" class="form-control" id="pangkat" name="pangkat" value="<?= $ptk['pangkat']; ?>" required>
    </div>
    <div class="mb-3 col-6">
    <label for="golongan" class="form-label">Golongan</label>
    <input type="text" class="form-control" id="golongan" name="golongan" value="<?= $ptk['golongan']; ?>" required>
    </div>
  </div>

  <div class="row">
    <div class="mb-3 col-6">
    <label for="pentir" class="form-label">Pandidikan Terakhir</label>
    <input type="text" class="form-control" id="pentir" name="pentir" value="<?= $ptk['pentir']; ?>" required>
    </div>
    <div class="mb-3 col-6">
    <label for="penins" class="form-label">Instansi Pendidikan Terakhir</label>
    <input type="text" class="form-control" id="penins" name="penins" value="<?= $ptk['penins']; ?>" required>
    </div>
  </div>

  <div class="row">
    <div class="mb-3 col-6">
    <label for="penjur" class="form-label">Jurusan Pandidikan Terakhir</label>
    <input type="text" class="form-control" id="penjur" name="penjur" value="<?= $ptk['penjur']; ?>" required>
    </div>
    <div class="mb-3 col-6">
    <label for="penlus" class="form-label">Tahun Lulus</label>
    <input type="text" class="form-control" id="penlus" name="penlus" value="<?= $ptk['penlus']; ?>" required>
    </div>
  </div>

  <div class="mb-3">
    <label for="gelar" class="form-label">Gelar Pendidikan</label>
    <input type="text" class="form-control" id="gelar" name="gelar" value="<?= $ptk['gelar']; ?>" required>
  </div>
  <hr>

  <h5>Data Pribadi</h5>
  <div class="row">
    <div class="mb-3 col-6">
    <label for="nik" class="form-label">Nomor NIK</label>
    <input type="text" class="form-control" id="nik" name="nik" value="<?= $ptk['nik']; ?>" required>
    </div>
    <div class="mb-3 col-6">
    <label for="nkk" class="form-label">Nomor KK</label>
    <input type="text" class="form-control" id="nkk" name="nkk" value="<?= $ptk['nkk']; ?>" required>
    </div>
  </div>

  <div class="row">
    <div class="mb-3 col-6">
    <label for="norek" class="form-label">Nomor Rekening</label>
    <input type="text" class="form-control" id="norek" name="norek" value="<?= $ptk['norek']; ?>" required>
    </div>
    <div class="mb-3 col-6">
    <label for="npwp" class="form-label">Nomor NPWP</label>
    <input type="text" class="form-control" id="npwp" name="npwp" value="<?= $ptk['npwp']; ?>" required>
    </div>
  </div>

  <div class="row">
    <div class="mb-3 col-6">
    <label for="bpjskes" class="form-label">Nomor BPJS Kesehatan</label>
    <input type="text" class="form-control" id="bpjskes" name="bpjskes" value="<?= $ptk['bpjskes']; ?>" required>
    </div>
    <div class="mb-3 col-6">
    <label for="bpjstk" class="form-label">Nomor BPJS Ketenagakerjaan</label>
    <input type="text" class="form-control" id="bpjstk" name="bpjstk" value="<?= $ptk['bpjstk']; ?>" required>
    </div>
  </div>

  <div class="row">
    <div class="mb-3 col-6">
    <label for="tplahir" class="form-label">Tempat Lahir</label>
    <input type="text" class="form-control" id="tplahir" name="tplahir" value="<?= $ptk['tplahir']; ?>" required>
    </div>
    <div class="mb-3 col-6">
    <label for="tglahir" class="form-label">Tanggal Lahir</label>
    <input type="date" class="form-control" id="tglahir" name="tglahir" value="<?= $ptk['tglahir']; ?>" required>
    </div>
  </div>

  <div class="row">
    <div class="mb-3 col-6">
    <label for="agama" class="form-label">Agama</label>
    <input type="text" class="form-control" id="agama" name="agama" value="<?= $ptk['agama']; ?>" required>
    </div>
    <div class="mb-3 col-6">
    <label for="alamat" class="form-label">Alamat</label>
    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $ptk['alamat']; ?>" required>
    </div>
  </div>
  <hr>

  <h5>Data Kontak</h5>
  <div class="row">
    <div class="mb-3 col-6">
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control" id="email" name="email" value="<?= $ptk['email']; ?>" required>
    </div>
    <div class="mb-3 col-6">
    <label for="telp" class="form-label">Nomor HP</label>
    <input type="text" class="form-control" id="telp" name="telp" value="<?= $ptk['telp']; ?>" required>
    </div>
  </div>

  <div class="mb-3">
    <label for="gambar" class="form-label">Foto</label>
    <input type="file" class="form-control" id="gambar" name="gambar"" required>
    <p>
        <small>Foto Lama</small>
    </p>
    <img src="assets/img/pasfoto/<?= $ptk['gambar']; ?>" alt="foto" height="50px">
  </div>

  <button type="submit" name="ubah" class="btn btn-primary btn-sm" style="float: right;">Ubah</button>
  <a href="index.php" class="btn btn-secondary btn-sm ml-3" style="float: right;">Kembali</a>
</form>

</div>

<?php

    include './layout/footer.php';