<?php
require 'lib/helper.php';

isLoggedIn();

if(!isset($_GET['id'])) {
    header('Location: index.php');
} else {
    $id = htmlspecialchars($_GET['id']);
}

$res = query("SELECT * FROM siswa WHERE id='$id' LIMIT 1");

if(isset($_POST['submit'])) {
    if(update($_POST) > 0) {
        // success
        echo "
            <script>
                alert('Data berhasil diedit!');
                document.location.href='index.php';
            </script>
        ";
    } else {
        // failed
        echo "
            <script>alert('Data gagal diedit!');</script>
        ";
    }
}

loadHeader('Form Edit Data Siswa');
?>

<div class="container">
    <div class="row my-3">
        <div class="col-lg-12">
            <h1>Edit Data Siswa</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header">Form Edit Data Siswa</div>
                <div class="card-body">
                    <form action="" method="post">
                        <?php foreach($res as $siswa) : ?>
                        <input type="hidden" name="id" value="<?= $siswa['id'] ?>">
                        <div class="form-group">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama siswa.." value="<?= $siswa['nama']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="no_absen" class="form-label">Nomor Absen</label>
                            <input type="number" min="1" max="50" name="no_absen" id="no_absen" class="form-control" placeholder="Masukkan nomor absen siswa.." value="<?= $siswa['no_absen']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="kelas" class="form-label">Kelas</label>
                            <input type="text" name="kelas" id="kelas" class="form-control" placeholder="Masukkan kelas siswa.." value="<?= $siswa['kelas']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="nis" class="form-label">NIS</label>
                            <input type="text" name="nis" id="nis" class="form-control" placeholder="Masukkan nis siswa.." value="<?= $siswa['nis']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" rows="7" placeholder="Masukkan alamat siswa.." required><?= $siswa['alamat']; ?></textarea>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" name="submit" class="btn btn-primary" id="submit">Edit Data</button>
                        </div>
                        <?php endforeach; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php loadFooter(); ?>