<?php
session_start();

// Mengecek apakah sesi 'pets' ada, jika belum inisialisasi
if (!isset($_SESSION['pets'])) {
    $_SESSION['pets'] = [];
}

// Menambahkan hewan jika ada data POST (untuk input pertama)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['petName']) && !isset($_GET['edit'])) {
    $petName = $_POST['petName'];
    $petType = $_POST['petType'];
    $petDuration = $_POST['petDuration'];
    $petNotes = $_POST['petNotes'];

    $_SESSION['pets'][] = [
        'name' => $petName,
        'type' => $petType,
        'duration' => $petDuration,
        'notes' => $petNotes
    ];
}

// Menghapus hewan berdasarkan index
if (isset($_GET['delete'])) {
    $indexToDelete = $_GET['delete'];
    unset($_SESSION['pets'][$indexToDelete]);
    header("Location: " . $_SERVER['PHP_SELF']); // Redirect untuk menghindari refresh form
    exit;
}

// Mengedit hewan berdasarkan index
$petToEdit = null;
if (isset($_GET['edit'])) {
    $indexToEdit = $_GET['edit'];
    $petToEdit = $_SESSION['pets'][$indexToEdit];

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['petName'])) {
        // Update data hewan yang sedang diedit
        $_SESSION['pets'][$indexToEdit] = [
            'name' => $_POST['petName'],
            'type' => $_POST['petType'],
            'duration' => $_POST['petDuration'],
            'notes' => $_POST['petNotes']
        ];
        header("Location: " . $_SERVER['PHP_SELF']); // Redirect setelah edit
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Haven - Data Hewan</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white p-8">
    <h2 class="text-2xl font-bold mb-4">Data Hewan yang Dititipkan</h2>

    <!-- Form untuk Menambah atau Mengedit Hewan -->
    <form method="POST" class="mb-8">
        <input type="text" name="petName" placeholder="Nama Hewan" class="p-2 border rounded" value="<?= isset($petToEdit) ? htmlspecialchars($petToEdit['name']) : '' ?>" required />
        <input type="text" name="petType" placeholder="Jenis Hewan" class="p-2 border rounded" value="<?= isset($petToEdit) ? htmlspecialchars($petToEdit['type']) : '' ?>" required />
        <input type="number" name="petDuration" placeholder="Durasi (Hari)" class="p-2 border rounded" value="<?= isset($petToEdit) ? htmlspecialchars($petToEdit['duration']) : '' ?>" required />
        <textarea name="petNotes" placeholder="Catatan" class="p-2 border rounded"><?= isset($petToEdit) ? htmlspecialchars($petToEdit['notes']) : '' ?></textarea>
        <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded"><?= isset($petToEdit) ? 'Simpan Perubahan' : 'Tambah Hewan' ?></button>
    </form>

    <!-- Menampilkan Daftar Hewan -->
    <?php if (!empty($_SESSION['pets'])): ?>
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Nama Hewan</th>
                    <th class="border px-4 py-2">Jenis Hewan</th>
                    <th class="border px-4 py-2">Durasi (Hari)</th>
                    <th class="border px-4 py-2">Catatan</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['pets'] as $index => $pet): ?>
                    <tr>
                        <td class="border px-4 py-2"><?= htmlspecialchars($pet['name']) ?></td>
                        <td class="border px-4 py-2"><?= htmlspecialchars($pet['type']) ?></td>
                        <td class="border px-4 py-2"><?= htmlspecialchars($pet['duration']) ?></td>
                        <td class="border px-4 py-2"><?= htmlspecialchars($pet['notes']) ?></td>
                        <td class="border px-4 py-2">
                            <a href="?edit=<?= $index ?>" class="bg-yellow-500 text-white py-1 px-4 rounded">Edit</a>
                            <a href="?delete=<?= $index ?>" class="bg-red-600 text-white py-1 px-4 rounded">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
		<!-- Button Print -->
<button onclick="printPage()" class="bg-green-600 text-white py-2 px-4 rounded-full mt-4">Cetak ke PDF</button>

<script>
    function printPage() {
        // Menyembunyikan tombol cetak agar tidak tercetak
        document.querySelector("button").style.display = "none";
        
        // Mencetak halaman
        window.print();
        
        // Menampilkan kembali tombol setelah proses cetak
        document.querySelector("button").style.display = "inline-block";
    }
</script>
    <?php else: ?>
        <p>Tidak ada data hewan yang dititipkan.</p>
    <?php endif; ?>
</body>
</html>
