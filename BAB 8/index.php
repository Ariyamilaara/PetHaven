<?php
// Mulai sesi untuk menyimpan data hewan yang dititipkan
session_start();

// Inisialisasi array hewan yang dititipkan jika belum ada di sesi
if (!isset($_SESSION['pets'])) {
    $_SESSION['pets'] = [];
}

// Jika form disubmit, simpan data hewan ke dalam sesi
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['petName'])) {
    $petName = $_POST['petName'];
    $petType = $_POST['petType'];
    $petDuration = $_POST['petDuration'];
    $petNotes = $_POST['petNotes'];

    // Simpan data hewan ke dalam sesi
    $_SESSION['pets'][] = [
        'name' => $petName,
        'type' => $petType,
        'duration' => $petDuration,
        'notes' => $petNotes
    ];
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Haven</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const categoryImages = document.querySelectorAll("section img");
            categoryImages.forEach((img) => {
                img.setAttribute("height", "250");
            });

            const snackbar = document.getElementById("snackbar");
            snackbar.classList.remove("hidden");
            setTimeout(() => snackbar.classList.add("hidden"), 3000);
        });
    </script>
</head>

<body class="bg-white">
    <!-- Snackbar -->
    <div id="snackbar" class="hidden fixed bottom-4 right-4 bg-blue-600 text-white py-3 px-6 rounded-lg shadow-lg">
        Selamat Datang
    </div>

    <header class="flex justify-between items-center p-4 bg-white shadow-md">
        <div class="flex items-center">
            <img alt="Pet Haven Logo" class="h-10 w-10" height="50" src="asset/A6.png" width="50" />
            <h1 class="text-2xl font-bold ml-2">Pet Haven</h1>
        </div>
        <nav class="flex space-x-4">
            <a class="text-black" href="index.php">HOME</a>
            <a class="text-black" href="service.php">SERVICE</a>
            <a class="text-black" href="dashboard.php">DASHBOARD</a>
            <a class="text-white bg-blue-600 px-4 py-2 rounded-full" href="login.php">LOGIN</a>
        </nav>
    </header>

    <section class="bg-blue-600 text-white rounded-3xl p-8 flex flex-col md:flex-row items-center justify-between">
        <div class="md:w-2/3">
            <h2 class="text-3xl font-bold mb-4">Layanan Penitipan Hewan Peliharaan Terpercaya</h2>
            <p class="mb-4">
                Kami memahami betapa pentingnya hewan peliharaan bagi Anda. Mereka bukan sekadar hewan, tapi bagian dari keluarga. Itulah mengapa kami berkomitmen memberikan perawatan terbaik yang penuh kasih sayang dan perhatian.
            </p>
            <button class="bg-white text-blue-600 px-4 py-2 rounded-full">Mulai Sekarang</button>
        </div>
        <img alt="Group of pets including a dog, cat, rabbit, and bird" class="md:w-1/3 rounded-3xl mt-4 md:mt-0" height="200" src="asset/A2.jpg" width="300" />
    </section>

    <!-- Form Penginputan Hewan -->
    <section class="mt-8 p-8 bg-white rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">Tambah Hewan yang Dititipkan</h2>
        <form method="POST">
            <div class="mb-4">
                <label for="petName" class="block text-sm font-semibold">Nama Hewan</label>
                <input type="text" name="petName" id="petName" required class="w-full p-2 mt-2 border rounded-md" />
            </div>
            <div class="mb-4">
                <label for="petType" class="block text-sm font-semibold">Jenis Hewan</label>
                <input type="text" name="petType" id="petType" required class="w-full p-2 mt-2 border rounded-md" />
            </div>
            <div class="mb-4">
                <label for="petDuration" class="block text-sm font-semibold">Durasi Penitipan (Hari)</label>
                <input type="number" name="petDuration" id="petDuration" required class="w-full p-2 mt-2 border rounded-md" />
            </div>
            <div class="mb-4">
                <label for="petNotes" class="block text-sm font-semibold">Catatan</label>
                <textarea name="petNotes" id="petNotes" rows="3" class="w-full p-2 mt-2 border rounded-md"></textarea>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-full">Tambah Hewan</button>
        </form>
    </section>

    <!-- Modal -->
    <div id="serviceModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white rounded-lg p-6 max-w-lg shadow-lg relative">
            <button id="closeModal" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800">
                <i class="fas fa-times"></i>
            </button>
            <h3 class="text-xl font-bold mb-4" id="modalTitle">Layanan</h3>
            <p id="modalContent">Deskripsi layanan akan tampil di sini.</p>
            <button class="mt-4 bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700" id="confirmService">Konfirmasi</button>
        </div>
    </div>
</body>

</html>
