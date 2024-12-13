<?php
session_start();

// Mengecek apakah parameter 'index' ada di URL
if (isset($_GET['index']) && isset($_SESSION['pets'][$_GET['index']])) {
    // Mengambil data hewan berdasarkan index
    $pet = $_SESSION['pets'][$_GET['index']];
    $index = $_GET['index'];
} else {
    echo "Hewan tidak ditemukan.";
    exit;
}

// Proses edit data jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data yang diinputkan pada form
    $petName = $_POST['petName'];
    $petType = $_POST['petType'];
    $petDuration = $_POST['petDuration'];
    $petNotes = $_POST['petNotes'];

    // Mengupdate data hewan pada sesi
    $_SESSION['pets'][$index] = [
        'name' => $petName,
        'type' => $petType,
        'duration' => $petDuration,
        'notes' => $petNotes
    ];

    // Redirect kembali ke halaman data
    header("Location: data_pets.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Hewan</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h2>Edit Data Hewan</h2>
    <form method="POST">
        <div class="mb-4">
            <label for="petName" class="block">Nama Hewan</label>
            <input type="text" name="petName" id="petName" value="<?php echo htmlspecialchars($pet['name']); ?>" required />
        </div>
        <div class="mb-4">
            <label for="petType" class="block">Jenis Hewan</label>
            <input type="text" name="petType" id="petType" value="<?php echo htmlspecialchars($pet['type']); ?>" required />
        </div>
        <div class="mb-4">
            <label for="petDuration" class="block">Durasi Penitipan (Hari)</label>
            <input type="number" name="petDuration" id="petDuration" value="<?php echo htmlspecialchars($pet['duration']); ?>" required />
        </div>
        <div class="mb-4">
            <label for="petNotes" class="block">Catatan</label>
            <textarea name="petNotes" id="petNotes" rows="3"><?php echo htmlspecialchars($pet['notes']); ?></textarea>
        </div>
        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
