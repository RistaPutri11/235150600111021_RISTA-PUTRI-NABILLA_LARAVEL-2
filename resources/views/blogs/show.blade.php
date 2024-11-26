<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>{{ $blog->judul }}</h1>
        <p class="text-muted">Oleh: {{ $blog->pembuat }}</p>
        <img src="{{ asset('storage/' . $blog->foto) }}" alt="Foto Blog" class="img-fluid">
        <p class="mt-3">{{ $blog->isi }}</p>
        <a href="{{ route('blogs.create') }}" class="btn btn-primary">Tambah Blog Baru</a>

        <!-- <a href="{{ route('blogs.index') }}" class="btn btn-primary">Kembali ke Daftar Blog</a> -->
        <!-- <a href="/blogs" class="btn btn-primary">Kembali ke Daftar Blog</a> -->
    </div>
</body>
</html>
