<?php

session_start();

// membatasi halaman sebelum login
if (!isset($_SESSION['login'])){
    echo "<script>
    alert('Anda harus login terlebih dahulu');
    document.location.href = 'login.php';
    </script>";
    exit;
}

    include './layout/header.php'; 

    //tampil seluruh data
    $data_akun = select("SELECT * FROM akun");

    //jika tombol tambah ditekan jalankan script
    if(isset($_POST['tambah'])) {
        if (registrasi($_POST) > 0) {
            echo "<script>
            alert('Data Akun Berhasil Ditambahkan');
            document.location.href = 'akun.php';
            </script>";
        } else {
            echo "<script>
            alert('Data Akun Gagal Ditambahkan');
            document.location.href = 'akun.php';
            </script>";
        }
    }

    //jika tombol tambah ditekan jalankan script
    if(isset($_POST['ubah'])) {
        if (update_akun($_POST) > 0) {
            echo "<script>
            alert('Data Akun Berhasil Diubah');
            document.location.href = 'akun.php';
            </script>";
        } else {
            echo "<script>
            alert('Data Akun Gagal Diubah');
            document.location.href = 'akun.php';
            </script>";
        }
    }
?>

    <div class="container mt-5">
        <h3 class="fw-5"><i class="fas fa-users"></i> Data Akun</h3>
        <hr>

        <button type="button" class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="fas fa-plus-circle"></i> Tambah</button>

        <table class="table table-bordered table-striped mt-3" id="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
               <?php $no = 1; ?>
               <!-- tampil seluruh data -->
                <?php foreach ($data_akun as $akun) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $akun['nama']; ?></td>
                        <td><?= $akun['username']; ?></td>
                        <td><?= $akun['email']; ?></td>
                        <td><i class="fas fa-lock"></i> Password Dienkripsi</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-warning btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $akun['id_akun']; ?>"><i class="fas fa-edit"></i> Ubah</button>
                            <button type="button" class="btn btn-danger btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $akun['id_akun']; ?>"><i class="fas fa-trash-alt"></i> Hapus </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    
            </tbody>
        </table>

    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <input type="hidden" name="id_akun" id="id_akun" class="form-control" required>
                        </div>
                    
                        <div class="mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required minlength="6">
                        </div>
                        <div class="mb-3">
                            <label for="level_akses">Level Akses</label>
                            <select name="level_akses" id="level_akses" class="form-control" requied>
                                <option value="">Pilih Level</option>
                                <option value="1">Admin</option>
                                <option value="2">Kepala Sekolah</option>
                                <option value="3">PTK</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" name="tambah" class="btn btn-primary btn-sm">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <!-- Modal Ubah -->
        <?php foreach ($data_akun as $akun) : ?>
            <div class="modal fade" id="modalUbah<?= $akun['id_akun']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-warning text-white">
                            <h5 class="modal-title" id="exampleModalLabel">Ubah Akun</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                    <div class="mb-3">
                                    <label for="id_akun">ID Akun</label>
                                    <input type="number" name="id_akun" id="id_akun" class="form-control" value="<?= $akun['id_akun']; ?>" required>
                                    </div>
                                        <input type="hidden" name="id_akun" value="<?= $akun['id_akun']; ?>">
                                <div class="mb-3">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" id="nama" class="form-control" value="<?= $akun['nama']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" id="nama" class="form-control" value="<?= $akun['nama']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" value="<?= $akun['username']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" class="form-control" value="<?= $akun['email']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" required minlength="6" placeholder="Masukkan password baru/lama">
                                </div>
                                    <div class="mb-3">
                                        <label for="level_akses">Level Akses</label>
                                        <select name="level_akses" id="level_akses" class="form-control" requied>
                                            <?php $level_akses = $akun['level_akses']; ?>
                                            <option value="1" <?= $level_akses == '1' ? 'selected' : null ?>>Admin</option>
                                            <option value="2" <?= $level_akses == '2' ? 'selected' : null ?>>Kepala Sekolah</option>
                                            <option value="3" <?= $level_akses == '3' ? 'selected' : null ?>>PTK</option>
                                        </select>
                                    </div>
                                        <input type="hidden" name="level_akses" value="<?= $akun['level_akses']; ?>">

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Kembali</button>
                                    <button type="submit" name="ubah" class="btn btn-warning btn-sm">Ubah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- Modal Hapus -->
        <?php foreach ($data_akun as $akun) : ?>
        <div class="modal fade" id="modalHapus<?= $akun['id_akun']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda Yakin Ingin Menghapus Akun <?=$akun['nama']; ?> ?</p>    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                    <a href="delete-akun.php?id_akun=<?= $akun['id_akun']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                </div>
            </div>
            </div>
        </div>
        <?php endforeach; ?>

        

    <?php include './layout/footer.php'; ?>