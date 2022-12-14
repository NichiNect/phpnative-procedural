<?php
require 'lib/helper.php';

isLoggedIn();

if(!isset($_GET['id'])) {
    header('Location: index.php');
} else {
    $id = htmlspecialchars($_GET['id']);
}

$res = query("SELECT * FROM siswa WHERE id='$id'");

loadHeader('Detail');
?>

<div class="container">
    <div class="row my-3">
        <div class="col-lg-12">
            <h1>Detail Data Siswa</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header">Detail Siswa </div>
                <div class="card-body">
                    <table class="table table-hover table-striped">
                        <tbody>
                            <?php foreach($res as $siswa) : ?>
                            <tr>
                                <th>Nama</th>
                                <th>:</th>
                                <th><?= $siswa['nama'] ?></th>
                            </tr>
                            <tr>
                                <th>No Absen</th>
                                <th>:</th>
                                <th><?= $siswa['no_absen'] ?></th>
                            </tr>
                            <tr>
                                <th>Kelas</th>
                                <th>:</th>
                                <th><?= $siswa['kelas'] ?></th>
                            </tr>
                            <tr>
                                <th>NIS</th>
                                <th>:</th>
                                <th><?= $siswa['nis'] ?></th>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <th>:</th>
                                <th><?= $siswa['alamat'] ?></th>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="text-left">
                        <a href="index.php" class="btn btn-link">Kembali..</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php loadFooter(); ?>