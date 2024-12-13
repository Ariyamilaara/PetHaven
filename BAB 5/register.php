<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Haven - Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-white flex items-center justify-center min-h-screen">
    <!-- Navbar -->
    <div class="absolute top-0 left-0 w-full p-4 flex justify-between items-center">
        <div class="flex items-center">
            <img alt="Pet Haven logo" class="rounded-full" height="50" src="asset/A6.png" width="50"/>
            <span class="ml-2 text-xl font-bold">Pet Haven</span>
        </div>
        <div class="flex space-x-4">
            <a class="text-black" href="index.php">HOME</a>
            <a class="text-black" href="dashboard.php">DASHBOARD</a>
            <a class="bg-blue-600 text-white px-4 py-2 rounded-full" href="login.php">LOGIN</a>
        </div>
    </div>

    <!-- Registration Form -->
    <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>
        <form id="registerForm">
            <div class="mb-4">
                <input class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" 
                       id="email" 
                       placeholder="Email" 
                       type="email" 
                       required />
            </div>
            <div class="mb-4">
                <input class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" 
                       id="username" 
                       placeholder="Username" 
                       type="text" 
                       required />
            </div>
            <div class="mb-6">
                <input class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" 
                       id="password" 
                       placeholder="Password" 
                       type="password" 
                       required />
            </div>
            <button class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700" type="submit">Register</button>
        </form>
    </div>

    <script>
        // Handle form submission
        const registerForm = document.getElementById('registerForm');

        registerForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Get input values
            const email = document.getElementById('email').value;
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            // Save data to Local Storage
            localStorage.setItem('email', email);
            localStorage.setItem('username', username);
            localStorage.setItem('password', password);

            // Display success message
            alert('Registrasi berhasil! Data Anda telah disimpan di Local Storage.');

            // Optionally, redirect or clear the form
            registerForm.reset();
        });
    </script>
</body>
</html>
