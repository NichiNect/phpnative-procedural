<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'db_crudcrud');

function query($sql) {
    global $conn;

    $result = mysqli_query($conn, $sql);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function loadHeader($title) {
    $data['title'] = $title;
    require 'templates/header.php';
    require 'templates/components/navbar.php';
}
function loadFooter() {
    require 'templates/footer.php';
}

function isLoggedIn() {
    if(isset($_SESSION['userdata'])) {
        return true;
    } else {
        header("Location: login.php");
        return false;
    }
}

function login($username, $password) {
    global $conn;

    $user = query("SELECT * FROM users WHERE username = '$username'");
    $user = @$user[0];

    if($user) {
        // found username then check password
        if(password_verify($password, $user['password'])) {
            $userdata = [
                'username' => $user['username'],
                'password' => $user['password'],
            ];
            $_SESSION['userdata'] = $userdata;
            if($_SESSION['userdata']) {
                header("Location: index.php");
            }
        } else {
            // password salah
            echo "<script>alert('Password salah!');</script>";
        }
    } else {
        // username gagal
        echo "<script>alert('Username tidak ditemukan!');</script>";
    }

}

function register($data) {
    global $conn;

    $username = htmlspecialchars($data['username']);
    $password = password_hash(htmlspecialchars($data['password']), PASSWORD_DEFAULT);

    $sql = "INSERT INTO users VALUES('', '$username', '$password')";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}

function logout() {
    $_SESSION['userdata'] = [];
    unset($_SESSION['userdata']);
    header("Location: login.php");
}

function create($data) {
    global $conn;
    // var_dump($data);
    // die;
    $nama = htmlspecialchars($data['nama']);
    (int)$no_absen = htmlspecialchars($data['no_absen']);
    $kelas = htmlspecialchars($data['kelas']);
    $nis = htmlspecialchars($data['nis']);
    $alamat = htmlspecialchars($data['alamat']);

    $sql = "INSERT INTO siswa VALUES('', '$nama', $no_absen, '$kelas', '$nis', '$alamat')";

    mysqli_query($conn, $sql) or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}

function update($data) {
    global $conn;
    
    $id = htmlspecialchars($data['id']);
    $nama = htmlspecialchars($data['nama']);
    (int)$no_absen = htmlspecialchars($data['no_absen']);
    $kelas = htmlspecialchars($data['kelas']);
    $nis = htmlspecialchars($data['nis']);
    $alamat = htmlspecialchars($data['alamat']);

    $sql = "UPDATE siswa SET 
                        nama = '$nama', 
                        no_absen = '$no_absen', 
                        kelas = '$kelas', 
                        nis = '$nis', 
                        alamat = '$alamat'
            WHERE id=$id";

    mysqli_query($conn, $sql) or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}