<?php
session_start(); // Mulai session

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php'); // Redirect ke halaman login jika belum login
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Haven Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-gray-200">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="bg-indigo-600 text-white w-64 p-4 flex flex-col">
            <div class="text-2xl font-bold mb-8">Pet Haven</div>
            <nav class="flex-1">
                <ul>
                    <li class="mb-4">
                        <a href="dashboard.php" class="flex items-center p-2 bg-indigo-700 rounded">
                            <i class="fas fa-th-large mr-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="categories/categories.php" class="flex items-center p-2 hover:bg-indigo-700 rounded">
                            <i class="fas fa-box mr-3"></i>
                            Categories
                        </a>
                    </li>
                 
                    <li>
                        <a href="logout.php" class="flex items-center p-2 hover:bg-indigo-700 rounded">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <header class="flex items-center justify-between bg-white p-4 shadow">
                <button class="text-2xl">
                    <i class="fas fa-bars"></i>
                </button>
                <button class="bg-indigo-600 text-white px-4 py-2 rounded">
                    <?php echo htmlspecialchars($_SESSION['username']); ?>
                </button>
            </header>
            <main class="flex-1 p-4">
                <h1 class="text-xl font-bold">Hallo, Selamat Datang <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
            </main>
        </div>
    </div>
</body>
</html>
