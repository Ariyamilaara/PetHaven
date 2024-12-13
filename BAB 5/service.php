<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services | Pet Haven</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        /* Modal Styling */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            text-align: center;
            position: relative;
        }
        .close {
            cursor: pointer;
            font-size: 20px;
            font-weight: bold;
            color: #333;
            position: absolute;
            top: 10px;
            right: 10px;
        }
        .close:hover {
            color: red;
        }
        .ok-button {
            background-color: #0b3fe9;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        .ok-button:hover {
            background-color: #0b3fe9;
        }
    </style>
</head>
<body class="bg-white">
    <!-- Navbar -->
    <header class="flex justify-between items-center p-4 bg-white shadow-md">
        <div class="flex items-center">
            <img alt="Pet Haven Logo" class="h-10 w-10" height="50" src="asset/A6.png" width="50"/>
            <h1 class="text-2xl font-bold ml-2">
                Pet Haven
            </h1>
        </div>
        <nav class="flex space-x-4">
            <a class="text-black" href="index.php">HOME</a>
            <a class="text-black" href="services.php">SERVICES</a>
            <a class="text-black" href="index.php">CATEGORIES</a>
            <a class="text-white bg-blue-600 px-4 py-2 rounded-full" href="login.php">LOGIN</a>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto p-6 mt-8">
        <h2 class="text-3xl font-bold text-center mb-6">Nikmati Layanan Servis</h2>
        <form id="serviceForm" class="max-w-lg mx-auto bg-gray-100 p-6 rounded-lg shadow-lg">
            <div class="mb-4">
                <label for="ownerName" class="block text-sm font-semibold text-gray-700">Nama Pemilik</label>
                <input type="text" id="ownerName" name="ownerName" required class="w-full px-4 py-2 border border-gray-300 rounded-lg mt-2" placeholder="Masukkan Nama Pemilik">
            </div>

            <div class="mb-4">
                <label for="petType" class="block text-sm font-semibold text-gray-700">Jenis Peliharaan</label>
                <input type="text" id="petType" name="petType" required class="w-full px-4 py-2 border border-gray-300 rounded-lg mt-2" placeholder="Masukkan Jenis Peliharaan">
            </div>

            <div class="mb-4">
                <label for="duration" class="block text-sm font-semibold text-gray-700">Durasi Penitipan</label>
                <input type="text" id="duration" name="duration" required class="w-full px-4 py-2 border border-gray-300 rounded-lg mt-2" placeholder="Masukkan Durasi Penitipan">
            </div>

            <div class="mb-6 text-center">
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-full">Submit</button>
            </div>
        </form>
    </main>

    <!-- Success Modal -->
    <div id="serviceModal" class="modal">
        <div class="modal-content">
            <button id="closeModal" class="close"><i class="fas fa-times"></i></button>
            <h3 class="text-xl font-bold mb-4">Terima Kasih!</h3>
            <p>Formulir layanan Anda telah diterima. Pendaftaran Sukses.</p>
            <button id="okButton" class="ok-button">OK</button>
        </div>
    </div>

    <script>
        // Show modal when form is submitted
        const form = document.getElementById('serviceForm');
        const modal = document.getElementById('serviceModal');
        const closeModalButton = document.getElementById('closeModal');
        const okButton = document.getElementById('okButton');

        form.addEventListener('submit', function(event) {
            event.preventDefault();
            modal.style.display = 'flex';
        });

        function resetFormAndCloseModal() {
            form.reset(); // Reset the form fields
            modal.style.display = 'none'; // Hide the modal
        }

        closeModalButton.addEventListener('click', resetFormAndCloseModal);
        okButton.addEventListener('click', resetFormAndCloseModal);
    </script>
</body>
</html>
