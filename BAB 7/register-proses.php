<?php
include 'config.php'; // Hubungkan ke file koneksi database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password

    // Query untuk menyimpan data ke database
    $sql = "INSERT INTO tb_admin (email, username, password) VALUES ('$email', '$username', '$password')";

    if (mysqli_query($koneksi, $sql)) {
        echo json_encode(['success' => true, 'message' => 'Pendaftaran berhasil!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Gagal mendaftar: ' . mysqli_error($koneksi)]);
    }
}
?>
