<?php
include 'config.php';
session_start(); // Mulai session

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa pengguna berdasarkan username
    $sql = "SELECT * FROM tb_admin WHERE username = '$username'";
    $result = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Simpan data login ke session
            $_SESSION['username'] = $user['username'];
            $_SESSION['logged_in'] = true;

            echo json_encode(['success' => true, 'message' => 'Login berhasil!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Password salah.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Username tidak ditemukan.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Metode tidak valid.']);
}
?>
