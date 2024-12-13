<?php
// Ini adalah file PHP, Anda dapat menambahkan logika server-side di sini jika diperlukan
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
        document.addEventListener("DOMContentLoaded", function() {
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

    <section class="mt-8">
        <h2 class="text-2xl font-bold text-center mb-8">Pet Categories</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <img alt="Rabbit eating a leaf" class="rounded-3xl mb-4" height="150" src="asset/A4.jpg" width="200" />
                <h3 class="text-xl font-bold">Kelinci</h3>
                <p>
                    Kami menyediakan area bermain yang aman dan nyaman untuk kelinci Anda, serta memastikan mereka mendapatkan makanan segar dan kaya serat.
                </p>
            </div>
            <div class="text-center">
                <img alt="Colorful birds on a perch" class="rounded-3xl mb-4" height="150" src="asset/A3.jpg" width="200" />
                <h3 class="text-xl font-bold">Burung</h3>
                <p>
                    Kami menyediakan kandang yang bersih dan luas, serta perawatan khusus untuk setiap jenis burung. Kami akan memastikan burung Anda mendapatkan perhatian, makanan yang tepat.
                </p>
            </div>
            <div class="text-center">
                <img alt="Cats sitting together" class="rounded-3xl mb-4" height="150" src="asset/A7.jpg" width="200" />
                <h3 class="text-xl font-bold">Kucing</h3>
                <p>
                    Kami memberikan tempat yang tenang dan bersih, dengan area bermain yang aman untuk kucing kesayangan Anda. Setiap kucing akan mendapatkan ruang pribadi dan makanan yang sesuai dengan kebutuhannya.
                </p>
            </div>
            <div class="text-center">
                <img alt="Dog lying down" class="rounded-3xl mb-4" height="150" src="asset/A5.webp" width="200" />
                <h3 class="text-xl font-bold">Anjing</h3>
                <p>
                    Kami memastikan anjing Anda tetap aktif dengan berjalan-jalan, bermain, dan mendapat perhatian penuh dari staf kami.
                </p>
            </div>
        </div>
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
