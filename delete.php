<?php
require 'lib/helper.php';

isLoggedIn();

if(!isset($_GET['id'])) {
    header('Location: index.php');
} else {
    (int)$id = htmlspecialchars($_GET['id']);
}

mysqli_query($conn, "DELETE FROM siswa WHERE id=$id") or die(mysqli_error($conn));

if(mysqli_affected_rows($conn) > 0) {
    echo "
            <script>
                alert('Data berhasil dihapus!');
                document.location.href='index.php';
            </script>
        ";
} else {
    echo "
            <script>
                alert('Data gagal dihapus!');
                document.location.href='index.php';
            </script>
        ";
}