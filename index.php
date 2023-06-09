<?php 

session_start();

//membatasi halaman sebelum login
if (!isset($_SESSION['login'])){
    echo "<script>
    alert('Anda harus login terlebih dahulu');
    document.location.href = 'login.php';
    </script>";
    exit;
}



include './layout/header.php'; 

//tampil seluruh data ptk
$data_ptk = select("SELECT * FROM ptkguntur ORDER BY id_ptk DESC");


?>

    <div class="container mt-5">
        <h3><i class="fas fa-users"></i> Data PTK</h3>
        <hr>

        <a href ="create.php" class="btn btn-primary btn-sm mb-3"><i class="fas fa-plus-circle"></i> Tambah</a>

        <table class="table table-striped mt-3" id="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Status Pegawai</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data_ptk as $ptk) : ?>
                <tr>
                <td><?= $no++; ?></td>
                <td><?= $ptk["nama"]; ?></td>
                <td><?= $ptk ["jenkel"]; ?></td>
                <td><?= $ptk["status"]; ?></td>
                <td><?= $ptk["jabatan"]; ?></td>
                <td width="25%">
                    <a href="detail.php?id_ptk=<?= $ptk["id_ptk"]; ?>" class="btn btn-sm btn-info"><i class="fas fa-eye"></i> Detail</a>
                    <a href="edit.php?id_ptk=<?= $ptk["id_ptk"]; ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Ubah</a>
                    <a href="delete.php?id_ptk=<?= $ptk["id_ptk"]; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus Data PTK?');"><i class="fas fa-trash-alt"></i> Hapus</a>
                </td>
                </tr>
                <?php endforeach; ?> 
            </tbody>
        </table>

    </div>

    <?php include './layout/footer.php'; ?>