<?php
session_start();

// Mengecek apakah parameter 'index' ada di URL
if (isset($_GET['index']) && isset($_SESSION['pets'][$_GET['index']])) {
    // Menghapus data hewan berdasarkan index
    unset($_SESSION['pets'][$_GET['index']]);

    // Menyusun ulang array untuk menjaga urutan indeks
    $_SESSION['pets'] = array_values($_SESSION['pets']);
}

// Redirect kembali ke halaman data
header("Location: data_pets.php");
exit;
?>
