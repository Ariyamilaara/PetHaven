<!DOCTYPE html>
<html lang="id">
<head>
  <title>Pet Haven Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-white flex items-center justify-center min-h-screen">
  <div class="absolute top-0 left-0 p-4">
    <img alt="Pet Haven logo with a dog and a cat" class="inline-block rounded-full" height="50" src="asset/A6.png" width="50"/>
    <span class="text-2xl font-semibold ml-2">Pet Haven</span>
  </div>
  <div class="absolute top-0 right-0 p-4 flex space-x-4">
    <a class="text-black font-semibold" href="index.php">HOME</a>
    <a class="text-black font-semibold" href="dashboard.php">DASHBOARD</a>
    <a class="bg-blue-600 text-white font-semibold py-2 px-4 rounded" href="login.php">LOGIN</a>
  </div>

  <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-sm">
    <h2 class="text-2xl font-bold text-center mb-6">LOGIN</h2>
    <form id="loginForm">
      <div class="mb-4">
        <input class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" id="username" name="username" placeholder="Username" type="text" required/>
      </div>
      <div class="mb-6">
        <input class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" id="password" name="password" placeholder="Password" type="password" required/>
      </div>
      <button class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold" type="submit">LOGIN</button>
    </form>

    <div class="text-center mt-6">
      <hr class="border-t border-gray-300"/>
      <a href="register.php" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold inline-block mt-3">Register</a>
    </div>
  </div>

  <script>
    const loginForm = document.getElementById('loginForm');

    loginForm.addEventListener('submit', function(event) {
      event.preventDefault(); // Mencegah pengiriman formulir secara default

      // Ambil data formulir
      const formData = new FormData(loginForm);

      // Kirim permintaan ke server
      fetch('login-proses.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          alert(data.message);
          window.location.href = "dashboard.php"; // Redirect ke dashboard jika berhasil
        } else {
          alert(data.message); // Tampilkan pesan error
        }
      })
      .catch(error => console.error('Error:', error));
    });
  </script>
</body>
</html>
