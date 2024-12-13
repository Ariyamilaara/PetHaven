<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pet Haven - Data Hewan')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

    <!-- Navbar (optional) -->
    <header class="bg-blue-600 text-white p-4 mb-8">
        <h1 class="text-3xl font-bold">Pet Haven</h1>
        <nav>
            <a href="{{ route('pets.index') }}" class="mr-4">Daftar Hewan</a>
            <a href="{{ route('pets.create') }}" class="mr-4">Tambah Hewan</a>
        </nav>
    </header>

    <!-- Main Content -->
    <div class="container mx-auto">
        @yield('content')
    </div>

</body>
</html>
