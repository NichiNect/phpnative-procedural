<?php
require 'lib/helper.php';

isLoggedIn();

if(isset($_GET['cari'])) {
    $keyword = $_GET['cari'];
    $res = query("SELECT * FROM siswa WHERE nis LIKE '%$keyword%'");
} else {
    $res = query("SELECT * FROM siswa");
}

loadHeader('Index');
?>

<div class="container">
    <div class="row my-3">
        <div class="col-lg-12">
            <h1>Data Siswa</h1>
            <a href="create.php" class="btn btn-outline-primary">Tambah Data Siswa</a>

            <form action="" method="get">
                <div class="form-group row mt-3">
                    <div class="col-md-4">
                        <input type="text" name="cari" id="cari" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-secondary px-3">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>No Absen</th>
                        <th>Kelas</th>
                        <th>NIS</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    <?php foreach($res as $siswa) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $siswa['nama'] ?></td>
                        <td><?= $siswa['no_absen'] ?></td>
                        <td><?= $siswa['kelas'] ?></td>
                        <td><?= $siswa['nis'] ?></td>
                        <td><?= $siswa['alamat'] ?></td>
                        <td>
                            <a href="detail.php?id=<?= $siswa['id']; ?>" class="btn btn-success">Detail</a>
                            <a href="edit.php?id=<?= $siswa['id']; ?>" class="btn btn-primary">Edit</a>
                            <a href="delete.php?id=<?= $siswa['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?\');">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php loadFooter(); ?>