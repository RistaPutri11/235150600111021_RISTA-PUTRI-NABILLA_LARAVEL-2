<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Awal Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh; /* Membuat tinggi halaman sesuai tinggi viewport */
            display: flex;
            justify-content: center; /* Memusatkan secara horizontal */
            align-items: center; /* Memusatkan secara vertikal */
            background-color: #f8f9fa; /* Latar belakang yang lembut */
        }
        .button-container {
            text-align: center; /* Memastikan konten dalam div tetap terpusat */
        }
        .button-container a {
            margin: 10px; /* Memberi jarak antar tombol */
        }
    </style>
</head>
<body>
    <div class="button-container">
        <h1 class="mb-4">Selamat Datang di Blog</h1>

        <!-- Tombol untuk melihat daftar blog -->
        <a href="{{ route('blogs.index') }}" class="btn btn-primary btn-lg">Lihat Blog</a>

        <!-- Tombol untuk membuat blog baru -->
        <a href="{{ route('blogs.create') }}" class="btn btn-success btn-lg">Buat Blog Baru</a>
    </div>
</body>
</html>
