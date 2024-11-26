<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Warna latar belakang soft */
        }
        .blog-container {
            margin: 50px auto;
            max-width: 1200px;
        }
        .card {
            border: none; /* Hilangkan border default */
            border-radius: 10px; /* Buat sudut membulat */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Tambahkan efek bayangan */
            overflow: hidden;
        }
        .card img {
            height: 200px; /* Atur tinggi gambar */
            object-fit: cover; /* Potong gambar sesuai ukuran */
        }
        .btn-custom {
            background-color: #007bff;
            color: #ffffff;
        }
        .btn-custom:hover {
            background-color: #0056b3;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container blog-container">
        <h1 class="text-center mb-5">Daftar Blog</h1>
        <div class="row">
            @forelse ($blogs as $blog)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if($blog->foto)
                        <img src="{{ asset('storage/' . $blog->foto) }}" class="card-img-top" alt="Gambar Blog">
                    @else
                        <img src="https://via.placeholder.com/400x200?text=No+Image" class="card-img-top" alt="Gambar Default">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $blog->judul }}</h5>
                        <p class="card-text text-truncate">{{ $blog->isi }}</p>
                        <p class="text-muted">Oleh: {{ $blog->pembuat }}</p>
                        <a href="/blogs/{{ $blog->id }}" class="btn btn-custom btn-sm">Baca Selengkapnya</a>
                        <a href="/blogs/{{ $blog->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <form action="/blogs/{{ $blog->id }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus blog ini?')">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <p class="text-center">Belum ada blog yang tersedia.</p>
                <div class="text-center">
                    <a href="/tambah" class="btn btn-primary">Tambah Blog Baru</a>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</body>
</html>
