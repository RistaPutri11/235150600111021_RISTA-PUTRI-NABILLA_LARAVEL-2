<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Awal Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-5 mb-4">Selamat Datang di Blog</h1>

        <!-- Tombol untuk melihat daftar blog -->
        <a href="{{ route('blogs.index') }}" class="btn btn-primary btn-lg mb-3">Lihat Blog</a>

        <!-- Tombol untuk membuat blog baru -->
        <a href="{{ route('blogs.create') }}" class="btn btn-success btn-lg mb-3">Buat Blog Baru</a>
    </div>
</body>
</html>
